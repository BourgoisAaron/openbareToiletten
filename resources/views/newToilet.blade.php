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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{action('ToilettenController@save')}}" class="mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name toilet</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="lat">Latitude</label>
                                            <input type="number" class="form-control" name="lat" id="lat" step="any">
                                        </div>
                                        <div class="form-group">
                                            <label for="long">Longitude</label>
                                            <input type="number" class="form-control" name="long" id="long" step="any">
                                        </div>
                                        <div class="form-group">
                                            <label for="product_description">Toilet description</label>
                                            <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="accessibility_description">Accessibility description</label>
                                            <textarea class="form-control" id="accessibility_description" name="accessibility_description" rows="3"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" id="street">
                                        </div>
                                        <div class="form-group">
                                            <label for="house_number">House number</label>
                                            <input type="number" class="form-control" name="house_number" id="house_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Postal code</label>
                                            <input type="number" class="form-control" name="postal_code" id="postal_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="city_name">City</label>
                                            <input type="text" class="form-control" name="city_name" id="city_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="main_city_name">Main city</label>
                                            <input type="text" class="form-control" name="main_city_name" id="main_city_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="promotional_region">Promotional region</label>
                                            <input type="text" class="form-control" name="promotional_region" id="promotional_region">
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
