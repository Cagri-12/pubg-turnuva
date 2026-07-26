<!DOCTYPE html>
<html lang="tr">
<head>

<meta charset="UTF-8">
<title>Turnuvalar</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

body{

background:
radial-gradient(circle at top right,rgba(124,58,237,.18),transparent 35%),
radial-gradient(circle at bottom left,rgba(79,70,229,.15),transparent 35%),
linear-gradient(180deg,#070b18,#0f172a);

color:white;
font-family:'Poppins',sans-serif;
padding:25px;
min-height:100vh;

}

h1{
color:#8b5cf6;
margin-bottom:30px;
font-size:34px;
font-weight:700;
}

.card{

background:
linear-gradient(
145deg,
rgba(30,41,59,.88),
rgba(15,23,42,.92)
);

backdrop-filter:blur(12px);
border:1px solid rgba(255,255,255,.06);
border-radius:24px;
padding:35px;
margin-bottom:35px;

box-shadow:
0 20px 50px rgba(0,0,0,.45),
0 0 35px rgba(124,58,237,.10);

transition:.35s;
position:relative;
overflow:hidden;

}

.card::before{

content:'';
position:absolute;
top:-100px;
right:-100px;

width:220px;
height:220px;

border-radius:50%;

background:rgba(124,58,237,.15);

filter:blur(80px);

}

.card:hover{
transform:translateY(-6px);
}

h2{
color:#c084fc;
font-size:30px;
margin-bottom:15px;
font-weight:700;
}

.card p{
margin:12px 0;
font-size:18px;
}

.progress{
width:100%;
height:14px;
background:#1b2235;
border-radius:30px;
overflow:hidden;
margin-top:8px;
box-shadow:inset 0 2px 6px rgba(0,0,0,.35);
}

.progress-bar{
height:100%;
border-radius:30px;
background:linear-gradient(90deg,#7c3aed,#3b82f6);
box-shadow:0 0 15px rgba(139,92,246,.45);
transition:.5s;
}

.btn{

display:inline-flex;
justify-content:center;
align-items:center;

padding:15px 35px;

border-radius:14px;

font-weight:700;
font-size:17px;

text-decoration:none;

color:#fff;

background:linear-gradient(135deg,#7c3aed,#4f46e5);

box-shadow:0 10px 25px rgba(124,58,237,.35);

transition:.3s;

}

.btn:hover{

transform:translateY(-3px);

box-shadow:0 18px 35px rgba(124,58,237,.45);

}

.home{
background:#374151;
}

.tournament-layout{

display:grid;
grid-template-columns:2fr 1fr;
gap:25px;
align-items:start;

margin-top:25px;

}

.left-side{

display:flex;
flex-direction:column;
gap:18px;

}

.right-side{

display:flex;
flex-direction:column;
gap:18px;

}

.info-grid{

display:grid;
grid-template-columns:repeat(2,1fr);

gap:15px;

}

.info-box{

background:rgba(17,24,39,.55);

backdrop-filter:blur(12px);

border:1px solid rgba(255,255,255,.08);

border-radius:14px;

padding:18px;

transition:.3s;

}

.info-box:hover{

border-color:#8b5cf6;

transform:translateY(-3px);

}

.info-box span{

display:block;

color:#94a3b8;

font-size:13px;

margin-bottom:6px;

}

.info-box strong{

font-size:18px;

font-weight:600;

color:#fff;

}

@media (max-width:900px){

body{
    padding:15px;
}

h1{
    font-size:28px;
}

.card{
    padding:20px;
}

.tournament-layout{
    grid-template-columns:1fr;
    gap:20px;
}

.left-side,
.right-side{
    width:100%;
}

.info-grid{
    grid-template-columns:1fr;
}

.progress{
    margin-top:10px;
}

.btn{
    width:100%;
    justify-content:center;
}

}

/* Telefon */

@media (max-width:768px){

h2{
    font-size:24px;
}

.info-box{
    padding:15px;
}

.info-box strong{
    font-size:16px;
}

#countdown{
    padding:10px;
}

}

/* Banner */

@media (max-width:768px){

body > div:first-child > div{

padding:22px !important;

background-position:75% center !important;

background-size:cover !important;

}

body > div:first-child > div h1{

font-size:28px !important;

}

body > div:first-child > div p{

font-size:15px !important;

max-width:100% !important;

}

body > div:first-child > div > div:last-child{

display:grid !important;

grid-template-columns:1fr;

gap:12px;

}

}

</style>

</head>

<body>

<div style="
max-width:1400px;
margin:0 auto 25px auto;
">

<div style="
background:
linear-gradient(rgba(8,10,20,.20),rgba(8,10,20,.35)),
url('{{ asset('images/banner.png') }}');

background-size:102%;
background-position:right center;
background-repeat:no-repeat;

border-radius:24px;

padding:28px 40px;

overflow:hidden;
position:relative;

border:1px solid rgba(255,255,255,.08);

box-shadow:
0 20px 50px rgba(0,0,0,.45),
0 0 35px rgba(124,58,237,.12);
">

<div style="
position:absolute;
top:0;
left:0;
right:0;
bottom:0;
background:linear-gradient(
90deg,
rgba(10,15,30,.82) 0%,
rgba(10,15,30,.55) 35%,
rgba(10,15,30,.18) 65%,
rgba(10,15,30,0) 100%
);
"></div>

<div style="
position:absolute;
right:-120px;
top:-120px;
width:280px;
height:280px;
background:rgba(124,58,237,.20);
border-radius:50%;
filter:blur(90px);
"></div>

<div style="
position:relative;
z-index:2;
max-width:520px;
">

<h1 style="
font-size:42px;
font-weight:800;
margin-bottom:10px;
">

🏆 <span style="color:#a855f7;">SPACE STONE STARS</span>

</h1>

<p style="
font-size:17px;
line-height:1.7;
color:#d1d5db;
margin-bottom:28px;
">

PUBG Mobile turnuvalarına katıl, takımını kur, rakiplerini geride bırak ve ödüller için mücadele et.

</p>

<div style="
display:flex;
gap:15px;
flex-wrap:wrap;
">

<div style="
background:rgba(17,24,39,.72);
backdrop-filter:blur(12px);
padding:12px 16px;
border-radius:16px;
border:1px solid rgba(255,255,255,.08);
min-width:135px;
">

<div style="font-size:13px;color:#94a3b8;">
🏆 Aktif Turnuva
</div>

<div style="
font-size:30px;
font-weight:700;
color:white;
margin-top:6px;
">

{{ $tournaments->count() }}

</div>

</div>

<div style="
background:rgba(17,24,39,.72);
backdrop-filter:blur(12px);
padding:12px 16px;
border-radius:16px;
border:1px solid rgba(255,255,255,.08);
min-width:135px;
">

<div style="font-size:13px;color:#94a3b8;">
👥 Kayıtlı Takımlar
</div>

<div style="
font-size:30px;
font-weight:700;
color:#22c55e;
margin-top:6px;
">

{{ $tournaments->sum('teams_count') }}

</div>

</div>

<div style="
background:rgba(17,24,39,.72);
backdrop-filter:blur(12px);
padding:12px 16px;
border-radius:16px;
border:1px solid rgba(255,255,255,.08);
min-width:135px;
">

<div style="font-size:13px;color:#94a3b8;">
🎮 Oyun
</div>

<div style="
font-size:30px;
font-weight:700;
color:#60a5fa;
margin-top:6px;
">

PUBG MOBILE

</div>

</div>

</div>

</div>

</div>

</div>

@if($tournaments->isEmpty())

<div class="card">
    Henüz aktif turnuva bulunmuyor.
</div>

@else

@foreach($tournaments as $tournament)

@php

$registration = auth()->check()
? \App\Models\Registration::where('user_id',auth()->id())
->where('tournament_id',$tournament->id)
->latest()
->first()
: null;

$approved = $registration && $registration->status=="Onaylandı";

$percent = $tournament->max_teams > 0
? ($tournament->teams_count / $tournament->max_teams) * 100
: 0;

@endphp

<div class="card">

<div style="margin-bottom:15px;">

@if($tournament->status == 'Kayıt Açık')

<span style="background:#16a34a;padding:8px 15px;border-radius:25px;font-weight:bold;">
🟢 KAYITLAR AÇIK
</span>

@elseif($tournament->status == 'Kayıt Kapandı')

<span style="background:#f59e0b;padding:8px 15px;border-radius:25px;font-weight:bold;">
🟡 KAYITLAR KAPANDI
</span>

@elseif($tournament->status == 'Devam Ediyor')

<span style="background:#3b82f6;padding:8px 15px;border-radius:25px;font-weight:bold;">
🔵 DEVAM EDİYOR
</span>

@elseif($tournament->status == 'Tamamlandı')

<span style="background:#ef4444;padding:8px 15px;border-radius:25px;font-weight:bold;">
🔴 TAMAMLANDI
</span>

@elseif($tournament->status == 'Arşiv')

<span style="background:#6b7280;padding:8px 15px;border-radius:25px;font-weight:bold;">
📦 ARŞİV
</span>

@endif

</div>

<h2>{{ $tournament->title }}</h2>

<div class="tournament-layout">

    <!-- SOL TARAF -->
    <div class="left-side">

        <div class="info-grid">

            <div class="info-box">
                <span>🎮 Oyun</span>
                <strong>{{ $tournament->game }}</strong>
            </div>

            <div class="info-box">
                <span>📅 Tarih</span>
                <strong>{{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}</strong>
            </div>

            <div class="info-box">
                <span>🎙 Oda Yayını</span>
                <strong>{{ $tournament->room_publish_time }}</strong>
            </div>

            <div class="info-box">
                <span>🚀 Start</span>
                <strong>{{ $tournament->time }}</strong>
            </div>

        </div>

        <div id="countdown{{ $tournament->id }}"
        style="
        margin-top:15px;
        padding:15px;
        background:#111827;
        border-radius:12px;
        color:#22c55e;
        font-weight:bold;
        ">
            🕒 Oda Yayın Saati Bekleniyor...
        </div>

        <div style="margin-top:20px;">

            <p style="margin-bottom:8px;">
                👥 {{ $tournament->teams_count }} / {{ $tournament->max_teams }} Takım
            </p>

            <div class="progress">
                <div class="progress-bar" style="width:{{ $percent }}%;"></div>
            </div>

            <p style="margin-top:8px;font-weight:bold;">

                @if($percent>=100)

                    <span style="color:#ef4444;">
                        🔴 Turnuva Doldu
                    </span>

                @elseif($percent>=75)

                    <span style="color:#facc15;">
                        🟡 {{ number_format($percent,0) }}% Dolu
                    </span>

                @else

                    <span style="color:#22c55e;">
                        🟢 {{ number_format($percent,0) }}% Dolu
                    </span>

                @endif

            </p>

        </div>

    </div>

    <!-- SAĞ TARAF -->
    <div class="right-side">

        <div style="
        background:#111827;
        padding:20px;
        border-radius:14px;
        border:1px solid #374151;
        ">

            <h3 style="color:#facc15;margin-bottom:15px;">
                🏆 Ödül Dağılımı
            </h3>

            <p>🥇 <b>1.</b> {{ $tournament->first_prize ?: 'Belirtilmedi' }}</p>

            <p>🥈 <b>2.</b> {{ $tournament->second_prize ?: 'Belirtilmedi' }}</p>

            <p>🥉 <b>3.</b> {{ $tournament->third_prize ?: 'Belirtilmedi' }}</p>

        </div>

        <div style="
        background:#111827;
        padding:20px;
        border-radius:14px;
        border:1px solid #374151;
        text-align:center;
        ">

            <div style="
            color:#94a3b8;
            font-size:13px;
            margin-bottom:8px;
            ">
                💰 Giriş Ücreti
            </div>

            <div style="
            font-size:28px;
            font-weight:700;
            color:#22c55e;
            ">
                {{ $tournament->entry_fee }} ₺
            </div>

        </div>

        <div style="
        background:#111827;
        padding:20px;
        border-radius:14px;
        border:1px solid #374151;
        text-align:center;
        ">

            <div style="
            color:#94a3b8;
            font-size:13px;
            margin-bottom:8px;
            ">
                🏆 Ödül Havuzu
            </div>

            <div style="
            font-size:28px;
            font-weight:700;
            color:#facc15;
            ">
                {{ number_format($tournament->prize_pool,0,',','.') }} ₺
            </div>

        </div>

    </div>

</div>

@if($tournament->teams_count >= $tournament->max_teams)

<div style="
background:#dc2626;
padding:15px;
border-radius:10px;
text-align:center;
font-weight:bold;
margin-top:20px;
">

🔴 TURNUVA DOLDU

</div>

@else

<div id="joinArea{{ $tournament->id }}" style="margin-top:20px;">

@if(auth()->check())

    @if(!$registration)

        <a href="{{ route('registration.create',$tournament->id) }}" class="btn">
            🎮 Turnuvaya Katıl
        </a>

    @elseif($registration->status == 'Bekliyor')

        <div style="
        background:#f59e0b;
        color:white;
        padding:15px;
        border-radius:12px;
        text-align:center;
        font-weight:bold;
        ">

        🟡 Başvurunuz inceleniyor.

        </div>

    @elseif($registration->status == 'Onaylandı')

        <div style="
        background:#16a34a;
        color:white;
        padding:18px;
        border-radius:12px;
        text-align:center;
        font-weight:bold;
        ">

        ✅ Başvurunuz onaylandı.

        <br><br>

        🎮 Oda bilgilerini Oyuncu Panelinden görüntüleyebilirsiniz.

        </div>

    @else

        <div style="
        background:#dc2626;
        color:white;
        padding:15px;
        border-radius:12px;
        text-align:center;
        font-weight:bold;
        ">

        🔴 Başvurunuz reddedildi.

        </div>

    @endif

@else

    <a href="{{ route('login') }}" class="btn">
        👤 Giriş Yaparak Katıl
    </a>

@endif

</div>

@endif

</div> <!-- left-side -->

@endforeach

@endif

<div style="margin-top:30px;">

    <a href="/" class="btn home">
        ⬅ Ana Sayfa
    </a>

</div>

<script>

@foreach($tournaments as $tournament)

(function(){

    let countdown = document.getElementById("countdown{{ $tournament->id }}");

    let parts = "{{ $tournament->date }}".split("-");
    let time = "{{ $tournament->room_publish_time }}";

    let target = new Date(
        parts[0],
        parts[1]-1,
        parts[2],
        time.split(":")[0],
        time.split(":")[1]
    );

    function update(){

        let now = new Date();

        let diff = target - now;

        if(diff <= 0){

            countdown.innerHTML = `
            <div style="
                background:#16a34a;
                padding:15px;
                border-radius:10px;
                text-align:center;
                font-size:18px;
                font-weight:bold;
                color:white;
            ">
                🎮 ODA BİLGİLERİ YAYINLANDI
            </div>
            `;

            return;
}

let days = Math.floor(diff / 1000 / 60 / 60 / 24);
let hours = Math.floor(diff / 1000 / 60 / 60) % 24;
let minutes = Math.floor(diff / 1000 / 60) % 60;
let seconds = Math.floor(diff / 1000) % 60;

countdown.innerHTML = `

<div style="
font-size:20px;
font-weight:800;
color:#facc15;
text-align:center;
margin-bottom:20px;
">

⏳ Oda Yayınına Kalan Süre

</div>

<div style="
display:grid;
grid-template-columns:repeat(4,1fr);
gap:14px;
">

<div style="
background:rgba(17,24,39,.75);
border:1px solid rgba(139,92,246,.20);
backdrop-filter:blur(12px);
border-radius:16px;
padding:16px;
text-align:center;
">

<div style="
font-size:32px;
font-weight:800;
color:#ffffff;
">

${days}

</div>

<div style="
font-size:12px;
letter-spacing:1px;
color:#94a3b8;
margin-top:6px;
">

GÜN

</div>

</div>

<div style="
background:rgba(17,24,39,.75);
border:1px solid rgba(139,92,246,.20);
backdrop-filter:blur(12px);
border-radius:16px;
padding:16px;
text-align:center;
">

<div style="
font-size:32px;
font-weight:800;
color:#8b5cf6;
">

${hours}

</div>

<div style="
font-size:12px;
letter-spacing:1px;
color:#94a3b8;
margin-top:6px;
">

SAAT

</div>

</div>

<div style="
background:rgba(17,24,39,.75);
border:1px solid rgba(34,197,94,.20);
backdrop-filter:blur(12px);
border-radius:16px;
padding:16px;
text-align:center;
">

<div style="
font-size:32px;
font-weight:800;
color:#22c55e;
">

${minutes}

</div>

<div style="
font-size:12px;
letter-spacing:1px;
color:#94a3b8;
margin-top:6px;
">

DAKİKA

</div>

</div>

<div style="
background:rgba(17,24,39,.75);
border:1px solid rgba(245,158,11,.20);
backdrop-filter:blur(12px);
border-radius:16px;
padding:16px;
text-align:center;
">

<div style="
font-size:32px;
font-weight:800;
color:#f59e0b;
">

${seconds}

</div>

<div style="
font-size:12px;
letter-spacing:1px;
color:#94a3b8;
margin-top:6px;
">

SANİYE

</div>

</div>

</div>

`;

    }

    update();

    setInterval(update,1000);

})();

@endforeach

</script>

</body>
</html>