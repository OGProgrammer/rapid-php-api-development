<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function store(Request $request)
    {
        $note = Note::create($request->all());

        return response()->json($note, 201);
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());

        return response()->json($note, 200);
    }

    public function delete(Note $note)
    {
        $note->delete();

        return response()->json(null, 204);
    }
}
