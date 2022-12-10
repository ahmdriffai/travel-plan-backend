<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListTravelAddRequest;
use App\Repositories\ListTravelRepository;
use App\Services\ListTravelService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ListTravelController extends BaseController
{
    private ListTravelService $listTravelService;
    private ListTravelRepository $listTravelRepository;

    public function __construct(ListTravelService $listTravelService, ListTravelRepository $listTravelRepository) {
        $this->listTravelService = $listTravelService;
        $this->listTravelRepository = $listTravelRepository;
    }

    public function index()
    {
        try {
            $user = Auth::user();
            $listTravel = $this->listTravelRepository->getByUserId($user->id);
            $result = [
                'user' => $user,
                'listTravel' => $listTravel, 
            ];

            return $this->responseSuccess($result, 'success');
        } catch (Exception $e) {
            return $this->serverError();
        }
    }

    public function store(ListTravelAddRequest $request)
    {
        try {
            $this->listTravelService->add($request);
            return $this->responseSuccessWhitoutData("Travel Plan Added", Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->serverError();
        }
    }
}
