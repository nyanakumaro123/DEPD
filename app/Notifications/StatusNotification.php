<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class StatusNotification extends Notification
{
    public function __construct(
        public string $message
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'status_update',
            'title' => 'Update Status',
            'message' => $this->message,
        ];
    }
}
