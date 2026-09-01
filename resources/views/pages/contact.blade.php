@extends('layouts.public')

@section('title', 'Contact Us - Aetherian Cargo')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-8">Contact Us</h1>
        <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-2xl">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Phone</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Subject</label>
                <input type="text" name="subject" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Message</label>
                <textarea name="message" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
            </div>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Send Message</button>
        </form>
    </div>
@endsection
