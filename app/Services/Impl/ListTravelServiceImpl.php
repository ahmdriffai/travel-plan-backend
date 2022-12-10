<?php

namespace App\Services\Impl;

use App\Http\Requests\ListTravelAddRequest;
use App\Repositories\ListTravelRepository;
use App\Services\ListTravelService;

class ListTravelServiceImpl implements ListTravelService {
    private ListTravelRepository $listTravelRepository;

    public function __construct(ListTravelRepository $listTravelRepositor) {
        $this->listTravelRepository = $listTravelRepositor;
    }

    function add(ListTravelAddRequest $request)
    {
        $detailList = [
            'user_id' => $request->input('user_id'),
            'place_id' => $request->input('place_id'),
        ];

        $listTravel = $this->listTravelRepository->create($detailList);
        
        return $listTravel;
    }
}