<?php

Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create', 'TaskController@create');
Route::get('folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('folders/create', 'FolderController@create');
// Route::get('tasks/edit/{id}', 'TaskController@edit');
// Route::post('tasks/edit/{id}', 'TaskController@update');
// Route::delete('/tasks/delete/{id}', 'TaskController@delete');