<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::query()->truncate();

        for ($i = 1; $i <= 20; $i++) {
            $task = new Task([
                'title' => "Przykładowy tytuł $i",
                'description' => "Przykładowy opis $i",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            $task->save();
        }
    }
}
