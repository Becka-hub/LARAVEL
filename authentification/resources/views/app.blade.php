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
    @yield('content')
    <script type="text/javascript " src="{{ asset('jquery/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('jquery/popper.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript " src="{{ asset('jquery/jquery-3.2.1.js') }}"></script>
    <script>
    </script>
</body>

</html>
