<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $pending = Task::where('user_id', $userId)->where('is_completed', false)->count();
        $completed = Task::where('user_id', $userId)->where('is_completed', true)->count();
        $total = Task::where('user_id', $userId)->count();

        return view('dashboard', compact('pending', 'completed', 'total'));
    }
}
