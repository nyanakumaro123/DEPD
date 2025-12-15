<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PelamarProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UMKMProfileController;

// --- 1. LANDING PAGE ---
Route::get('/', [MainController::class, 'landing']);

// --- 2. JALUR PELAMAR (JOB SEEKER) ---
// Halaman Login & Register
Route::get('/login-pelamar', function () {
    return view('login-pelamar');
})->name('login.pelamar');

Route::get('/register-pelamar', function () {
    return view('register-pelamar');
})->name('register.pelamar');

// Halaman Home & Profile
Route::get('/home-pelamar', [MainController::class, 'pelamarHome'])
    ->name('home.pelamar');

Route::get('/profile-pelamar/{userId}', [PelamarProfileController::class, 'show'])
    ->name('profile.pelamar');

Route::get('/edit-profile-pelamar/{userId}', [PelamarProfileController::class, 'edit'])
    ->name('edit-profile.pelamar');
// --- JALUR PELAMAR (JOB SEEKER) ---

// PROSES FORM (LOGIKA DUMMY)
// Ketika klik Login/Register Pelamar -> Masuk ke Home Pelamar
Route::post('/process-pelamar', function () {
    return redirect()->route('home.pelamar');
})->name('process.pelamar');

Route::post('/save-profile-pelamar/{userId}', [PelamarProfileController::class, 'update'])
    ->name('save-profile.pelamar');


// --- 3. JALUR UMKM (OWNER) ---
// Halaman Login & Register
Route::get('/login-umkm', function () {
    return view('login-umkm');
})->name('login.umkm');

Route::get('/register-umkm', function () {
    return view('register-umkm');
})->name('register.umkm');

// Halaman Home & Profile
Route::get('/home-umkm', [MainController::class, 'umkmHome'])
    ->name('home.umkm');

Route::get('/profile-umkm/{userId}', [UMKMProfileController::class, 'show'])
    ->name('profile.umkm');

Route::get('/edit-profile-umkm/{userId}', [UMKMProfileController::class, 'edit'])
    ->name('edit-profile.umkm');

Route::post('/save-profile-umkm/{userId}', [UMKMProfileController::class, 'update'])
    ->name('save-profile.umkm');
// --- JALUR UMKM (OWNER) ---

// PROSES FORM (LOGIKA DUMMY)
// Ketika klik Login/Register UMKM -> Masuk ke Home UMKM
Route::post('/process-umkm', function () {
    return redirect()->route('home.umkm');
})->name('process.umkm');

Route::post('/save-profile-umkm', function () {
    return redirect()->route('profile.umkm');
})->name('save.profile.umkm');