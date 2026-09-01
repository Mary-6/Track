@extends('layouts.admin')

@section('title', 'Vehicles')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Vehicles</h1>
        <a href="{{ route('admin.vehicles.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Vehicle</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Registration</th>
                    <th class="px-6 py-3">Make/Model</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Branch</th>
                    <th class="px-6 py-3">Driver</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicles as $vehicle)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $vehicle->registration }}</td>
                        <td class="px-6 py-3">{{ $vehicle->make }} {{ $vehicle->model }}</td>
                        <td class="px-6 py-3">{{ $vehicle->type ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $vehicle->branch?->name ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $vehicle->driver?->name ?? '-' }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.vehicles.destroy', $vehicle) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No vehicles found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $vehicles->links() }}</div>
@endsection
