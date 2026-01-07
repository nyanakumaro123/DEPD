<?php

use App\Http\Controllers\PelamarProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PelamarProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UmkmApplicationController;
use App\Http\Controllers\UMKMProfileController;
use App\Http\Controllers\UmkmProjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PelamarController;

// ================== LANDING ==================
Route::get('/', [MainController::class, 'landing']);

Route::get('/php-info', function () {
    phpinfo();
});

/* AUTH */
Route::get('/login-pelamar', fn() => view('Pelamar.login-pelamar'))->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])
    ->name('process.login.pelamar');

// ================== AUTH ==================
// PROCESS LOGIN & REGISTER  (Route::POST)
Route::get('/login-pelamar', [MainController::class, 'loginPelamar'])
    ->name('login.pelamar');
Route::post('/login-pelamar', [AuthController::class, 'loginPelamar'])
    ->name('process.login.pelamar');

Route::get('/login-umkm', [MainController::class, 'loginUmkm'])
    ->name('login.umkm');
Route::post('/login-umkm', [AuthController::class, 'loginUmkm'])
    ->name('process.login.umkm');

Route::get('/register-pelamar', [MainController::class, 'registerPelamar'])
    ->name('register.pelamar');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])
    ->name('process.register.pelamar');

Route::get('/register-umkm', [MainController::class, 'registerUmkm'])
    ->name('register.umkm');
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
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
    Route::get('/explore/{project}', [ExploreController::class, 'show'])->name('explore.show');


// Halaman Notifikasi



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
    ->name('edit-profile.pelamar')
    ->middleware('role:pelamar');

    // SAVE PROFILE PELAMAR
    Route::post('/save-profile-pelamar/{userId}', [PelamarProfileController::class, 'update'])
    ->name('save-profile.pelamar');

    Route::get('/pelamar/lamaran', [ApplicationController::class, 'tracking'])
    ->middleware('role:pelamar')
    ->name('pelamar.tracking');
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
    Route::get('/umkm/projects', [UMKMProjectController::class, 'index'])
        ->name('umkm.projects.index');

    Route::get('/umkm/projects/{project}', [UMKMProjectController::class, 'show'])
        ->name('umkm.projects.show');

    // PELAMAR
    Route::get('/pelamar/applied-projects', [PelamarProjectController::class, 'index'])
        ->name('pelamar.projects.applied');

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

        Route::get('/umkm/pelamar', [PelamarController::class, 'index'])
        ->name('umkm.pelamar.index');

        Route::get('/umkm/pelamar/{user}', [PelamarController::class, 'show'])
            ->name('umkm.pelamar.show');

        Route::post('/umkm/invite', [InvitationController::class, 'store'])
            ->name('umkm.invite');
});

// ================== NOTIFIKASI ==================
Route::middleware('auth')->group(function () {

    // halaman list notifikasi
    Route::get('/notifikasi',
        [NotificationController::class, 'index'])
        ->name('notifikasi');

    // tandai notifikasi sudah dibaca
    Route::post('/notifikasi/{id}/read',
        [NotificationController::class, 'read'])
        ->name('notifikasi.read');

    // undangan dari UMKM ke pelamar
    Route::post('/notifikasi/invite/{pelamar}/{project}',
        [InvitationController::class, 'invite'])
        ->name('notifikasi.invite');

    // pelamar menerima undangan
    Route::post('/notifikasi/{id}/accept',
        [InvitationController::class, 'accept'])
        ->name('notifikasi.accept');

    // pelamar menolak undangan
    Route::post('/notifikasi/{id}/reject',
        [InvitationController::class, 'reject'])
        ->name('notifikasi.reject');

        Route::get('/lamaran-saya', [ApplicationController::class, 'index'])
        ->name('pelamar.applications');

    // Invitation
    Route::get('/invitation/{id}/accept', [InvitationController::class, 'accept'])
        ->name('invitation.accept');

    Route::get('/invitation/{id}/reject', [InvitationController::class, 'reject'])
        ->name('invitation.reject');
});
