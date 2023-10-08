<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NoteService;
use App\Contracts\Services\WordService;
use App\Models\Note;
use App\Services\WordServiceImpl;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public NoteService $noteService;

    /**
     * @param NoteService $noteService
     */
    public function __construct(NoteService $noteService) {
        $this->noteService = $noteService;
    }

    public function index() {
        $notes = $this->noteService->getAll();
        return view('note.index', compact('notes'));
    }

    public function store(Request $request) {
        return $this->noteService->create($request);
    }

    public function grammar() {
        $notes = Note::query()->where('status', 1)->get();
        return view('note.index', compact('notes'));
    }
}
