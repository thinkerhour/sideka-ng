<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - User & Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.beranda');
});

Route::get('/faq/{id?}', function ($id = 1) {
    return view('user.faq.show', ['id' => $id]);
});

Route::post('/pengajuan', [App\Http\Controllers\User\PengajuanController::class, 'store'])->name('user.pengajuan.store');


/*
|--------------------------------------------------------------------------
| Admin & Dashboard Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/admin.php';
