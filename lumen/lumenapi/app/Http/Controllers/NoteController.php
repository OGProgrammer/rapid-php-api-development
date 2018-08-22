<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
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
        $note->make = $request->input('headline');
        $note->model = $request->input('body');
        $note->save();
        return response()->json($note, 200);
    }

    public function delete(Note $note)
    {
        $note->delete();

        return response()->json(null, 204);
    }
}
