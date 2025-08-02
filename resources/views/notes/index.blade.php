<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight">
            Saved Notes
        </h2>
    </x-slot>

    <div class="py-8 px-4">
        <h3 class="text-white text-lg mb-6">Your Saved Notes</h3>

        @if($notes->count())
            @foreach ($notes as $note)
                <div class="bg-gray-800 p-4 rounded mb-4 shadow-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-white text-lg font-bold">{{ $note->title }}</h4>
                            <div class="text-gray-300 text-sm mt-2">{!! Str::limit($note->content, 200, '...') !!}</div>
                        </div>
                        <div class="flex space-x-2">
                            <!-- View full -->
                            <a href="{{ route('notes.show', $note->id) }}" class="text-blue-400 hover:text-blue-600">🔍</a>

                            <!-- Edit -->
                            <a href="{{ route('notes.edit', $note->id) }}" class="text-yellow-400 hover:text-yellow-600">✏️</a>

                            <!-- Download -->
                            <a href="{{ route('notes.download', ['note' => $note->id]) }}" class="text-blue-600 hover:underline">Download</a>


                            <!-- Print -->
                            <a href="#" onclick="printNote(`note-{{ $note->id }}`)" class="text-white hover:text-gray-400">🖨️</a>

                            <!-- Delete -->
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Delete this note?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600">🗑️</button>
                            </form>
                        </div>
                    </div>

                    <!-- Hidden full content for printing -->
                    <div id="note-{{ $note->id }}" class="printable" style="display: none;">
                        <h3>{{ $note->title }}</h3>
                        {!! $note->content !!}
                    </div>
                </div>
            @endforeach

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $notes->links() }}
            </div>
        @else
            <p class="text-gray-400">No notes yet. Create your first note!</p>
        @endif
    </div>

    {{-- Print Script --}}
<script>
    function printNote(elementId) {
        const printContent = document.getElementById(elementId).innerHTML;
        const win = window.open('', '', 'height=600,width=800');
        win.document.write('<html><head><title>Print Note</title>');
        win.document.write('</head><body>');
        win.document.write(printContent);
        win.document.write('</body></html>');
        win.document.close();
        win.print();
    }
</script>
    <style>
    @media print {
        body * {
            visibility: hidden;
        }

        .printable,
        .printable * {
            visibility: visible;
        }

        .printable {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: white;
            color: black;
            padding: 20px;
        }
    }
</style>


</x-app-layout>
