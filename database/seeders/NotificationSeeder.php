<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        // Generate 20 notifications
        Notification::factory()->count(20)->create();
    }
}
