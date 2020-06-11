@extends('layouts.app')

@section('content')
    <div class="container-fluid my-auto">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="card-title">Add public toilet</h1>
                    </div>

                    <div class="card-body row">
                        <div class="col-10 offset-1">
                            <form method="POST" action="{{action('AdminController@update', $toilet->id)}}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name toilet</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$toilet->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="lat">Latitude</label>
                                            <input type="number" class="form-control" name="lat" id="lat" step="any" value="{{$toilet->lat}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="long">Longitude</label>
                                            <input type="number" class="form-control" name="long" id="long" step="any" value="{{$toilet->long}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_description">Toilet description</label>
                                            <textarea class="form-control" id="product_description" name="product_description" rows="3">{{$toilet->product_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="accessibility_description">Accessibility description</label>
                                            <textarea class="form-control" id="accessibility_description" name="accessibility_description" rows="3" >{{$toilet->accessibility_description}}</textarea>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="is_active" name="ist_active" {{$toilet->is_active ? "checked" : ""}}>
                                            <label class="form-check-label" for="is_active">active</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" id="street" value="{{$toilet->street}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="house_number">House number</label>
                                            <input type="number" class="form-control" name="house_number" id="house_number" value="{{$toilet->house_number}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Postal code</label>
                                            <input type="number" class="form-control" name="postal_code" id="postal_code" value="{{$toilet->postal_code}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="city_name">City</label>
                                            <input type="text" class="form-control" name="city_name" id="city_name" value="{{$toilet->city_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="main_city_name">Main city</label>
                                            <input type="text" class="form-control" name="main_city_name" id="main_city_name" value="{{$toilet->main_city_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="promotional_region">Promotional region</label>
                                            <input type="text" class="form-control" name="promotional_region" id="promotional_region" value="{{$toilet->promotional_region}}">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
