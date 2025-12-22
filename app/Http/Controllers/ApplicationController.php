<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class ApplicationController extends Controller
{
    public function apply(Project $project)
    {
        Application::create([
            'project_id' => $project->id,
            'pelamar_id' => Auth::id(),
            'status'     => 'pending'
        ]);

        return back()->with('success', 'Berhasil melamar project');
    }

    public function index()
    {
        $apps = Application::with('project.umkm')
            ->where('pelamar_id', Auth::id())
            ->get()
            ->groupBy('status');

        return view('explore-pelamar', compact('apps'));
        return view('explore-pelamar', [
            'headerTitle' => 'Daftar Lamaran Saya - PathLoka',
            'apps' => $apps
        ]);
    }
}
