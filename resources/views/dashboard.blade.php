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
        <div class="bg-gray-800 p-4 rounded-xl shadow-md mt-4 justify-center">
    <h4 style="font-size: 1rem;" class="text-white font-semibold mb-4">Overview</h4>
    <!-- <canvas id="taskChart" class="w-60 h-60"></canvas> -->
<div class="flex justify-center">
    <canvas id="taskChart" class="w-60 h-60"></canvas>
</div>


</div>

    </div>
</a>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('taskChart').getContext('2d');
    const taskChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Completed', 'Pending', 'Total'],
            datasets: [{
                label: 'Task Stats',
                data: [{{ $completed }}, {{ $pending }}, {{ $total }}],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',
                    'rgba(234, 179, 8, 0.7)',
                    'rgba(59, 130, 246, 0.7)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(234, 179, 8, 1)',
                    'rgba(59, 130, 246, 1)'
                ],
                borderWidth: 3
            }]
        },
        options: {
            responsive: false, 
            plugins: {
                legend: {
                    labels: { color: 'white' }
                }
            }
        }
    });
</script>
</x-app-layout>
