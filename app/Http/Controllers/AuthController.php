<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Information;
use App\Models\Form;
use Auth;

class AuthController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
   
    public function dashboard(){
        $user = Auth::user();
       
        $usersCount = User::where('role', '!=', 1)->count();
        $form = Form::count();
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id) // Retrieve the current user
            ->select('users.*', 'multirole.role as role_name')
            ->first(); // Retrieve a single record
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name; // Get the role name from the query
    
        return view('dashboard', compact('user_id', 'user_name', 'user_role', 'usersCount', 'form'));
    }
    
    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:8|max:50',
            'cpassword' => 'required|min:8|same:password' 
        ], [
            'cpassword.same' => 'Password did not match!',
            'cpassword.required' => 'Confirm password is required!'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = '1';
            
            $user->save();
            
            return response()->json([
                'status' => 200,
                'messages' => 'Register Successfully!',
                'redirect' => route('auth.login')
            ]);
        }
    }
    
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if ($request->ajax()) {
                return response()->json(['status' => 200, 'redirect' => route('dashboard')]);
            }
            return redirect()->route('dashboard');
        } else {
            if ($request->ajax()) {
                return response()->json(['status' => 401, 'message' => 'Please enter correct email and password']);
            }
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }
    
 
    public function profile()
    {
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
            ->where('users.id', '=', $user->id)
            ->select('users.*', 'multirole.role as role_name')
            ->first(); 
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name; 
    
    
        return view('auth.profile', compact(
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

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:8|max:50',
            'userole' => 'required|integer', 
        ]);
    
        if ($validator->fails()) {
            Log::error('Validation failed: ', $validator->errors()->toArray());
            return response()->json([
                'status' => 400,
                'messages' => $validator->errors()
            ]);
        } else {
           
            if ($request->userole == "Sub-Admin") {
                $role = 3;
            } elseif ($request->userole == "User") {
                $role = 2; 
            } else {
                $role = $request->userole;
            }
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $role;
    
            $user->save();
            
            return response()->json([
                'status' => 200,
                'messages' => 'Register Successfully!',
                'redirect' => route('user.user_account')
            ]);
            
        }
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->user_id);
    
        if ($user) {
            $user->name = $request->update_name;
            $user->email = $request->update_email;
    
            if (!empty($request->update_password)) {
                $user->password = Hash::make($request->update_password);
            }
    
            $user->save();
    
            return response()->json(['status' => 200, 'message' => 'User updated successfully']);
        } else {
            return response()->json(['status' => 400, 'message' => 'User not found']);
        }
    }

    public function generateQRCode()
    {
        // Generate a QR code for a feedback form or any other link
        $qrCode = QrCode::size(300)->generate(url('/feedback-form'));

        // Return the view with the QR code
        return view('qrcode.show', compact('qrCode'));
    }
    
}
