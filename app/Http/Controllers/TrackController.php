<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $shipment = null;

        if ($request->has('number')) {
            $shipment = Shipment::with('events')->where('tracking_number', $request->input('number'))->first();
        }

        return view('track', compact('shipment'));
    }

    public function lookup(Request $request)
    {
        $request->validate(['number' => 'required|string']);

        return redirect()->route('track', ['number' => $request->input('number')]);
    }

    public function show(string $tracking_number)
    {
        $shipment = Shipment::with('events')->where('tracking_number', $tracking_number)->firstOrFail();

        return view('track', compact('shipment'));
    }
}
