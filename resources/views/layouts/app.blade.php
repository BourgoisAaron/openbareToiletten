<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Openbare toiletten</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="h-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-5 shadow-sm">
        <a class="navbar-brand" href="{{route('home')}}">Openbare toiletten</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sort', "rating")}}">All toilets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('newToilet')}}">Add a toilet</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="d-flex h-75">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO5YTehB_iMvsss4_jW5ym6ZfWzyxXNlE"></script>
</body>
</html>
