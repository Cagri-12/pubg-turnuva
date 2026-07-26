<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Http\Requests\TournamentRequest;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Registration;

class TournamentController extends Controller
{
    /**
     * Turnuvaları Listele
     */
   
public function index()
{
    $query = Tournament::withCount('teams')
        ->whereNotIn('status', ['Arşiv']);

    if (request('search')) {

        $query->where(function ($q) {

            $q->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('game', 'like', '%' . request('search') . '%');

        });

    }

    $tournaments = $query
        ->latest()
        ->get();

    return view('tournaments.index', compact('tournaments'));
}

    public function adminIndex()
{
    $query = Tournament::withCount([
        'teams',
        'registrations',
        'registrations as approved_count' => function ($q) {
            $q->where('status', 'Onaylandı');
        },
        'registrations as pending_count' => function ($q) {
            $q->where('status', 'Bekliyor');
        },
        'registrations as rejected_count' => function ($q) {
            $q->where('status', 'Reddedildi');
        },
    ]);

    if (request('search')) {

        $query->where(function ($q) {

            $q->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('game', 'like', '%' . request('search') . '%');

        });

    }

    $tournaments = $query
        ->latest()
        ->get();

    return view('tournaments.admin', compact('tournaments'));
}


    /**
     * Turnuva Oluşturma Formu
     */
    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        return view('tournaments.create');
    }

    /**
     * Turnuva Kaydet
     */
    public function store(TournamentRequest $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        try {

    Tournament::create($request->validated());

    return redirect()
        ->route('tournaments.index')
        ->with('success', '🏆 Turnuva başarıyla oluşturuldu.');

} catch (\Exception $e) {

    dd($e->getMessage());

}
    }

    /**
     * Turnuva Detayı
     */
    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }

    /**
     * Düzenleme Formu
     */
    public function edit(Tournament $tournament)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        return view('tournaments.edit', compact('tournament'));
    }

    /**
     * Güncelle
     */
    public function update(Request $request, Tournament $tournament)
{
    if (!auth()->check() || !auth()->user()->is_admin) {
        abort(403);
    }

    $request->validate([
        'title' => 'required',
        'game' => 'required',
        'date' => 'required',
        'time' => 'required',
        'room_publish_time' => 'nullable',
        'entry_fee' => 'required',
        'max_teams' => 'required',
        'prize_pool' => 'required',

        'first_prize' => 'nullable|string|max:255',
        'second_prize' => 'nullable|string|max:255',
        'third_prize' => 'nullable|string|max:255',

        'description' => 'nullable',
        'status' => 'required',
    ]);

    // Eski durumu sakla
    $oldStatus = $tournament->status;

    // Güncelle
    $tournament->update($request->all());

    // Durum değiştiyse bildirim gönder
    if ($oldStatus != $tournament->status) {

        $registrations = Registration::where('tournament_id', $tournament->id)
            ->where('status', 'Onaylandı')
            ->get();

        foreach ($registrations as $registration) {

            Notification::create([
                'user_id' => $registration->user_id,
                'title' => 'Turnuva Durumu Güncellendi',
                'message' => "🏆 {$tournament->title} turnuvasının durumu '{$tournament->status}' olarak güncellendi.",
                'is_read' => false,
            ]);

        }

    }

    return redirect()
        ->route('tournaments.index')
        ->with('success', 'Turnuva güncellendi.');
}

    /**
     * Turnuva Sil
     */
    public function destroy(Tournament $tournament)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        $tournament->delete();

        return redirect()
            ->route('tournaments.index')
            ->with('success', 'Turnuva silindi.');
    }
}