@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
            <div class="text-3xl font-bold text-blue-900">${{ number_format($counts['revenue'], 2) }}</div>
            <div class="text-sm text-slate-500">Revenue</div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
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
        <div class="bg-white p-6 rounded shadow">
            <div class="text-3xl font-bold text-blue-900">{{ $counts['chat_rooms'] }}</div>
            <div class="text-sm text-slate-500">Open Chats</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow lg:col-span-2">
            <div class="px-6 py-4 border-b font-bold -mx-6 -mt-6 mb-4">Recent Shipments</div>
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3">Tracking #</th>
                        <th class="px-4 py-3">Recipient</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentShipments as $shipment)
                        <tr class="border-t">
                            <td class="px-4 py-3 font-mono">{{ $shipment->tracking_number }}</td>
                            <td class="px-4 py-3">{{ $shipment->recipient_name }}</td>
                            <td class="px-4 py-3"><span class="px-2 py-1 rounded text-xs font-semibold bg-slate-100">{{ $shipment->status }}</span></td>
                            <td class="px-4 py-3">{{ $shipment->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3"><a href="{{ route('admin.shipments.show', $shipment) }}" class="text-brand-600 hover:underline">View</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-6 text-center text-slate-500">No shipments yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded shadow">
                <div class="px-6 py-4 border-b font-bold -mx-6 -mt-6 mb-4">Quick Actions</div>
                <div class="space-y-2">
                    <a href="{{ route('admin.shipments.create') }}" class="block px-4 py-2 bg-navy text-white rounded hover:bg-navy/90 text-center">Create Shipment</a>
                    <a href="{{ route('admin.users.create') }}" class="block px-4 py-2 bg-slate-100 text-slate-800 rounded hover:bg-slate-200 text-center">Add User</a>
                    <a href="{{ route('admin.chat.index') }}" class="block px-4 py-2 bg-slate-100 text-slate-800 rounded hover:bg-slate-200 text-center">Live Chat</a>
                </div>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <div class="px-6 py-4 border-b font-bold -mx-6 -mt-6 mb-4">Recent Chat Rooms</div>
                <div class="divide-y">
                    @forelse ($recentChatRooms as $room)
                        <a href="{{ route('admin.chat.show', $room) }}" class="block py-3 hover:text-brand-600">
                            <p class="font-semibold text-sm">{{ $room->guest_name ?: 'Guest' }}</p>
                            <p class="text-xs text-slate-500">{{ $room->last_message_at?->diffForHumans() ?? 'No messages' }}</p>
                        </a>
                    @empty
                        <p class="text-sm text-slate-500">No chats yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
