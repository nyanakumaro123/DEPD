<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class UMKMProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('umkm_id', Auth::id())
            ->withCount('applications')
            ->latest()
            ->get();

        return view('Umkm.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        abort_if($project->umkm_id !== Auth::id(), 403);

        $project->load([
            'applications.pelamar.pelamarProfile.major'
        ]);

        return view('Umkm.projects.show', compact('project'));
    }
}
