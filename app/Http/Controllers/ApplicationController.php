<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply(Project $project)
    {
        Application::create([
            'project_id' => $project->id,
            'pelamar_id' => Auth::id(), // ✅ FIX
            'status'     => 'pending'
        ]);

        return back()->with('success', 'Berhasil melamar project');
    }

    public function index()
    {
        $apps = Application::with('project.umkm')
            ->where('pelamar_id', Auth::id()) // ✅ FIX
            ->get()
            ->groupBy('status');

        return view('pelamar.application.index', compact('apps'));
    }
}
