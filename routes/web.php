<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
  
/*------------------------------------------
All People Home Route
--------------------------------------------*/
Route::get('/home', [DashboardController::class, 'home'])->name('home');
Route::get('/logout', function () {
    return view('auth/login');
});

/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {    
    Route::get('/submit', [DashboardController::class, 'submit']);
    Route::resource('/posts',DashboardController::class);

    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::resource('/profile',ProfileController::class);
});
  
/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::get('/projects', [DashboardController::class, 'projects']);
    Route::get('/email_responses', [DashboardController::class, 'email_responses']);
    Route::get('/wa_responses', [DashboardController::class, 'wa_responses']);
});

/*------------------------------------------
All Super Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/admins', [DashboardController::class, 'admins'])->name('admins');
});

/*------------------------------------------
WhatsApp OTP Routes List
--------------------------------------------*/
Route::get('/verify-wa', [OtpController::class, 'showVerificationForm'])->name('verify.page');
Route::post('/verify-wa', [OtpController::class, 'verify'])->name('verify.submit');
Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');
Route::get('/submit', [DashboardController::class, 'submit'])->name('submit');

// Route::get('/export', [ExportController::class, 'export'])->name('export');
// Route::get('/export', 'ExportController@export')->name('export');
Route::get('/export-users', [DashboardController::class, 'exportUsers'])->name('export.users');

// Route::get('/thanks', function () {
//     return view('thanks');
// });

// Send emails to all registered users
Route::get('/send-emails', function () {
    $emailController = new EmailController();    
    $emailController->sendEmails();
    
    return 'Emails have been sent successfully!';
});

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

Route::post('/handle-response', [EmailController::class, 'handleResponse'])->name('handle-response');
Route::get('/handle-response/{response}/{email}', [EmailController::class, 'handleResponse'])->name('handle-response');

Route::get('/submit-video', function () {
    return view('dashboard/submit_video');
})->name('submitVideoForm');
Route::post('/submit-video', [VideoController::class, 'submitVideo'])->name('submitVideo');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');