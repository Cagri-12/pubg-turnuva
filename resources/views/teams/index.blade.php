<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        👥 Takım Yönetimi
    </h2>

    <p class="stats-subtitle">
        Sistemde kayıtlı tüm takımları ve katıldıkları turnuvaları buradan görüntüleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

@if(session('success'))

<div style="
background:#22c55e;
color:white;
padding:15px;
border-radius:12px;
margin-bottom:25px;
">

{{ session('success') }}

</div>

@endif

@if($teams->count())

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
gap:25px;
">

@foreach($teams as $team)

<div class="page-card dark-card"
style="
text-align:center;
transition:.3s;
">

@if($team->logo)

<img
src="{{ asset('storage/'.$team->logo) }}"
style="
width:120px;
height:120px;
object-fit:cover;
border-radius:50%;
border:4px solid #7c3aed;
margin-bottom:18px;
">

@else

<img
src="https://via.placeholder.com/120"
style="
width:120px;
height:120px;
border-radius:50%;
border:4px solid #374151;
margin-bottom:18px;
">

@endif

<h2 style="
font-size:28px;
font-weight:bold;
color:white;
margin-bottom:18px;
">

{{ $team->team_name }}

</h2>

<div style="
display:flex;
flex-direction:column;
gap:10px;
text-align:left;
">

<div style="color:#d1d5db;">
📱
<strong>WhatsApp:</strong>
{{ $team->whatsapp }}
</div>

@if($team->tournament)

<div style="color:#a855f7;font-weight:bold;">
🏆
{{ $team->tournament->title }}
</div>

@endif

<div style="color:#94a3b8;">
📅
{{ $team->created_at->format('d.m.Y H:i') }}
</div>

</div>

</div>

@endforeach

</div>

@else

<div class="page-card dark-card" style="text-align:center;">

<div style="font-size:55px;margin-bottom:15px;">
👥
</div>

<h2 style="color:white;">
Henüz takım oluşturulmamış.
</h2>

<p style="color:#94a3b8;margin-top:10px;">
Takımlar oluşturulduğunda burada listelenecektir.
</p>

</div>

@endif

</div>

</x-app-layout>