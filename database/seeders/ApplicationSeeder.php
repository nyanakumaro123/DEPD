<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Models\Project;
use App\Models\User;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $pelamars = User::where('role', 'pelamar')->get();
        $projects = Project::all();

        if ($pelamars->isEmpty() || $projects->isEmpty()) {
            return;
        }

        foreach ($pelamars as $pelamar) {
            $randomProjects = $projects->random(min(3, $projects->count()));

            foreach ($randomProjects as $project) {
                Application::firstOrCreate([
                    'pelamar_id' => $pelamar->id,
                    'project_id' => $project->id,
                ], [
                    'status' => collect(['pending','accepted','rejected'])->random(),
                ]);
            }
        }
    }
}
