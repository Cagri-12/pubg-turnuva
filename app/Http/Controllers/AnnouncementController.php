<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Duyuruları Listele
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('announcements.index', compact('announcements'));
    }

    // Yeni Duyuru Formu
    public function create()
    {
        return view('announcements.create');
    }

    // Kaydet
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'is_active' => true,
        ]);

        return redirect()
            ->route('announcements.index')
            ->with('success', '📢 Duyuru başarıyla yayınlandı.');
    }

    // Aktif/Pasif
    public function toggle(Announcement $announcement)
    {
        $announcement->is_active = !$announcement->is_active;
        $announcement->save();

        return back()->with('success', 'Durum güncellendi.');
    }

    // Sil
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Duyuru silindi.');
    }
}