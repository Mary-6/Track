@extends('layouts.admin')

@section('title', 'Role Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $role->name }}</h2>
        <p class="mt-2 text-slate-600">Permissions: {{ $role->permissions->pluck('name')->join(', ') ?: 'None' }}</p>
        <a href="{{ route('admin.roles.edit', $role) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
