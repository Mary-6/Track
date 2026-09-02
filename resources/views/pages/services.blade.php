@extends('layouts.public')

@section('title', 'Services - Aetherian Cargo')

@section('content')
    <x-page-banner title="Our Services" breadcrumb="Services" image="{{ asset('images/ship.jpg') }}" />

    <section class="py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <p class="text-brand-600 font-semibold uppercase tracking-widest text-sm mb-3">What We Do</p>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900">Logistics built around your cargo</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                @php
                    $services = [
                        ['icon' => 'plane', 'title' => 'Express Air Cargo', 'text' => 'Speedy airport-to-airport and door-to-door air transport for time-sensitive freight.'],
                        ['icon' => 'truck', 'title' => 'Ground Distribution', 'text' => 'Flexible road haulage for pallets, parcels, and full truckloads across cities and borders.'],
                        ['icon' => 'ship', 'title' => 'Ocean Freight', 'text' => 'Cost-effective container shipping for bulk goods with end-to-end visibility.'],
                        ['icon' => 'warehouse', 'title' => 'Warehousing', 'text' => 'Secure storage, inventory management, and order fulfillment in modern facilities.'],
                        ['icon' => 'file-text', 'title' => 'Customs Clearance', 'text' => 'Documentation, brokerage, and regulatory support to keep cargo moving.'],
                        ['icon' => 'map-pin', 'title' => 'Tracking & Visibility', 'text' => 'Real-time shipment tracking from pickup through final delivery.'],
                    ];
                @endphp
                @foreach ($services as $service)
                    <div class="service-card group">
                        <div class="service-icon">
                            <i data-lucide="{{ $service['icon'] }}" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 mt-2">{{ $service['title'] }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $service['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
