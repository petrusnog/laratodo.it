<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'status_id' => Status::inRandomOrder()->value('id'),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'due_date' => fake()->dateTimeBetween('now', '+1 month'),
            'order' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}