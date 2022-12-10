<?php

namespace App\Services;

use App\Http\Requests\ListTravelAddRequest;

interface ListTravelService {
    function add(ListTravelAddRequest $request);
}