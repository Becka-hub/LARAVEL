<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.3.1/css/bootstrap.min.css') }}">
    @yield('style')
</head>

<body>
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Etudiant Crud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @if (Route::is('app_home'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ Route('app_home') }}">Home<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('app_home') }}">Home<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @endif
                        @if (Route::is('app_etudiant'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ Route('app_etudiant') }}">Etudiant</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('app_etudiant') }}">Etudiant</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>


    @yield('content')


    <script type="text/javascript " src="{{ asset('jquery/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('jquery/popper.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('jquery/jquery-3.2.1.js') }}"></script>
    <script>
    </script>
</body>

</html>
