<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notification;
use App\Models\User;
use App\Models\Project;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        $types = ['application submitted', 'invitation', 'accepted', 'rejected'];
        $type = $this->faker->randomElement($types);

        $project = Project::inRandomOrder()->first(); // get random project
        $user = User::inRandomOrder()->first(); // get random user

        return [
            'user_id' => $user->id ?? 1,
            'type' => $type,
            'title' => $type === 'application submitted' ? $this->faker->sentence(4) : null,
            'message' => $type === 'application submitted' ? $this->faker->sentence(8) : null,
            'project_id' => $project->id ?? null,
            'is_read' => $this->faker->boolean(10),
        ];
    }
}
