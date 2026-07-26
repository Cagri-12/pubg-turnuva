<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Tournament;

class HomeController extends Controller
{
 public function index()
{
    $setting = Setting::first();

    $tournaments = Tournament::withCount('teams')
        ->whereIn('status', [
            'Kayıt Açık',
            'Kayıt Kapandı',
            'Devam Ediyor'
        ])
        ->latest()
        ->take(6)
        ->get();

    $announcements = Announcement::where('is_active', true)
        ->latest()
        ->take(5)
        ->get();

    $results = Result::latest()
        ->take(6)
        ->get();

    return view('welcome', compact(
        'setting',
        'tournaments',
        'announcements',
        'results'
    ));
}
}