<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\AbsensiController;

/*
|--------------------------------------------------------------------------
| Public Routes (Auth)
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout'); // ubah GET → POST agar aman
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:web')->group(function () {

    // Root → Dashboard
    Route::get('/', fn() => redirect()->route('dashboard'));

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Pegawai (CRUD)
    Route::resource('pegawai', PegawaiController::class);

    // Barang (CRUD)
    Route::resource('barang', BarangController::class);

    // Barang Masuk (CRUD)
    Route::resource('barang_masuk', BarangMasukController::class);

    // Barang Keluar (CRUD)
    Route::resource('barang_keluar', BarangKeluarController::class);

    // Absensi (CRUD)
    Route::resource('absensi', AbsensiController::class);
});
