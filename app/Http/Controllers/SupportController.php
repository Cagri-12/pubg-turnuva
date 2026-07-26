<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // Oyuncunun destek talepleri
    public function index()
    {
        $supports = Support::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('supports.index', compact('supports'));
    }

    // Destek talebi oluşturma sayfası
    public function create()
    {
        return view('supports.create');
    }

    // Destek talebi kaydet
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        Support::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'Bekliyor',
        ]);

        return redirect()
            ->route('supports.index')
            ->with('success', 'Destek talebiniz gönderildi.');
    }

    // Admin tüm destekleri görür
    public function adminIndex()
    {
        $supports = Support::with('user')
            ->latest()
            ->get();

        return view('supports.admin', compact('supports'));
    }

    // Admin cevap yazar
    public function reply(Request $request, Support $support)
    {
        $request->validate([
            'reply' => 'required',
        ]);

        $support->update([
            'reply' => $request->reply,
            'status' => 'Cevaplandı',
        ]);

        return back()->with('success', 'Destek talebi cevaplandı.');
    }
}