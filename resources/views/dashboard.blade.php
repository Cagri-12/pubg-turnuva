<x-app-layout>

<div class="admin-container">

<div class="admin-hero">

    <div>

        <h1>👑 Admin Paneli</h1>

        <p>
            SPACE STONE STARS yönetim merkezine hoş geldiniz.
            Turnuvaları, oyuncuları ve sistemi buradan kolayca yönetebilirsiniz.
        </p>

    </div>

</div>

@if(session('success'))

<div class="success-box">
    {{ session('success') }}
</div>

@endif

<h2 class="section-title" style="color:#fff;">
    📊 Sistem İstatistikleri
</h2>

<div class="stats-grid">

    <div class="stat-card bg-purple">
        <h3>🏆 Turnuvalar</h3>
        <h1>{{ $tournamentCount }}</h1>
    </div>

    <div class="stat-card bg-orange">
        <h3>💰 Toplam Ödül</h3>
        <h1>{{ number_format($totalPrize,0,',','.') }} ₺</h1>
    </div>

    <div class="stat-card bg-cyan">
        <h3>📅 Bugünkü Başvuru</h3>
        <h1>{{ $todayRegistrations }}</h1>
    </div>

    <div class="stat-card bg-indigo">
        <h3>👤 Kullanıcılar</h3>
        <h1>{{ $userCount }}</h1>
    </div>

    <div class="stat-card bg-violet">
        <h3>🎮 Son Oda</h3>

        @if($room)

            <p><b>ID:</b> {{ $room->room_id }}</p>
            <p><b>Harita:</b> {{ $room->map }}</p>
            <p><b>Saat:</b> {{ $room->start_time }}</p>

        @else

            <p>Henüz oda oluşturulmadı.</p>

        @endif

    </div>

</div>

<div class="page-card summary-card">

<h2 class="section-title">
📊 Başvuru Özeti
</h2>

<div style="margin-bottom:18px;">

🟢 Onaylanan
<b style="float:right;">{{ $approvedCount }}</b>

<div class="progress">
<div class="progress-bar green"
style="width:{{ $registrationCount ? ($approvedCount/$registrationCount)*100 : 0 }}%;">
</div>
</div>

</div>

<div style="margin-bottom:18px;">

🟡 Bekleyen
<b style="float:right;">{{ $pendingCount }}</b>

<div class="progress">
<div class="progress-bar yellow"
style="width:{{ $registrationCount ? ($pendingCount/$registrationCount)*100 : 0 }}%;">
</div>
</div>

</div>

<div>

🔴 Reddedilen
<b style="float:right;">{{ $rejectedCount }}</b>

<div class="progress">
<div class="progress-bar red"
style="width:{{ $registrationCount ? ($rejectedCount/$registrationCount)*100 : 0 }}%;">
</div>
</div>

</div>

</div>

<hr style="margin:40px 0;">

<h2 class="section-title stats-title">
⚡ Hızlı Yönetim
</h2>

<p class="stats-subtitle">
Sistemi yönetmek için en sık kullanılan işlemler.
</p>

<div class="stats-grid">

<a href="{{ route('tournaments.create') }}" class="quick-card bg-green">
<h2>➕</h2>
<h3>Yeni Turnuva</h3>
</a>

<a href="{{ route('admin.tournaments') }}" class="quick-card bg-purple">
<h2>🏆</h2>
<h3>Turnuvalar</h3>
</a>

<a href="{{ route('teams.index') }}" class="quick-card" style="background:#2563eb;">
<h2>👥</h2>
<h3>Takımlar</h3>
</a>

<a href="{{ route('registrations.index') }}" class="quick-card bg-green">
<h2>📝</h2>
<h3>Başvurular</h3>
</a>

<a href="{{ route('rooms.index') }}" class="quick-card bg-orange">
<h2>🎮</h2>
<h3>Oda Yönetimi</h3>
</a>

<a href="{{ route('results.index') }}" class="quick-card bg-violet">
<h2>📸</h2>
<h3>Sonuçlar</h3>
</a>

<a href="{{ route('announcements.index') }}" class="quick-card" style="background:#9333ea;">
<h2>📢</h2>
<h3>Duyurular</h3>
</a>

<a href="{{ route('reports.index') }}" class="quick-card bg-red">
<h2>🚨</h2>
<h3>Bildirimler</h3>
</a>

<a href="{{ route('users.index') }}" class="quick-card" style="background:#111827;">
<h2>👤</h2>
<h3>Kullanıcılar</h3>
</a>

</div>

<div style="
margin-top:40px;
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
">

<div class="dashboard-box">

<h2 class="section-title stats-title">
    📄 Son Başvurular
</h2>

@foreach($latestRegistrations as $registration)

<div style="padding:15px 0;border-bottom:1px solid rgba(255,255,255,.08);">

    <b style="color:white;">
        {{ $registration->team_name }}
    </b>

    <br>

    <span style="color:#cbd5e1;">
        {{ $registration->status }}
    </span>

</div>

@endforeach

</div>

<div class="dashboard-box">

<h2 class="section-title stats-title">
    🎧 Son Destek Talepleri
</h2>

@foreach($latestSupports as $support)

<div style="padding:15px 0;border-bottom:1px solid rgba(255,255,255,.08);">

    <b style="color:white;">
        {{ $support->name }}
    </b>

    <br>

    <span style="color:#cbd5e1;">
        {{ $support->subject }}
    </span>

</div>

@endforeach

</div>

</div>

@if($announcements->count())

<div class="page-card dark-card" style="margin-top:40px;">

    <h2 class="section-title stats-title">
        📢 Son Duyurular
    </h2>

    @foreach($announcements as $announcement)

        <div style="
            background:#0f172a;
            border:1px solid rgba(255,255,255,.08);
            border-radius:14px;
            padding:22px;
            margin-bottom:18px;
            transition:.3s;
        ">

            <h3 style="
                color:#a855f7;
                font-size:20px;
                font-weight:bold;
                margin-bottom:12px;
            ">
                {{ $announcement->title }}
            </h3>

            <p style="
                color:#d1d5db;
                line-height:1.8;
                margin-bottom:14px;
            ">
                {{ $announcement->content }}
            </p>

            <small style="color:#94a3b8;">
                🕒 {{ $announcement->created_at->format('d.m.Y H:i') }}
            </small>

        </div>

    @endforeach

</div>

@endif

</div>

</x-app-layout>