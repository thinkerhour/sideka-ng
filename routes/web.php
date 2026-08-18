<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.beranda');
});

Route::get('/faq/{id?}', function ($id = 1) {
    return view('user.faq.show', ['id' => $id]);
});
