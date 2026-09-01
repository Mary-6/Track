@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="name" value="{{ old('name', $supportTicket->name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="email" value="{{ old('email', $supportTicket->email ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="phone" value="{{ old('phone', $supportTicket->phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Subject</label><input type="text" name="subject" value="{{ old('subject', $supportTicket->subject ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
    <div class="mb-3 md:col-span-2"><label class="block text-sm">Message</label><textarea name="message" class="w-full border rounded px-3 py-2" rows="4" required>{{ old('message', $supportTicket->message ?? '') }}</textarea></div>
    <div class="mb-3"><label class="block text-sm">Assigned To</label>
        <select name="assigned_to" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @selected(old('assigned_to', $supportTicket->assigned_to ?? '') == $user->id)>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    @if(isset($supportTicket))
        <div class="mb-3"><label class="block text-sm">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @foreach (['OPEN','IN_PROGRESS','WAITING','RESOLVED','CLOSED'] as $s)
                    <option value="{{ $s }}" @selected(old('status', $supportTicket->status ?? '') === $s)>{{ $s }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.support-tickets.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
