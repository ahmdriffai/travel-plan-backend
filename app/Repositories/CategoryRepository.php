<?php

namespace App\Repositories;

interface CategoryRepository {
    function create($detail);
    function getAll();
}