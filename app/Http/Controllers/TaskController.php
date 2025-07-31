<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show Dashboard
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->orderBy('deadline')->get();

        $total = $tasks->count();
        $pending = $tasks->where('is_completed', false)->count();
        $completed = $tasks->where('is_completed', true)->count();

        return view('dashboard', compact('tasks', 'total', 'pending', 'completed'));
    }

    // Store New Task
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'deadline' => 'nullable|date',
    ]);

    Task::create([
        'title' => $request->title,
        'deadline' => $request->deadline,
        'completed' => false,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('dashboard');
}

    // Show Edit Form
    public function edit($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('tasks.edit', compact('task'));
    }

    // Update Task
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->update([
            'title' => $request->title,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
    }

    // Delete Task
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully!');
    }

    // Mark Task as Complete
    public function markComplete($id)
{
    $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    // Toggle complete/incomplete
    $task->update(['is_completed' => !$task->is_completed]);

    return redirect()->route('dashboard')->with('success', 'Task status updated!');
}

}
