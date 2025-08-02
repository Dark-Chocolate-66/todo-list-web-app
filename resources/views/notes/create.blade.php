<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight">
            Notes
        </h2>
    </x-slot>

    <!-- 🔧 Container with dark background -->
    <div class="py-8 px-4 bg-gray-900 text-white min-h-screen">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-white mb-1">Title:</label>
                <input 
    type="text" 
    name="title" 
    class="w-full p-2 rounded border border-gray-600 text-white bg-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500" 
    placeholder="Enter note title"
    required>


            </div>

            <div class="mb-4">
                <label class="block text-white mb-1">Content:</label>
                <textarea name="content" class="summernote"></textarea>
            </div>

            <!-- ✅ Buttons Block -->
            <div class="flex justify-end space-x-4 mt-6">
                <!-- Save Note Button -->
                <button type="submit" class="bg-green-200 hover:bg-green-300 text-white font-medium py-2 px-4 rounded">
                    Save Note
                </button>

                <!-- View Saved Notes Button -->
                <a href="{{ route('notes.index') }}" class="bg-green-200 hover:bg-green-300 text-white font-medium py-2 px-4 rounded inline-block text-center">
                    View Saved Notes
                </a>
            </div>
        </form>
    </div>

    {{-- Include Summernote --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

    <style>
        .note-editable {
            color: white !important;
            background-color: #1f2937 !important;
        }

        .note-toolbar {
            background-color: #111827 !important;
            border: none;
        }

        .note-editor {
            border: 1px solid #4b5563 !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>
</x-app-layout>
