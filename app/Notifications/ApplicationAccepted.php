<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationAccepted extends Notification
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
            'title' => 'Lamaran Diterima',
            'message' => "Selamat! Anda diterima di {$this->projectTitle} oleh {$this->umkmName}",
            'type' => 'application_accepted'
        ];
    }
}
