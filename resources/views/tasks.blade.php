<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">To-Do List</h1>

        <!-- Form to Add New Task -->
        <form method="POST" action="/tasks" class="flex mb-4">
            @csrf
            <input type="text" name="title" class="border p-2 flex-grow" placeholder="Enter a task">
            <button type="submit" class="bg-blue-500 text-white px-4 ml-2">Add</button>
        </form>

        <!-- Display All Tasks -->
        <ul>
            @foreach ($tasks as $task)
                <li class="flex justify-between items-center border-b py-2">
                    {{ $task->title }}
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
