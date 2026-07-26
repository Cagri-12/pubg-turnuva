<x-app-layout>

<x-slot name="header">
    <h2 style="font-size:28px;font-weight:bold;">
        🏠 Oda Bilgilerim
    </h2>
</x-slot>

<div style="max-width:900px;margin:auto;padding:30px;">

@if($room)

<div style="background:#ffffff;border-radius:15px;padding:25px;box-shadow:0 5px 15px rgba(0,0,0,.1);">

    <h2 style="margin-bottom:20px;color:#4f46e5;">
        🏆 {{ $room->tournament->title }}
    </h2>

    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">

        <div style="background:#eef2ff;padding:20px;border-radius:10px;text-align:center;">
            <h3>🎮 Room ID</h3>
            <h1>{{ $room->room_id }}</h1>
        </div>

        <div style="background:#eef2ff;padding:20px;border-radius:10px;text-align:center;">
            <h3>🔑 Şifre</h3>
            <h1>{{ $room->room_password }}</h1>
        </div>

        <div style="background:#f5f5f5;padding:20px;border-radius:10px;">
            <strong>🗺️ Harita</strong><br>
            {{ $room->map }}
        </div>

        <div style="background:#f5f5f5;padding:20px;border-radius:10px;">
            <strong>📅 Tarih</strong><br>
            {{ $room->match_date }}
        </div>

        <div style="background:#f5f5f5;padding:20px;border-radius:10px;">
            <strong>🕒 Başlangıç</strong><br>
            {{ $room->start_time }}
        </div>

        <div style="background:#f5f5f5;padding:20px;border-radius:10px;">
            <strong>📢 Duyuru</strong><br>
            {{ $room->announcement ?: 'Duyuru bulunmuyor.' }}
        </div>

    </div>

</div>

@else

<div style="background:#fff3cd;border:1px solid #ffe69c;padding:25px;border-radius:12px;text-align:center;">

    <h2>⏳ Henüz oda bilgisi bulunmuyor.</h2>

    <p style="margin-top:10px;">
        Bunun nedeni aşağıdakilerden biri olabilir:
    </p>

    <ul style="text-align:left;display:inline-block;margin-top:15px;">
        <li>Başvurunuz henüz onaylanmadı.</li>
        <li>Admin oda bilgilerini henüz yayınlamadı.</li>
    </ul>

</div>

@endif

</div>

</x-app-layout>