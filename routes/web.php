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

Route::get('/', function () {
    $tasks = [
        "go to store",
        "go to market",
        "go to work",
    ];

    return view('welcome', ["tasks" => $tasks, "foo" => "foobar"]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/about', function () {
    return view('about');
});
