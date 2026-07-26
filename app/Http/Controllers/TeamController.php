<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Tournament;

class TeamController extends Controller
{
    /**
     * Takımları Listele
     */
    
   public function index()
{
    $teams = Team::with('tournament')
        ->latest()
        ->get();

    return view('teams.index', compact('teams'));
}
    /**
     * Takım Kaydet
     */
    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team_name'     => 'required|max:255',
            'whatsapp'      => 'required|max:20',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',

        ]);

        $logo = $request->file('logo')->store('team_logos', 'public');

        Team::create([
            'tournament_id' => $request->tournament_id,
            'team_name'     => $request->team_name,
            'whatsapp'      => $request->whatsapp,
            'logo'          => $logo,
        ]);

        return back()->with('success', 'Takım başarıyla kaydedildi.');
    }
}