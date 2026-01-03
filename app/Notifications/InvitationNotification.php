<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InvitationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $umkmName,
        public int $projectId
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'invitation',
            'title' => 'Undangan Kerja',
            'message' => "UMKM {$this->umkmName} mengundang kamu untuk bekerja.",
            'project_id' => $this->projectId,
        ];
    }
}
