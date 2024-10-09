<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Information;
use App\Models\Form;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class OfficeUSersController extends Controller
{
    public function userForm() {
        $user = Auth::user();

        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id)
            ->select('users.*', 'multirole.role as role_name')
            ->first();
        
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name;
    
        $query = DB::table('forms')
            ->join('users as officeUsers', 'forms.office_id', '=', 'officeUsers.id')
            ->select(
                'forms.id',
                'forms.admin_id',
                'forms.user_id',
                'forms.office_id',
                'forms.client',
                'forms.sex',
                'forms.age',
                'forms.region',
                'forms.service',
                'forms.ccone',
                'forms.cctwo',
                'forms.ccthree',
                'forms.suggest',
                'forms.contact',
                'forms.created_at',
                'officeUsers.name as office_user_name'
            );
        
        if ($user_role === 'Admin') {
            $formData = $query->get();
        } else {
            $formData = $query->where('forms.office_id', '=', $user->id)->get();
        }
    
        return view('user.user_form', compact('user_id', 'user_name', 'user_role', 'formData'));
    }
    
    public function loginUser(){
        return view('user.user_login');
    }

    public function Userlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if ($request->ajax()) {
                return response()->json(['status' => 200, 'redirect' => route('user.user_interface')]);
            }
            return redirect()->route('user.user_interface');
        } else {
            if ($request->ajax()) {
                return response()->json(['status' => 401, 'message' => 'Please enter correct email and password']);
            }
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    
    public function dashboard(Request $request)
    {
        $user = Auth::user();
    
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id)
            ->select('users.*', 'multirole.role as role_name')
            ->first();
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name;
    
         // If the user is an Admin, fetch all data
    if ($user_role === 'Admin') {
        $currentDateData = Form::whereDate('created_at', Carbon::today())->count();
        $currentWeekData = Form::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $currentMonthData = Form::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $currentYearData = Form::whereYear('created_at', Carbon::now()->year)->count();
    } 
    // If the user is not an Admin, fetch data only relevant to them
    else {
        $currentDateData = Form::where('office_id', $user_id)->whereDate('created_at', Carbon::today())->count();
        $currentWeekData = Form::where('office_id', $user_id)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $currentMonthData = Form::where('office_id', $user_id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $currentYearData = Form::where('office_id', $user_id)->whereYear('created_at', Carbon::now()->year)->count();
    }

    return view('user.user_interface', compact('user_id', 'user_name', 'user_role', 'currentDateData', 'currentMonthData', 'currentYearData', 'currentWeekData'));
    }

    public function userprofile(){
        $user = Auth::user();

        $info = Information::where('user_id', $user->id)->first();

        $user_name = $user->name;
        $user_role = $user->role;
        $user_email = $user->email;
        $user_campus = $info->campus ?? '';
        $user_about = $info->about ?? '';
        $user_phone = $info->phone ?? '';
        $user_address = $info->address ?? '';
        $user_position = $info->position ?? '';
        $user_image = $info->image ?? '';

        $user = Auth::user();
    
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id) // Retrieve the current user
            ->select('users.*', 'multirole.role as role_name')
            ->first(); // Retrieve a single record
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name; // Get the role name from the query
    
        return view('user.user_profile',compact(
            'user', 'info', 'user_name', 'user_role', 'user_email', 'user_campus', 'user_about', 'user_phone', 'user_address', 'user_position', 'user_image'
        ));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $info = $user->information ?? new Information();
    
        Log::info('Request Data: ', $request->all());
    
        $request->validate([
            'fullName' => 'required|string|max:255',
            'About' => 'nullable|string|max:255',
            'Phone' => 'nullable|string|max:20',
            'Email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'Campus' => 'nullable|string|max:255',
            'Address' => 'nullable|string|max:255',
            'Position'=> 'required|string|max:255',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        
        $user->name = $request->input('fullName');
        $user->email = $request->input('Email');
        $user->save();
    
        // Update Information model
        $info->updateOrCreate(
            ['user_id' => $user->id],
            [
                'about' => $request->input('About'),
                'phone' => $request->input('Phone'),
                'campus'=> $request->input('Campus'),
                'address' => $request->input('Address'),
                'position' => $request->input('Position'),
            ]
        );
    
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->storeAs('images', 'public');
            $info->update(['image' => $imagePath]);
        }
    
        return redirect()->back()->with('flash_message', 'Profile updated successfully');
    }

//   public function generate(Request $request)
// {
//     $user = Auth::user();

//     $users = DB::table('users')
//     ->join('multirole', 'users.role', '=', 'multirole.id')
//     ->where('users.id', '=', $user->id)
//     ->select('users.*', 'multirole.role as role_name')
//     ->first();

//     $user_id = $user->id;
//     $user_name = $user->name;
//     $user_role = $users->role_name;

//     $info = Information::where('user_id', $user->id)->first();

//     $url = route('form', ['office_id' => $user->office_id]); 

//     $qr_code = QrCode::size(300)->generate($url);

//     return view('user.user_profile', compact('qr_code', 'user', 'info', 'user_name', 'user_role'));
// }
    public function qr(){

        $user = Auth::user();
    
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id) // Retrieve the current user
            ->select('users.*', 'multirole.role as role_name')
            ->first(); // Retrieve a single record
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name; // Get the role name from the query

        return view('user.qrgenerate', compact('user_id', 'user_name', 'user_role'));
    }
    
}
