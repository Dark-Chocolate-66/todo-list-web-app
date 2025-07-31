<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans p-10">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium mb-1">Task Title</label>
                <input type="text" name="title" value="{{ $task->title }}" class="border p-2 w-full">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Deadline</label>
                <input type="datetime-local" name="deadline" value="{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d\TH:i') : '' }}" class="border p-2 w-full">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="/" class="ml-2 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</body>
</html>
