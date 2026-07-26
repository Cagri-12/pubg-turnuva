<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Site Ayarları Sayfası
    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'site_name' => 'Space Stone Stars',
            ]);
        }

        return view('settings.index', compact('setting'));
    }

    // Güncelle
    public function update(Request $request)
    {
        $setting = Setting::first();

        $request->validate([
            'site_name' => 'required|max:255',
        ]);

        $setting->update($request->all());

        return back()->with('success', 'Site ayarları güncellendi.');
    }
}