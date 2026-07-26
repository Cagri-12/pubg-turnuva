@php
use App\Models\Notification;

$notificationCount = Notification::where('user_id', auth()->id())
    ->where('is_read', false)
    ->count();

$notifications = Notification::where('user_id', auth()->id())
    ->latest()
    ->take(5)
    ->get();
@endphp

<nav x-data="{ open: false }"
style="
background:#0b1120;
border-bottom:1px solid rgba(255,255,255,.08);
position:sticky;
top:0;
z-index:999;
backdrop-filter:blur(15px);
">

<div class="max-w-7xl mx-auto px-6">

<div class="flex justify-between min-h-[88px] items-center py-3">

<div class="flex items-center gap-4">

<a href="{{ auth()->user()->is_admin ? route('dashboard') : route('player.dashboard') }}"
style="
display:flex;
align-items:center;
gap:14px;
text-decoration:none;
">

    <img
    src="{{ asset('images/logo.png') }}"
    style="
    height:58px;
    width:auto;
    object-fit:contain;
    display:block;
    ">

    <div>

        <div style="
        font-size:24px;
        font-weight:900;
        line-height:1;
        letter-spacing:1px;
        white-space:nowrap;
        ">

            <span style="color:#8b5cf6;">
                SPACE STONE
            </span>

            <span style="color:#ffffff;">
                STARS
            </span>

        </div>

        <div style="
        margin-top:6px;
        color:#94a3b8;
        font-size:12px;
        letter-spacing:3px;
        ">
            PUBG MOBILE TOURNAMENT
        </div>

    </div>

</a>

</a>

<div
class="hidden sm:flex items-center gap-10"
style="
margin-left:140px;
margin-top:6px;
">

@if(auth()->user()->is_admin && !request()->routeIs('player.*'))

    <x-nav-link :href="route('tournaments.index')" :active="request()->routeIs('tournaments.*')">
        🏆 Turnuvalar
    </x-nav-link>

    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        📊 Dashboard
    </x-nav-link>

    <x-nav-link :href="route('registrations.index')" :active="request()->routeIs('registrations.*')">
        📝 Başvurular
    </x-nav-link>

    <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.*')">
        🎮 Oda Yönetimi
    </x-nav-link>

    <x-nav-link :href="route('results.index')" :active="request()->routeIs('results.*')">
        🏆 Sonuçlar
    </x-nav-link>

    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
        👥 Kullanıcılar
    </x-nav-link>

    <x-nav-link :href="route('announcements.index')" :active="request()->routeIs('announcements.*')">
        📢 Duyurular
    </x-nav-link>

    <x-nav-link :href="route('notifications.admin')" :active="request()->routeIs('notifications.admin')">
        🔔 Bildirim Yönetimi
    </x-nav-link>

    <x-nav-link :href="route('supports.admin')" :active="request()->routeIs('supports.admin')">
        🎧 Destek
    </x-nav-link>

    <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')">
        ⚙️ Ayarlar
    </x-nav-link>

@else

    <x-nav-link :href="route('player.dashboard')" :active="request()->routeIs('player.dashboard')">
        🏠 Panelim
    </x-nav-link>

    <x-nav-link :href="route('tournaments.index')" :active="request()->routeIs('tournaments.*')">
        🏆 Turnuvalar
    </x-nav-link>

    <x-nav-link :href="route('supports.index')" :active="request()->routeIs('supports.*')">
        🎧 Destek
    </x-nav-link>

@endif

</div>

</div>

<div style="
display:flex;
align-items:center;
gap:18px;
margin-left:auto;
">

    <div style="position:relative;">

        <a href="{{ route('notifications.index') }}"
           style="color:white;font-size:22px;text-decoration:none;">

            🔔

            @if($notificationCount > 0)
                <span style="
                    position:absolute;
                    top:-8px;
                    right:-10px;
                    background:#ef4444;
                    color:white;
                    border-radius:50%;
                    min-width:20px;
                    height:20px;
                    line-height:20px;
                    text-align:center;
                    font-size:11px;
                    font-weight:bold;
                ">
                    {{ $notificationCount }}
                </span>
            @endif

        </a>

    </div>

    <x-dropdown align="right" width="56">

        <x-slot name="trigger">

            <button style="
                background:#7c3aed;
                color:white;
                padding:10px 18px;
                border-radius:12px;
                font-weight:bold;
            ">

                @if(auth()->user()->is_admin)
                    👑 Admin
                @else
                    👤 {{ Auth::user()->name }}
                @endif

            </button>

        </x-slot>

        <x-slot name="content">

            <x-dropdown-link :href="route('profile.edit')">
                👤 Profilim
            </x-dropdown-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link
                    :href="route('logout')"
                    onclick="event.preventDefault();this.closest('form').submit();">

                    🚪 Güvenli Çıkış

                </x-dropdown-link>

            </form>

        </x-slot>

    </x-dropdown>

</div>

</div>

</div>

</nav>