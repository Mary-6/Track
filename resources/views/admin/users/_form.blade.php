@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Role</label>
        <select name="role" class="w-full border rounded px-3 py-2">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" @selected(old('role', $user->roles->first()->name ?? '') == $role->name)>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="block text-sm">Password</label><input type="password" name="password" class="w-full border rounded px-3 py-2" @if(!isset($user)) required @endif></div>
    <div class="mb-3"><label class="block text-sm">Confirm Password</label><input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" @if(!isset($user)) required @endif></div>
    <div class="mb-3 flex items-center"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $user->is_active ?? true)) class="mr-2"><label class="text-sm">Active</label></div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.users.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
