<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hi', function () {
    return "Hi first! Is this a route?";
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/now', function () {
    return now()->toDateTimeString();
});

Route::get('/todos', function () {
    $todos = [
        ['title' => 'buy vegetables', 'done' => false],
        ['title' => 'eating', 'done' => true],
        ['title' => 'learning php', 'done' => false],
    ];

    return view('todos.index', ['todos' => $todos]);
});

Route::post('/todos', function () {
    dd(request()->all());
});

