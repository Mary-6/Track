<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'city', 'country', 'address', 'phone', 'email', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
