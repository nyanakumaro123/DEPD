<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Application; // Import ini
use App\Models\Project;     // Import ini

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
        $userId = Auth::id();

        // 1. Ambil Status Lamaran (Apply Status)
        // Mengambil 5 lamaran terakhir user ini beserta data project dan umkm-nya
        $applications = Application::where('pelamar_id', $userId)
            ->with(['project.umkm.umkmProfile']) 
            ->latest()
            ->take(5)
            ->get();

        // 2. Ambil Project Terbaru (Ongoing/Latest Projects)
        // Mengambil project yang statusnya masih buka (jika ada kolom status) atau terbaru
        $projects = Project::with(['umkm.umkmProfile'])
            ->latest()
            ->take(10) // Tampilkan 10 project terbaru di feed
            ->get();

        return view('pelamar.home-pelamar', compact('applications', 'projects'));
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