<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Route Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard', [
        'user' => Auth::user()
    ]);
})->middleware('auth')->name('dashboard');


// Route Barang - Admin Only
Route::middleware('auth')->group(function () {
    Route::resource('barang', BarangController::class);
});

// Route Kategori - Admin Only
Route::middleware('auth')->group(function () {
    Route::resource('kategori', KategoriController::class);
});

// Route Laporan - Admin Only
Route::middleware('auth')->group(function () {
    Route::get('/laporan/stok-barang', [LaporanController::class, 'stokBarang'])->name('laporan.stok');
});

// Route Peminjaman - User & Admin
Route::middleware('auth')->group(function () {
    Route::resource('peminjaman', PeminjamanController::class);
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

// API Route untuk Users
Route::get('users', [ApiController::class, 'index'])->middleware('auth:api');
Route::get('users/{id}', [ApiController::class, 'show'])->middleware('auth:api');
