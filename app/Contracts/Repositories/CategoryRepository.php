<?php

namespace App\Contracts\Repositories;

use App\Models\Category;

interface CategoryRepository
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data): Category;
}
