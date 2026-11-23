<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->optional()->paragraph(),
            'status' => fake()->randomElement(['new', 'in_progress', 'done']),
            'project_id' => Project::factory(),
            'author_id' => User::factory(),
            'assigned_to' => null,
            'due_date' => fake()->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
