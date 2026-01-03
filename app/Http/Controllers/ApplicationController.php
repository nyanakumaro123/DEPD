<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationSubmitted;


use function Ramsey\Uuid\v1;

class ApplicationController extends Controller
{
    public function apply(Project $project)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cegah double apply
        if (Application::where('project_id', $project->id)
            ->where('pelamar_id', $user->id)
            ->exists()) {
            return back()->withErrors('Kamu sudah melamar lowongan ini');
        }

        Application::create([
            'project_id' => $project->id,
            'pelamar_id' => $user->id,
            'status' => 'pending',
        ]);

        $project->umkm->user->notify(
        new ApplicationSubmitted(
            Auth::user()->name,
            $project->title
        )
    );

        return back()->with('success', 'Lamaran berhasil dikirim');
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
