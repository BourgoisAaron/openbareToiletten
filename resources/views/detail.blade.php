@extends('layouts.app')

@section('content')
    <div class="container-fluid my-auto">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="card-title">{{$toilet->name}}</h1>
                    </div>

                    <div class="card-body row">
                        <div class="col-10 offset-1">
                            <p class="card-title"><span
                                    class="font-weight-bold">Address:</span> {{$toilet->city_name}} {{$toilet->postal_code}} {{$toilet->street}} {{$toilet->house_number}}
                            </p>
                            <p><span class="font-weight-bold">Description:</span> {{$toilet->product_description}}</p>
                            <div class="d-sm-flex justify-content-between">
                                <div>
                                    <p>
                                        <span class="font-weight-bold mr-3">Cleanliness:</span>
                                        @for($i=0;$i<round($reviews->avg('cleanliness'));$i++)
                                            <i class="text-warning fa fa-star"></i>
                                        @endfor
                                        @for($i=0;$i<(5-round($reviews->avg('cleanliness')));$i++)
                                            <i class="fal fa-star {{$reviews->first() ? "text-warning" : "text-secondary opacity-5"}}"></i>
                                        @endfor
                                    </p>
                                    <p>
                                        <span class="font-weight-bold mr-3">Accessible:</span>
                                        @for($i=0;$i<round($reviews->avg('accessible'));$i++)
                                            <i class="text-warning fa fa-star"></i>
                                        @endfor
                                        @for($i=0;$i<(5-round($reviews->avg('accessible')));$i++)
                                            <i class="fal fa-star {{$reviews->first() ? "text-warning" : "text-secondary opacity-5"}}"></i>
                                        @endfor
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#writeReview" aria-expanded="false"
                                            aria-controls="writeReview">
                                        Write Review
                                    </button>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="collapse" id="writeReview">
                                <form method="POST"
                                      action="{{action('ReviewController@save', $toilet->id)}}"
                                      class="mt-4">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="review">Review</label>
                                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                                    </div>
                                    <div class="rating d-flex flex-row-reverse justify-content-end">
                                        <input type="radio" id="star5cleanliness" name="cleanliness" value="5"/><label
                                            for="star5cleanliness"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star4cleanliness" name="cleanliness" value="4"/><label
                                            for="star4cleanliness"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star3cleanliness" name="cleanliness" value="3"/><label
                                            for="star3cleanliness"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star2cleanliness" name="cleanliness" value="2"/><label
                                            for="star2cleanliness"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star1cleanliness" name="cleanliness" value="1"/><label
                                            for="star1cleanliness"><i class="fa fa-star"></i></label>
                                        <p class="mr-2">Cleanliness: </p>
                                    </div>
                                    <div class="rating d-flex flex-row-reverse justify-content-end">
                                        <input type="radio" id="star5accessible" name="accessible" value="5"/><label
                                            for="star5accessible"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star4accessible" name="accessible" value="4"/><label
                                            for="star4accessible"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star3accessible" name="accessible" value="3"/><label
                                            for="star3accessible"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star2accessible" name="accessible" value="2"/><label
                                            for="star2accessible"><i class="fa fa-star"></i></label>
                                        <input type="radio" id="star1accessible" name="accessible" value="1"/><label
                                            for="star1accessible"><i class="fa fa-star"></i></label>
                                        <p class="mr-2">Accessible: </p>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            @if($reviews->isNotEmpty())
                                <p class="font-weight-bold mt-2">Reviews:</p>
                            @endif
                            @foreach($reviews as $review)
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-1">
                                                <p><strong>{{$review->name}}</strong></p>
                                                <p>{{$review->review}}</p>
                                            </div>
                                            <div class="col-md-4 d-flex flex-column justify-content-center">
                                                <div class="d-flex justify-content-end">
                                                    <p class="font-weight-bold mr-3">Cleanliness:</p>
                                                    @for($i=0;$i<$review->cleanliness;$i++)
                                                        <span><i class="text-warning fa fa-star"></i></span>
                                                    @endfor
                                                    @for($i=0;$i<(5-$review->cleanliness);$i++)
                                                        <span><i class="fal fa-star text-warning"></i></span>
                                                    @endfor
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <p class="font-weight-bold mr-3">Accessible:</p>
                                                    @for($i=0;$i<$review->accessible;$i++)
                                                        <span><i class="text-warning fa fa-star"></i></span>
                                                    @endfor
                                                    @for($i=0;$i<(5-$review->accessible);$i++)
                                                        <span><i class="fal fa-star text-warning"></i></span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
