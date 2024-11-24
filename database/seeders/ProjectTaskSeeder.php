<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class ProjectTaskSeeder extends Seeder
{
    public function run()
    {
        // Her biri 5 görev içeren 10 proje oluştur
        Project::factory(10)->create()->each(function ($project) {
            Task::factory(5)->create(['project_id' => $project->id]);
        });
    }
}

