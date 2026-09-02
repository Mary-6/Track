@extends('layouts.public')

@section('title', 'Services - Aetherian Cargo')

@section('content')
    <x-page-banner title="Our Services" breadcrumb="Services" />

    <section class="py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-20">
                <p class="text-accent-500 font-semibold uppercase tracking-widest text-sm mb-3">Our Services</p>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900">Comprehensive logistics solutions for your business</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                @php
                    $services = [
                        ['icon' => 'plane', 'title' => 'Express Freight Solutions', 'text' => 'Fast and secure freight forwarding for businesses that need urgent delivery worldwide.'],
                        ['icon' => 'truck', 'title' => 'Quick Move Logistics', 'text' => 'Flexible road haulage and last-mile delivery for pallets and parcels across cities.'],
                        ['icon' => 'zap', 'title' => 'Speedy Dispatch', 'text' => 'Same-day and next-day dispatch options for time-critical shipments of any size.'],
                        ['icon' => 'route', 'title' => 'Swift Supply Chain', 'text' => 'End-to-end supply chain coordination from storage to final delivery.'],
                        ['icon' => 'boxes', 'title' => 'On Point Distribution', 'text' => 'Scheduled distribution services that keep your inventory moving efficiently.'],
                        ['icon' => 'clipboard-list', 'title' => 'Freight Management', 'text' => 'Complete freight oversight including routing, tracking, and delivery confirmation.'],
                    ];
                @endphp
                @foreach ($services as $service)
                    <div class="service-card group">
                        <div class="service-icon">
                            <i data-lucide="{{ $service['icon'] }}" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 mt-2">{{ $service['title'] }}</h3>
                        <p class="text-slate-600 leading-relaxed mb-6">{{ $service['text'] }}</p>
                        <a href="{{ route('track') }}" class="inline-flex items-center gap-2 px-5 py-2.5 border border-slate-200 rounded-full text-slate-900 font-semibold hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-colors">
                            Track a shipment
                            <span class="w-7 h-7 rounded-full bg-accent-500 text-navy flex items-center justify-center group-hover:bg-white group-hover:text-brand-600 transition-colors">
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
