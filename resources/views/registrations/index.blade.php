<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        📋 Başvurular
    </h2>

    <p class="stats-subtitle">
        Turnuvaya yapılan başvuruları buradan yönetebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<form method="GET" class="toolbar">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="🔍 Takım Ara..."
        class="input"
        style="flex:1;min-width:220px;">

    <select
        name="status"
        class="select">

        <option value="">📋 Tüm Durumlar</option>
        <option value="Bekliyor" {{ request('status')=='Bekliyor'?'selected':'' }}>Bekliyor</option>
        <option value="Onaylandı" {{ request('status')=='Onaylandı'?'selected':'' }}>Onaylandı</option>
        <option value="Reddedildi" {{ request('status')=='Reddedildi'?'selected':'' }}>Reddedildi</option>

    </select>

    @if(auth()->user()->is_admin)

    <select
        name="tournament"
        class="select">

        <option value="">🏆 Tüm Turnuvalar</option>

        @foreach(\App\Models\Tournament::orderBy('title')->get() as $item)

            <option
                value="{{ $item->id }}"
                {{ request('tournament')==$item->id?'selected':'' }}>

                {{ $item->title }}

            </option>

        @endforeach

    </select>

    @endif

    <button
        type="submit"
        class="btn btn-purple">

        🔍 Filtrele

    </button>

</form>

<div class="stats-grid">

    <div class="stat-card bg-sky">
        <h3>📝 Toplam Başvuru</h3>
        <h1>{{ $totalRegistrations }}</h1>
    </div>

    <div class="stat-card bg-green">
        <h3>✅ Onaylanan</h3>
        <h1>{{ $approvedRegistrations }}</h1>
    </div>

    <div class="stat-card bg-yellow">
        <h3>🟡 Bekleyen</h3>
        <h1>{{ $pendingRegistrations }}</h1>
    </div>

    <div class="stat-card bg-red">
        <h3>❌ Reddedilen</h3>
        <h1>{{ $rejectedRegistrations }}</h1>
    </div>

</div>

@if(isset($tournament))

<div class="stat-card bg-violet" style="margin-top:25px;">

🏆 {{ $tournament->title }} Başvuruları

</div>

@endif

<div class="grid-2">

@foreach($registrations as $registration)

<div
class="card-hover"
style="
background:#1e293b;
border-radius:20px;
padding:22px;
color:white;
box-shadow:0 15px 35px rgba(0,0,0,.35);
border-left:8px solid
@if($registration->status=='Onaylandı')
#16a34a
@elseif($registration->status=='Bekliyor')
#f59e0b
@else
#dc2626
@endif
;
">

<div class="flex-between">

<h2
style="
margin:0;
font-size:24px;
color:#c084fc;
">

👥 {{ $registration->team_name }}

</h2>

@if($registration->status=="Onaylandı")

<span class="badge badge-green">

🟢 Onaylandı

</span>

@elseif($registration->status=="Bekliyor")

<span class="badge badge-yellow" style="color:black;">

🟡 Bekliyor

</span>

@else

<span class="badge badge-red">

🔴 Reddedildi

</span>

@endif

</div>

<p><b>🏆 Turnuva :</b> {{ $registration->tournament->title }}</p>

<p><b>👤 Oyuncu :</b> {{ $registration->name }}</p>

<p><b>📱 Telefon :</b> {{ $registration->phone }}</p>

<p><b>💳 Gönderen :</b> {{ $registration->sender_name }}</p>

<hr style="margin:18px 0;border-color:#334155;">

@if($registration->receipt)

<img
src="{{ asset('storage/'.$registration->receipt) }}"
style="
width:100%;
height:220px;
object-fit:cover;
border-radius:12px;
margin-bottom:15px;
border:2px solid #334155;
">

@endif

<a
href="{{ asset('storage/'.$registration->receipt) }}"
target="_blank"
class="btn btn-purple"
style="display:block;text-align:center;">

📄 Dekontu Gör

</a>

<br>

@if(auth()->user()->is_admin)

@if($registration->status=="Onaylandı")

<form
action="{{ route('registrations.slot',$registration->id) }}"
method="POST">

@csrf

<label><b>🎯 Slot</b></label>

<select
name="slot"
class="select"
style="
margin:10px 0;
background:#0f172a;
color:white;
">

@for($i=3;$i<=25;$i++)

<option
value="{{ $i }}"
{{ $registration->slot==$i ? 'selected' : '' }}>

Slot {{ $i }}

</option>

@endfor

</select>

<button
type="submit"
class="btn btn-blue"
style="width:100%;">

💾 Slotu Kaydet

</button>

</form>

<br>

@endif

<div style="display:flex;gap:10px;">

<form
action="{{ route('registrations.approve',$registration->id) }}"
method="POST"
style="flex:1;">

@csrf

<button
type="submit"
class="btn btn-green"
style="width:100%;">

✅ Onayla

</button>

</form>

<form
action="{{ route('registrations.reject',$registration->id) }}"
method="POST"
style="flex:1;">

@csrf

<button
type="submit"
class="btn btn-red"
style="width:100%;">

❌ Reddet

</button>

</form>

</div>

@else

<div
style="
background:#0f172a;
padding:15px;
border-radius:12px;
text-align:center;
">

@if($registration->status=="Bekliyor")

⏳ Başvurunuz inceleniyor.

@elseif($registration->status=="Onaylandı")

✅ Başvurunuz onaylandı.

<br><br>

🎯 Slot :
<b>{{ $registration->slot ?? '-' }}</b>

@else

❌ Başvurunuz reddedildi.

@endif

</div>

@endif

</div>

@endforeach

</div>

</div>

</x-app-layout>