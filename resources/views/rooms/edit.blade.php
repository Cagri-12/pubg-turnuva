<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        ✏️ Odayı Düzenle
    </h2>

    <p class="stats-subtitle">
        Oda bilgilerini buradan güncelleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<form action="{{ route('rooms.update',$room) }}" method="POST">

@csrf
@method('PUT')

<label>🏆 Turnuva</label>

<select
name="tournament_id"
required
class="select"
style="margin-bottom:18px;">

@foreach($tournaments as $tournament)

<option
value="{{ $tournament->id }}"
{{ $room->tournament_id == $tournament->id ? 'selected' : '' }}>

{{ $tournament->title }}

</option>

@endforeach

</select>

<label>🎮 Room ID</label>

<input
type="text"
name="room_id"
value="{{ $room->room_id }}"
required
class="input"
style="margin-bottom:18px;">

<label>🔑 Room Şifresi</label>

<input
type="text"
name="room_password"
value="{{ $room->room_password }}"
required
class="input"
style="margin-bottom:18px;">

<label>🗺️ Harita</label>

<select
name="map"
required
class="select"
style="margin-bottom:18px;">

<option value="Erangel" {{ $room->map=='Erangel' ? 'selected' : '' }}>Erangel</option>
<option value="Miramar" {{ $room->map=='Miramar' ? 'selected' : '' }}>Miramar</option>
<option value="Sanhok" {{ $room->map=='Sanhok' ? 'selected' : '' }}>Sanhok</option>
<option value="Rondo" {{ $room->map=='Rondo' ? 'selected' : '' }}>Rondo</option>

</select>

<label>📅 Maç Tarihi</label>

<input
type="date"
name="match_date"
value="{{ $room->match_date }}"
required
class="input"
style="margin-bottom:18px;">

<label>🕒 Başlangıç Saati</label>

<input
type="time"
name="start_time"
value="{{ $room->start_time }}"
required
class="input"
style="margin-bottom:18px;">

<label>📢 Duyuru</label>

<textarea
name="announcement"
rows="5"
class="input"
style="resize:vertical;margin-bottom:25px;">{{ $room->announcement }}</textarea>

<div style="display:flex;gap:15px;flex-wrap:wrap;">

<button
type="submit"
class="btn btn-green">

💾 Değişiklikleri Kaydet

</button>

<a
href="{{ route('rooms.index') }}"
class="btn btn-blue">

⬅ Geri Dön

</a>

</div>

</form>

</div>

</div>

</x-app-layout>