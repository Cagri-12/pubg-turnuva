<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Tournament;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class RoomController extends Controller
{
    /**
     * Oda oluşturma sayfası
     */
    public function create()
    {
        $tournaments = Tournament::latest()->get();

        return view('rooms.create', compact('tournaments'));
    }

    /**
     * Odayı kaydet
     */
    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'room_id'       => 'required',
            'room_password' => 'required',
            'map'           => 'required',
            'match_date'    => 'required',
            'start_time'    => 'required',
            'announcement'  => 'nullable',
        ]);

        $room = Room::create([
            'tournament_id' => $request->tournament_id,
            'room_id'       => $request->room_id,
            'room_password' => $request->room_password,
            'map'           => $request->map,
            'match_date'    => $request->match_date,
            'start_time'    => $request->start_time,
            'announcement'  => $request->announcement,
            'active'        => 1,
    ]);

       $players = Registration::where('tournament_id', $room->tournament_id)
    ->where('status', 'Onaylandı')
    ->get();

foreach ($players as $player) {

    Notification::create([
        'user_id' => $player->user_id,
        'title' => '🎮 Oda Bilgileri Yayınlandı',
        'message' => 'Room ID ve şifre artık oyuncu panelinizde görüntülenebilir.',
        'is_read' => false,
    ]);
}

return redirect()
    ->route('dashboard')
    ->with('success', '🎮 Oda başarıyla oluşturuldu.');
    }

    /**
     * Oda bilgisini göster
     */

    public function index()
{
    $rooms = Room::with('tournament')
        ->latest()
        ->get();

    return view('rooms.index', compact('rooms'));
}

    public function edit(Room $room)
{
    $tournaments = Tournament::latest()->get();

    return view('rooms.edit', compact('room', 'tournaments'));
}

public function update(Request $request, Room $room)
{
    $request->validate([
        'tournament_id' => 'required|exists:tournaments,id',
        'room_id'       => 'required',
        'room_password' => 'required',
        'map'           => 'required',
        'match_date'    => 'required',
        'start_time'    => 'required',
        'announcement'  => 'nullable',
    ]);

    $room->update($request->all());

    return redirect()
        ->route('rooms.index')
        ->with('success', '🎮 Oda güncellendi.');
}

public function destroy(Room $room)
{
    $room->delete();

    return redirect()
        ->route('rooms.index')
        ->with('success', '🗑️ Oda silindi.');
}
   
    public function show()
    {
        $room = Room::latest()->first();

        if (!$room) {
            return view('rooms.show', compact('room'));
        }

        $registered = Registration::where('user_id', Auth::id())
            ->where('tournament_id', $room->tournament_id)
            ->where('status', 'Onaylandı')
            ->exists();

        if (!$registered) {
            abort(403, 'Bu turnuvaya kayıtlı değilsiniz.');
        }

        return view('rooms.show', compact('room'));
    }
}