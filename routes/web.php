<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - User & Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\User\BerandaController::class, 'index'])->name('user.beranda');

Route::get('/faq/search', [App\Http\Controllers\User\FaqController::class, 'search'])->name('user.faq.search');
Route::get('/faq/{id?}', [App\Http\Controllers\User\FaqController::class, 'show'])->where('id', '[0-9]+')->name('user.faq.show');

Route::post('/pengajuan', [App\Http\Controllers\User\PengajuanController::class, 'store'])->name('user.pengajuan.store');


/*
|--------------------------------------------------------------------------
| Admin & Dashboard Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/admin.php';
