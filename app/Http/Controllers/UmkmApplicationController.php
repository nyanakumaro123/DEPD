<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationAccepted;
use App\Notifications\ApplicationRejected;

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

        $application->pelamar->notify(
    new ApplicationAccepted(
        $application->project->title,
        Auth::user()->name,
        $application->project->id
    )
);

        return back()->with('success', 'Pelamar diterima');
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);

        $application->pelamar->user->notify(
        new ApplicationRejected(
        $application->project->id,
        $application->project->title,
        Auth::user()->name
    )
    );

        return back()->with('success', 'Pelamar ditolak');
    }
}
