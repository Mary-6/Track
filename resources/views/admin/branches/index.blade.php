@extends('layouts.admin')

@section('title', 'Branches')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Branches</h1>
        <a href="{{ route('admin.branches.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Branch</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Code</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">City</th>
                    <th class="px-6 py-3">Country</th>
                    <th class="px-6 py-3">Active</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($branches as $branch)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $branch->code }}</td>
                        <td class="px-6 py-3">{{ $branch->name }}</td>
                        <td class="px-6 py-3">{{ $branch->city ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $branch->country ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $branch->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.branches.edit', $branch) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center">No branches found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $branches->links() }}</div>
@endsection
