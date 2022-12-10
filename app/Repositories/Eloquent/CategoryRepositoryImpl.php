<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryRepositoryImpl implements CategoryRepository {
    function create($detail)
    {
        $category = new Category($detail);
        $category->save();
        return $category;   
    }

    function getAll()
    {
        return Category::all();
    }
}