<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                {{-- <x-image class=" rounded-2xl" src="logo.png" width="80" height="80" alt="LOGO" /> --}}

            </div>
            <div class="ml-3">
                <h1 class="text-xl font-bold text-gray-900">{{(config('app.name'))}}</h1>
            </div>
        </div>
        <nav class="hidden md:block">
            {{-- <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">About</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Contact</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Support</a> --}}
        </nav>
    </div>
</header>







{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic Management System</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="container mx-auto p-4">
            <h1 class="text-3xl font-bold text-blue-600">Welcome to Clinic Management System</h1>
            <p class="text-gray-700 mt-2">Your Laravel 9 + Vite + Tailwind setup is working!</p>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>
</html> --}}