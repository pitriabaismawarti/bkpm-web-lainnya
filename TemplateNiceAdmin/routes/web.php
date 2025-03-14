<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;


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

//Acara 17
Route::get('/session', [SessionController::class, 'create']);
Route::get('/session', [SessionController::class, 'show']);
Route::get('/session', [SessionController::class, 'delete']);
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

// Acara 18
Route::get('/cobaerror', [CobaController::class, 'index']);
Route::get('/cobaerror/{nama}', [CobaController::class, 'index']);

// Acara 19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload_resize');

// Acara 20
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');