@extends('layouts.admin')

@section('title', 'Support Tickets')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Support Tickets</h1>
        <a href="{{ route('admin.support-tickets.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Ticket</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Ticket #</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Assigned</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $ticket->ticket_number }}</td>
                        <td class="px-6 py-3">{{ $ticket->name }}</td>
                        <td class="px-6 py-3">{{ $ticket->subject }}</td>
                        <td class="px-6 py-3">{{ $ticket->status }}</td>
                        <td class="px-6 py-3">{{ $ticket->assignee?->name ?? '-' }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.support-tickets.edit', $ticket) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.support-tickets.destroy', $ticket) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No tickets found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $tickets->links() }}</div>
@endsection
