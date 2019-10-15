<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;
        $fodler->save();

        return redirect()->route('task.index', [
            'id' => $folder->id
        ]);
    }
}