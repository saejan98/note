<?php

namespace App\Http\Controllers;

use App\Contracts\Services\WordService;
use App\Models\Word;
use App\Services\WordServiceImpl;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public WordService $wordService;

    /**
     * @param WordService $noteService
     */
    public function __construct(WordService $wordService) {
        $this->wordService = $wordService;
    }

    public function index() {
        $words = $this->wordService->getAll();
        return view('word.index', compact('words'));
    }

    public function store(Request $request) {
        return $this->wordService->create($request);
    }

    public function getByNoteId($noteId) {
        $words = $this->wordService->getByNoteId($noteId);
        return view('word.index', compact('words'));

    }

    public function getGrammarByNoteId($noteId) {
        $grammars = Word::query()->where('status', 1)
                                 ->where('note_id', $noteId)
                                 ->get();
        return view('word.index', compact('grammars'));

    }
}
