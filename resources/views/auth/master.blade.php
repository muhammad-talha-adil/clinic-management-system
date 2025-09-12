<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite('resources/css/app.css')
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-50">
        @include('auth.header')
        
        <main class="flex-grow">
            @yield('login')
        </main>
        
        @include('auth.footer')
    </div>
    @vite('resources/js/app.js')
    @yield('page_level_scripts')
</body>
</html>