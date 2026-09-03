@extends('layouts.admin')

@section('title', 'Live Chat')

@section('content')
    <div class="bg-white rounded shadow">
        <div class="px-6 py-4 border-b font-bold">Chat Rooms</div>
        <div class="divide-y">
            @forelse ($rooms as $room)
                <a href="{{ route('admin.chat.show', $room) }}" class="block px-6 py-4 hover:bg-slate-50 flex items-center justify-between">
                    <div>
                        <p class="font-semibold">{{ $room->guest_name ?: 'Guest' }}</p>
                        <p class="text-sm text-slate-500">{{ $room->guest_email ?: 'No email' }}</p>
                        <p class="text-xs text-slate-400">{{ $room->last_message_at?->diffForHumans() ?? 'No messages' }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs rounded {{ $room->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($room->status) }}</span>
                </a>
            @empty
                <div class="px-6 py-8 text-center text-slate-500">No chat rooms yet.</div>
            @endforelse
        </div>
    </div>
@endsection
