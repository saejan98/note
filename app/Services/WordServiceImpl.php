<?php

namespace App\Services;

use App\Contracts\Repositories\WordRepository;
use App\Contracts\Services\WordService;
use App\Models\Note;
use App\Models\Word;
use Illuminate\Database\Eloquent\Collection;

class WordServiceImpl implements WordService
{
    /**
     * @var WordRepository
     */
    private WordRepository $wordRepository;

    /**
     * @param WordRepository $noteRepository
     */
    public function __construct(WordRepository $wordRepository) {
        $this->wordRepository = $wordRepository;
    }

    /**
     * @param $request
     *
     * @return Word
     */
    public function create($request): Word
    {
        return $this->wordRepository->create($request->all());
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->wordRepository->getAll();
    }

    /**
     * @param int $noteId
     *
     * @return Collection
     */
    public function getByNoteId(int $noteId): Collection
    {
        return $this->wordRepository->getByNoteId($noteId);
    }
}
