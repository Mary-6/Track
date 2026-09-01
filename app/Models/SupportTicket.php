<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_number', 'name', 'email', 'phone', 'subject', 'message', 'status', 'assigned_to', 'resolved_at'];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
