<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('branch')->paginate(20);

        return view('admin.drivers.index', compact('drivers'));
    }

    public function create()
    {
        $branches = Branch::where('is_active', true)->get();

        return view('admin.drivers.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'branch_id' => 'nullable|exists:branches,id',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        Driver::create($data);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver created.');
    }

    public function show(Driver $driver)
    {
        return view('admin.drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        $branches = Branch::where('is_active', true)->get();

        return view('admin.drivers.edit', compact('driver', 'branches'));
    }

    public function update(Request $request, Driver $driver)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:100',
            'branch_id' => 'nullable|exists:branches,id',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        $driver->update($data);

        return redirect()->route('admin.drivers.index')->with('success', 'Driver updated.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        return back()->with('success', 'Driver deleted.');
    }
}
