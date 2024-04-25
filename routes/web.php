<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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
});

/*------------------------------------------
All Super Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/admins', [DashboardController::class, 'admins'])->name('admins');
});