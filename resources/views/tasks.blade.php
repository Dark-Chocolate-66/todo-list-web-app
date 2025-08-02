<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
/* From Uiverse.io by adamgiebl */
.cssbuttons-io-button {
  display: flex;
  align-items: center;
  font-family: inherit;
  cursor: pointer;
  font-weight: 500;
  font-size: 16px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: #ad5389;
  background: linear-gradient(
    0deg,
    rgba(20, 167, 62, 1) 0%,
    rgba(102, 247, 113, 1) 100%
  );
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
}

.cssbuttons-io-button svg {
  margin-right: 6px;
}

.cssbuttons-io-button:hover {
  box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
}

.cssbuttons-io-button:active {
  box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}
</style>

</head>
<body class="bg-gray-100 font-sans p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
    <div class="text-gray-700">Welcome, {{ auth()->user()->name }}!</div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="text-red-600 hover:underline">Logout</button>
    </form>
</div>

        <h1 class="text-2xl font-bold mb-4 text-gray-800">To-Do List</h1>
        <!-- Sorting Dropdown -->
<div class="mb-4">
    <form method="GET" action="/">
        <label for="sort" class="mr-2">Sort by Deadline:</label>
        <select name="sort" onchange="this.form.submit()" class="border rounded p-1">
            <option value="asc" {{ isset($sortOrder) && $sortOrder == 'asc' ? 'selected' : '' }}>Earliest First</option>
            <option value="desc" {{ isset($sortOrder) && $sortOrder == 'desc' ? 'selected' : '' }}>Latest First</option>
        </select>
    </form>
</div>
        <!-- Form to Add New Task -->
<form method="POST" action="/tasks" class="space-y-2 mb-4">
    @csrf

    <div class="flex space-x-2">
        <input 
            type="text" 
            name="title" 
            class="border border-gray-300 rounded px-3 py-2 w-1/2" 
            placeholder="Enter a task" 
            required>

        <input 
            type="datetime-local" 
            name="deadline" 
            class="border border-gray-300 rounded px-3 py-2 w-1/2">

        <button type="submit" class="cssbuttons-io-button">
    <svg height="24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 5V19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Add Task
</button>

    </div>
</form>



        <!-- Display All Tasks -->
        <ul>
           @foreach ($tasks as $task)
    <li class="flex justify-between items-start border-b py-2">
        <div>
            <form method="POST" action="/tasks/{{ $task->id }}/toggle" class="inline-block mr-2">
                @csrf
                <input type="checkbox" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            </form>
            <span class="{{ $task->completed ? 'line-through text-gray-400' : '' }}">
                <strong>{{ $task->title }}</strong><br>
                <span class="text-sm text-gray-500">
                    @if ($task->deadline)
                        Due: {{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y H:i') }}
                    @else
                        No Deadline
                    @endif
                </span>
            </span>
        </div>

        <form method="POST" action="/tasks/{{ $task->id }}">
    @csrf
    @method('DELETE')
    <button class="text-red-500 hover:underline">Delete</button>
</form>

<a href="/tasks/{{ $task->id }}/edit" class="ml-4 text-blue-600 hover:underline">Edit</a>

    </li>
@endforeach

        </ul>
    </div>
</body>
</html>
