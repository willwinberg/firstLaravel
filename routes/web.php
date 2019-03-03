<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// app() == resolve()

// app()->bind() vs app()->singleton()
// bind classes to container accordingly

app()->singleton('App\Services\Twitter', function () {
    // dd('twitter route called');
    return new \App\Services\Twitter('dvsdvfdfsvd');
});

// app()->singleton('App\Example', function () {
//     dd('called');
//     return new \App\Example;
// });


Route::get('/', function () {
    dd(app('App\Example'));
    return view('welcome');
});

Route::resource('projects', 'projectsController');

// ^ === ...

// Route::get('/projects', 'projectsController@index');
// Route::get('/projects/create', 'projectsController@create');
// Route::get('/projects/{project}', 'projectsController@show');
// Route::post('/projects', 'projectsController@store');
// Route::get('/projects/{project}/edit', 'projectsController@edit');
// Route::patch('/projects/{project}', 'projectsController@update');
// Route::delete('/projects/{project}', 'projectsController@destroy');

Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');
// Route::patch('/tasks/{task}', 'ProjectTaskController@update');

Route::post('/completed-tasks/{task}', 'CompletedTaskController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTaskController@destroy');
