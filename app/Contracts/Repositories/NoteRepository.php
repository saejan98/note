<?php

namespace App\Contracts\Repositories;

use App\Models\Note;
use Illuminate\Support\Collection;

interface NoteRepository
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data): Note;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
