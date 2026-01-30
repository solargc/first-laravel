<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;

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
    $todos = Todo::orderByDesc('id')->get();
    return view('todos.index', ['todos' => $todos]);
});

Route::post('/todos', function () {
    $data = request()->validate([
        'title' => ['required', 'string', 'max:200'],
    ]);

    Todo::create([
        'title' => $data['title'],
        'done' => false,
    ]);

    return redirect('/todos');
});
