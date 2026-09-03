@extends('layouts.public')

@section('title', 'Support')

@section('content')
<section class="py-20 md:py-28 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 p-6 md:p-10">
            <h1 class="text-3xl font-bold text-navy mb-2">Support</h1>
            <p class="text-slate-500 mb-8">Open a support ticket and we will get back to you as soon as possible.</p>

            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700">{{ session('success') }}</div>
            @endif

            <form action="{{ route('support.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">
                        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tracking number (optional)</label>
                        <input type="text" name="tracking_number" value="{{ old('tracking_number') }}" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" required class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">
                    @error('subject')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                    <textarea name="message" rows="5" required class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none">{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="w-full py-3.5 bg-brand-600 text-white font-semibold rounded-lg hover:bg-brand-700 transition-colors">Submit Ticket</button>
            </form>
        </div>
    </div>
</section>
@endsection
