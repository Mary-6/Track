@extends('layouts.admin')

@section('title', 'Ticket Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $supportTicket->ticket_number }}</h2>
        <div class="mt-2"><span class="px-3 py-1 rounded bg-blue-100 text-blue-800 text-sm font-bold">{{ $supportTicket->status }}</span></div>
        <p class="mt-4"><strong>From:</strong> {{ $supportTicket->name }} ({{ $supportTicket->email }})</p>
        <p><strong>Subject:</strong> {{ $supportTicket->subject }}</p>
        <p class="mt-4">{{ $supportTicket->message }}</p>
        <p class="mt-4 text-sm text-slate-500">Assigned: {{ $supportTicket->assignee?->name ?? 'Unassigned' }}</p>
        <a href="{{ route('admin.support-tickets.edit', $supportTicket) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
