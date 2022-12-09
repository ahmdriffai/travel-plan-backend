<?php

namespace App\Repositories;

interface PlaceRepository {
    function create($detail, array $categoryId);
}