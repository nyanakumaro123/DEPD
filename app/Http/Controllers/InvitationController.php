<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Project;
use App\Notifications\InvitationNotification;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function invite($pelamarId, $projectId)
    {
        $pelamar = \App\Models\User::findOrFail($pelamarId);
        $project = \App\Models\Project::findOrFail($projectId);

        $pelamar->notify(
            new InvitationNotification(
                $project,
                Auth::user()->umkmProfile // atau Auth::user()
            )
        );

        return back()->with('success', 'Undangan berhasil dikirim');
    }

    public function accept($id)
    {
        $notif = DatabaseNotification::findOrFail($id);
        $notif->markAsRead();

        // logic accept project / invitation
        return redirect()->route('notifikasi')
            ->with('success', 'Undangan diterima');
    }

    public function reject($id)
    {
        $notif = DatabaseNotification::findOrFail($id);
        $notif->markAsRead();

        return redirect()->route('notifikasi')
            ->with('success', 'Undangan ditolak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelamar_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        Invitation::create([
            'umkm_id' => Auth::id(),
            'pelamar_id' => $request->pelamar_id,
            'project_id' => $request->project_id,
        ]);

        return back()->with('success', 'Undangan berhasil dikirim');
    }
}
