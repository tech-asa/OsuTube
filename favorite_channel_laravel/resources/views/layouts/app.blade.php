<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>@yield('title')</title>
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    
    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    @stack('css')
</head>

<body>
        @include('layouts.header')
        
        @yield('content')
        
        @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
</body>
 
</html>