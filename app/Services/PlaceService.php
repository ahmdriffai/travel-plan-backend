<?php

namespace App\Services;

use App\Http\Requests\PlaceAddRequest;

interface PlaceService {
    function add(PlaceAddRequest $request);
}
