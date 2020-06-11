<?php

namespace App\Http\Controllers;

use App\Toilet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $toilets = Toilet::all();
        return view('admin', compact('toilets'));
    }

    public function edit($id){
        $toilet = Toilet::whereId($id)->first();
        return view('adminEdit', compact('toilet'));
    }

    public function update(Request $request, $id){
        $toilet = Toilet::whereId($id)->first();
        $input = $request->only(['name', 'street', 'house_number', 'postal_code', 'city_name', 'main_city_name', 'promotional_region', 'lat', 'long', 'product_description', 'accessibility_description']);
        if($request->is_active === "on"){
            $input['is_active'] = true;
        }else{
            $input['is_active'] = false;
        }
        $toilet->update($input);
        return redirect()->back();
    }
}
