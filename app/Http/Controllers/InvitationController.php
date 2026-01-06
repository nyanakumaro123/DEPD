<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Notifications\InvitationNotification;
use App\Notifications\StatusNotification;
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
}
