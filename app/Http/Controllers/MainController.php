<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MainController extends Controller
{
    public function landing()
    {
        $user = Auth::user();

        if (!$user) {
            return view('landing', [
                'headerTitle' => 'PathLoka - Find Your Career Path'
            ]);
        }

        // Redirect based on role
        if ($user->role === 'umkm') {
            return redirect()->route('home.umkm');
        }
        if ($user->role === 'pelamar') {
            return redirect()->route('home.pelamar');
        }

        // fallback (unknown role)
        abort(403, 'Unauthorized role');
    }

    // Login Views
    public function loginPelamar()
    {
        return view('Pelamar.login-pelamar', [
            'headerTitle' => 'Login Pelamar - PathLoka'
        ]);
    }
    public function loginUmkm()
    {
        return view('Umkm.login-umkm', [
            'headerTitle' => 'Login UMKM - PathLoka'
        ]);
    }

    // Register Views
    public function registerPelamar()
    {
        return view('Pelamar.register-pelamar', [
            'headerTitle' => 'Register Pelamar - PathLoka'
        ]);
    }
    public function registerUmkm()
    {
        return view('Umkm.register-umkm', [
            'headerTitle' => 'Register UMKM - PathLoka'
        ]);
    }

    // Home Views
    public function pelamarHome()
    {
        $user = Auth::user();

        return view('Pelamar.home-pelamar', [
            'headerTitle' => 'Pelamar Dashboard - PathLoka',
            'user' => $user
        ]);
    }
    public function umkmHome()
    {
        $user = Auth::user();
        
        return view('Umkm.home-umkm', [
            'headerTitle' => 'UMKM Dashboard - PathLoka',
            'user' => $user
        ]);
    }
}