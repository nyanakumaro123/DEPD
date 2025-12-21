<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PelamarProfileController;
use App\Http\Controllers\UmkmApplicationController;
use App\Http\Controllers\UMKMProfileController;
use App\Http\Controllers\UmkmProjectController;

// ================== LANDING ==================
Route::get('/', [MainController::class, 'landing']);



// ================== AUTH ==================
// PROCESS LOGIN & REGISTER  (Route::POST)
Route::get('/login-pelamar', fn () => view('pelamar.login-pelamar'))->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])
    ->name('process.login.pelamar');

Route::get('/login-umkm', fn () => view('umkm.login-umkm'))->name('login.umkm');
Route::post('/login-umkm', [AuthController::class, 'loginUmkm'])
    ->name('process.login.umkm');

Route::get('/register-pelamar', fn () => view('pelamar.register-pelamar'))->name('register.pelamar');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])
    ->name('process.register.pelamar');

Route::get('/register-umkm', fn () => view('umkm.register-umkm'))->name('register.umkm');
Route::post('/register-umkm', [AuthController::class, 'registerUmkm'])
    ->name('process.register.umkm');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    

// ================== PROFILE ==================
// Halaman Profile Pelamar
Route::get('/profile-pelamar/{userId}', [PelamarProfileController::class, 'show'])
    ->name('profile.pelamar');

// Halaman Profile UMKM
Route::get('/profile-umkm/{userId}', [UMKMProfileController::class, 'show'])
    ->name('profile.umkm');


// ================== PROJECT ==================
// Halaman Explore, Detail Projek & Apply Projek
Route::get('/explore', [ExploreController::class, 'explore'])
    ->name('explore');

Route::get('/detail-projek', function () {
    return view('Pelamar.detail-projek-pelamar');
})->name('detail.projek');

Route::get('/apply-projek', function () {
    return view('Pelamar.apply-projek-pelamar');
})->name('apply.projek');


// Halaman Notifikasi
Route::get('/notifikasi', [MainController::class, 'notifikasi'])
    ->name('notifikasi');


// ================== PELAMAR ==================
Route::middleware(['role:pelamar'])->group(function () {

    // HOME
    Route::get('/home-pelamar', [MainController::class, 'pelamarHome'])
    ->name('home.pelamar');

    // APPLY PROJECT
    Route::post('/apply/{project}',
        [ApplicationController::class, 'apply'])
        ->name('apply.project');

    // LIST APPLICATIONS
    Route::get('/pelamar/applications',
        [ApplicationController::class, 'index'])
        ->name('pelamar.applications');
    
    // EDIT PROFILE PELAMAR
    Route::get('/edit-profile-pelamar/{userId}', [PelamarProfileController::class, 'edit'])
    ->name('edit-profile.pelamar');

    // SAVE PROFILE PELAMAR
    Route::post('/save-profile-pelamar/{userId}', [PelamarProfileController::class, 'update'])
    ->name('save-profile.pelamar');
});



// ================== UMKM ==================
Route::middleware(['role:umkm'])->group(function () {

    // HOME
    Route::get('/home-umkm', [MainController::class, 'umkmHome'])
    ->name('home.umkm');

    // EDIT PROFILE UMKM
    Route::get('/edit-profile-umkm/{userId}', [UMKMProfileController::class, 'edit'])
    ->name('edit-profile.umkm');

    // SAVE PROFILE UMKM
    Route::post('/save-profile-umkm/{userId}', [UMKMProfileController::class, 'update'])
    ->name('save-profile.umkm');

    // ================== PROJECT ==================
    Route::get('/umkm/projects/create',
        [UmkmProjectController::class, 'create'])
        ->name('umkm.project.create');

    Route::post('/umkm/projects',
        [UmkmProjectController::class, 'store'])
        ->name('umkm.project.store');

    // ================== APPLICATION ==================
    Route::get('/umkm/applications',
        [UmkmApplicationController::class, 'index'])
        ->name('umkm.applications');

    Route::post('/umkm/application/{application}/accept',
        [UmkmApplicationController::class, 'accept'])
        ->name('umkm.application.accept');

    Route::post('/umkm/application/{application}/reject',
        [UmkmApplicationController::class, 'reject'])
        ->name('umkm.application.reject');
});