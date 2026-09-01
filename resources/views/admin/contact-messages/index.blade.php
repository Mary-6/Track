@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Contact Messages</h1>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Read</th>
                    <th class="px-6 py-3">Received</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $message->name }}</td>
                        <td class="px-6 py-3">{{ $message->email }}</td>
                        <td class="px-6 py-3">{{ $message->subject ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $message->is_read ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-3">{{ $message->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-blue-600 hover:underline">View</a>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No messages.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $messages->links() }}</div>
@endsection
