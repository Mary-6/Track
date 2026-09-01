@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="name" value="{{ old('name', $branch->name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Code</label><input type="text" name="code" value="{{ old('code', $branch->code ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">City</label><input type="text" name="city" value="{{ old('city', $branch->city ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Country</label><input type="text" name="country" value="{{ old('country', $branch->country ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3 md:col-span-2"><label class="block text-sm">Address</label><textarea name="address" class="w-full border rounded px-3 py-2">{{ old('address', $branch->address ?? '') }}</textarea></div>
    <div class="mb-3 flex items-center"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $branch->is_active ?? true)) class="mr-2"><label class="text-sm">Active</label></div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.branches.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
