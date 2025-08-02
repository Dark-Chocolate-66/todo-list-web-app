<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Note: {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow">
            <div id="note-content" class="prose max-w-none text-white">
                {!! $note->content !!}
            </div>

            <div class="mt-6 flex gap-4">
                <button onclick="printNote()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">🖨️ Print</button>
                <a href="{{ route('notes.download', $note->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">⬇️ Download PDF</a>
            </div>
        </div>
    </div>

    <script>
        function printNote() {
            var content = document.getElementById('note-content').innerHTML;
            var printWindow = window.open('', '', 'height=800,width=1000');
            printWindow.document.write('<html><head><title>Print Note</title></head><body style="color: white; background: black;">');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</x-app-layout>
