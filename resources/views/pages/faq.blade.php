@extends('layouts.public')

@section('title', 'FAQ - Aetherian Cargo')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-8">Frequently Asked Questions</h1>
        <div class="space-y-6">
            <div>
                <h2 class="font-bold text-lg">How do I track my shipment?</h2>
                <p class="text-slate-600 text-sm mt-1">Enter your tracking number on the Track page to see live status and history.</p>
            </div>
            <div>
                <h2 class="font-bold text-lg">How long does delivery take?</h2>
                <p class="text-slate-600 text-sm mt-1">Air freight is typically 3-7 business days, ocean freight 2-6 weeks, and road transport depends on the route.</p>
            </div>
            <div>
                <h2 class="font-bold text-lg">Do you ship internationally?</h2>
                <p class="text-slate-600 text-sm mt-1">Yes, we handle imports and exports across most countries.</p>
            </div>
            <div>
                <h2 class="font-bold text-lg">How can I contact support?</h2>
                <p class="text-slate-600 text-sm mt-1">Use the Contact page or email support@aetheriancargo.com.</p>
            </div>
        </div>
    </div>
@endsection
