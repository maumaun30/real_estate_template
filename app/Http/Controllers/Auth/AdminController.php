<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\House;

class AdminController extends Controller
{
    public function index()
    {
        $houses = House::all();

        return view('admin.index')->with('houses', $houses);
    }

    public function media()
    {
        return view('admin.media');
    }
}
