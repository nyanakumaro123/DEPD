<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Project;
use App\Notifications\InvitationNotification;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

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

        $invitation = Invitation::create([
            'umkm_id' => Auth::id(),
            'pelamar_id' => $request->pelamar_id,
            'project_id' => $request->project_id,
        ]);

        // Message Notification
        $umkmName = Auth::user()->umkmProfile->name;
        $projectTitle = Project::find($request->project_id)->title;
        $message = "Anda diundang oleh {$umkmName} untuk bergabung dalam proyek {$projectTitle}";

        Notification::create([
            'user_id' => $request->pelamar_id,
            'type' => 'invitation',
            'title' => 'Undangan Bergabung Proyek',
            'message' => $message,
            'project_id' => $request->project_id,
            'invitation_id' => $invitation->id,
        ]);

        return back()->with('success', 'Undangan berhasil dikirim');
    }
}
