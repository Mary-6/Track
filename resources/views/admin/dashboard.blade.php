@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['shipments'] }}</div>
            <div class="text-sm text-slate-500">Total Shipments</div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['in_transit'] }}</div>
            <div class="text-sm text-slate-500">In Transit</div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['delivered'] }}</div>
            <div class="text-sm text-slate-500">Delivered</div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['pending'] }}</div>
            <div class="text-sm text-slate-500">Pending</div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['users'] }}</div>
            <div class="text-sm text-slate-500">Users</div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['tickets'] }}</div>
            <div class="text-sm text-slate-500">Open Tickets</div>
        </div>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <div class="px-6 py-4 border-b font-bold">Recent Shipments</div>
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Tracking #</th>
                    <th class="px-6 py-3">Recipient</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentShipments as $shipment)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $shipment->tracking_number }}</td>
                        <td class="px-6 py-3">{{ $shipment->recipient_name }}</td>
                        <td class="px-6 py-3">{{ $shipment->status }}</td>
                        <td class="px-6 py-3">{{ $shipment->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-4 text-center">No shipments yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
