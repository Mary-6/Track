<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'created_by',
        'sender_name',
        'sender_email',
        'sender_phone',
        'sender_address',
        'sender_country',
        'recipient_name',
        'recipient_email',
        'recipient_phone',
        'recipient_address',
        'recipient_country',
        'origin',
        'destination',
        'weight',
        'dimensions',
        'service',
        'status',
        'declared_value',
        'shipping_cost',
        'tax',
        'total_cost',
        'payment_status',
        'notes',
        'branch_id',
        'driver_id',
        'shipped_at',
        'delivered_at',
    ];

    protected $casts = [
        'weight' => 'decimal:3',
        'declared_value' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'tax' => 'decimal:2',
        'total_cost' => 'decimal:2',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function events()
    {
        return $this->hasMany(ShipmentEvent::class)->orderBy('occurred_at', 'desc');
    }
}
