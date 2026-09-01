@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="name" value="{{ old('name', $driver->name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="email" value="{{ old('email', $driver->email ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="phone" value="{{ old('phone', $driver->phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">License Number</label><input type="text" name="license_number" value="{{ old('license_number', $driver->license_number ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Branch</label>
        <select name="branch_id" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}" @selected(old('branch_id', $driver->branch_id ?? '') == $branch->id)>{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 flex items-center"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $driver->is_active ?? true)) class="mr-2"><label class="text-sm">Active</label></div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.drivers.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
