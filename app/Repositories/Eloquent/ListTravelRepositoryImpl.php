<?php

namespace App\Repositories\Eloquent;

use App\Models\ListTravel;
use App\Repositories\ListTravelRepository;

class ListTravelRepositoryImpl implements ListTravelRepository {
    function create($detail)
    {
        $travelList = new ListTravel($detail);

        $travelList->save();

        return $travelList;
    }

    function getByUserId($userId)
    {
        return ListTravel::with('place')->where('user_id', $userId)->get();
    }
}