<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SatisfactionForm;
use App\Http\Controllers\OfficeUSersController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\QrCode;

Route::get('/', [AuthController::class, 'index']);

Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.adminlogin');

Route::get('userlogin', [OfficeUSersController::class, 'loginUser'])->name('user.user_login');
Route::post('userlogin', [OfficeUSersController::class, 'Userlogin'])->name('auth.officelogin');

Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'saveUser'])->name('auth.saveUser');

Route::get('form', [SatisfactionForm::class, 'satisfaction'])->name('form');
Route::post('form', [SatisfactionForm::class, 'satform'])->name('form_cao.submit');
Route::get('/menu', [ViewController::class, 'formsatisfaction'])->name('menu');

Route::post('logout', function () {
    $user = Auth::user();
    
    if ($user && $user->role == '1') {
        Auth::logout();
        return redirect()->route('auth.login'); 
    } elseif ($user && $user->role == '2') {
        Auth::logout();
        return redirect()->route('user.user_login');
    } 
})->name('logout');

Route::middleware(['auth','Admin'])->group(function () {
    Route::get('user_account', [ViewController::class, 'user_account'])->name('user.user_account');
    Route::post('user_account', [ViewController::class, 'Userupdate'])->name('user_account');
    Route::post('registerUser', [AuthController::Class, 'registerUser'])->name('registerUser');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


    Route::get('data', [ViewController::class, 'data'])->name('report.data');
    Route::get('data1', [ViewController::class, 'data1'])->name('report.data1');
    Route::get('data2', [ViewController::class, 'data2'])->name('report.data2');

    Route::post('/save-content', [ViewController::class, 'saveContent'])->name('save.content');
    
    Route::get('report2', [ViewController::class, 'report'])->name('report2');
    Route::get('profile', [AuthController::class, 'profile'])->name('auth.profile');
    Route::post('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');  
});

Route::middleware(['auth', 'User'])->group(function(){ 
    Route::get('/user.user_interface', [OfficeUSersController::class, 'dashboard'])->name('user.user_interface');
    Route::get('/user.user_form', [OfficeUSersController::class, 'userForm'])->name('user.user_form');

    Route::get('/user.user_profile', [OfficeUSersController::class, 'userprofile'])->name('user.user_profile');
    Route::post('/user.user_profile', [OfficeUSersController::class, 'edit'])->name('profile.edit');
    Route::get('/qrcode.qrgenerator', [OfficeUSersController::class, 'qr'])->name('user.qrgenerate');

}); 

