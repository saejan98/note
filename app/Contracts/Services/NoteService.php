<?php

namespace App\Contracts\Services;

use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface NoteService
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request): Note;

    /**
     *
     * @return mixed
     */
    public function getAll(): Collection;
}
