<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class PelamarProjectController extends Controller
{
    public function index()
    {
        $applications = Application::where('pelamar_id', Auth::id())
            ->with('project.umkm')
            ->latest()
            ->get();

        return view('Pelamar.apply-projek-pelamar', compact('applications'));
    }
}

