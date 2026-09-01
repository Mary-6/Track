@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-2xl">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Site Name</label>
                <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Site Email</label>
                <input type="email" name="site_email" value="{{ old('site_email', $settings['site_email']) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Site Phone</label>
                <input type="text" name="site_phone" value="{{ old('site_phone', $settings['site_phone']) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Site Address</label>
                <textarea name="site_address" class="w-full border rounded px-3 py-2">{{ old('site_address', $settings['site_address']) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Currency</label>
                <input type="text" name="currency" value="{{ old('currency', $settings['currency']) }}" class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save Settings</button>
        </form>
    </div>
@endsection
