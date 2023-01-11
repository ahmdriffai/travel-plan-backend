<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('home');
    }

    public function placeDetail($id) {
        $place = Place::find($id);
        return view('place-detail', compact('place'));
    }

}
