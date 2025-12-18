<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmkmProjectController;

/* LANDING */
Route::get('/', fn () => view('landing'));

/* AUTH */
Route::get('/login-pelamar', fn () => view('login-pelamar'))->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])
    ->name('process.login.pelamar');

Route::get('/login-umkm', fn () => view('login-umkm'))->name('login.umkm');
Route::post('/login-umkm', [AuthController::class, 'loginUmkm'])
    ->name('process.login.umkm');

Route::get('/register-pelamar', fn () => view('register-pelamar'))->name('register.pelamar');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])
    ->name('process.register.pelamar');

Route::get('/register-umkm', fn () => view('register-umkm'))->name('register.umkm');
Route::post('/register-umkm', [AuthController::class, 'registerUmkm'])
    ->name('process.register.umkm');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* PELAMAR */
Route::middleware(['auth', 'role:pelamar'])->group(function () {

    Route::get('/home-pelamar', fn () => view('home-pelamar'))
        ->name('home.pelamar');

    Route::get('/profile-pelamar', fn () => view('profile-pelamar'))
        ->name('profile.pelamar');

    Route::get('/edit-profile-pelamar', fn () => view('edit-profile-pelamar'))
        ->name('edit-profile.pelamar');
});


/* UMKM */
Route::middleware(['auth', 'role:umkm'])->group(function () {

    Route::get('/home-umkm', fn () => view('home-umkm'))
        ->name('home.umkm');

    Route::get('/profile-umkm', fn () => view('profile-umkm'))
        ->name('profile.umkm');

    Route::get('/edit-profile-umkm', fn () => view('edit-profile-umkm'))
        ->name('edit-profile.umkm');

});

