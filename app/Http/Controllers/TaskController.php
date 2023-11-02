<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(TaskRequest $request)
    {
        $task = new Task();

        $task->title = $request->title;
        $task->body = $request->body;

        $task->save();
        return redirect(route('tasks.index'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);

        $task->title = $request->title;
        $task->body = $request->body;

        $task->save();
        return redirect(route('tasks.index'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', ['task' => $task]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect(route('tasks.index'));
    }
}
