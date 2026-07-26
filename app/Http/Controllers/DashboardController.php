<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use App\Models\Registration;
use App\Models\Room;
use App\Models\Result;
use App\Models\Announcement;
use App\Models\Notification;
use App\Models\User;
use App\Models\Support;

class DashboardController extends Controller
{

   public function index()
{
    $tournamentCount = Tournament::count();
    $teamCount = Team::count();
    $totalPrize = Tournament::sum('prize_pool');

    $registrationCount = Registration::count();
    $approvedCount = Registration::where('status', 'Onaylandı')->count();
    $pendingCount = Registration::where('status', 'Bekliyor')->count();
    $rejectedCount = Registration::where('status', 'Reddedildi')->count();

    $room = Room::latest()->first();
    $lastResult = Result::latest()->first();
    $announcements = Announcement::latest()->take(5)->get();

    $notifications = Notification::where('user_id', auth()->id())
    ->latest()
    ->take(5)
    ->get();

    $unreadNotifications = Notification::where('user_id', auth()->id())
    ->where('is_read', false)
    ->count();

    $activeTournament = Tournament::whereNotIn('status', ['Tamamlandı', 'Arşiv'])->count();

    $todayRegistrations = Registration::whereDate('created_at', today())->count();

    $userCount = User::count();

    $latestRegistrations = Registration::with('tournament')
    ->latest()
    ->take(5)
    ->get();

    $latestSupports = Support::latest()
    ->take(5)
    ->get();

    return view('dashboard', compact(
        'tournamentCount',
        'teamCount',
        'totalPrize',
        'registrationCount',
        'approvedCount',
        'pendingCount',
        'rejectedCount',
        'room',
        'lastResult',
        'announcements',
        'notifications',
        'unreadNotifications',
        'activeTournament',
        'todayRegistrations',
        'userCount',
        'latestRegistrations',
        'latestSupports'
    ));
}
    }