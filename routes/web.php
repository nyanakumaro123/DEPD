<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PelamarProfileController;
use App\Http\Controllers\UmkmApplicationController;
use App\Http\Controllers\UMKMProfileController;
use App\Http\Controllers\UmkmProjectController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (NO AUTH)
|--------------------------------------------------------------------------
*/

// ================== LANDING ==================
Route::get('/', [MainController::class, 'landing']);


/* AUTH */
Route::get('/login-pelamar', fn() => view('Pelamar.login-pelamar'))->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])
    ->name('process.login.pelamar');

Route::get('/login-umkm', fn() => view('Umkm.login-umkm'))->name('login.umkm');
Route::post('/login-umkm', [AuthController::class, 'loginUmkm'])
    ->name('process.login.umkm');

Route::get('/register-pelamar', fn() => view('Pelamar.register-pelamar'))->name('register.pelamar');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])
    ->name('process.register.pelamar');

Route::get('/register-umkm', fn() => view('Umkm.register-umkm'))->name('register.umkm');
Route::post('/register-umkm', [AuthController::class, 'registerUmkm'])
    ->name('process.register.umkm');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* PELAMAR */
Route::middleware(['auth', 'role:pelamar'])->group(function () {

    Route::get('/home-pelamar', fn() => view('Pelamar.home-pelamar'))
        ->name('home.pelamar');

    Route::get('/profile-pelamar', fn() => view('Pelamar.profile-pelamar'))
        ->name('profile.pelamar');

    Route::get('/edit-profile-pelamar', fn() => view('Pelamar.edit-profile-pelamar'))
        ->name('edit-profile.pelamar');

    Route::get('/explore', function () {
        return view('Pelamar.explore-pelamar');
    })->name('explore');

    Route::get('/detail-projek', function () {
        return view('Pelamar.detail-projek-pelamar');
    })->name('detail.projek');

    Route::get('/apply-projek', function () {
        return view('Pelamar.apply-projek-pelamar');
    })->name('apply.projek');
});

Route::get('/notifikasi', [MainController::class, 'notifikasi'])
    ->name('notifikasi');


/* UMKM */
Route::middleware(['auth', 'role:umkm'])->group(function () {

    Route::get('/home-umkm', fn() => view('Umkm.home-umkm'))
        ->name('home.umkm');

    Route::get('/profile-umkm', fn() => view('Umkm.profile-umkm'))
        ->name('profile.umkm');

    Route::get('/edit-profile-umkm', fn() => view('Umkm.edit-profile-umkm'))
        ->name('edit-profile.umkm');

    Route::post('/save-profile-umkm/{userId}', [UMKMProfileController::class, 'update'])
        ->name('save-profile.umkm');
});
