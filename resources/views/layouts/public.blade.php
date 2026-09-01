<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800">
    <header class="bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold">Aetherian Cargo</a>
            <nav class="space-x-4 text-sm">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('track') }}" class="hover:underline">Track</a>
                <a href="{{ route('services') }}" class="hover:underline">Services</a>
                <a href="{{ route('about') }}" class="hover:underline">About</a>
                <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
                <a href="{{ route('faq') }}" class="hover:underline">FAQ</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin</a>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 max-w-7xl mx-auto rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-300 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h4 class="font-bold text-white">Aetherian Cargo</h4>
                <p class="text-sm mt-2">Global logistics and freight services.</p>
            </div>
            <div>
                <h4 class="font-bold text-white">Quick links</h4>
                <ul class="text-sm mt-2 space-y-1">
                    <li><a href="{{ route('terms') }}" class="hover:underline">Terms of Service</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="{{ route('cookies') }}" class="hover:underline">Cookie Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white">Contact</h4>
                <p class="text-sm mt-2">support@aetheriancargo.com</p>
            </div>
        </div>
        <div class="text-center text-xs mt-8">&copy; {{ date('Y') }} Aetherian Cargo. All rights reserved.</div>
    </footer>
</body>
</html>
