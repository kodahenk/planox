<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class ProjectTaskSeeder extends Seeder
{
    public function run()
    {
        // Rastgele 3-7 arası proje oluştur
        Project::factory(rand(5, 15))->create()->each(function ($project) {
            // Proje başına rastgele 5-10 görev oluştur
            $tasks = Task::factory(rand(5, 10))->create(['project_id' => $project->id]);
            
            // Her görev için alt görevler oluştur
            foreach ($tasks as $task) {
                $this->createSubTasks($task, $project->id, rand(0, 3)); // Maksimum 3 kademe alt görev
            }
        });
    }

    /**
     * Alt görevleri oluşturur.
     *
     * @param Task $parentTask Üst görev
     * @param int $projectId Proje ID'si
     * @param int $depth Kalan kademeler
     */
    private function createSubTasks(Task $parentTask, int $projectId, int $depth)
    {
        if ($depth <= 0) {
            return; // Daha fazla derinlik oluşturma
        }

        // Rastgele 0-4 arasında alt görev oluştur
        $subTasks = Task::factory(rand(0, 4))->create([
            'project_id' => $projectId,
            'parent_id' => $parentTask->id,
        ]);

        // Her alt görev için recursive olarak yeni alt görevler oluştur
        foreach ($subTasks as $subTask) {
            $this->createSubTasks($subTask, $projectId, $depth - 1);
        }
    }
}
