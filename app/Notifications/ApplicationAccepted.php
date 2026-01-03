<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationAccepted extends Notification
{
    use Queueable;

    public function __construct(
        public string $projectTitle,
        public string $umkmName,
        public $project
    ) {}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'accepted',
            'project_title' => $this->project->title,
        ];
    }
}
