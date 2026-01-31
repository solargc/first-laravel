<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Todo;


Route::get('/', function () {
    return redirect('/todos');
});

Route::get('/todos', function () {
    $todos = Todo::latest()->get();
    return view('todos.index', compact('todos'));
})->name('todos.index');

Route::post('/todos', function (Request $request) {
    $data = $request->validate([
        'title' => ['required', 'string', 'max:200'],
    ]);

    Todo::create([
        'title' => $data['title'],
        'completed' => false,
    ]);

    return redirect()->route('todos.index');
})->name('todos.store');

Route::post('/todos/{todo}/toggle', function (Todo $todo) {
    $todo->completed = ! $todo->completed;
    $todo->save();

    return redirect()->route('todos.index');
});

Route::delete('/todos/{todo}', function (Todo $todo) {
    $todo->delete();

    return redirect()->route('todos.index');
})->name('todos.destroy');
