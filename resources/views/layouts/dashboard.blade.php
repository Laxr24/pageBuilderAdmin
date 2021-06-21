<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name').' Admin'}}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/lightbox/dist/css/lightbox.min.css') }}">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{ asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/lightbox/dist/js/lightbox.min.js')}}"></script>
</head>
<body>
    @yield('content')
    <script src="{{ asset('js/pluto.js')}}"></script>
    <script>

    </script>
</body>
</html>