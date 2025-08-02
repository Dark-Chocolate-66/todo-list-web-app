<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    
    <!-- Welcome Message -->
    <div class="p-6 lg:p-8 bg-gray-900 border-b border-gray-800">
        <h1 style="font-size: 2rem; font-weight: 900;" class="text-white tracking-wide">
    Welcome, {{ Auth::user()->name }} 👋
</h1>

    </div>

    <!-- Notes Section -->
    <!-- 📝 Notes Block -->
<div class="p-6 lg:p-8 bg-gray-900 border-b border-gray-800">
    <div class="flex items-center space-x-4">
        <span class="text-3xl">📝</span>
        <div>
            <h3 class="text-white text-xl font-bold">Notes</h3>
            <p class="text-gray-400">Write, edit, and organize your personal notes</p>
        </div>
    </div>

    <!-- 👇 Notes Actions -->
    <div class="mt-6 flex flex-col md:flex-row gap-4">
        <a href="{{ route('notes.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded text-center">
            Create New Note
        </a>
        <a href="{{ route('notes.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded text-center">
            View Saved Notes
        </a>
    </div>
</div>



                <!-- ✅ To-Do List Block -->
<a href="{{ route('tasks.index') }}">
    <div class="bg-gray-700 p-6 rounded-lg shadow-md hover:bg-gray-600 transition duration-300 mb-4">
        <div class="flex items-center space-x-4">
            <span class="text-3xl">✅</span>
            <div>
                <h3 class="text-white text-xl font-bold">To-Do List</h3>
                <p class="text-gray-400">Manage your daily tasks</p>
            </div>
        </div>

        <!-- 👇 Task Stats Here -->
        <div class="mt-6 text-white">
            <p class="text-lg">Pending Tasks: <span class="font-bold">{{ $pending }}</span></p>
            <p class="text-lg">Completed Tasks: <span class="font-bold">{{ $completed }}</span></p>
            <p class="text-lg">Total Tasks: <span class="font-bold">{{ $total }}</span></p>
        </div>
    </div>
</a>

            </div>

        </div>
    </div>
</x-app-layout>
