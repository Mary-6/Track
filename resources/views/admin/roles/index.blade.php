@extends('layouts.admin')

@section('title', 'Roles')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Roles</h1>
        <a href="{{ route('admin.roles.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Create Role</a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Permissions</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr class="border-t">
                        <td class="px-6 py-3">{{ $role->name }}</td>
                        <td class="px-6 py-3">{{ $role->permissions->pluck('name')->join(', ') }}</td>
                        <td class="px-6 py-3 space-x-2">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-4 text-center">No roles found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $roles->links() }}</div>
@endsection
