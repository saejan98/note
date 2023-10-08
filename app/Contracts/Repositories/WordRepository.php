<?php

namespace App\Contracts\Repositories;

use App\Models\Word;
use Illuminate\Support\Collection;

interface WordRepository
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data): Word;

    /**
     * @return Collection
     */
    public function getByNoteId(int $noteId): Collection;
}
