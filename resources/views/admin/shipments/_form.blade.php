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

@php
$meta = old('meta', $shipment->meta ?? []);
@endphp

<div class="mt-6">
    <h3 class="font-bold mb-2">Package Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="mb-3"><label class="block text-sm">Qty</label><input type="text" name="meta[quantity]" value="{{ $meta['quantity'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Piece Type</label><input type="text" name="meta[piece_type]" value="{{ $meta['piece_type'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Package Type</label><input type="text" name="meta[package_type]" value="{{ $meta['package_type'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Product</label><input type="text" name="meta[product]" value="{{ $meta['product'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Carrier Reference No.</label><input type="text" name="meta[carrier_reference]" value="{{ $meta['carrier_reference'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Type of Shipment</label><input type="text" name="meta[shipment_type]" value="{{ $meta['shipment_type'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Payment Mode</label><input type="text" name="meta[payment_mode]" value="{{ $meta['payment_mode'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Total Freight</label><input type="number" step="0.01" name="meta[total_freight]" value="{{ $meta['total_freight'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Currency</label><input type="text" name="meta[currency]" value="{{ $meta['currency'] ?? 'USD' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Length (cm)</label><input type="number" step="0.01" name="meta[length_cm]" value="{{ $meta['length_cm'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Width (cm)</label><input type="number" step="0.01" name="meta[width_cm]" value="{{ $meta['width_cm'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Height (cm)</label><input type="number" step="0.01" name="meta[height_cm]" value="{{ $meta['height_cm'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Pick-up Date</label><input type="date" name="meta[pickup_date]" value="{{ $meta['pickup_date'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Pick-up Time</label><input type="time" name="meta[pickup_time]" value="{{ $meta['pickup_time'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Departure Time</label><input type="time" name="meta[departure_time]" value="{{ $meta['departure_time'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Estimated Delivery</label><input type="date" name="meta[estimated_delivery]" value="{{ $meta['estimated_delivery'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Current Lat</label><input type="number" step="any" name="meta[current_lat]" value="{{ $meta['current_lat'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Current Lng</label><input type="number" step="any" name="meta[current_lng]" value="{{ $meta['current_lng'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
        <div class="mb-3"><label class="block text-sm">Comments</label><input type="text" name="meta[comments]" value="{{ $meta['comments'] ?? '' }}" class="w-full border rounded px-3 py-2"></div>
    </div>
</div>

<div class="mt-4 mb-3"><label class="block text-sm">Notes</label><textarea name="notes" class="w-full border rounded px-3 py-2" rows="3">{{ old('notes', $shipment->notes ?? '') }}</textarea></div>

<div class="mt-6">
    <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Save</button>
    <a href="{{ route('admin.shipments.index') }}" class="ml-2 text-slate-600 hover:underline">Cancel</a>
</div>
