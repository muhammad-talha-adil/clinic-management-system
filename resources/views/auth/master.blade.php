<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')

        <!-- jQuery (for simplicity, using CDN here) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script> 
        const baseUrl = {{env('BASE_URL')}}
        const ApiUrl = {{env('API_URL')}}
        const AssetUrl = {{env('ASSET_URL')}}
    </script>
</head>
<body class="antialiased">

    <!-- Full-page flex column wrapper -->
    <div class="min-h-screen flex flex-col bg-gray-50">

        <!-- Header -->
        @include('auth.header')

        <!-- Main content grows to fill remaining space -->
        <main class="flex-grow flex">
            @yield('login')
        </main>

        <!-- Footer sticks to bottom -->
        @include('auth.footer')
    </div>

    @vite('resources/js/app.js')
    @yield('page_level_scripts')
</body>
</html>
