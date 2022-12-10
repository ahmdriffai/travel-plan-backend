<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceAddRequest;
use App\Models\Place;
use App\Services\PlaceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlaceController extends BaseController
{
    private PlaceService $placeService;

    public function __construct(PlaceService $placeService) {
        $this->placeService = $placeService;
    }

    public function index(Request $request)
    {
        try {
            $place = Place::with('categories')->get();

            $result = [
                'places' => $place,
            ];

            return $this->responseSuccess($result, 'Success');
        } catch (Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }

    public function store(PlaceAddRequest $request) {
        try {
            $this->placeService->add($request);
            return $this->responseSuccessWhitoutData('Place Created');
        } catch (Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }
}
