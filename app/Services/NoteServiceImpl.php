<?php

namespace App\Services;

use App\Contracts\Repositories\NoteRepository;
use App\Contracts\Repositories\WordRepository;
use App\Contracts\Services\NoteService;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;

class NoteServiceImpl implements NoteService
{
    /**
     * @var NoteRepository
     */
    private NoteRepository $noteRepository;

    /**
     * @param WordRepository $noteRepository
     */
    public function __construct(NoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @param $request
     *
     * @return Note
     */
    public function create($request): Note
    {
        return $this->noteRepository->create($request->all());
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->noteRepository->getAll();
    }
}
