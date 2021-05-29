<?php


namespace App\Repository;

use App\Models\Task;
use Illuminate\Http\Request;

interface AppRepositoryInterface
{
    public function tasks(Request $request): array;
    public function store(Request $request);
    public function update(Request $request, Task $task);
}
