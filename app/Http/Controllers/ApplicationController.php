<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Project;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

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

        $application = Application::create([
            'project_id' => $project->id,
            'pelamar_id' => $user->id,
            'status' => 'pending',
        ]);

        // Message Notification
        $pelamarName = Auth::user()->name;
        $projectTitle = Project::find($project->id)->title;
        $message = "{$pelamarName} mengajukan permohonan bergabung dalam proyek {$projectTitle}";

        Notification::create([
            'user_id' => $project->umkm->id,
            'type' => 'application',
            'title' => 'Permohonan Bergabung Proyek',
            'message' => $message,
            'project_id' => $project->project_id,
            'application_id' => $application->id,
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim');
    }

    public function index()
    {
        $applications = Application::with('project.umkm')
            ->where('pelamar_id', Auth::id())
            ->latest()
            ->get();

        return view('pelamar.applications.index', compact('applications'));
    }

    public function tracking()
    {
        $applications = Application::with('project.umkm.umkmProfile')
            ->where('pelamar_id', Auth::id())
            ->latest()
            ->get();

        return view('Pelamar.tracking', compact('applications'));
    }


}
