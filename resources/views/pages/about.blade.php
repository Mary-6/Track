@extends('layouts.public')

@section('title', 'About Us - Aetherian Cargo')

@section('content')
    <x-page-banner title="About Us" breadcrumb="About Us" image="{{ asset('images/warehouse.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="rounded-[20px] overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/plane.jpg') }}" alt="Air cargo" class="w-full h-auto object-cover">
                </div>
                <div>
                    <p class="text-brand-600 font-semibold uppercase tracking-widest text-sm mb-3">Who We Are</p>
                    <h2 class="text-3xl lg:text-5xl font-bold text-slate-900 mb-6 leading-tight">Global logistics made personal</h2>
                    <p class="text-slate-600 text-lg mb-6 leading-relaxed">
                        Aetherian Cargo is a global freight company built on speed, transparency, and trust. Since 2017 we have moved everything from perishables to industrial equipment across air, ocean, and road networks.
                    </p>
                    <p class="text-slate-600 leading-relaxed mb-8">
                        Our team combines deep logistics experience with real-time tracking technology so every shipment is visible from pickup to delivery. We believe shipping should feel simple, even when the route is complex.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 text-white font-semibold rounded-full hover:bg-brand-700 transition-colors">
                        Get in touch
                        <span class="w-7 h-7 rounded-full bg-white/20 flex items-center justify-center">
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
