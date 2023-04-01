<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\landing\landingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Section Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/',[DashboardController::class, 'index'])->name('admin');
    Route::resource('about', AboutController::class);
    Route::resource('contact', ContactController::class);
});


// Auth Section Routes
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login/user',[LoginController::class, 'login'])->name('login.user');
Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register/user', [RegisterController::class, 'register'])->name('register.user');


// Landing Section Routes
Route::get('/', [landingController::class, 'index']);
