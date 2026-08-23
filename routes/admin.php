<?php

use App\Http\Controllers\Admin\AdminDesaController;
use App\Http\Controllers\Admin\AdminPengajuanController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Rute khusus Admin & Dashboard SIDeKa-NG

Route::prefix('admin')->name('admin.')->group(function () {
    // Autentikasi Admin (Guest)
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Modul Admin Terproteksi Sesi/Auth
    Route::middleware('admin.auth')->group(function () {
        // 1. Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // 2. Data Pengajuan
        Route::get('/pengajuan', [AdminPengajuanController::class, 'index'])->name('pengajuan.index');
        Route::get('/pengajuan/{id}', [AdminPengajuanController::class, 'show'])->name('pengajuan.show');
        Route::put('/pengajuan/{id}', [AdminPengajuanController::class, 'update'])->name('pengajuan.update');

        // 3. Daftar Domain
        Route::get('/domain', [DashboardController::class, 'domainIndex'])->name('domain.index');
        Route::post('/domain', [DashboardController::class, 'domainStore'])->name('domain.store');

        // 4. Data Desa (CRUD)
        Route::resource('desa', AdminDesaController::class);

        // 5. Grafik Pengajuan
        Route::get('/grafik', [DashboardController::class, 'grafik'])->name('grafik');
    });
});
