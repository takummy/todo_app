<?php

Route::get('/', 'TaskController@index');
Route::post('tasks/create', 'TaskController@create');
Route::get('tasks/show/{id}', 'TaskController@show');