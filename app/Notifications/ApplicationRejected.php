<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationRejected extends Notification
{
    use Queueable;

    public function __construct(
        public string $projectTitle,
        public string $umkmName
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Lamaran Ditolak',
            'message' => "Lamaran Anda untuk {$this->projectTitle} ditolak oleh {$this->umkmName}",
            'type' => 'application_rejected'
        ];
    }
}
