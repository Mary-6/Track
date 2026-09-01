@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
        <p class="mt-2 text-slate-600">{{ $user->email }}</p>
        <p class="mt-1 text-sm text-slate-500">Role: {{ $user->roles->pluck('name')->join(', ') }}</p>
        <p class="mt-1 text-sm text-slate-500">Phone: {{ $user->phone ?? 'N/A' }}</p>
        <p class="mt-1 text-sm text-slate-500">Active: {{ $user->is_active ? 'Yes' : 'No' }}</p>
        <a href="{{ route('admin.users.edit', $user) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
