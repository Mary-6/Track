@extends('layouts.admin')

@section('title', 'Shipment Details')

@section('content')
    <div class="bg-white p-6 rounded shadow mb-6">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold">{{ $shipment->tracking_number }}</h2>
                <div class="mt-2"><span class="px-3 py-1 rounded bg-blue-100 text-blue-800 text-sm font-bold">{{ $shipment->status }}</span></div>
            </div>
            <a href="{{ route('admin.shipments.edit', $shipment) }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 text-sm">
            <div>
                <h3 class="font-bold mb-2">Sender</h3>
                <p><strong>Name:</strong> {{ $shipment->sender_name }}</p>
                <p><strong>Email:</strong> {{ $shipment->sender_email ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $shipment->sender_phone ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $shipment->sender_address ?? 'N/A' }}</p>
                <p><strong>Country:</strong> {{ $shipment->sender_country ?? 'N/A' }}</p>
            </div>
            <div>
                <h3 class="font-bold mb-2">Recipient</h3>
                <p><strong>Name:</strong> {{ $shipment->recipient_name }}</p>
                <p><strong>Email:</strong> {{ $shipment->recipient_email ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $shipment->recipient_phone ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $shipment->recipient_address ?? 'N/A' }}</p>
                <p><strong>Country:</strong> {{ $shipment->recipient_country ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="mt-6 text-sm">
            <h3 class="font-bold mb-2">Shipment Info</h3>
            <p><strong>Origin:</strong> {{ $shipment->origin ?? 'N/A' }} &rarr; <strong>Destination:</strong> {{ $shipment->destination ?? 'N/A' }}</p>
            <p><strong>Service:</strong> {{ $shipment->service }} | <strong>Weight:</strong> {{ $shipment->weight ?? 'N/A' }} | <strong>Dimensions:</strong> {{ $shipment->dimensions ?? 'N/A' }}</p>
            <p><strong>Declared Value:</strong> {{ $shipment->declared_value ?? 'N/A' }} | <strong>Shipping Cost:</strong> {{ $shipment->shipping_cost ?? 'N/A' }} | <strong>Tax:</strong> {{ $shipment->tax ?? 'N/A' }} | <strong>Total:</strong> {{ $shipment->total_cost ?? 'N/A' }}</p>
            <p><strong>Payment Status:</strong> {{ $shipment->payment_status }}</p>
            <p><strong>Branch:</strong> {{ $shipment->branch?->name ?? 'N/A' }} | <strong>Driver:</strong> {{ $shipment->driver?->name ?? 'N/A' }}</p>
            <p><strong>Notes:</strong> {{ $shipment->notes ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="font-bold mb-4">Tracking History</h3>
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
@endsection
