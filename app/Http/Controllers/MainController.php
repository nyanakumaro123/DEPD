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
        $user = User::find(2); //Auth::id();
        
        return view('home-umkm', [
            'headerTitle' => 'UMKM Dashboard - PathLoka',
            'user' => $user
        ]);
    }

    public function pelamarHome()
    {
        $user = User::find(1); //Auth::id();

        return view('home-pelamar', [
            'headerTitle' => 'Pelamar Dashboard - PathLoka',
            'user' => $user
        ]);
    }
}