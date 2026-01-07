<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('umkm')
            ->where('status', 'open');

        // FILTER KATEGORI
        if ($request->filled('category')) {
            $query->whereIn('category', $request->category);
        }

        // PAGINATION
        $projects = $query->latest()->paginate(6);

        // PROJECT YANG SUDAH DILAMAR
        $appliedProjectIds = [];

        /** @var User $user */
        $user = Auth::user();
        if ($user && $user->isPelamar()) {
        $appliedProjectIds = Application::where('pelamar_id', $user->id)
        ->pluck('project_id')
        ->toArray();

        return view('Pelamar.explore-pelamar', compact(
            'projects',
            'appliedProjectIds'
        ));
    }
}

    public function show(Project $project)
    {
        $alreadyApplied = false;

        /** @var User $user */
        $user = Auth::user();
        $alreadyApplied = false;
        if ($user && $user->isPelamar()) {
        $alreadyApplied = Application::where('project_id', $project->id)
        ->where('pelamar_id', $user->id)
        ->exists();
 }

        return view('Pelamar.detail-projek-pelamar', compact(
            'project',
            'alreadyApplied'
        ));
    }
}
