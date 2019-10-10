<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\CreateTask;
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
}