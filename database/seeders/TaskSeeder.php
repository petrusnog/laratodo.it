<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(50)->create([
            'user_id' => User::where('email', 'petrus@todo.it')->first()->id
        ]);
    }
}
