@extends('layouts.admin')

@section('title', 'Branch Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $branch->name }} ({{ $branch->code }})</h2>
        <p class="mt-2 text-slate-600">{{ $branch->address ?? 'No address' }}</p>
        <p class="mt-1 text-sm text-slate-500">{{ $branch->city }}, {{ $branch->country }}</p>
        <a href="{{ route('admin.branches.edit', $branch) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
