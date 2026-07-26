<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Tournament;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Oyuncuya bildirim formunu göster
    public function create()
    {
        $tournaments = Tournament::latest()->get();

        return view('reports.create', compact('tournaments'));
    }

    // Bildirimi kaydet
    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'slot' => 'required|integer|min:1|max:100',
            'player' => 'required|integer|min:1|max:4',
            'player_name' => 'required|string|max:255',
        ]);

        Report::create([
            'user_id'       => auth()->id(),
            'tournament_id' => $request->tournament_id,
            'slot'          => $request->slot,
            'player'        => $request->player,
            'player_name'   => $request->player_name,
            'description'   => $request->description,
            'status'        => 'Bekliyor',
        ]);

        return back()->with('success', '🚨 Bildirim başarıyla gönderildi.');
    }

    // Admin bildirimleri görür
    public function index()
    {
        $reports = Report::with(['user', 'tournament'])
            ->latest()
            ->get();

        return view('reports.index', compact('reports'));
    }

    // Bildirimi çözüldü yap
    public function approve($id)
    {
        $report = Report::findOrFail($id);

        $report->status = 'Çözüldü';
        $report->save();

        return back()->with('success', '✅ Bildirim çözüldü olarak işaretlendi.');
    }

    // Bildirimi sil
    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        $report->delete();

        return back()->with('success', '🗑️ Bildirim silindi.');
    }
}