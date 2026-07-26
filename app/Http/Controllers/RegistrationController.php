<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Notification;

class RegistrationController extends Controller
{
 public function create(Tournament $tournament)
{
    if ($tournament->status != 'Kayıt Açık') {
        return redirect()
            ->route('tournaments.index')
            ->with('error', 'Bu turnuvaya artık kayıt yapılamaz.');
    }

    $registration = Registration::where('user_id', auth()->id())
        ->where('tournament_id', $tournament->id)
        ->first();

    if ($registration) {
        return redirect()
            ->route('tournaments.index')
            ->with('error', 'Bu turnuvaya zaten başvuru yaptınız.');
    }

    return view('registrations.create', compact('tournament'));
}

    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'name' => 'required',
            'phone' => 'required',
            'team_name' => 'required',
            'sender_name' => 'required',
            'receipt' => 'required|image',
        ]);

$tournament = Tournament::findOrFail($request->tournament_id);

if ($tournament->status != 'Kayıt Açık') {
    return redirect()
        ->route('tournaments.index')
        ->with('error', 'Bu turnuvaya kayıtlar kapanmıştır.');
}

        $path = $request->file('receipt')->store('receipts', 'public');

        Registration::create([
            'user_id'       => auth()->id(),
            'tournament_id' => $request->tournament_id,
            'name'          => $request->name,
            'phone'         => $request->phone,
            'team_name'     => $request->team_name,
            'sender_name'   => $request->sender_name,
            'receipt'       => $path,
            'status'        => 'Bekliyor',
        ]);

        return redirect()
            ->route('player.dashboard')
            ->with('success', 'Başvurunuz başarıyla alındı.');
    }

 public function index(Request $request)
{
    $tournament = null;

    if (auth()->user()->is_admin) {

        $registrations = Registration::with(['user', 'tournament']);

        // Turnuva filtresi
        if ($request->filled('tournament')) {

            $tournament = Tournament::find($request->tournament);

            $registrations->where('tournament_id', $request->tournament);
        }

        // Takım adına göre arama
        if ($request->filled('search')) {

            $registrations->where('team_name', 'like', '%' . $request->search . '%');
        }

        // Durum filtresi
        if ($request->filled('status')) {

            $registrations->where('status', $request->status);
        }

        $registrations = $registrations
            ->latest()
            ->get();

    } else {

        $registrations = Registration::with('tournament')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

    }

    $totalRegistrations = $registrations->count();

    $approvedRegistrations = $registrations
        ->where('status', 'Onaylandı')
        ->count();

    $pendingRegistrations = $registrations
        ->where('status', 'Bekliyor')
        ->count();

    $rejectedRegistrations = $registrations
        ->where('status', 'Reddedildi')
        ->count();

    return view('registrations.index', compact(
        'registrations',
        'tournament',
        'totalRegistrations',
        'approvedRegistrations',
        'pendingRegistrations',
        'rejectedRegistrations'
    ));
}

    public function approve($id)
{
    if (!auth()->user()->is_admin) {
    abort(403);
}

    $registration = Registration::findOrFail($id);

    // Başvuruyu onayla
    $registration->status = 'Onaylandı';
    $registration->save();

    Notification::create([
    'user_id' => $registration->user_id,
    'title' => 'Başvurunuz Onaylandı',
    'message' => 'Başvurunuz onaylandı. Oda bilgileri yayınlandığında oyuncu panelinizden görebileceksiniz.',
]);

    // Aynı takım daha önce eklenmiş mi?
    $exists = Team::where('tournament_id', $registration->tournament_id)
                  ->where('team_name', $registration->team_name)
                  ->exists();

    if (!$exists) {
        Team::create([
            'tournament_id' => $registration->tournament_id,
            'team_name'     => $registration->team_name,
            'whatsapp'      => $registration->phone,
        ]);
    }

    return back()->with('success', '✅ Başvuru onaylandı.');
}

public function reject($id)
{
if (!auth()->user()->is_admin) {
    abort(403);
}

    $registration = Registration::findOrFail($id);
    $registration->status = 'Reddedildi';
    $registration->save();

Notification::create([
    'user_id' => $registration->user_id,
    'title' => 'Başvurunuz Reddedildi',
    'message' => 'Başvurunuz reddedildi. Ayrıntılı bilgi için destek ekibiyle iletişime geçebilirsiniz.',
]);

    return back()->with('success', 'Başvuru reddedildi.');
}

public function slot(Request $request, $id)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $request->validate([
        'slot' => 'required|integer|min:3|max:25',
    ]);

    // Aynı turnuvada aynı slot başka takıma verilmesin
    $exists = Registration::where('tournament_id', Registration::findOrFail($id)->tournament_id)
        ->where('slot', $request->slot)
        ->where('id', '!=', $id)
        ->exists();

    if ($exists) {
        return back()->with('error', 'Bu slot başka bir takıma atanmış.');
    }

    $registration = Registration::findOrFail($id);
    $registration->slot = $request->slot;
    $registration->save();

    return back()->with('success', '🎯 Slot başarıyla atandı.');
}

public function slots(Tournament $tournament)
{
    if (!auth()->user()->is_admin) {
        abort(403);
    }

    $registrations = Registration::where('tournament_id', $tournament->id)
        ->where('status', 'Onaylandı')
        ->whereNotNull('slot')
        ->orderBy('slot')
        ->get();

    return view('registrations.slots', compact('tournament', 'registrations'));
}

}