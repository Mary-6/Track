@extends('layouts.admin')

@section('title', 'Drivers')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Drivers</h1>
        <a href="{{ route('admin.drivers.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Driver</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">License</th>
                    <th class="px-6 py-3">Branch</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drivers as $driver)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $driver->name }}</td>
                        <td class="px-6 py-3">{{ $driver->email ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $driver->phone ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $driver->license_number ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $driver->branch?->name ?? '-' }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.drivers.edit', $driver) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.drivers.destroy', $driver) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No drivers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $drivers->links() }}</div>
@endsection
