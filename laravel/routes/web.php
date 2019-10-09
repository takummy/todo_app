<?php

Route::get('/', 'TaskController@index');
Route::post('tasks/create', 'TaskController@create');