<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create(CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->save();

        return redirect('/');
    }

    public function show(int $id)
    {
        return view('tasks.show', ['task' => Task::find($id)]);
    }

    public function edit(int $id)
    {
        $task = Task::find($id);
        return view('tasks.edit', ['task' => Task::find($id)]);
    }

    public function update(int $id, EditTask $request)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();

        return redirect('tasks/show/'.$task->id);
    }

    public function delete(Request $request) {
        Task::find($request->id)->delete();
        return redirect('/');
    }
}