<!DOCTYPE html>
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
</html>