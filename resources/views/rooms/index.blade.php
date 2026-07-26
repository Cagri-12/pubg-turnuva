<x-app-layout>

<x-slot name="header">
    <h2 class="page-title">
        🎮 Oda Yönetimi
    </h2>
</x-slot>

<div style="padding:30px;">

<div class="toolbar">

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🎮 Oda Yönetimi
    </h2>

    <p class="stats-subtitle">
        Turnuva odalarını oluşturabilir, düzenleyebilir ve yönetebilirsiniz.
    </p>

</div>

</x-slot>

<a
href="{{ route('rooms.create') }}"
class="btn btn-green">

➕ Yeni Oda

</a>

</div>

@if(session('success'))

<div class="success-box">

{{ session('success') }}

</div>

@endif

<div class="grid-2">

@foreach($rooms as $room)

<div
class="card-hover"
style="
background:#111827;
border-radius:20px;
padding:25px;
color:white;
box-shadow:0 15px 35px rgba(0,0,0,.25);
border-left:8px solid #4f46e5;
">

<div class="flex-between">

<h2 style="margin:0;color:#c084fc;">

🏆 {{ $room->tournament->title }}

</h2>

<span class="badge badge-green">

🟢 Aktif

</span>

</div>

<br>

<p><b>🎮 Room ID :</b> {{ $room->room_id }}</p>

<p><b>🔑 Şifre :</b> {{ $room->room_password }}</p>

<p><b>🗺️ Harita :</b> {{ $room->map }}</p>

<p><b>📅 Tarih :</b> {{ \Carbon\Carbon::parse($room->match_date)->format('d.m.Y') }}</p>

<p><b>🕒 Saat :</b> {{ $room->start_time }}</p>

<hr style="margin:20px 0;border-color:#374151;">

<div style="display:flex;flex-wrap:wrap;gap:10px;">

<button
onclick="navigator.clipboard.writeText('Room ID: {{ $room->room_id }} | Şifre: {{ $room->room_password }}')"
class="btn btn-blue">

📋 Kopyala

</button>

<a
href="{{ route('rooms.edit',$room) }}"
class="btn btn-yellow">

✏️ Düzenle

</a>

<form
action="{{ route('rooms.destroy',$room) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
type="submit"
onclick="return confirm('Bu oda silinsin mi?')"
class="btn btn-red">

🗑️ Sil

</button>

</form>

</div>

@if($room->announcement)

<div
style="
margin-top:20px;
background:#1f2937;
padding:15px;
border-radius:12px;
border-left:5px solid #4f46e5;
">

<b>📢 Duyuru</b>

<br><br>

{{ $room->announcement }}

</div>

@endif

</div>

@endforeach

@if($rooms->isEmpty())

<div
class="page-card"
style="grid-column:1/-1;text-align:center;">

🎮 Henüz oluşturulmuş oda bulunmuyor.

<br><br>

<a
href="{{ route('rooms.create') }}"
class="btn btn-green">

➕ İlk Odayı Oluştur

</a>

</div>

@endif

</div>

</div>

</x-app-layout>