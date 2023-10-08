<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\WordRepository;
use App\Models\Category;
use App\Models\Note;

class CategoryRepositoryImpl implements CategoryRepository
{
    /**
     * @param array $data
     *
     * @return Category
     */
    public function create(array $data): Category
    {
        return Category::query()->create($data);
    }
}
