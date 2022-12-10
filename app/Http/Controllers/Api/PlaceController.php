<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceAddRequest;
use App\Models\Place;
use App\Repositories\PlaceRepository;
use App\Services\PlaceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlaceController extends BaseController
{
    private PlaceService $placeService;
    private PlaceRepository $placeRepository;

    public function __construct(PlaceService $placeService, PlaceRepository $placeRepository) {
        $this->placeService = $placeService;
        $this->placeRepository = $placeRepository;
    }

    public function index(Request $request)
    {
        try {
            $query = Place::query()->with('categories');

            if ($category = $request->query('category')) {
                $query->whereHas('categories', function($q) use ($category) {
                    $q->where("category_place.name", "=", $category);
                });
            }

            if ($search = $request->query('s')) {
                $query->whereRaw("name LIKE '%" . $search . "%'")
                    ->orWhereRaw("description LIKE '%" . $search . "%'");
            }

            if ($sort = $request->query('sort')) {
                $query->orderBy('price', $sort);
            }

            $perPage = $request->query('size', 10);
            $page = $request->query('page', 1);
            $total = $query->count();

            $places = $query->offset(($page - 1 ) * $perPage)->limit($perPage)->get();
            $totalPerPage = $places->count();
            $lastPage = ceil($total / $perPage);

            $result = [
                'total' => $total,
                'total_perpage' => $totalPerPage,
                'page' => $page,
                'last_page' => $lastPage,
                'places' => $places,
            ];

            return $this->responseSuccess($result, 'Success');
        } catch (Exception $e) {
            dd($e);
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

    public function show($id)
    {
        try {
           $place = $this->placeRepository->findById($id);
           $result = [
                'place' => $place,
           ];

           return $this->responseSuccess($result, 'success');
        } catch (Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }
}
