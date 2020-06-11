@extends('layouts.app')

@section('content')
    <div class="container-fluid my-auto">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="card-title">All toilets admin</h1>
                    </div>

                    <div class="card-body row">
                        <div class="col-10 offset-1">
                            <ul class="list-group">
                                @foreach($toilets as $toilet)
                                    <li class="list-group-item {{$toilet->is_active? "bg-success" : "bg-secondary"}}">
                                        <a class="text-dark"
                                           href="{{route('adminEdit', $toilet->id)}}">{{$toilet->name}}</a>
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
