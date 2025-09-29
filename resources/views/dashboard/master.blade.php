<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    <div class="min-h-screen flex bg-gray-50">

        <!-- Sidebar -->
        @include('dashboard.sidebar')

        <!-- Main content area -->
        <div class="flex flex-col flex-1 min-h-screen">

            <!-- Header -->
            @include('dashboard.header')

            <!-- Page Content -->
            <main class="flex-grow p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('dashboard.footer')

        </div>
    </div>

    <!-- Load jQuery first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Load your menuItems -->
    <script src="{{ asset('js/dashboard/menu.js') }}"></script>

    <!-- Load Vite app.js last (if it doesn't need jQuery) -->
    @vite('resources/js/app.js')

    <!-- Page-level scripts -->
    @yield('page_level_scripts')


</body>

</html>