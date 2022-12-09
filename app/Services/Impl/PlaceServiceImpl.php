<?php

namespace App\Services\Impl;

use App\Http\Requests\PlaceAddRequest;
use App\Repositories\PlaceRepository;
use App\Services\PlaceService;

class PlaceServiceImpl implements PlaceService {
    private PlaceRepository $placeRepository;

    public function __construct(PlaceRepository $placeRepository) {
        $this->placeRepository = $placeRepository;
    }

    function add(PlaceAddRequest $request)
    {

        $categoryId = $request->input('categories');

        $detailPlace = [
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];

        $place = $this->placeRepository->create($detailPlace, $categoryId);
        
        return $place;
    }
}