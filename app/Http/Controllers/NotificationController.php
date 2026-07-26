<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        Notification::where('user_id', auth()->id())
            ->update([
                'is_read' => true,
            ]);

        return view('notifications.index', compact('notifications'));
    }

    public function admin()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $users = User::orderBy('name')->get();

        $notifications = Notification::with('user')
            ->latest()
            ->take(100)
            ->get();

        return view('notifications.admin', compact('users', 'notifications'));
    }

    public function send(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'user_id' => 'required',
        ]);

        if ($request->user_id == 'all') {

            foreach (User::all() as $user) {

                Notification::create([
                    'user_id' => $user->id,
                    'title'   => $request->title,
                    'message' => $request->message,
                    'is_read' => false,
                ]);

            }

        } else {

            Notification::create([
                'user_id' => $request->user_id,
                'title'   => $request->title,
                'message' => $request->message,
                'is_read' => false,
            ]);

        }

        return back()->with('success', '📢 Bildirim başarıyla gönderildi.');
    }

    public function destroy(Notification $notification)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $notification->delete();

        return back()->with('success', '🗑 Bildirim silindi.');
    }
}