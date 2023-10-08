<?php

namespace App\Contracts\Services;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

interface CategoryService
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request): Category;
}
