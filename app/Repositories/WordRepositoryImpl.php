<?php

namespace App\Repositories;

use App\Contracts\Repositories\WordRepository;
use App\Models\Note;
use App\Models\Word;
use Illuminate\Support\Collection;

class WordRepositoryImpl implements WordRepository
{
    /**
     * @param array $data
     *
     * @return Note
     */
    public function create(array $data): Word
    {
        return Word::query()->create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Word::query()->get();
    }

    public function getByNoteId(int $noteId): Collection
    {
        return Word::query()->where('note_id', $noteId)->get();
    }
}
