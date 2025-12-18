<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MainController extends Controller
{
    public function landing()
    {
        return view('landing', [
            'headerTitle' => 'PathLoka - Find Your Career Path'
        ]);
    }

    public function umkmHome()
    {
        $user = Auth::id();
        
        return view('Umkm.home-umkm', [
            'headerTitle' => 'UMKM Dashboard - PathLoka',
            'user' => $user
        ]);
    }

    public function pelamarHome()
    {
        $user = Auth::id();

        return view('Pelamar.home-pelamar', [
            'headerTitle' => 'Pelamar Dashboard - PathLoka',
            'user' => $user
        ]);
    }

    public function notifikasi()
    {
        $user = Auth::id();

        return view('notifikasi', [
            'headerTitle' => 'Notifikasi',
            'user' => $user
        ]);
    }
}