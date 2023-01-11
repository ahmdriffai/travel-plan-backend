<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceAddRequest;
use App\Models\Category;
use App\Models\Place;
use App\Services\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    private $placeService;

    public function __construct(PlaceService $placeService) {
        $this->placeService = $placeService;
    }

    public function index(Request $request) {
        $title = 'Places';
        $places = Place::paginate(2);

        if ($search = $request->query('search')) {
            $places = Place::where('name', 'like', '%' . $search . '%')
                ->orWhere('summary', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->paginate(count(Place::all()));
        }
        return view('admin.places.index', compact('places', 'title'));
    }

    public function create() {
        $title = 'Place';
        $categories = Category::all();
        return view('admin.places.create', compact('categories', 'title'));
    }
    public function store(PlaceAddRequest $request) {
        try {
            $this->placeService->add($request);
            return redirect()->back()->with('success', 'Success created place');
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
