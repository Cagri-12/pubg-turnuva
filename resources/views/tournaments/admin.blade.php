<x-app-layout>

<div class="admin-container">

<div class="admin-hero" style="margin-bottom:25px;">

    <div>
        <h1>🏆 Turnuva Yönetimi</h1>

        <p>
            Aktif turnuvaları buradan yönetebilir, düzenleyebilir ve başvuruları kontrol edebilirsiniz.
        </p>
    </div>

</div>

<div class="page-card dark-card" style="margin-bottom:25px;">

<div class="toolbar">

<form method="GET" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap;">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="🔍 Turnuva Ara..."
class="input"
style="width:320px;">

<button
type="submit"
class="btn btn-purple">
🔍 Ara
</button>

</form>

<a
href="{{ route('tournaments.create') }}"
class="btn btn-green">
➕ Yeni Turnuva
</a>

</div>

</div>

<div class="page-card dark-card" style="padding:0;overflow:hidden;">

<table class="admin-table">

<thead>

<tr>

<th>🏆 Turnuva</th>
<th>Durum</th>
<th>İstatistik</th>
<th>İşlemler</th>

</tr>

</thead>

<tbody>

@foreach($tournaments as $tournament)

<tr>

<td>

<div style="
font-size:22px;
font-weight:700;
margin-bottom:14px;
color:#fff;
">
🏆 {{ $tournament->title }}
</div>

<div style="margin-top:14px;color:#9ca3af;line-height:30px;font-size:15px;">

<div>🎮 {{ $tournament->game }}</div>

<div>📅 {{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}</div>

<div>🚀 {{ $tournament->time }}</div>

</div>

</td>

<td>

@if($tournament->status=="Kayıt Açık")

<span class="badge badge-green">
🟢 Aktif
</span>

@elseif($tournament->status=="Kayıt Kapandı")

<span class="badge badge-yellow">
🟡 Kayıt Kapandı
</span>

@elseif($tournament->status=="Turnuva Başladı")

<span class="badge badge-blue">
🔵 Turnuva Başladı
</span>

@else

<span class="badge badge-red">
🔴 Turnuva Bitti
</span>

@endif

</td>

<td style="line-height:28px;">

👥 Takım :
<b>{{ $tournament->teams_count }}</b> /
{{ $tournament->max_teams }}

@php
$percent = $tournament->max_teams > 0
? ($tournament->teams_count / $tournament->max_teams) * 100
: 0;
@endphp

<div class="progress">

<div
class="progress-bar green"
style="width:{{ $percent }}%;">

</div>

</div>

<br>

📝 Başvuru :
<b>{{ $tournament->registrations_count }}</b>

<br>

✅ Onay :
<b style="color:#16a34a;">
{{ $tournament->approved_count }}
</b>

<br>

🟡 Bekleyen :
<b style="color:#f59e0b;">
{{ $tournament->pending_count }}
</b>

<br>

❌ Red :
<b style="color:#dc2626;">
{{ $tournament->rejected_count }}
</b>

</td>

<td>

<div style="
display:grid;
grid-template-columns:repeat(2,minmax(140px,1fr));
gap:10px;
">

<a
href="{{ route('tournaments.edit',$tournament) }}"
class="btn btn-yellow"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

✏️ Düzenle

</a>

<a
href="{{ route('registrations.index',['tournament'=>$tournament->id]) }}"
class="btn btn-blue"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

👥 Başvurular

</a>

@if(in_array($tournament->status,['Kayıt Kapandı','Devam Ediyor','Tamamlandı']))

<a
href="{{ route('rooms.create',['tournament'=>$tournament->id]) }}"
class="btn btn-purple"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

🎮 Oda

</a>

@endif

@if(in_array($tournament->status,['Devam Ediyor','Tamamlandı']))

<a
href="{{ route('results.create',['tournament'=>$tournament->id]) }}"
class="btn btn-green"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

🏆 Sonuç

</a>

@endif

<a
href="{{ route('registrations.slots',$tournament->id) }}"
class="btn btn-gray"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

🎯 Slotlar

</a>

<form
action="{{ route('tournaments.destroy',$tournament) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
type="submit"
onclick="return confirm('Turnuva silinsin mi?')"
class="btn btn-red"
style="
display:flex;
justify-content:center;
align-items:center;
width:100%;
">

🗑️ Sil

</button>

</form>

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@if($tournaments->isEmpty())

<div class="page-card" style="text-align:center;">

📭 Henüz turnuva bulunmuyor.

</div>

@endif

</div>

</x-app-layout>