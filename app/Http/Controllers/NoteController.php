<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Note; 

class NoteController extends Controller
{
    public function index()
{
    $notes = Note::where('user_id', auth()->id())->paginate(5); // or all()
    return view('notes.index', compact('notes'));
}

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
        ]);

        auth()->user()->notes()->create($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note saved!');
    }

    public function show(Note $note)
{
    return view('notes.show', compact('note'));
}
    public function download(Note $note)
{
    $pdf = Pdf::loadView('notes.pdf', compact('note'));
    return $pdf->download($note->title . '.pdf');
}

public function edit(Note $note)
{
    return view('notes.edit', compact('note'));
}
public function update(Request $request, Note $note)
{
    $request->validate([
        'title' => 'required',
        'content' => 'nullable',
    ]);

    $note->update($request->only('title', 'content'));
    return redirect()->route('notes.index')->with('success', 'Note updated!');
}
public function destroy(Note $note)
{
    $note->delete();
    return redirect()->route('notes.index')->with('success', 'Note deleted!');
}


}
