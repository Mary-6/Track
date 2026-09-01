<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\SupportTicket;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'shipments' => Shipment::count(),
            'pending' => Shipment::where('status', 'PENDING')->count(),
            'in_transit' => Shipment::where('status', 'IN_TRANSIT')->count(),
            'delivered' => Shipment::where('status', 'DELIVERED')->count(),
            'users' => User::count(),
            'tickets' => SupportTicket::where('status', 'OPEN')->count(),
        ];

        $recentShipments = Shipment::latest()->limit(10)->get();

        return view('admin.dashboard', compact('counts', 'recentShipments'));
    }
}
