<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\landing\About_landingController;
use App\Http\Controllers\landing\Home_landingController;
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

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Auth Section Routes
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login/user',[LoginController::class, 'login'])->name('login.user');
    Route::get('/register',[RegisterController::class, 'index']);
    Route::post('/register/user', [RegisterController::class, 'register'])->name('register.user');
});

// Landing Section Routes
Route::get('/', [landingController::class, 'index']);
Route::get('/home', [landingController::class, 'home'])->name('home');
Route::get('/about', [landingController::class, 'about'])->name('about');
Route::get('/services', [landingController::class, 'services'])->name('services');
Route::get('/pricing', [landingController::class, 'pricing'])->name('pricing');
Route::get('/contact', [landingController::class, 'contact'])->name('contact');
