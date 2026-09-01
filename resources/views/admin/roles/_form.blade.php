@csrf
<div class="mb-4">
    <label class="block text-sm font-medium">Name</label>
    <input type="text" name="name" value="{{ old('name', $role->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
</div>
<div class="mb-4">
    <label class="block text-sm font-medium">Permissions</label>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-2">
        @foreach ($permissions as $permission)
            <label class="flex items-center text-sm">
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @checked(in_array($permission->name, old('permissions', $role->permissions->pluck('name')->toArray() ?? []))) class="mr-2">
                {{ $permission->name }}
            </label>
        @endforeach
    </div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.roles.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
