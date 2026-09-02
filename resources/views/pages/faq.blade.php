@extends('layouts.public')

@section('title', 'FAQ - Aetherian Cargo')

@section('content')
    <x-page-banner title="Frequently Asked Questions" breadcrumb="FAQ" image="{{ asset('images/plane.jpg') }}" />

    <section class="py-24 bg-[#F5F5F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @php
                    $faqs = [
                        ['q' => 'How do I track my shipment?', 'a' => 'Enter your tracking number on the Track page to see live status, location, and shipment history.'],
                        ['q' => 'How long does delivery take?', 'a' => 'Air freight is typically 3-7 business days, ocean freight 2-6 weeks, and road transport depends on the route.'],
                        ['q' => 'Do you ship internationally?', 'a' => 'Yes, we handle imports and exports across most countries and provide customs support.'],
                        ['q' => 'How can I contact support?', 'a' => 'Use the Contact page, call 1-800-AETHER, or email support@aetheriancargo.com.'],
                        ['q' => 'What happens if my shipment is delayed?', 'a' => 'We update tracking events in real time. If a delay occurs, our operations team will reach out with the new expected timeline.'],
                    ];
                @endphp
                @foreach ($faqs as $f)
                    <div class="bg-white p-6 rounded-[20px] shadow-sm border border-slate-200">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $f['q'] }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $f['a'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
