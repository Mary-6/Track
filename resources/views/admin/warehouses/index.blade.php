@extends('layouts.admin')

@section('title', 'Warehouses')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Warehouses</h1>
        <a href="{{ route('admin.warehouses.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Warehouse</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Code</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Branch</th>
                    <th class="px-6 py-3">City</th>
                    <th class="px-6 py-3">Active</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($warehouses as $warehouse)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $warehouse->code }}</td>
                        <td class="px-6 py-3">{{ $warehouse->name }}</td>
                        <td class="px-6 py-3">{{ $warehouse->branch?->name ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $warehouse->city ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $warehouse->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.warehouses.edit', $warehouse) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.warehouses.destroy', $warehouse) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No warehouses found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $warehouses->links() }}</div>
@endsection
