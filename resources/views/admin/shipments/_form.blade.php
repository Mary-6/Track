@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <h3 class="font-bold mb-2">Sender</h3>
        <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="sender_name" value="{{ old('sender_name', $shipment->sender_name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
        <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="sender_email" value="{{ old('sender_email', $shipment->sender_email ?? '') }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="sender_phone" value="{{ old('sender_phone', $shipment->sender_phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Address</label><textarea name="sender_address" class="w-full border rounded px-3 py-2">{{ old('sender_address', $shipment->sender_address ?? '') }}</textarea></div>
        <div class="mb-3"><label class="block text-sm">Country</label><input type="text" name="sender_country" value="{{ old('sender_country', $shipment->sender_country ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    </div>
    <div>
        <h3 class="font-bold mb-2">Recipient</h3>
        <div class="mb-3"><label class="block text-sm">Name</label><input type="text" name="recipient_name" value="{{ old('recipient_name', $shipment->recipient_name ?? '') }}" class="w-full border rounded px-3 py-2" required></div>
        <div class="mb-3"><label class="block text-sm">Email</label><input type="email" name="recipient_email" value="{{ old('recipient_email', $shipment->recipient_email ?? '') }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Phone</label><input type="text" name="recipient_phone" value="{{ old('recipient_phone', $shipment->recipient_phone ?? '') }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Address</label><textarea name="recipient_address" class="w-full border rounded px-3 py-2">{{ old('recipient_address', $shipment->recipient_address ?? '') }}</textarea></div>
        <div class="mb-3"><label class="block text-sm">Country</label><input type="text" name="recipient_country" value="{{ old('recipient_country', $shipment->recipient_country ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="mb-3"><label class="block text-sm">Origin</label><input type="text" name="origin" value="{{ old('origin', $shipment->origin ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Destination</label><input type="text" name="destination" value="{{ old('destination', $shipment->destination ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Service</label><input type="text" name="service" value="{{ old('service', $shipment->service ?? 'AIR_FREIGHT') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Weight (kg)</label><input type="number" step="0.001" name="weight" value="{{ old('weight', $shipment->weight ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Dimensions</label><input type="text" name="dimensions" value="{{ old('dimensions', $shipment->dimensions ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            @foreach (['PENDING','PICKED_UP','IN_TRANSIT','OUT_FOR_DELIVERY','DELIVERED','ON_HOLD','RETURNED'] as $s)
                <option value="{{ $s }}" @selected(old('status', $shipment->status ?? 'PENDING') === $s)>{{ $s }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="block text-sm">Declared Value</label><input type="number" step="0.01" name="declared_value" value="{{ old('declared_value', $shipment->declared_value ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Shipping Cost</label><input type="number" step="0.01" name="shipping_cost" value="{{ old('shipping_cost', $shipment->shipping_cost ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Tax</label><input type="number" step="0.01" name="tax" value="{{ old('tax', $shipment->tax ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Total Cost</label><input type="number" step="0.01" name="total_cost" value="{{ old('total_cost', $shipment->total_cost ?? '') }}" class="w-full border rounded px-3 py-2"></div>
    <div class="mb-3"><label class="block text-sm">Payment Status</label>
        <select name="payment_status" class="w-full border rounded px-3 py-2">
            @foreach (['PENDING','PAID','UNPAID','REFUNDED'] as $s)
                <option value="{{ $s }}" @selected(old('payment_status', $shipment->payment_status ?? 'PENDING') === $s)>{{ $s }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="block text-sm">Branch</label>
        <select name="branch_id" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}" @selected(old('branch_id', $shipment->branch_id ?? '') == $branch->id)>{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label class="block text-sm">Driver</label>
        <select name="driver_id" class="w-full border rounded px-3 py-2">
            <option value="">None</option>
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" @selected(old('driver_id', $shipment->driver_id ?? '') == $driver->id)>{{ $driver->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mt-4 mb-3"><label class="block text-sm">Notes</label><textarea name="notes" class="w-full border rounded px-3 py-2" rows="3">{{ old('notes', $shipment->notes ?? '') }}</textarea></div>

<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.shipments.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
