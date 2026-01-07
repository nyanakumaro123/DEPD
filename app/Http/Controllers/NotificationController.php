<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('notifikasi', compact('notifications'));
    }

    public function read($id)
    {
        $notif = DatabaseNotification::where('id', $id)
            ->where('notifiable_id', Auth::id())
            ->firstOrFail();

        $notif->markAsRead();

        return back();
    }
}
