@extends('layouts.app')

@section('content')
<div class="container-fluid my-auto">
    <div class="row my-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h1 class="card-title">Public toilets</h1>
                </div>

                <toilet></toilet>

            </div>
        </div>
    </div>
</div>
@endsection
