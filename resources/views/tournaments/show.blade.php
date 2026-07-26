<!DOCTYPE html>
<html lang="tr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $tournament->title }}</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
}

body{

background:#070b16;
color:white;

}

.container{

max-width:1400px;
margin:auto;
padding:40px 20px;

}

.banner{

background:linear-gradient(135deg,#4f46e5,#7c3aed);

padding:60px;

border-radius:25px;

text-align:center;

box-shadow:0 15px 40px rgba(0,0,0,.35);

margin-bottom:40px;

}

.banner h1{

font-size:55px;

margin-bottom:20px;

}

.banner p{

font-size:22px;

opacity:.9;

}

.grid{

display:grid;

grid-template-columns:2fr 1fr;

gap:30px;

}

.card{

background:#111827;

padding:30px;

border-radius:20px;

box-shadow:0 10px 30px rgba(0,0,0,.35);

margin-bottom:25px;

}

.card h2{

margin-bottom:20px;

color:#c084fc;

}

.info{

margin:15px 0;

font-size:20px;

}

.badge{

display:inline-block;

padding:10px 20px;

border-radius:12px;

font-weight:bold;

margin-bottom:20px;

}

.active{

background:#16a34a;

}

.wait{

background:#eab308;

color:black;

}

.finish{

background:#dc2626;

}

.bar{

width:100%;

height:18px;

background:#374151;

border-radius:30px;

overflow:hidden;

margin-top:20px;

}

.fill{

height:100%;

background:linear-gradient(90deg,#22c55e,#7c3aed);

}

.prize{

background:#0f172a;

padding:18px;

border-radius:15px;

margin-bottom:15px;

font-size:20px;

}

.btn{

display:block;

text-align:center;

padding:18px;

background:#7c3aed;

color:white;

text-decoration:none;

border-radius:15px;

font-size:20px;

font-weight:bold;

transition:.3s;

margin-top:25px;

}

.btn:hover{

background:#5b21b6;

transform:translateY(-4px);

}

</style>

</head>

<body>

<div class="container">

<div class="banner">

<h1>

🏆 {{ $tournament->title }}

</h1>

<p>

🎮 {{ $tournament->game }}

</p>

</div>

<div class="grid">

<div>

<div class="card">

@if($tournament->status=="Aktif")

<span class="badge active">

🟢 AKTİF TURNUVA

</span>

@elseif($tournament->status=="Yakında")

<span class="badge wait">

🟡 YAKINDA

</span>

@else

<span class="badge finish">

🔴 TAMAMLANDI

</span>

@endif

<h2>

📋 Turnuva Bilgileri

</h2>

<p class="info">

📅 Tarih :
{{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}

</p>

<p class="info">

🕒 Başlangıç :
{{ $tournament->time }}

</p>

<p class="info">

🎮 Oda Yayın :
{{ $tournament->room_publish_time }}

</p>

<p class="info">

💰 Katılım :
{{ number_format($tournament->entry_fee,0,',','.') }} ₺

</p>
@php

$percent = $tournament->max_teams > 0
    ? ($tournament->teams()->count() / $tournament->max_teams) * 100
    : 0;

@endphp

<p class="info">

👥 Katılan Takım :
{{ $tournament->teams()->count() }} / {{ $tournament->max_teams }}

</p>

<div class="bar">

<div class="fill"

style="width:{{ $percent }}%;">

</div>

</div>

<p style="
margin-top:15px;
font-size:18px;
font-weight:bold;
color:#22c55e;
">

Doluluk :
{{ number_format($percent,0) }}%

</p>

</div>

<div class="card">

<h2>

🏆 ÖDÜL DAĞILIMI

</h2>

<div class="prize">

🥇

<b>1.</b>

{{ $tournament->first_prize ?: 'Henüz açıklanmadı' }}

</div>

<div class="prize">

🥈

<b>2.</b>

{{ $tournament->second_prize ?: 'Henüz açıklanmadı' }}

</div>

<div class="prize">

🥉

<b>3.</b>

{{ $tournament->third_prize ?: 'Henüz açıklanmadı' }}

</div>

<p style="
margin-top:25px;
font-size:18px;
line-height:1.8;
color:#cbd5e1;
">

💰 Toplam Ödül Havuzu

<br><br>

<b style="font-size:30px;color:#22c55e;">

{{ number_format($tournament->prize_pool,0,',','.') }} ₺

</b>

</p>

</div>

<div class="card">

<h2>

📝 Turnuva Açıklaması

</h2>

<p style="line-height:2;color:#d1d5db;">

{{ $tournament->description ?: 'Henüz açıklama eklenmedi.' }}

</p>

</div>

</div>

<div>
    <div class="card">

<h2>

⏳ Turnuva Sayaç

</h2>

<div id="countdown"
style="
font-size:30px;
font-weight:bold;
text-align:center;
color:#22c55e;
padding:20px;
">

Hesaplanıyor...

</div>

</div>

<div class="card">

<h2>

🎮 Turnuva Durumu

</h2>

<p class="info">

📅 Tarih

<br><br>

<b>

{{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}

</b>

</p>

<p class="info">

🕒 Başlangıç

<br><br>

<b>

{{ $tournament->time }}

</b>

</p>

<p class="info">

🎮 Oda Yayın

<br><br>

<b>

{{ $tournament->room_publish_time }}

</b>

</p>

<hr style="margin:25px 0;border-color:#374151;">

@if($tournament->teams()->count() >= $tournament->max_teams)

<div style="
background:#dc2626;
padding:18px;
border-radius:15px;
text-align:center;
font-size:22px;
font-weight:bold;
">

🔴 TURNUVA DOLDU

</div>

@else

@if(auth()->check())

<a href="{{ route('registration.create',$tournament->id) }}"
class="btn">

🚀 TURNUVAYA KATIL

</a>

@else

<a href="{{ route('login') }}"
class="btn">

👤 GİRİŞ YAPARAK KATIL

</a>

@endif

@endif

<a href="{{ route('tournaments.index') }}"
class="btn"
style="
background:#374151;
margin-top:20px;
">

⬅ TURNUVALARA DÖN

</a>

</div>

<div class="card">

<h2>

🏆 Turnuva Kuralları

</h2>

<ul style="
line-height:2;
padding-left:20px;
color:#d1d5db;
">

<li>✅ Emülatör yasaktır.</li>

<li>✅ Hile kullanan takım diskalifiye edilir.</li>

<li>✅ Oda saatinden en az 15 dakika önce hazır olun.</li>

<li>✅ Oda bilgileri yayın saatinde paylaşılır.</li>

<li>✅ Admin kararları kesindir.</li>

<li>✅ Saygılı olmayan oyuncular turnuvadan çıkarılır.</li>

</ul>

</div>

</div>

</div>

<script>

let target = new Date(
"{{ $tournament->date }} {{ $tournament->time }}"
).getTime();

function countdown(){

let now = new Date().getTime();

let distance = target-now;

if(distance<=0){

document.getElementById("countdown").innerHTML="🚀 TURNUVA BAŞLADI";

return;

}

let days=Math.floor(distance/(1000*60*60*24));

let hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60));

let minutes=Math.floor((distance%(1000*60*60))/(1000*60));

let seconds=Math.floor((distance%(1000*60))/1000);

document.getElementById("countdown").innerHTML=

days+" Gün<br>"+

hours+" Saat<br>"+

minutes+" Dakika<br>"+

seconds+" Saniye";

}

countdown();

setInterval(countdown,1000);

</script>
<div class="container">

<div class="card">

<h2 style="margin-bottom:25px;">

👥 KATILAN TAKIMLAR

</h2>

@if($tournament->teams()->count())

<table style="
width:100%;
border-collapse:collapse;
">

<tr style="
background:#1f2937;
">

<th style="padding:15px;">#</th>

<th>Takım</th>

<th>WhatsApp</th>

<th>Kayıt Tarihi</th>

</tr>

@foreach($tournament->teams as $team)

<tr style="
border-bottom:1px solid #374151;
">

<td style="padding:15px;">

{{ $loop->iteration }}

</td>

<td>

🏆 {{ $team->team_name }}

</td>

<td>

📱 {{ $team->whatsapp }}

</td>

<td>

{{ $team->created_at->format('d.m.Y') }}

</td>

</tr>

@endforeach

</table>

@else

<div style="
padding:30px;
text-align:center;
font-size:20px;
">

Henüz kayıt olan takım bulunmuyor.

</div>

@endif

</div>

<div class="card">

<h2>

📢 Organizasyon Bilgisi

</h2>

<p style="
line-height:2;
color:#d1d5db;
">

Bu turnuva

<b style="color:#a855f7;">

SPACE STONE STARS

</b>

tarafından düzenlenmektedir.

Turnuva kurallarına uymayan oyuncular
diskalifiye edilir.

Her takım oda saatinden önce hazır bulunmalıdır.

</p>

</div>

</div>

<footer style="
margin-top:70px;
padding:50px;
background:#0f172a;
text-align:center;
border-top:1px solid #374151;
">

<h2 style="
color:#a855f7;
margin-bottom:15px;
">

💎 SPACE STONE STARS

</h2>

<p style="
color:#cbd5e1;
margin-bottom:25px;
">

Türkiye'nin Profesyonel PUBG Mobile Turnuva Platformu

</p>

<a href="{{ route('tournaments.index') }}"
class="btn"
style="
display:inline-block;
width:auto;
padding:15px 35px;
">

🏆 Diğer Turnuvalar

</a>

<p style="
margin-top:35px;
color:#64748b;
">

© {{ date('Y') }}

SPACE STONE STARS

Tüm Hakları Saklıdır.

</p>

</footer>

{{--
DEBUG
--}}
<pre style="background:black;color:lime;padding:10px;">
{{ print_r($tournament->toArray(), true) }}
</pre>

</body>

</html>