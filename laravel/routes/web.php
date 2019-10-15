<?php

Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
// Route::post('tasks/create', 'TaskController@create');
// Route::get('tasks/show/{id}', 'TaskController@show');
// Route::get('tasks/edit/{id}', 'TaskController@edit');
// Route::post('tasks/edit/{id}', 'TaskController@update');
// Route::delete('/tasks/delete/{id}', 'TaskController@delete');