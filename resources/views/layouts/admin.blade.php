<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - Aetherian Cargo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0">
            <div class="p-4 font-bold text-lg">Aetherian Cargo</div>
            <nav class="space-y-1 px-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Dashboard</a>
                <a href="{{ route('admin.shipments.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Shipments</a>
                <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Users</a>
                <a href="{{ route('admin.roles.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Roles</a>
                <a href="{{ route('admin.branches.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Branches</a>
                <a href="{{ route('admin.warehouses.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Warehouses</a>
                <a href="{{ route('admin.drivers.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Drivers</a>
                <a href="{{ route('admin.vehicles.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Vehicles</a>
                <a href="{{ route('admin.support-tickets.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Support Tickets</a>
                <a href="{{ route('admin.contact-messages.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Contact Messages</a>
                <a href="{{ route('admin.settings.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Settings</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h2 class="font-semibold text-xl">@yield('title')</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-slate-600">{{ auth()->user()->name }}</span>
                    <a href="{{ route('home') }}" class="text-sm text-blue-600 hover:underline">View site</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            </header>

            <main class="p-6 flex-1">
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
