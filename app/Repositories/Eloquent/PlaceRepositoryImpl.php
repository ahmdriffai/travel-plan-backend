<?php

namespace App\Repositories\Eloquent;

use App\Models\Place;
use App\Repositories\PlaceRepository;

class PlaceRepositoryImpl implements PlaceRepository {
    function create($detail, array $categoryId)
    {
        $place = new Place($detail);
        $place->save();
        $place->categories()->sync($categoryId);
        return $place;
    }
}