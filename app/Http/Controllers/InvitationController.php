<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Notifications\InvitationNotification;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function invite($pelamarId, $projectId)
    {
        $pelamar = \App\Models\User::findOrFail($pelamarId);

        $pelamar->notify(
            new InvitationNotification(
                Auth::user()->name,
                $projectId
            )
        );

        return back()->with('success', 'Undangan berhasil dikirim');
    }

    public function accept($notificationId)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        /** @var \Illuminate\Notifications\DatabaseNotification $notif */
        $notif = Auth::user()
        ->notifications
        ->where('id', $notificationId)
        ->firstOrFail();


        // update status lamaran
        \App\Models\Application::where('project_id', $notif->data['project_id'])
            ->where('pelamar_id', Auth::id())
            ->update(['status' => 'accepted']);

        // kirim notif ke UMKM
        $project = Project::find($notif->data['project_id']);
        $project->umkm->user->notify(
            new StatusNotification('Pelamar menerima undangan')
        );

        $notif->delete();

        return back()->with('success', 'Undangan diterima');
    }

    public function reject($notificationId)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        /** @var \Illuminate\Notifications\DatabaseNotification $notif */
        $notif = Auth::user()
        ->notifications
        ->where('id', $notificationId)
        ->firstOrFail();

        \App\Models\Application::where('project_id', $notif->data['project_id'])
            ->where('pelamar_id', Auth::id())
            ->update(['status' => 'rejected']);

        $notif->delete();

        return back()->with('success', 'Undangan ditolak');
    }
}
