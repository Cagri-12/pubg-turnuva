<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    // Sonuç yükleme formu
    public function create()
    {
        return view('results.create');
    }

    // Sonucu kaydet
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'match_number' => 'required|integer',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('results', 'public');

        Result::create([
            'title' => $request->title,
            'match_number' => $request->match_number,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Sonuç başarıyla yüklendi.');
    }

    // Oyuncuların göreceği sonuç sayfası
    public function index()
    {
        $results = Result::latest()->get();

        return view('results.index', compact('results'));
    }
    // Düzenleme sayfası
public function edit(Result $result)
{
    return view('results.edit', compact('result'));
}

// Güncelle
public function update(Request $request, Result $result)
{
    $request->validate([
        'title' => 'required',
        'match_number' => 'required|integer',
    ]);

    if ($request->hasFile('image')) {

        $path = $request->file('image')->store('results', 'public');

        $result->image = $path;
    }

    $result->title = $request->title;
    $result->match_number = $request->match_number;

    $result->save();

    return redirect()->route('results.index')
        ->with('success', 'Sonuç güncellendi.');
}

// Sil
public function destroy(Result $result)
{
    $result->delete();

    return redirect()->route('results.index')
        ->with('success', 'Sonuç silindi.');
}
}