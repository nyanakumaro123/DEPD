<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function explore()
    {
        $user = Auth::user();

        return view('Pelamar.explore-pelamar', [
            'headerTitle' => 'Explore Projects - PathLoka',
            'user' => $user
        ]);
    }
}