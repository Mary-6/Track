@extends('layouts.public')

@section('title', 'Track Shipment - Aetherian Cargo')

@section('content')
    @php
        $number = request('number') ?: ($shipment?->tracking_number ?? '');
    @endphp

    <section class="bg-blue-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold mb-4">Track Your Shipment</h1>
            <form action="{{ route('track') }}" method="GET" class="flex">
                <input type="text" name="number" placeholder="Tracking number" value="{{ $number }}" class="flex-1 px-4 py-3 text-slate-900 rounded-l" required>
                <button type="submit" class="bg-orange-500 px-6 py-3 rounded-r font-bold hover:bg-orange-600">Track</button>
            </form>
        </div>
    </section>

    <section class="py-12 max-w-4xl mx-auto px-4">
        @if ($number || $shipment)
            @if ($shipment)
                <div class="bg-white p-6 rounded shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Tracking #{{ $shipment->tracking_number }}</h2>
                        <span class="px-3 py-1 rounded bg-blue-100 text-blue-800 text-sm font-bold">{{ $shipment->status }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                        <div><strong>Sender:</strong> {{ $shipment->sender_name }}</div>
                        <div><strong>Recipient:</strong> {{ $shipment->recipient_name }}</div>
                        <div><strong>Origin:</strong> {{ $shipment->origin ?? 'N/A' }}</div>
                        <div><strong>Destination:</strong> {{ $shipment->destination ?? 'N/A' }}</div>
                    </div>

                    <h3 class="font-bold mb-2">Shipment History</h3>
                    <ul class="border-l-2 border-blue-200 pl-4 space-y-4">
                        @forelse ($shipment->events as $event)
                            <li>
                                <div class="text-sm text-slate-500">{{ $event->occurred_at->format('M d, Y H:i') }}</div>
                                <div class="font-semibold">{{ $event->status }}</div>
                                <div class="text-sm">{{ $event->description }} @if($event->location)<span class="text-slate-500">- {{ $event->location }}</span>@endif</div>
                            </li>
                        @empty
                            <li>No events yet.</li>
                        @endforelse
                    </ul>
                </div>
            @else
                <div class="bg-red-50 text-red-800 p-6 rounded">
                    No shipment found for <strong>{{ $number }}</strong>.
                </div>
            @endif
        @endif
    </section>
@endsection
