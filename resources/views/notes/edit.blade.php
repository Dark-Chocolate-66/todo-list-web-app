<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight">
            Edit Note
        </h2>
    </x-slot>

    <div class="py-8 px-4">
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-white mb-1">Title:</label>
                <input type="text" name="title" value="{{ $note->title }}" class="w-full p-2 rounded border border-gray-300" required>
            </div>

            <div class="mb-4">
                <label class="block text-white mb-1">Content:</label>
                <textarea name="content" class="summernote">{{ $note->content }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update Note
            </button>
        </form>
    </div>

    {{-- Include Summernote --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>
</x-app-layout>
