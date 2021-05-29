<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repository\AppRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppController extends Controller
{
    private AppRepositoryInterface $repository;

    public function __construct(AppRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): View
    {
       $data = $this->repository->tasks($request);
        return view('pages.index', [
            'tasks' => $data['tasks'],
            'phrase' => $data['phrase'],
            'sortBy' => $data['sortBy'],
            'sortOrder' => $data['sortOrder'],
            'pageSize' => $data['pageSize'],
        ]);
    }

    public function create(): View
    {
        return view('pages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->repository->store($request);
        return redirect()->route('index')->with('success', "Pomyślnie dodano zadanie");
    }

    public function show(Task $task): View
    {

        return view('pages.show', ['task' => $task]);
    }

    public function edit(Task $task): View
    {
        return view('pages.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $this->repository->update($request, $task);
        return redirect()->route('show', ['task' => $task])->with('success', "Zadanie zaktualizowano pomyślnie");
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->destroy($task->id);
        return redirect()->route('index')->with('success', "Zadanie usunięto pomyślnie");
    }
}
