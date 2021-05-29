<?php


namespace App\Repository;


use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppRepository implements AppRepositoryInterface
{
    public function tasks(Request $request): array
    {
        $phrase = $request->get('phrase') ?? '';
        $sortBy = $request->get('sort_by') ?? 'created_at';
        $sortOrder = $request->get('sort_order') ?? 'asc';
        $pageSize = $request->get('page_size') ?? '5';

        $tasks = Task::query()->where('title', 'like', "%$phrase%")
            ->orderBy($sortBy, $sortOrder)->paginate($pageSize);
        $tasks->withPath("?phrase$phrase=&sort_by=$sortBy&sort_order=$sortOrder&page_size=$pageSize");

        return ['tasks' => $tasks,
            'phrase' => $phrase,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'pageSize' => $pageSize];
    }

    public function store(Request $request)
    {
        $task = new Task([
            'title' => $request->post('title'),
            'description' => $request->post('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $task->save();
    }

    public function update(Request $request, Task $task)
    {
        $task->title = $request->post('title');
        $task->description = $request->post('description');
        $task->updated_at = Carbon::now();
        $task->save();
    }
}
