<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckAge;

Route::get('/', function () {
    return view('index');
});

// Route untuk dashboard
Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('dashboard', 'DashboardController');
});

// Route untuk autentikasi Laravel
Auth::routes();

// Route untuk home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route tambahan untuk LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Route::middleware('guest')->group(function () {
//     Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('register', [RegisterController::class, 'register']);
// });