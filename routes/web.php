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

/*
|--------------------------------------------------------------------------
| Admin & Dashboard Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/admin.php';
