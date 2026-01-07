<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request; // Jangan lupa import ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Import Storage untuk file

class UMKMProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('umkm_id', Auth::id())
            ->withCount('applications')
            ->latest()
            ->get();

        return view('umkm.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('umkm.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'rewards' => 'nullable|string', // Input berupa text, nanti di-explode
            'time_start' => 'required',
            'time_end' => 'required',
            'salary_amount' => 'required|numeric|min:0',
            'salary_frequency' => 'required|in:per_hour,per_day,per_week,per_month,total',
            'currency' => 'required|string|max:10',
            'syarat_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Handle File Upload
        if ($request->hasFile('syarat_path')) {
            $validated['syarat_path'] = $request->file('syarat_path')->store('project_syarat', 'public');
        }

        // Handle Rewards (Convert new lines to array)
        if ($request->filled('rewards')) {
            $validated['rewards'] = array_filter(array_map('trim', explode("\n", $request->rewards)));
        } else {
            $validated['rewards'] = [];
        }

        $validated['umkm_id'] = Auth::id();

        Project::create($validated);

        return redirect()->route('umkm.projects.index')->with('success', 'Project berhasil dibuat!');
    }

    public function show(Project $project)
    {
        abort_if($project->umkm_id !== Auth::id(), 403);

        $project->load([
            'applications.pelamar.pelamarProfile.major'
        ]);

        return view('umkm.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        abort_if($project->umkm_id !== Auth::id(), 403);
        return view('umkm.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        abort_if($project->umkm_id !== Auth::id(), 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'rewards' => 'nullable|string',
            'time_start' => 'required',
            'time_end' => 'required',
            'salary_amount' => 'required|numeric|min:0',
            'salary_frequency' => 'required|in:per_hour,per_day,per_week,per_month,total',
            'currency' => 'required|string|max:10',
            'syarat_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Handle File Upload (Delete old if exists)
        if ($request->hasFile('syarat_path')) {
            if ($project->syarat_path && Storage::disk('public')->exists($project->syarat_path)) {
                Storage::disk('public')->delete($project->syarat_path);
            }
            $validated['syarat_path'] = $request->file('syarat_path')->store('project_syarat', 'public');
        }

        // Handle Rewards
        if ($request->filled('rewards')) {
            $validated['rewards'] = array_filter(array_map('trim', explode("\n", $request->rewards)));
        } else {
            $validated['rewards'] = [];
        }

        $project->update($validated);

        return redirect()->route('umkm.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        abort_if($project->umkm_id !== Auth::id(), 403);

        // Hapus file jika ada
        if ($project->syarat_path && Storage::disk('public')->exists($project->syarat_path)) {
            Storage::disk('public')->delete($project->syarat_path);
        }

        $project->delete();

        return redirect()->route('umkm.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}