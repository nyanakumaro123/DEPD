<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PelamarProfileController;
use App\Http\Controllers\UMKMProfileController;
use App\Http\Controllers\UmkmProjectController;
use App\Http\Controllers\UmkmApplicationController;

/* LANDING PAGE */
Route::get('/', [MainController::class, 'landing']);

/* AUTHENTICATION */
Route::get('/login-pelamar', fn () => view('login-pelamar'))->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])->name('process.login.pelamar');

Route::get('/login-umkm', fn () => view('login-umkm'))->name('login.umkm');
Route::post('/login-umkm', [AuthController::class, 'loginUmkm'])->name('process.login.umkm');

Route::get('/register-pelamar', fn () => view('register-pelamar'))->name('register.pelamar');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])->name('process.register.pelamar');

Route::get('/register-umkm', fn () => view('register-umkm'))->name('register.umkm');
Route::post('/register-umkm', [AuthController::class, 'registerUmkm'])->name('process.register.umkm');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* ROUTES PELAMAR */
Route::middleware(['auth', 'role:pelamar'])->group(function () {
    
    // Dashboard
    Route::get('/home-pelamar', [MainController::class, 'pelamarHome'])->name('home.pelamar');

    // Fitur Explore & Project
    Route::get('/explore', fn() => view('explore-pelamar'))->name('explore');
    Route::get('/detail-projek', fn() => view('detail-projek-pelamar'))->name('detail.projek');
    Route::get('/apply-projek', fn() => view('apply-projek-pelamar'))->name('apply.projek');
    Route::get('/notifikasi', fn() => view('notifikasi-pelamar'))->name('notifikasi');

    // Profile Management
    Route::get('/profile-pelamar', [PelamarProfileController::class, 'index'])->name('profile.pelamar');
    Route::get('/edit-profile-pelamar', [PelamarProfileController::class, 'edit'])->name('edit-profile.pelamar');
    Route::post('/edit-profile-pelamar', [PelamarProfileController::class, 'update'])->name('update-profile.pelamar');
});

/* UMKM ROUTES */
Route::middleware(['auth', 'role:umkm'])->group(function () {

    // Dashboard
    Route::get('/home-umkm', [MainController::class, 'umkmHome'])->name('home.umkm');

    // Profile Management
    Route::get('/profile-umkm', [UMKMProfileController::class, 'index'])->name('profile.umkm');
    Route::get('/edit-profile-umkm', [UMKMProfileController::class, 'edit'])->name('edit-profile.umkm');
    Route::post('/edit-profile-umkm', [UMKMProfileController::class, 'update'])->name('update-profile.umkm');
    
    // Project Management (Buat Proyek)
    Route::get('/create-project', [UmkmProjectController::class, 'create'])->name('project.create');
    Route::post('/create-project', [UmkmProjectController::class, 'store'])->name('project.store');

    // Applications (Kelola Pelamar)
    Route::get('/applications', [UmkmApplicationController::class, 'index'])->name('umkm.applications');
    Route::get('/application/{id}', [UmkmApplicationController::class, 'show'])->name('umkm.application.detail');
    Route::post('/application/{id}/accept', [UmkmApplicationController::class, 'accept'])->name('umkm.application.accept');
    Route::post('/application/{id}/reject', [UmkmApplicationController::class, 'reject'])->name('umkm.application.reject');
});