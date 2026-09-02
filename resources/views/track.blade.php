@extends('layouts.public')

@section('title', 'Track Shipment - Aetherian Cargo')

@section('content')
    @php
        $number = request('number') ?: ($shipment?->tracking_number ?? '');
    @endphp

    {{-- Page banner --}}
    <section class="relative overflow-hidden rounded-[20px] mx-4 sm:mx-6 lg:mx-8 mt-4">
        <div class="absolute inset-0">
            <img src="{{ asset('images/truck.jpg') }}" alt="Logistics banner" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-navy/80"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6 py-24 lg:py-32">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-3">Track Shipment</h1>
            <nav class="text-sm text-slate-300">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span class="mx-2">/</span>
                <span class="text-white">Track Shipment</span>
            </nav>
        </div>
    </section>

    {{-- Track form --}}
    <section class="py-16 lg:py-24 bg-[#F5F5F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <p class="text-brand-600 font-semibold uppercase tracking-widest text-sm mb-3">Track & Trace</p>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 mb-4">Track your shipment</h2>
                <p class="text-slate-600">Enter your tracking id below to get live updates on your cargo.</p>
            </div>

            <form action="{{ route('track') }}" method="GET" class="max-w-xl mx-auto flex flex-col sm:flex-row gap-3 bg-white p-2 rounded-2xl shadow-lg border border-slate-200 print:hidden">
                <div class="flex-1 relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>
                    <input type="text" name="number" placeholder="Enter your tracking id (e.g. AC...)" value="{{ $number }}"
                        class="w-full pl-12 pr-4 py-4 rounded-xl bg-slate-50 text-slate-900 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-500" required>
                </div>
                <button type="submit" class="px-8 py-4 bg-brand-600 text-white font-semibold rounded-xl hover:bg-brand-700 transition-colors whitespace-nowrap">Track</button>
            </form>

            @if ($number || $shipment)
                <div class="mt-10">
                    @if ($shipment)
                        <div class="bg-white rounded-none sm:rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-10 print:shadow-none print:border-0">
                            <div class="flex flex-col items-center border-b border-slate-200 pb-6 mb-6">
                                <img src="{{ asset('logo.png') }}" alt="Aetherian Cargo" class="w-32 h-32 object-contain mb-4">
                                <h2 class="text-2xl font-bold text-brand-600 text-center">Aetherian Cargo</h2>
                                <p class="text-sm text-slate-500 tracking-wider text-center uppercase">International Freight</p>
                                <div class="mt-4 px-4 py-2 bg-slate-100 rounded-lg font-mono text-lg font-semibold text-slate-900">{{ $shipment->tracking_number }}</div>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between gap-6 mb-8">
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-slate-700 border-b border-slate-400 pb-1 mb-4">Shipper Information</h4>
                                    <div class="space-y-1 text-slate-600">
                                        <p class="font-semibold text-slate-900">{{ $shipment->sender_name }}</p>
                                        <p>{{ $shipment->sender_address ?? 'N/A' }}</p>
                                        <p>{{ collect([$shipment->origin, $shipment->sender_country])->filter()->implode(', ') ?: 'N/A' }}</p>
                                        @if ($shipment->sender_phone)<p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-slate-400"></i> {{ $shipment->sender_phone }}</p>@endif
                                        @if ($shipment->sender_email)<p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i> {{ $shipment->sender_email }}</p>@endif
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-bold text-slate-700 border-b border-slate-400 pb-1 mb-4">Receiver Information</h4>
                                    <div class="space-y-1 text-slate-600">
                                        <p class="font-semibold text-slate-900">{{ $shipment->recipient_name }}</p>
                                        <p>{{ $shipment->recipient_address ?? 'N/A' }}</p>
                                        <p>{{ collect([$shipment->destination, $shipment->recipient_country])->filter()->implode(', ') ?: 'N/A' }}</p>
                                        @if ($shipment->recipient_phone)<p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-slate-400"></i> {{ $shipment->recipient_phone }}</p>@endif
                                        @if ($shipment->recipient_email)<p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i> {{ $shipment->recipient_email }}</p>@endif
                                    </div>
                                </div>
                            </div>

                            <div class="bg-slate-400 text-white text-center py-3 uppercase tracking-widest text-sm font-semibold my-6">
                                Shipment Status: {{ ucwords(str_replace(['_', '-'], ' ', $shipment->status)) }}
                            </div>

                            <div class="mb-8">
                                <h4 class="text-lg font-bold text-slate-700 border-b border-slate-400 pb-1 mb-4">Shipment Information</h4>
                                <div class="grid sm:grid-cols-2 gap-4 text-sm">
                                    <div><p class="font-bold text-slate-700">Origin</p><p class="text-slate-600">{{ $shipment->origin ?? 'N/A' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Destination</p><p class="text-slate-600">{{ $shipment->destination ?? 'N/A' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Service</p><p class="text-slate-600">{{ $shipment->service ? ucwords(str_replace(['_', '-'], ' ', $shipment->service)) : '-' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Status</p><p class="text-slate-600">{{ ucwords(str_replace(['_', '-'], ' ', $shipment->status)) }}</p></div>
                                    <div><p class="font-bold text-slate-700">Weight</p><p class="text-slate-600">{{ $shipment->weight ? $shipment->weight.' kg' : '-' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Dimensions</p><p class="text-slate-600">{{ $shipment->dimensions ?: '-' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Payment Status</p><p class="text-slate-600">{{ $shipment->payment_status ? ucwords($shipment->payment_status) : '-' }}</p></div>
                                    <div><p class="font-bold text-slate-700">Total Cost</p><p class="text-slate-600">{{ $shipment->total_cost ? '$'.number_format($shipment->total_cost, 2) : '-' }}</p></div>
                                    @if ($shipment->shipped_at)
                                        <div><p class="font-bold text-slate-700">Shipped At</p><p class="text-slate-600">{{ $shipment->shipped_at->format('M d, Y H:i') }}</p></div>
                                    @endif
                                    @if ($shipment->delivered_at)
                                        <div><p class="font-bold text-slate-700">Delivered At</p><p class="text-slate-600">{{ $shipment->delivered_at->format('M d, Y H:i') }}</p></div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-8">
                                <h4 class="text-lg font-bold text-slate-700 border-b border-slate-400 pb-1 mb-4">Shipment History</h4>
                                <div class="overflow-x-auto border border-slate-200 rounded-lg">
                                    <table class="w-full text-sm text-left">
                                        <thead class="bg-slate-50 text-slate-700 border-b border-slate-200">
                                            <tr>
                                                <th class="p-3 font-semibold">Date</th>
                                                <th class="p-3 font-semibold">Time</th>
                                                <th class="p-3 font-semibold">Location</th>
                                                <th class="p-3 font-semibold">Status</th>
                                                <th class="p-3 font-semibold">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($shipment->events as $event)
                                                <tr class="border-b border-slate-100">
                                                    <td class="p-3 whitespace-nowrap">{{ $event->occurred_at->format('M d, Y') }}</td>
                                                    <td class="p-3 whitespace-nowrap">{{ $event->occurred_at->format('H:i') }}</td>
                                                    <td class="p-3">{{ $event->location ?: '-' }}</td>
                                                    <td class="p-3">{{ ucwords(str_replace(['_', '-'], ' ', $event->status)) }}</td>
                                                    <td class="p-3">{{ $event->description ?: '-' }}</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="5" class="p-3 text-slate-500">No events yet.</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="flex justify-end print:hidden">
                                <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-accent-500 text-white rounded-lg hover:bg-accent-600 transition-colors">
                                    <i data-lucide="printer" class="w-4 h-4"></i> Print Shipment
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="mt-8 p-6 bg-red-50 text-red-700 rounded-2xl border border-red-100 text-center print:hidden">
                            No shipment found for <strong>{{ $number }}</strong>.
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endsection
