<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InvitationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public $project,
        public $umkm
    ) {}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'invitation',
            'project_id' => $this->project->id,
            'project_title' => $this->project->title,
            'umkm_name' => $this->umkm->umkm_name ?? $this->umkm->name,
        ];
    }
}

