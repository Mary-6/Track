@extends('layouts.public')

@section('title', 'Aetherian Cargo - Home')

@section('content')
    <section class="bg-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Global Freight & Logistics</h1>
            <p class="text-lg mb-8">Track shipments, manage cargo, and deliver worldwide with confidence.</p>
            <form action="{{ route('track') }}" method="GET" class="max-w-2xl mx-auto flex">
                <input type="text" name="number" placeholder="Enter tracking number" class="flex-1 px-4 py-3 text-slate-900 rounded-l" required>
                <button type="submit" class="bg-orange-500 px-6 py-3 rounded-r font-bold hover:bg-orange-600">Track</button>
            </form>
        </div>
    </section>

    <section class="py-16 max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
            <div class="bg-white p-6 rounded shadow">
                <div class="text-3xl font-bold text-blue-900">{{ $shipped ?? 0 }}</div>
                <div class="text-sm text-slate-500">Shipments</div>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <div class="text-3xl font-bold text-blue-900">{{ $inTransit ?? 0 }}</div>
                <div class="text-sm text-slate-500">In Transit</div>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <div class="text-3xl font-bold text-blue-900">{{ $delivered ?? 0 }}</div>
                <div class="text-sm text-slate-500">Delivered</div>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <div class="text-3xl font-bold text-blue-900">24/7</div>
                <div class="text-sm text-slate-500">Support</div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-8">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border rounded">
                    <h3 class="font-bold text-lg mb-2">Air Freight</h3>
                    <p class="text-sm text-slate-600">Fast international air cargo solutions.</p>
                </div>
                <div class="p-6 border rounded">
                    <h3 class="font-bold text-lg mb-2">Ocean Freight</h3>
                    <p class="text-sm text-slate-600">Cost-effective sea freight for large volumes.</p>
                </div>
                <div class="p-6 border rounded">
                    <h3 class="font-bold text-lg mb-2">Road Transport</h3>
                    <p class="text-sm text-slate-600">Reliable ground delivery across regions.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
