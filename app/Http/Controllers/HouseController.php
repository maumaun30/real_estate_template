<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\House;
use App\Models\HouseFeature;
use App\Models\HouseImage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::orderBy('id', 'desc')->paginate(5);

        return view('house.index')->with('houses', $houses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('house.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:houses',
            'price' => 'required|numeric',
            'lot_area' => 'required',
            'bedroom' => 'required',
            'restroom' => 'required',
            'window' => 'required',
            'garage' => 'required',
            'date_built' => 'required',
        ]);

        $house = House::create($request->all());

        return redirect()->route('house.show', $house->id)->with('house', $house);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $house = House::find($id);

        return view('house.show')->with('house', $house);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $house = House::find($id);

        return view('house.edit')->with('house', $house);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:houses',
            'price' => 'required|numeric',
            'lot_area' => 'required',
            'bedroom' => 'required',
            'restroom' => 'required',
            'window' => 'required',
            'garage' => 'required',
            'date_built' => 'required',
        ]);

        $house = House::find($id);
        $house->update($request->all());

        return redirect()->route('house.show', $house->id)->with('house', $house);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        House::destroy($id);

        return redirect()->route('house.index');
    }

    // STORE FEATURES

    public function storeFeature(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'house_id' => 'required'
        ]);

        HouseFeature::create($request->all());

        return redirect()->route('house.show', $request->house_id);
    }

    public function destroyFeature($id) {
        HouseFeature::destroy($id);

        return redirect()->back();
    }

    // STORE IMAGES

    public function storeImage(Request $request) {

        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'house_id' => 'required'
        ]);

        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();  
                $image->move(public_path('media'), $imageName);
  
                $images[]['name'] = $imageName;
            }
        }

        foreach ($images as $key => $image) {
            HouseImage::create([
                'name' => $image['name'],
                'house_id' => $request->house_id
            ]);
        }

        return redirect()->route('house.show', $request->house_id);
    }

    public function destroyImage($id) {
        $image = HouseImage::find($id);
        $file = public_path('media/'. $image->name);

        if(File::exists($file)) {
            File::delete($file);
        }

        HouseImage::destroy($id);

        return redirect()->back();
    }
}
