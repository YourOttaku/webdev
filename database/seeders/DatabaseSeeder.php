<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # 3 тестових користувачі: Test User (з початкового сідера) + ще двоє
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $users = User::factory(2)->create()->prepend($testUser);

        # статуси для 5 задач проєкту (присутні всі три)
        $statuses = ['new', 'in_progress', 'done', 'new', 'in_progress'];

        foreach ($users as $user) {
            # по 2 проєкти для кожного користувача
            for ($p = 0; $p < 2; $p++) {
                $project = Project::factory()->create(['user_id' => $user->id]);

                # по 5 задач для кожного проєкту
                foreach ($statuses as $status) {
                    $task = Task::factory()->create([
                        'project_id' => $project->id,
                        'author_id' => $user->id,
                        'assigned_to' => $users->random()->id,
                        'status' => $status,
                    ]);

                    # 2-3 коментарі від різних користувачів
                    foreach ($users->random(rand(2, 3)) as $commenter) {
                        Comment::factory()->create([
                            'task_id' => $task->id,
                            'user_id' => $commenter->id,
                        ]);
                    }
                }
            }
        }
    }
}
