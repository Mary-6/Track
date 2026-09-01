@extends('layouts.admin')

@section('title', 'Message Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $contactMessage->subject ?? 'No Subject' }}</h2>
        <p class="mt-2 text-slate-600">From: {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
        <p class="text-sm text-slate-500">Phone: {{ $contactMessage->phone ?? 'N/A' }} | Received: {{ $contactMessage->created_at->format('M d, Y H:i') }}</p>
        <p class="mt-6">{{ $contactMessage->message }}</p>
        <a href="{{ route('admin.contact-messages.index') }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Back</a>
    </div>
@endsection
