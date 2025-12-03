<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/login-pelamar', function () {
    return view('login-pelamar');
});

Route::get('/register-pelamar', function () {
    return view('register-pelamar');
});

Route::get('/login-umkm', function () {
    return view('login-umkm');
});

Route::get('/register-umkm', function () {
    return view('register-umkm');
});