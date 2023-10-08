<?php

namespace App\Contracts\Services;

use App\Models\Word;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface WordService
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request): Word;

    /**
     *
     * @return mixed
     */
    public function getByNoteId(int $noteId): Collection;
}
