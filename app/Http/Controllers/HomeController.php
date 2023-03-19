<?php

namespace App\Http\Controllers;

use App\Models\House;

class HomeController extends Controller
{
    public function home() {
        $houses = House::orderBy('id', 'desc')->get();
        
        return view('welcome')->with('houses', $houses);
    }

    public function house($id) {
        $house = House::find($id);
        $similar_houses = House::orderBy('id', 'desc')->get();

        return view('single-house')->with('house', $house)->with('similar_houses', $similar_houses);
    }
}
