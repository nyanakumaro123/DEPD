<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationSubmitted extends Notification
{
    use Queueable;

    public function __construct(
        public string $pelamarName,
        public string $projectTitle
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Lamaran Baru',
            'message' => "{$this->pelamarName} melamar pekerjaan {$this->projectTitle}",
            'type' => 'application_submitted'
        ];
    }
}
