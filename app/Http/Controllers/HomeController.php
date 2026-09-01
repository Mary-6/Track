<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $shipped = Shipment::where('status', '!=', 'PENDING')->count();
        $delivered = Shipment::where('status', 'DELIVERED')->count();
        $inTransit = Shipment::where('status', 'IN_TRANSIT')->count();

        return view('welcome', compact('shipped', 'delivered', 'inTransit'));
    }
}
