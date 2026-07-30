<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Notification;
use App\Models\Registration;
use App\Models\Result;
use App\Models\Room;
use App\Models\Setting;

class PlayerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        // Oyuncunun son kaydı + turnuva bilgisi
        $registration = Registration::with('tournament')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        // Turnuva odası
        $room = null;

        if ($registration) {
            $room = Room::where('tournament_id', $registration->tournament_id)
                ->where('active', true)
                ->latest()
                ->first();
        }

        // Son 5 duyuru
        $announcements = Announcement::where('is_active', true)
            ->latest()
            ->take(5)
            ->get();

        // Son 5 sonuç
        $results = Result::latest()
            ->take(5)
            ->get();

        // Son 5 bildirim
        $notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Okunmayan bildirim sayısı
        $unreadNotifications = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();

        // Site ayarları
        $setting = Setting::first();

        // Dashboard istatistikleri
        $stats = [
            'registrations' => Registration::where('user_id', $user->id)->count(),

            'team_name' => $registration?->team_name,

            'active_room' => $room ? true : false,

            'notifications' => $unreadNotifications,
        ];

        return view('player.dashboard', compact(
            'user',
            'registration',
            'room',
            'announcements',
            'results',
            'notifications',
            'setting',
            'stats'
        ));
    }
}