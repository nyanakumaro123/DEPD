<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationAccepted;
use App\Notifications\ApplicationRejected;
use App\Models\Notification;

class UmkmApplicationController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $applications = Application::with(['pelamar', 'project'])
            ->whereHas('project', function ($q) use ($user) {
                $q->where('umkm_id', $user->id);
            })
            ->latest()
            ->get();

        return view('Umkm.applications', compact('applications'));
    }

    
    public function accept(Application $application)
    {
        $application->update(['status' => 'accepted']);

        // Message Notification
        $projectTitle = $application->project->title;
        $message = "Permohonan anda di {$projectTitle} telah diterima";

        Notification::create([
            'user_id' => $application->pelamar_id,
            'type' => 'accepted',
            'title' => 'Permohonan Diterima',
            'message' => $message,
            'project_id' => $application->project_id,
        ]);

        return back()->with('success', 'Pelamar diterima');
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);

        // Message Notification
        $projectTitle = $application->project->title;
        $message = "Permohonan anda di {$projectTitle} telah ditolak";

        Notification::create([
            'user_id' => $application->pelamar_id,
            'type' => 'rejected',
            'title' => 'Permohonan Ditolak',
            'message' => $message,
            'project_id' => $application->project_id,
        ]);

        return back()->with('success', 'Pelamar ditolak');
    }
}
