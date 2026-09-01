@extends('layouts.public')

@section('title', 'Services - Aetherian Cargo')

@section('content')
    <div class="max-w-5xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-8 text-center">Our Services</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Air Freight</h2>
                <p class="text-sm text-slate-600">Express air cargo for urgent deliveries worldwide.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Ocean Freight</h2>
                <p class="text-sm text-slate-600">Full and partial container shipping by sea.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Road Transport</h2>
                <p class="text-sm text-slate-600">Door-to-door ground delivery and distribution.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Warehousing</h2>
                <p class="text-sm text-slate-600">Secure storage and inventory management.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Customs Clearance</h2>
                <p class="text-sm text-slate-600">Documentation and customs support.</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h2 class="font-bold text-xl mb-2">Tracking</h2>
                <p class="text-sm text-slate-600">Real-time shipment tracking from pickup to delivery.</p>
            </div>
        </div>
    </div>
@endsection
