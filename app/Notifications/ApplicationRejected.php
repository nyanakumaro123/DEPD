<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationRejected extends Notification
{
    public function __construct(
        public int $projectId,
        public string $projectTitle,
        public string $umkmName
    ) {}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'rejected',
            'project_id' => $this->projectId,
            'project_title' => $this->projectTitle,
            'umkm_name' => $this->umkmName,
        ];
    }
}
