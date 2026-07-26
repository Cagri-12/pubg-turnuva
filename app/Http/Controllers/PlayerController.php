<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Registration;
use App\Models\Result;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Notification;

class PlayerController extends Controller
{
    public function dashboard()
    {
        $registration = Registration::where('user_id', auth()->id())
            ->latest()
            ->first();


        $room = null;

        if ($registration) {
            $room = Room::where('tournament_id', $registration->tournament_id)
                ->latest()
                ->first();
        }

        $announcements = Announcement::where('is_active', true)
            ->latest()
            ->take(5)
            ->get();

        $result = Result::latest()->first();

        $setting = Setting::first();

        $unreadNotifications = Notification::where('user_id', auth()->id())
            ->where('is_read', false)
            ->count();

        $notification = Notification::where('user_id', auth()->id())
           ->latest()
           ->first();


        return view('player.dashboard', compact(
           'registration',
           'room',
           'announcements',
           'result',
           'setting',
           'unreadNotifications',
           'notification'
        ));
    }
}