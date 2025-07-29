<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
use App\Models\Task;
use Illuminate\Http\Request;

// Show all tasks
Route::get('/tasks', function () {
    $tasks = Task::all();
    return view('tasks', ['tasks' => $tasks]);
});

// Add a new task
Route::post('/tasks', function (Request $request) {
    Task::create(['title' => $request->title]);
    return redirect('/tasks');
});

// Delete a task
Route::delete('/tasks/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/tasks');
});
