<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Database\Factories\ProjectFactory;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::factory()->count(2)->create();
    }

}
