<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToiletRequest;
use App\Review;
use App\Toilet;
use App\Traits\LocationTrait;
use Illuminate\Http\Request;

class ToilettenController extends Controller
{
    //
    use LocationTrait;

    public function index()
    {
        return view('index');
    }

    public function calculate($lon, $lat)
    {
//        $toilets = $this->toilets();
        $toilets = Toilet::active()->get();

        foreach ($toilets as $toilet) {
            $latToilet = (float)$toilet->lat;
            $lonToilet = (float)$toilet->long;
            $toilet->distance = $this->distance($lon, $lat, $lonToilet, $latToilet);
            $reviews = $toilet->reviews;
            $toilet->rating = $reviews->first() ? round(($reviews->avg('cleanliness') + $reviews->avg('accessible')) / 2) : null;
        }

//        $sorted = collect($toilets)->sortBy('distance')->values()->slice(0,5);
        $sorted = $toilets->sortBy('distance')->values()->slice(0, 5);
        return response($sorted);
    }

    public function detail($id)
    {
//        $toilets = $this->toilets();
//        $toilet = collect($toilets)->where('business_product_id', '=', $id)->first();

        $toilet = Toilet::active()->where('id', '=', $id)->first();
        $reviews = $toilet->reviews;
        return view('detail', compact('toilet', 'reviews'));
    }

    public function sort($column)
    {
//        $toilets = $this->toilets();
        $toilets = Toilet::active()->get();

        foreach ($toilets as $toilet) {
            $reviews = $toilet->reviews;
            $toilet->cleanliness = $reviews->first() ? round($reviews->avg('cleanliness')) : null;
            $toilet->accessible = $reviews->first() ? round($reviews->avg('accessible')) : null;
            $toilet->rating = ($toilet->cleanliness + $toilet->accessible) / 2;
        }

//        $sorted = collect($toilets)->sortByDesc($column);
        $sorted = $toilets->sortByDesc($column);
        return view('all', compact('sorted'));
    }

    public function create(){
        return view('newToilet');
    }

    public function save(ToiletRequest $request){
        $input = $request->only(['name', 'street', 'house_number', 'postal_code', 'city_name', 'main_city_name', 'promotional_region', 'lat', 'long', 'product_description', 'accessibility_description']);
        Toilet::create($input);
        return redirect('/');
    }
}
