<?php

namespace App\Services;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\WordRepository;
use App\Contracts\Services\CategoryService;
use App\Contracts\Services\WordService;
use App\Models\Category;
use App\Models\Note;

class CategoryServiceImpl implements CategoryService
{
    private CategoryRepository $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create($request): Category
    {
        return $this->categoryRepository->create($request->all());
    }
}
