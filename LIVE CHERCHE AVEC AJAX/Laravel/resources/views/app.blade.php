<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-4.3.1/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('style')
        <title>{{$title}}</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand text-white" href="#">Live cherche in Laravel Ajax</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
          </nav>
        @yield('content')
        <script type="text/javascript" src="{{ asset('jquery/jquery-3.3.1.slim.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jquery/popper.min.js') }} "></script>
        <script type="text/javascript" src="{{ asset('bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('jquery/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('jquery/jquery-3.2.1.js') }}"></script>
        <script src="{{ asset('jquery/jquery-3.4.1.js') }}"></script>
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('jquery/sweetalert2.all.min.js') }}"></script>
        @yield('script')
    </body>
</html>
