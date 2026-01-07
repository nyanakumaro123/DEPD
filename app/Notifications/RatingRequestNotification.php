<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class RatingRequestNotification extends Notification
{
    public function __construct(
        public int $projectId
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'rating_request',
            'title' => 'Beri Penilaian',
            'message' => 'Magang telah selesai. Beri rating untuk UMKM.',
            'project_id' => $this->projectId,
        ];
    }
}
