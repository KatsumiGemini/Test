<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Auth;

class SatisfactionForm extends Controller
{
   
   public function satisfaction(Request $request)
   {
       
       $office_id = $request->query('office_id');

       return view('form', compact('office_id'));
   }


public function displaydata(){
    $user = Auth::user();
   
    $datacount = User::where('role', '!=', 1)->count();
    
    $form = Form::count();
    $users = DB::table('users')
        ->join('multirole', 'users.role', '=', 'multirole.id')
        ->where('users.id', '=', $user->id) 
        ->select('users.*', 'multirole.role as role_name')
        ->first(); 

    $user_id = $user->id;
    $user_name = $user->name;
    $user_role = $users->role_name;

    return view('dashboard', compact('user_id', 'user_name', 'user_role', 'usersCount', 'form'));
}

public function satform(Request $request)
{
    $request->validate([
        'client_type' => 'required|string|max:255',
        'sex' => 'required|string|max:10',
        'age' => 'required|integer|min:1|max:120',
        'region' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'cc1' => 'required|integer|min:1|max:5',
        'cc2' => 'nullable|integer|min:1|max:5',
        'cc3' => 'nullable|integer|min:1|max:5',
        'rating_sqd0' => 'nullable|integer|min:1|max:5',
        'rating_sqd1' => 'nullable|integer|min:1|max:5',
        'rating_sqd2' => 'nullable|integer|min:1|max:5',
        'rating_sqd3' => 'nullable|integer|min:1|max:5',
        'rating_sqd4' => 'nullable|integer|min:1|max:5',
        'rating_sqd5' => 'nullable|integer|min:1|max:5',
        'rating_sqd6' => 'nullable|integer|min:1|max:5',
        'rating_sqd7' => 'nullable|integer|min:1|max:5',
        'rating_sqd8' => 'nullable|integer|min:1|max:5',
        'suggestions' => 'nullable|string',
        'email' => 'nullable|string|max:255',
        'office_id' => 'required|exists:users,id',
    ]);

    $user = Auth::user();
    $admin_id = 1;
    $user_id = 2;

    // Generate unique 5-digit ID
    do {
        $form_id = random_int(10000, 99999); // Generate random 5-digit number
    } while (Form::where('id', $form_id)->exists()); // Check if the ID exists

    $Form = new Form();
    $Form->id = $form_id;  // Assign the generated ID
    $Form->client = $request->client_type;
    $Form->sex = $request->sex;
    $Form->age = $request->age;
    $Form->region = $request->region;
    $Form->service = $request->service;
    $Form->ccone = $request->cc1;
    $Form->cctwo = $request->cc2;
    $Form->ccthree = $request->cc3;
    $Form->sqdzero = $request->rating_sqd0;
    $Form->sqdone = $request->rating_sqd1;
    $Form->sqdtwo = $request->rating_sqd2;
    $Form->sqdthree = $request->rating_sqd3;
    $Form->sqdfour = $request->rating_sqd4;
    $Form->sqdfive = $request->rating_sqd5;
    $Form->sqdsix = $request->rating_sqd6;
    $Form->sqdseven = $request->rating_sqd7;
    $Form->sqdeight = $request->rating_sqd8;
    $Form->suggest = $request->suggestions;
    $Form->contact = $request->email;
    $Form->office_id = $request->office_id;
    $Form->admin_id = $admin_id;
    $Form->user_id = $user_id;

    try {
        $Form->save();

        return response()->json([
            'status' => 200,
            'message' => 'Form successfully submitted',
            'redirect' => url('/form') . '?office_id=' . $request->office_id,
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Form submission error: ' . $e->getMessage());
        return response()->json([
            'status' => 500,
            'message' => 'Form submission failed',
            'error' => $e->getMessage(),
        ], 500);
    }
}



}
