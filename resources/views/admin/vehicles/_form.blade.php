@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-3"><label class="block text-sm">Make</label><input type="text" name="make" value="{{ old('make', $vehicle->make ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Model</label><input type="text" name="model" value="{{ old('model', $vehicle->model ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Registration</label><input type="text" name="registration" value="{{ old('registration', $vehicle->registration ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Type</label><input type="text" name="type" value="{{ old('type', $vehicle->type ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Branch</label>
        <select name="branch_id" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}" @selected(old('branch_id', $vehicle->branch_id ?? '') == $branch->id)>{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="block text-sm">Driver</label>
        <select name="driver_id" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" @selected(old('driver_id', $vehicle->driver_id ?? '') == $driver->id)>{{ $driver->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 flex items-center"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $vehicle->is_active ?? true)) class="mr-2"><label class="text-sm">Active</label></div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.vehicles.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
