<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\ShipmentEvent;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        $shipment = Shipment::create([
            'tracking_number' => 'AC094D5704',
            'created_by' => 1,
            'sender_name' => 'Demo Sender',
            'sender_email' => 'sender@example.com',
            'sender_phone' => '+1 555 0101',
            'sender_address' => '123 Sender Street',
            'sender_country' => 'USA',
            'recipient_name' => 'Demo Recipient',
            'recipient_email' => 'recipient@example.com',
            'recipient_phone' => '+1 555 0199',
            'recipient_address' => '456 Recipient Ave',
            'recipient_country' => 'Germany',
            'origin' => 'New York, USA',
            'destination' => 'Berlin, Germany',
            'weight' => 12.5,
            'dimensions' => '30x20x15 cm',
            'service' => 'Express',
            'status' => 'IN_TRANSIT',
            'declared_value' => 500.00,
            'shipping_cost' => 120.00,
            'tax' => 15.00,
            'total_cost' => 135.00,
            'payment_status' => 'PAID',
            'notes' => 'Demo shipment with live map.',
            'meta' => [
                'quantity' => 2,
                'piece_type' => 'Carton',
                'package_type' => 'Box',
                'product' => 'Electronics',
                'carrier_reference' => 'CARGO-8831',
                'shipment_type' => 'International',
                'payment_mode' => 'Card',
                'total_freight' => 120,
                'currency' => 'USD',
                'current_lat' => 50.1109,
                'current_lng' => 8.6821,
            ],
            'shipped_at' => now()->subDays(2),
        ]);

        ShipmentEvent::create([
            'shipment_id' => $shipment->id,
            'status' => 'PENDING',
            'description' => 'Shipment information received',
            'location' => 'New York, USA',
            'occurred_at' => now()->subDays(3),
        ]);

        ShipmentEvent::create([
            'shipment_id' => $shipment->id,
            'status' => 'IN_TRANSIT',
            'description' => 'Shipment departed origin facility',
            'location' => 'New York, USA',
            'occurred_at' => now()->subDays(2),
        ]);

        ShipmentEvent::create([
            'shipment_id' => $shipment->id,
            'status' => 'IN_TRANSIT',
            'description' => 'Arrived at transit facility',
            'location' => 'Frankfurt, Germany',
            'occurred_at' => now()->subHours(8),
        ]);
    }
}
