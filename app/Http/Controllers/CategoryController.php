<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CategoryService;
use App\Contracts\Services\WordService;
use App\Services\WordServiceImpl;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public CategoryService $categoryService;

    /**
     * @param WordServiceImpl $noteService
     */
    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function store(Request $request) {
        return $this->categoryService->create($request);
    }
}
