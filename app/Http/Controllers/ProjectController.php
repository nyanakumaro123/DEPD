<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function detailProjek()
    {
        $projects = Project::all();

        return view('Pelamar.detail-projek-pelamar', [
            'headerTitle' => 'Projects - PathLoka',
            'projects'    => $projects,
            'user'        => Auth::user()
        ]);
    }

    public function applyProjek()
    {
        return view('Pelamar.apply-projek-pelamar', [
            'headerTitle' => 'Detail Projek - PathLoka',
            'user'        => Auth::user()
        ]);
    }

        public function apply(Project $project)
    {
        $user = Auth::user();

        // Cegah double apply
        if ($project->applications()
            ->where('pelamar_id', $user->id)
            ->exists()) {
            return back()->withErrors('Kamu sudah melamar project ini');
        }

        $project->applications()->create([
            'pelamar_id' => $user->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim');
    }

}