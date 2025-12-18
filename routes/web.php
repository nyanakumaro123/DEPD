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



// ================== AUTH ==================

// LOGIN  (Route::GET)
Route::get('/login/pelamar', [AuthController::class, 'loginPelamar'])
    ->name('login.pelamar');

Route::get('/login/umkm', [AuthController::class, 'loginUmkm'])
    ->name('login.umkm');



// REGISTER  (Route::GET)
Route::get('/register/pelamar', [AuthController::class, 'registerPelamar'])
->name('register.pelamar');

Route::get('/register/umkm', [AuthController::class, 'registerUmkm'])
->name('register.umkm');
    

    
// Halaman Profile Pelamar
Route::get('/profile-pelamar/{userId}', [PelamarProfileController::class, 'show'])
    ->name('profile.pelamar');

Route::get('/edit-profile-pelamar/{userId}', [PelamarProfileController::class, 'edit'])
    ->name('edit-profile.pelamar');


// Halaman Profile UMKM
Route::get('/profile-umkm/{userId}', [UMKMProfileController::class, 'show'])
    ->name('profile.umkm');

Route::get('/edit-profile-umkm/{userId}', [UMKMProfileController::class, 'edit'])
    ->name('edit-profile.umkm');

Route::post('/save-profile-umkm/{userId}', [UMKMProfileController::class, 'update'])
    ->name('save-profile.umkm');



// Halaman Explore, Detail Projek & Apply Projek
Route::get('/explore', function () {
    return view('Pelamar.explore-pelamar');
})->name('explore');

Route::get('/detail-projek', function () {
    return view('Pelamar.detail-projek-pelamar');
})->name('detail.projek');

Route::get('/apply-projek', function () {
    return view('Pelamar.apply-projek-pelamar');
})->name('apply.projek');


// Halaman Notifikasi
Route::get('/notifikasi', [MainController::class, 'notifikasi'])
    ->name('notifikasi');


// PROCESS LOGIN & REGISTER  (Route::POST)
Route::post('/login/pelamar', [AuthController::class, 'processLoginPelamar'])
    ->name('process.login.pelamar');

Route::post('/login/umkm', [AuthController::class, 'processLoginUmkm'])
    ->name('process.login.umkm');

Route::post('/register/pelamar', [AuthController::class, 'processRegisterPelamar'])
    ->name('process.pelamar');

Route::post('/register/umkm', [AuthController::class, 'processRegisterUmkm'])
    ->name('process.umkm');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

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
    
    // SAVE PROFILE PELAMAR
    Route::post('/save-profile-pelamar/{userId}', [PelamarProfileController::class, 'update'])
    ->name('save-profile.pelamar');
});



// ================== UMKM ==================
Route::middleware(['role:umkm'])->group(function () {

    // HOME
    Route::get('/home-umkm', [MainController::class, 'umkmHome'])
    ->name('home.umkm');

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
