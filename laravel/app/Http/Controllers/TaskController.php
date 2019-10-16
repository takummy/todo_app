<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();
        $current_folder = Folder::find($id);
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id
        ]);
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