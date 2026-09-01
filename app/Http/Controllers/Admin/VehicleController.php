<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('branch', 'driver')->paginate(20);

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $branches = Branch::where('is_active', true)->get();
        $drivers = Driver::where('is_active', true)->get();

        return view('admin.vehicles.create', compact('branches', 'drivers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'make' => 'required|string|max:100',
            'model' => 'nullable|string|max:100',
            'registration' => 'required|string|unique:vehicles,registration|max:100',
            'type' => 'nullable|string|max:50',
            'branch_id' => 'nullable|exists:branches,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        Vehicle::create($data);

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle created.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $branches = Branch::where('is_active', true)->get();
        $drivers = Driver::where('is_active', true)->get();

        return view('admin.vehicles.edit', compact('vehicle', 'branches', 'drivers'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'make' => 'required|string|max:100',
            'model' => 'nullable|string|max:100',
            'registration' => 'required|string|max:100|unique:vehicles,registration,' . $vehicle->id,
            'type' => 'nullable|string|max:50',
            'branch_id' => 'nullable|exists:branches,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        $vehicle->update($data);

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle updated.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return back()->with('success', 'Vehicle deleted.');
    }
}
