<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }} 👋</h3>

                {{-- Task Stats --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded">
                        <p class="text-gray-600">Pending Tasks</p>
                        <p class="text-2xl font-bold text-blue-800">
                            {{ $pending }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-4 rounded">
                        <p class="text-gray-600">Completed Tasks</p>
                        <p class="text-2xl font-bold text-green-800">
                            {{ $completed }}
                        </p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded">
                        <p class="text-gray-600">Total Tasks</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $total }}
                        </p>
                    </div>
                </div>

                {{-- Success/Error Flash Messages --}}
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Add New Task --}}
                <form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <input 
        type="text" 
        name="title" 
        placeholder="Enter task"
        class="rounded px-4 py-2 w-full mb-2"
        required
    >

    <input 
        type="datetime-local" 
        name="deadline"
        class="rounded px-4 py-2 w-full mb-4"
    >

    <!-- Submit Button UI -->
    <div class="flex justify-center items-center gap-12 h-full">
        <div class="bg-gradient-to-b from-gray-800/40 to-transparent p-[4px] rounded-[16px]">
            <button type="submit" class="cssbuttons-io-button">
  <svg height="24" width="24" viewBox="0 0 24 24" fill="none">
    <path d="M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12 4v16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
  Add Task
</button>

        </div>
    </div>
</form>


                {{-- Task List --}}
                <ul class="divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                        <li class="flex justify-between items-center py-4">
                            <div>
                                <span class="font-semibold">{{ $task->title }}</span>
                                @if($task->deadline)
                                    <small class="block text-gray-500">Due: {{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y H:i') }}</small>
                                    
                                @endif
                                @if($task->is_completed)
                                    <span class="text-green-600 text-sm">✔ Completed</span>
                                @endif
                            </div>

                            <div class="flex gap-2">
                                {{-- Complete --}}
                                @if(!$task->is_completed)
    <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-gradient-to-b from-green-800/40 to-transparent p-[4px] rounded-[16px]">
            <button type="submit" class="cssbuttons-io-button">
                <svg height="24" width="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 4v16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Mark Complete
            </button>
        </div>
    </form>
@endif


                                {{-- Edit --}}
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:underline">Edit</a>

                                {{-- Delete --}}
                                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>
</x-app-layout>
<style>
.cssbuttons-io-button {
  display: flex;
  align-items: center;
  font-family: inherit;
  cursor: pointer;
  font-weight: 500;
  font-size: 16px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: linear-gradient(
    0deg,
    rgba(20, 167, 62, 1) 0%,
    rgba(102, 247, 113, 1) 100%
  );
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
  margin-top: 10px;
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
