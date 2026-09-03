@extends('layouts.public')

@section('title', 'Client Testimonials')

@section('content')
<section class="py-24 lg:py-32 bg-slate-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="text-brand-600 font-semibold uppercase tracking-widest text-sm mb-3">Client Testimonials</p>
            <h1 class="text-3xl lg:text-4xl font-bold text-navy">What our clients say about us</h1>
        </div>

        @php
            $testimonials = [
                ['name' => 'Marcus Bennett', 'role' => 'Supply Chain Director, Apex Retail', 'quote' => 'Aetherian Cargo gives us end-to-end visibility on every shipment. Their team is proactive, and our inbound freight has been on time for three straight quarters.', 'rating' => 4.5, 'image' => asset('images/avatar-james.jpg')],
                ['name' => 'Linda Carter', 'role' => 'Operations Lead, FreshMart', 'quote' => 'From perishables to bulk orders, Aetherian Cargo handles our deliveries with care. The real-time tracking and quick support make a real difference during peak season.', 'rating' => 4, 'image' => asset('images/avatar-sarah.jpg')],
                ['name' => 'David Chen', 'role' => 'Founder, Urban Tech Gear', 'quote' => 'We ship electronics globally and need a partner we can trust. Aetherian Cargo delivers consistent service, clear customs handling, and dependable last-mile delivery.', 'rating' => 4.5, 'image' => asset('images/avatar-michael.jpg')],
                ['name' => 'Sofia Rivera', 'role' => 'Logistics Manager, Horizon Imports', 'quote' => 'Switching to Aetherian Cargo reduced our transit delays and improved our customer feedback. Their ocean freight and warehousing options fit our business perfectly.', 'rating' => 4, 'image' => asset('images/avatar-emily.jpg')],
            ];
        @endphp

        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($testimonials as $t)
                <div class="bg-white rounded-2xl border border-slate-200 p-8 relative">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex text-yellow-400 text-lg">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($t['rating']))
                                    ★
                                @elseif ($i - 0.5 <= $t['rating'])
                                    ☆
                                @else
                                    <span class="text-slate-300">★</span>
                                @endif
                            @endfor
                        </div>
                        <img src="{{ $t['image'] }}" alt="{{ $t['name'] }}" class="w-14 h-14 rounded-full object-cover border-2 border-slate-100">
                    </div>
                    <p class="text-slate-700 leading-relaxed mb-8">&ldquo;{{ $t['quote'] }}&rdquo;</p>
                    <div>
                        <p class="font-bold text-slate-900">{{ $t['name'] }}</p>
                        <p class="text-slate-500 text-sm">{{ $t['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
