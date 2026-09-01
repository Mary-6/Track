<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingKeys = [
        'site_name',
        'site_email',
        'site_phone',
        'site_address',
        'currency',
    ];

    public function index()
    {
        $settings = collect($this->settingKeys)->mapWithKeys(function ($key) {
            return [$key => Setting::get($key, '')];
        });

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($this->settingKeys as $key) {
            Setting::set($key, $request->input($key, ''));
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings saved.');
    }
}
