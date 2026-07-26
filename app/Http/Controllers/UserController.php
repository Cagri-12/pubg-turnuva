<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function toggle(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('success', 'Yetki güncellendi.');
    }

    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Kendi hesabını silemezsin.');
        }

        $user->delete();

        return back()->with('success', 'Kullanıcı silindi.');
    }
}