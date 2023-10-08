<?php

namespace App\Repositories;

use App\Contracts\Repositories\NoteRepository;
use App\Models\Note;
use Illuminate\Support\Collection;

class NoteRepositoryImpl implements NoteRepository
{
    /**
     * @param array $data
     *
     * @return Note
     */
    public function create(array $data): Note
    {
        return Note::query()->create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Note::query()->where('status', 0)->get();
    }
}
