<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/inscriptions', function () {
    return view('/inscriptions');
});

Route::get('/orientations', function () {
    return view('/orientations');
});

Route::get('/bourses', function () {
    return view('/bourses');
});
