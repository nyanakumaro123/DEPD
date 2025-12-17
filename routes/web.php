<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UmkmApplicationController;
use App\Http\Controllers\UmkmProjectController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (NO AUTH)
|--------------------------------------------------------------------------
*/

// ================== LANDING ==================
Route::get('/', function () {
    return view('welcome');
});


// --- 2. JALUR PELAMAR (JOB SEEKER) ---
// Halaman Login & Register
Route::get('/login-pelamar', function () {
    return view('login-pelamar');
})->name('login.pelamar');
// ================== AUTH ==================

// LOGIN
Route::get('/login/pelamar', [AuthController::class, 'loginPelamar'])
    ->name('login.pelamar');


// Halaman Home & Profile
Route::get('/home-pelamar', function () {
    return view('home-pelamar');
})->name('home.pelamar');
Route::get('/login/umkm', [AuthController::class, 'loginUmkm'])
    ->name('login.umkm');

// REGISTER
Route::get('/register/pelamar', [AuthController::class, 'registerPelamar'])
    ->name('register.pelamar');

Route::get('/register/umkm', [AuthController::class, 'registerUmkm'])
    ->name('register.umkm');


// Halaman Explore, Detail Projek & Apply Projek
Route::get('/explore', function () {
    return view('explore');
})->name('explore');

Route::get('/detail-projek', function () {
    return view('detail-projek');
})->name('detail.projek');

Route::get('/apply-projek', function () {
    return view('apply-projek');
})->name('apply.projek');


// Halaman Notifikasi
Route::get('/notifikasi', function () {
    return view('notifikasi');
})->name('notifikasi'); 



// PROSES FORM (LOGIKA DUMMY)
// Ketika klik Login/Register Pelamar -> Masuk ke Home Pelamar
Route::post('/process-pelamar', function () {
    return redirect()->route('home.pelamar');
})->name('process.pelamar');
// PROCESS LOGIN & REGISTER
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

// Route::middleware(['auth'])->group(function () {


// Halaman Home & Profile
Route::get('/home-umkm', function () {
    return view('home-umkm');
})->name('home.umkm');
    // ================== PELAMAR ==================
    Route::middleware(['role:pelamar'])->group(function () {

        // HOME
        Route::get('/home/pelamar', function () {
            return view('pelamar.home');
        })->name('home.pelamar');

        // APPLY PROJECT
        Route::post('/apply/{project}',
            [ApplicationController::class, 'apply'])
            ->name('apply.project');

        // LIST APPLICATIONS
        Route::get('/pelamar/applications',
            [ApplicationController::class, 'index'])
            ->name('pelamar.applications');
    });


    // ================== UMKM ==================
    Route::middleware(['role:umkm'])->group(function () {

        // HOME
        Route::get('/home/umkm', function () {
            return view('umkm.home');
        })->name('home.umkm');

        // ================== PROJECT ==================
        Route::get('/umkm/projects',
            [UmkmProjectController::class, 'index'])
            ->name('umkm.project.index');

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
// });
