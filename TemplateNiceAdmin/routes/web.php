<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;

Route::get('/', function () {
    return view('index');
});

// Route untuk dashboard
Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('pendidikan', 'PendidikanController');
    Route::resource('pengalaman_kerja', 'PengalamanKerjaController');
});
// Route::get('/pengalaman-kerja', function () {
//     return view('backend.pengalaman_kerja.index');
// })->name('pengalaman_kerja.index');

// Route::get('/pengalaman-kerja/create', function () {
//     return view('backend.pengalaman_kerja.create');
// })->name('pengalaman_kerja.create');

Route::get('/pengalaman_kerja', [PengalamanKerjaController::class, 'index'])->name('pengalaman_kerja.index');
Route::get('/pengalaman_kerja/create', [PengalamanKerjaController::class, 'create'])->name('pengalaman_kerja.create');
Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
Route::get('/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('pendidikan.edit');




// Route untuk autentikasi Laravel
Auth::routes();

// Route untuk home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route tambahan untuk LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

