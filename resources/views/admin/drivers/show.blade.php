@extends('layouts.admin')

@section('title', 'Driver Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $driver->name }}</h2>
        <p class="mt-2 text-slate-600">Email: {{ $driver->email ?? 'N/A' }} | Phone: {{ $driver->phone ?? 'N/A' }}</p>
        <p class="mt-1 text-sm text-slate-500">License: {{ $driver->license_number ?? 'N/A' }} | Branch: {{ $driver->branch?->name ?? 'None' }}</p>
        <a href="{{ route('admin.drivers.edit', $driver) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
