<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;

class NotesController extends Controller
{

    /**
     * Display a listing of Note.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->has('project')) {
            $notes = Note::all();
        } else {
            $notes = Note::where('project_id', $request->project)->get();
        }

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating new Note.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('notes.create', $relations);
    }

    /**
     * Store a newly created Note in storage.
     *
     * @param  \App\Http\Requests\StoreNotesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotesRequest $request)
    {
        Note::create($request->all());

        return redirect()->route('notes.index');
    }

    /**
     * Show the form for editing Note.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'projects' => \App\Project::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $note = Note::findOrFail($id);

        return view('notes.edit', compact('note') + $relations);
    }

    /**
     * Update Note in storage.
     *
     * @param  \App\Http\Requests\UpdateNotesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotesRequest $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return redirect()->route('notes.index');
    }

    /**
     * Remove Note from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index');
    }

    /**
     * Delete all selected Note at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Note::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
