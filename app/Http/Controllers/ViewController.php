<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Form;
use App\Models\Information;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Auth;

class ViewController extends Controller
{
    public function user_account()
    {
        $user = Auth::user();
    
        $users = DB::table('users')
                    ->join('multirole', 'users.role', '=', 'multirole.id')
                    ->where('users.role', '!=',  $user->id) 
                    ->select('users.*', 'multirole.role as role_name', 'users.password')
                    ->get();
    
        return view('user.user_account', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
            'users' => $users,
        ]);
    }
    
    public function formsatisfaction()
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('menu')->with('error', 'Please log in first to access this page.');
        }
    
        $currentUser = Auth::user();
    
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $currentUser->id) 
            ->where('users.role', '!=', 1) 
            ->select('users.*', 'multirole.role as role_name')
            ->get();
    
        return view('menu', [
            'user_name' => $currentUser->name,
            'user_role' => $currentUser->role,
            'users' => $users
        ]);
    }
    
       
    public function data()
    {
        $user = Auth::user();
        
        // Fetch the user's role and other information
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('users.id', '=', $user->id) 
            ->select('users.*', 'multirole.role as role_name')
            ->first();
    
        $user_id = $user->id;
        $user_name = $user->name;
        $user_role = $users->role_name;
    
       
        $formData = DB::table('forms')
            ->join('users as officeUsers', 'forms.office_id', '=', 'officeUsers.id') // Join users to get office user names
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
                'officeUsers.name as office_user_name' // Select the office user name
            )
            ->get();
    
        return view('report.data', compact('user_id', 'user_name', 'user_role', 'formData'));
    }

    
    public function data1()
    {
        $user = Auth::user();
        
        $users = DB::table('users')
            ->join('multirole', 'users.role', '=', 'multirole.id')
            ->where('multirole.role', '!=', 'Admin') 
            ->select('users.*', 'multirole.role as role_name')
            ->get(); 
    
        $user_name = $user->name;
        $user_id = $user->id;
        $user_role = $users->first()->role_name; 

        $offices = DB::table('forms')
        ->join('users', 'forms.office_id', '=', 'users.id')
        ->select(
            'forms.office_id',  
            'users.name as office_name',
            DB::raw('SUM(forms.sqdzero = 5) as strongly_agree'),
            DB::raw('SUM(forms.sqdzero = 4) as agree'),
            DB::raw('SUM(forms.sqdzero = 3) as neutral'),
            DB::raw('SUM(forms.sqdzero = 2) as disagree'),
            DB::raw('SUM(forms.sqdzero = 1) as strongly_disagree'),
            DB::raw('SUM(forms.sqdzero = 0) as na'),
            DB::raw('COUNT(forms.sqdzero) as total_responses'),
            DB::raw('ROUND((SUM(forms.sqdzero = 5) + SUM(forms.sqdzero = 4)) / (COUNT(forms.sqdzero) - SUM(forms.sqdzero = 0)) * 100, 2) as overall_rating_percentage'),
           //  (SQD1)
            DB::raw('SUM(forms.sqdone = 5) as sqdone_strongly_agree'),
            DB::raw('SUM(forms.sqdone = 4) as sqdone_agree'),
            DB::raw('SUM(forms.sqdone = 3) as sqdone_neutral'),
            DB::raw('SUM(forms.sqdone = 2) as sqdone_disagree'),
            DB::raw('SUM(forms.sqdone = 1) as sqdone_strongly_disagree'),
            DB::raw('SUM(forms.sqdone = 0) as sqdone_na'),
            DB::raw('COUNT(forms.sqdone) as sqdone_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdone = 5) + SUM(forms.sqdone = 4)) / (COUNT(forms.sqdone) - SUM(forms.sqdone = 0)) * 100, 2) as sqdone_overall_rating_percentage'),
    
            //  (SQD2)
            DB::raw('SUM(forms.sqdtwo = 5) as sqdtwo_strongly_agree'),
            DB::raw('SUM(forms.sqdtwo = 4) as sqdtwo_agree'),
            DB::raw('SUM(forms.sqdtwo = 3) as sqdtwo_neutral'),
            DB::raw('SUM(forms.sqdtwo = 2) as sqdtwo_disagree'),
            DB::raw('SUM(forms.sqdtwo = 1) as sqdtwo_strongly_disagree'),
            DB::raw('SUM(forms.sqdtwo = 0) as sqdtwo_na'),
            DB::raw('COUNT(forms.sqdtwo) as sqdtwo_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdtwo = 5) + SUM(forms.sqdtwo = 4)) / (COUNT(forms.sqdtwo) - SUM(forms.sqdtwo = 0)) * 100, 2) as sqdtwo_overall_rating_percentage'),
               //  (SQD3)
            DB::raw('SUM(forms.sqdthree = 5) as sqdthree_strongly_agree'),
            DB::raw('SUM(forms.sqdthree = 4) as sqdthree_agree'),
            DB::raw('SUM(forms.sqdthree = 3) as sqdthree_neutral'),
            DB::raw('SUM(forms.sqdthree = 2) as sqdthree_disagree'),
            DB::raw('SUM(forms.sqdthree = 1) as sqdthree_strongly_disagree'),
            DB::raw('SUM(forms.sqdthree = 0) as sqdthree_na'),
            DB::raw('COUNT(forms.sqdthree) as sqdthree_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdthree = 5) + SUM(forms.sqdthree = 4)) / (COUNT(forms.sqdthree) - SUM(forms.sqdthree = 0)) * 100, 2) as sqdthree_overall_rating_percentage'),
               //  (SQD4)
            DB::raw('SUM(forms.sqdfour = 5) as sqdfour_strongly_agree'),
            DB::raw('SUM(forms.sqdfour = 4) as sqdfour_agree'),
            DB::raw('SUM(forms.sqdfour = 3) as sqdfour_neutral'),
            DB::raw('SUM(forms.sqdfour = 2) as sqdfour_disagree'),
            DB::raw('SUM(forms.sqdfour = 1) as sqdfour_strongly_disagree'),
            DB::raw('SUM(forms.sqdfour = 0) as sqdfour_na'),
            DB::raw('COUNT(forms.sqdfour) as sqdfour_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdfour = 5) + SUM(forms.sqdfour = 4)) / (COUNT(forms.sqdfour) - SUM(forms.sqdfour = 0)) * 100, 2) as sqdfour_overall_rating_percentage'),

            //  (SQD5)
            DB::raw('SUM(forms.sqdfive = 5) as sqdfive_strongly_agree'),
            DB::raw('SUM(forms.sqdfive = 4) as sqdfive_agree'),
            DB::raw('SUM(forms.sqdfive = 3) as sqdfive_neutral'),
            DB::raw('SUM(forms.sqdfive = 2) as sqdfive_disagree'),
            DB::raw('SUM(forms.sqdfive = 1) as sqdfive_strongly_disagree'),
            DB::raw('SUM(forms.sqdfive = 0) as sqdfive_na'),
            DB::raw('COUNT(forms.sqdfive) as sqdfive_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdfive = 5) + SUM(forms.sqdfive = 4)) / (COUNT(forms.sqdfive) - SUM(forms.sqdfive = 0)) * 100, 2) as sqdfive_overall_rating_percentage'),
               //  (SQD6)
            DB::raw('SUM(forms.sqdsix = 5) as sqdsix_strongly_agree'),
            DB::raw('SUM(forms.sqdsix = 4) as sqdsix_agree'),
            DB::raw('SUM(forms.sqdsix = 3) as sqdsix_neutral'),
            DB::raw('SUM(forms.sqdsix = 2) as sqdsix_disagree'),
            DB::raw('SUM(forms.sqdsix = 1) as sqdsix_strongly_disagree'),
            DB::raw('SUM(forms.sqdsix = 0) as sqdsix_na'),
            DB::raw('COUNT(forms.sqdsix) as sqdsix_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdsix = 5) + SUM(forms.sqdsix = 4)) / (COUNT(forms.sqdsix) - SUM(forms.sqdsix = 0)) * 100, 2) as sqdsix_overall_rating_percentage'),
                 //  (SQD7)
            DB::raw('SUM(forms.sqdseven = 5) as sqdseven_strongly_agree'),
            DB::raw('SUM(forms.sqdseven = 4) as sqdseven_agree'),
            DB::raw('SUM(forms.sqdseven = 3) as sqdseven_neutral'),
            DB::raw('SUM(forms.sqdseven = 2) as sqdseven_disagree'),
            DB::raw('SUM(forms.sqdseven = 1) as sqdseven_strongly_disagree'),
            DB::raw('SUM(forms.sqdseven = 0) as sqdseven_na'),
            DB::raw('COUNT(forms.sqdseven) as sqdseven_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdseven = 5) + SUM(forms.sqdseven = 4)) / (COUNT(forms.sqdseven) - SUM(forms.sqdseven = 0)) * 100, 2) as sqdseven_overall_rating_percentage'),
              //  (SQD8)
            DB::raw('SUM(forms.sqdeight = 5) as sqdeight_strongly_agree'),
            DB::raw('SUM(forms.sqdeight = 4) as sqdeight_agree'),
            DB::raw('SUM(forms.sqdeight = 3) as sqdeight_neutral'),
            DB::raw('SUM(forms.sqdeight = 2) as sqdeight_disagree'),
            DB::raw('SUM(forms.sqdeight = 1) as sqdeight_strongly_disagree'),
            DB::raw('SUM(forms.sqdeight = 0) as sqdeight_na'),
            DB::raw('COUNT(forms.sqdeight) as sqdeight_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdeight = 5) + SUM(forms.sqdeight = 4)) / (COUNT(forms.sqdeight) - SUM(forms.sqdeight = 0)) * 100, 2) as sqdeight_overall_rating_percentage')
    
        )
        ->groupBy('forms.office_id', 'users.name')
        ->get();

        $overall = DB::table('forms')
        ->select(
            DB::raw('SUM(forms.sqdzero = 5) as total_strongly_agree'),
            DB::raw('SUM(forms.sqdzero = 4) as total_agree'),
            DB::raw('SUM(forms.sqdzero = 3) as total_neutral'),
            DB::raw('SUM(forms.sqdzero = 2) as total_disagree'),
            DB::raw('SUM(forms.sqdzero = 1) as total_strongly_disagree'),
            DB::raw('SUM(forms.sqdzero = 0) as total_na'),
            DB::raw('COUNT(forms.sqdzero) as total_responses'),
      
            DB::raw('ROUND((SUM(forms.sqdzero = 5) + SUM(forms.sqdzero = 4)) / (COUNT(forms.sqdzero) - SUM(forms.sqdzero = 0)) * 100, 2) as overall_rating_percentage'),
             // SQD1 
            DB::raw('SUM(forms.sqdone = 5) as sqdone_total_strongly_agree'),
            DB::raw('SUM(forms.sqdone = 4) as sqdone_total_agree'),
            DB::raw('SUM(forms.sqdone = 3) as sqdone_total_neutral'),
            DB::raw('SUM(forms.sqdone = 2) as sqdone_total_disagree'),
            DB::raw('SUM(forms.sqdone = 1) as sqdone_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdone = 0) as sqdone_total_na'),
            DB::raw('COUNT(forms.sqdone) as sqdone_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdone = 5) + SUM(forms.sqdone = 4)) / (COUNT(forms.sqdone) - SUM(forms.sqdone = 0)) * 100, 2) as sqdone_overall_rating_percentage'),
             // SQD2 
            DB::raw('SUM(forms.sqdtwo = 5) as sqdtwo_total_strongly_agree'),
            DB::raw('SUM(forms.sqdtwo = 4) as sqdtwo_total_agree'),
            DB::raw('SUM(forms.sqdtwo = 3) as sqdtwo_total_neutral'),
            DB::raw('SUM(forms.sqdtwo = 2) as sqdtwo_total_disagree'),
            DB::raw('SUM(forms.sqdtwo = 1) as sqdtwo_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdtwo = 0) as sqdtwo_total_na'),
            DB::raw('COUNT(forms.sqdtwo) as sqdtwo_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdtwo = 5) + SUM(forms.sqdtwo = 4)) / (COUNT(forms.sqdtwo) - SUM(forms.sqdtwo = 0)) * 100, 2) as sqdtwo_overall_rating_percentage'),

                // SQD3 
            DB::raw('SUM(forms.sqdthree = 5) as sqdthree_total_strongly_agree'),
            DB::raw('SUM(forms.sqdthree = 4) as sqdthree_total_agree'),
            DB::raw('SUM(forms.sqdthree = 3) as sqdthree_total_neutral'),
            DB::raw('SUM(forms.sqdthree = 2) as sqdthree_total_disagree'),
            DB::raw('SUM(forms.sqdthree = 1) as sqdthree_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdthree = 0) as sqdthree_total_na'),
            DB::raw('COUNT(forms.sqdthree) as sqdthree_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdthree = 5) + SUM(forms.sqdthree = 4)) / (COUNT(forms.sqdthree) - SUM(forms.sqdthree = 0)) * 100, 2) as sqdthree_overall_rating_percentage'),

            // SQD4 
            DB::raw('SUM(forms.sqdfour = 5) as sqdfour_total_strongly_agree'),
            DB::raw('SUM(forms.sqdfour = 4) as sqdfour_total_agree'),
            DB::raw('SUM(forms.sqdfour = 3) as sqdfour_total_neutral'),
            DB::raw('SUM(forms.sqdfour = 2) as sqdfour_total_disagree'),
            DB::raw('SUM(forms.sqdfour = 1) as sqdfour_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdfour = 0) as sqdfour_total_na'),
            DB::raw('COUNT(forms.sqdfour) as sqdfour_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdfour = 5) + SUM(forms.sqdfour = 4)) / (COUNT(forms.sqdfour) - SUM(forms.sqdfour = 0)) * 100, 2) as sqdfour_overall_rating_percentage'),

            // SQD5 
            DB::raw('SUM(forms.sqdfive = 5) as sqdfive_total_strongly_agree'),
            DB::raw('SUM(forms.sqdfive = 4) as sqdfive_total_agree'),
            DB::raw('SUM(forms.sqdfive = 3) as sqdfive_total_neutral'),
            DB::raw('SUM(forms.sqdfive = 2) as sqdfive_total_disagree'),
            DB::raw('SUM(forms.sqdfive = 1) as sqdfive_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdfive = 0) as sqdfive_total_na'),
            DB::raw('COUNT(forms.sqdfive) as sqdfive_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdfive = 5) + SUM(forms.sqdfive = 4)) / (COUNT(forms.sqdfive) - SUM(forms.sqdfive = 0)) * 100, 2) as sqdfive_overall_rating_percentage'),

            // SQD6 
            DB::raw('SUM(forms.sqdsix = 5) as sqdsix_total_strongly_agree'),
            DB::raw('SUM(forms.sqdsix = 4) as sqdsix_total_agree'),
            DB::raw('SUM(forms.sqdsix = 3) as sqdsix_total_neutral'),
            DB::raw('SUM(forms.sqdsix = 2) as sqdsix_total_disagree'),
            DB::raw('SUM(forms.sqdsix = 1) as sqdsix_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdsix = 0) as sqdsix_total_na'),
            DB::raw('COUNT(forms.sqdsix) as sqdsix_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdsix = 5) + SUM(forms.sqdsix = 4)) / (COUNT(forms.sqdsix) - SUM(forms.sqdsix = 0)) * 100, 2) as sqdsix_overall_rating_percentage'),

            // SQD7 
            DB::raw('SUM(forms.sqdseven = 5) as sqdseven_total_strongly_agree'),
            DB::raw('SUM(forms.sqdseven = 4) as sqdseven_total_agree'),
            DB::raw('SUM(forms.sqdseven = 3) as sqdseven_total_neutral'),
            DB::raw('SUM(forms.sqdseven = 2) as sqdseven_total_disagree'),
            DB::raw('SUM(forms.sqdseven = 1) as sqdseven_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdseven = 0) as sqdseven_total_na'),
            DB::raw('COUNT(forms.sqdseven) as sqdseven_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdseven = 5) + SUM(forms.sqdseven = 4)) / (COUNT(forms.sqdseven) - SUM(forms.sqdseven = 0)) * 100, 2) as sqdseven_overall_rating_percentage'),

            // SQD8 
            DB::raw('SUM(forms.sqdeight = 5) as sqdeight_total_strongly_agree'),
            DB::raw('SUM(forms.sqdeight = 4) as sqdeight_total_agree'),
            DB::raw('SUM(forms.sqdeight = 3) as sqdeight_total_neutral'),
            DB::raw('SUM(forms.sqdeight = 2) as sqdeight_total_disagree'),
            DB::raw('SUM(forms.sqdeight = 1) as sqdeight_total_strongly_disagree'),
            DB::raw('SUM(forms.sqdeight = 0) as sqdeight_total_na'),
            DB::raw('COUNT(forms.sqdeight) as sqdeight_total_responses'),
            DB::raw('ROUND((SUM(forms.sqdeight = 5) + SUM(forms.sqdeight = 4)) / (COUNT(forms.sqdeight) - SUM(forms.sqdeight = 0)) * 100, 2) as sqdeight_overall_rating_percentage  ')
        
        )
        ->first();
     
        return view('report.data1', compact('users', 'user_name', 'user_role', 'offices','overall'));

    }


    public function Userupdate(Request $request)
    {
        \Log::info('Request data: ' . json_encode($request->all()));
        
        $user = User::find($request->user_id);
    
        if (!$user) {
            return response()->json(['status' => 404, 'message' => 'User not found'], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return response()->json(['status' => 200, 'message' => 'User updated successfully']);
    }
    
    public function data2()
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


    
        return view('report.data2',  compact('user_id', 'user_name', 'user_role'));
    }

    public function report()
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
    
        return view('report2',  compact('user_id', 'user_name', 'user_role'));
    }

    public function saveContent(Request $request)
    {

        $request->validate([
            'content' => 'required'
        ]);

        $content = new Content();
        $content->content = $request->content;
        $content->save();

        return back()->with('success', 'Content saved successfully.');
    }

 }
    

