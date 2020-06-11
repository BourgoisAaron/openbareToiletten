<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function save(ReviewRequest $request, $id){

        $input = $request->only('name', 'review', 'cleanliness', 'accessible');
        $input['toilet_id'] = $id;
        Review::create($input);
        return redirect()->back();
    }

}
