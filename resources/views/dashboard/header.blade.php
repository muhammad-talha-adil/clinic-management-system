<header class="bg-white shadow-sm h-16 flex items-center px-6 justify-between border-b border-gray-200">
    <div class="flex items-center space-x-4">
        <h1 class="text-xl font-bold text-gray-900">@yield('page_title', 'Dashboard')</h1>
    </div>
    <div class="flex items-center space-x-4">
        <div class="text-gray-600">Welcome, {{ auth()->user()->name ?? 'Admin' }}</div>
        <a href="#" id="header-logout" class="text-blue-600 hover:underline">Logout</a>
    </div>
</header>
