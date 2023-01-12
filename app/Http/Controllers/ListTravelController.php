<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListTravelAddRequest;
use App\Repositories\ListTravelRepository;
use App\Services\ListTravelService;
use Illuminate\Http\Request;

class ListTravelController extends Controller
{
    private $listTravelService;
    private $listTravelRepository;

    public function __construct(ListTravelService $listTravelService, ListTravelRepository $listTravelRepository) {
        $this->listTravelService = $listTravelService;
        $this->listTravelRepository = $listTravelRepository;
    }

    public function index()
    {
        try {
            $user = auth()->user();
            $listTravel = $this->listTravelRepository->getByUserId($user->id);
            $biayaWisata = 0 ;

            foreach ($listTravel as $list) {
                $biayaWisata += $list->place->price;
            }

            $biayaTransport = $biayaWisata / 2;

            $total = $biayaWisata + $biayaTransport;


            return view('list-travel', compact('listTravel', 'total', 'biayaWisata', 'biayaTransport'));
        } catch (\Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }

    public function store(ListTravelAddRequest $request)
    {
        try {
            $this->listTravelService->add($request);
            return redirect()->back()->with('success', 'Berhasil menambah plan');
        } catch (Exception $e) {
            Log::error($e);abort(500);
        }
    }
}
