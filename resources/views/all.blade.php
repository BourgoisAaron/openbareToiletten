@extends('layouts.app')

@section('content')
    <div class="container-fluid my-auto">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="card-title">All toilets</h1>
                    </div>

                    <div class="card-body row">
                        <div class="col-10 offset-1">
                            <div class="d-sm-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mx-2 mb-4" href="{{route('sort', "rating")}}">Sort by overall rating</a>
                                <a class="btn btn-primary btn-sm mx-2 mb-4" href="{{route('sort', "cleanliness")}}">Sort by cleanliness</a>
                                <a class="btn btn-primary btn-sm mx-2 mb-4" href="{{route('sort', "accessible")}}">Sort by accessibility</a>
                            </div>
                            <ul class="list-group">
                                @foreach($sorted as $toilet)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <a class="text-dark" href="{{route('detail', $toilet->id)}}">{{$toilet->name}}</a>
                                            </div>
                                            <div class="col-lg-5 d-flex flex-column justify-content-end">
                                                <div class="d-flex justify-content-lg-end align-items-center">
                                                    <p class="font-weight-bold mr-1 mb-0">Cleanliness:</p>
                                                    @for($i=0;$i<$toilet->cleanliness;$i++)
                                                        <i class="text-warning fa fa-star"></i>
                                                    @endfor
                                                    @for($i=0;$i<(5-$toilet->cleanliness);$i++)
                                                        <i class="fal fa-star {{$toilet->cleanliness === null ? "text-secondary opacity-5" : "text-warning"}}"></i>
                                                    @endfor
                                                </div>
                                                <div class="d-flex justify-content-lg-end align-items-center">
                                                    <p class="font-weight-bold mr-1 mb-0">Accessible:</p>
                                                    @for($i=0;$i<$toilet->accessible;$i++)
                                                        <i class="text-warning fa fa-star"></i>
                                                    @endfor
                                                    @for($i=0;$i<(5-$toilet->accessible);$i++)
                                                        <i class="fal fa-star {{$toilet->accessible === null ? "text-secondary opacity-5" : "text-warning"}}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
