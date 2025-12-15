<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmProjectController;

// --- 1. LANDING PAGE ---
Route::get('/', function () {
    return view('landing');
});

// --- 2. JALUR PELAMAR (JOB SEEKER) ---
// Halaman Login & Register
Route::get('/login-pelamar', function () {
    return view('login-pelamar');
})->name('login.pelamar');

Route::get('/register-pelamar', function () {
    return view('register-pelamar');
})->name('register.pelamar');

// Halaman Home & Profile
Route::get('/home-pelamar', function () {
    return view('home-pelamar');
})->name('home.pelamar');

Route::get('/profile-pelamar', function () {
    return view('profile-pelamar');
})->name('profile.pelamar');

Route::get('/edit-profile-pelamar', function () {
    return view('edit-profile-pelamar');
})->name('edit-profile.pelamar');

// PROSES FORM (LOGIKA DUMMY)
// Ketika klik Login/Register Pelamar -> Masuk ke Home Pelamar
Route::post('/process-pelamar', function () {
    return redirect()->route('home.pelamar');
})->name('process.pelamar');

Route::post('/save-profile-pelamar', function () {
    return redirect()->route('profile.pelamar');
})->name('save.profile.pelamar');


// --- 3. JALUR UMKM (OWNER) ---
// Halaman Login & Register
Route::get('/login-umkm', function () {
    return view('login-umkm');
})->name('login.umkm');

Route::get('/register-umkm', function () {
    return view('register-umkm');
})->name('register.umkm');

// Halaman Home & Profile
Route::get('/home-umkm', function () {
    return view('home-umkm');
})->name('home.umkm');

Route::get('/profile-umkm', function () {
    return view('profile-umkm');
})->name('profile.umkm');

Route::get('/edit-profile-umkm', function () {
    return view('edit-profile-umkm');
})->name('edit-profile.umkm');

Route::get('/project-umkm', function () {
    return view('project-umkm');
})->name('project.umkm');

Route::get('/umkm/project/create', [UmkmProjectController::class, 'create'])
    ->name('project.create.umkm');

Route::post('/umkm/project/store', [UmkmProjectController::class, 'store'])
    ->name('project.store.umkm');

// PROSES FORM (LOGIKA DUMMY)
// Ketika klik Login/Register UMKM -> Masuk ke Home UMKM
Route::post('/process-umkm', function () {
    return redirect()->route('home.umkm');
})->name('process.umkm');

Route::post('/save-profile-umkm', function () {
    return redirect()->route('profile.umkm');
})->name('save.profile.umkm');