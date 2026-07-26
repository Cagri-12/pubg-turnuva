<!DOCTYPE html>
<html lang="tr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $setting->site_name ?? 'SPACE STONE STARS' }}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,Helvetica,sans-serif;
}

html{
scroll-behavior:smooth;
}

body{

background:#070b16;
color:#fff;
overflow-x:hidden;

}

a{

text-decoration:none;
color:inherit;

}

img{

max-width:100%;
display:block;

}

::-webkit-scrollbar{

width:10px;

}

::-webkit-scrollbar-thumb{

background:#7c3aed;
border-radius:20px;

}

header{

position:fixed;
top:0;
left:0;
width:100%;
z-index:999;

display:flex;
justify-content:space-between;
align-items:center;

padding:20px 70px;

background:rgba(7,11,22,.82);

backdrop-filter:blur(18px);

border-bottom:1px solid rgba(255,255,255,.08);

transition:.35s;

}

.logo img{

height:78px;

}

.menu{

display:flex;
align-items:center;
gap:35px;

}

.menu a{

color:white;
font-weight:bold;
transition:.3s;

}

.menu a:hover{

color:#b983ff;

}

.btn-login{

background:#7c3aed;
padding:12px 24px;
border-radius:12px;

}

.btn-login:hover{

background:#5b21b6;

}

.hero{

min-height:100vh;

display:flex;
align-items:center;

padding:150px 60px 90px;

background:

linear-gradient(rgba(8,10,20,.70),rgba(8,10,20,.88)),
url('/images/hero-bg.jpeg');

background-size:cover;
background-position:center;
background-repeat:no-repeat;

}

.hero-content{

width:100%;
max-width:1450px;

margin:auto;

display:flex;
justify-content:space-between;
align-items:center;

gap:80px;

}
.hero-left{
    flex:1;
    max-width:650px;
}

.hero-right{

flex:1;

display:flex;
justify-content:center;
align-items:center;

}

.hero-character{

width:480px;
max-width:100%;

filter:drop-shadow(0 0 40px rgba(124,58,237,.35));

animation:float 4s ease-in-out infinite;

}

@keyframes float{

0%{
transform:translateY(0);
}

50%{
transform:translateY(-12px);
}

100%{
transform:translateY(0);
}

}

.badge{

display:inline-block;

background:linear-gradient(90deg,#22c55e,#16a34a);

padding:10px 18px;

border-radius:12px;

font-size:14px;

font-weight:bold;

margin-bottom:22px;

}

.hero h1{

font-size:78px;

line-height:1.05;

margin-bottom:25px;

font-weight:900;

}

.hero h1 span{

color:#a855f7;

}

.hero p{

font-size:22px;

color:#d1d5db;

line-height:1.8;

max-width:650px;

}

.hero-buttons{

display:flex;

gap:20px;

margin-top:45px;

flex-wrap:wrap;

}

.hero-btn{

padding:20px 45px;

background:#7c3aed;

border-radius:14px;

font-size:18px;

font-weight:bold;

transition:.35s;

box-shadow:0 0 35px rgba(124,58,237,.30);

}

.hero-btn:hover{

transform:translateY(-6px);

background:#5b21b6;

}

.hero-btn2{

background:transparent;

border:2px solid #7c3aed;

}

.hero-btn2:hover{

background:#7c3aed;

}

.hero-stats{

display:flex;

gap:20px;

margin-top:45px;

flex-wrap:wrap;

}

.mini-card{

background:rgba(255,255,255,.05);

backdrop-filter:blur(15px);

border:1px solid rgba(255,255,255,.08);

border-radius:18px;

padding:20px;

min-width:140px;

text-align:center;

transition:.35s;

}

.mini-card:hover{

transform:translateY(-8px);

box-shadow:0 0 30px rgba(124,58,237,.35);

}

.mini-card strong{

font-size:28px;

display:block;

margin:8px 0;

color:#22c55e;

}
.container{

max-width:1400px;
margin:auto;
padding:90px 25px;

}

.section-title{

font-size:42px;

text-align:center;

margin-bottom:45px;

}

.stats{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

gap:25px;

}

.stat-card{

background:rgba(255,255,255,.04);

border:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(15px);

padding:35px;

border-radius:20px;

text-align:center;

transition:.35s;

}

.stat-card:hover{

transform:translateY(-8px);

box-shadow:0 0 30px rgba(124,58,237,.30);

}

.stat-number{

font-size:52px;

font-weight:bold;

color:#22c55e;

margin-bottom:10px;

}

.stat-title{

font-size:18px;

color:#d1d5db;

}

.grid{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(340px,1fr));

gap:30px;

}

.card{

background:linear-gradient(
180deg,
rgba(22,27,45,.90),
rgba(13,17,32,.92)
);

backdrop-filter:blur(18px);

border:1px solid rgba(124,58,237,.25);

border-radius:24px;

padding:30px;

transition:all .35s ease;

overflow:hidden;

position:relative;

}

.card::before{

content:'';

position:absolute;

top:0;
left:0;

width:100%;
height:4px;

background:linear-gradient(
90deg,
#7c3aed,
#22c55e
);

}

.card:hover{
    transform:translateY(-12px) scale(1.02);
    border-color:#a855f7;
    box-shadow:
        0 15px 45px rgba(124,58,237,.45),
        0 0 30px rgba(34,197,94,.20);
}

.card h3{

font-size:28px;

margin-bottom:18px;

color:#c084fc;

}

.card p{

line-height:1.8;

margin-bottom:10px;

color:#d1d5db;

}

.card a{
    position:relative;
    overflow:hidden;
}

.card a:hover{
    transform:translateY(-2px);
    box-shadow:0 0 25px rgba(124,58,237,.6);
}

.badge-card{

display:inline-block;

padding:9px 18px;

border-radius:30px;

font-size:13px;

font-weight:bold;

letter-spacing:.5px;

background:linear-gradient(
90deg,
#22c55e,
#16a34a
);

box-shadow:0 0 20px rgba(34,197,94,.30);

margin-bottom:18px;

}

footer{

margin-top:80px;

padding:70px 20px;

background:#0b1120;

border-top:1px solid rgba(255,255,255,.08);

text-align:center;

}

footer h2{

font-size:34px;

color:#c084fc;

margin-bottom:20px;

}

footer p{

color:#94a3b8;

line-height:1.8;

max-width:700px;

margin:auto;

}

@media(max-width:992px){

header{

padding:18px 25px;

}

.menu{

gap:15px;
font-size:14px;

}

.hero-content{

flex-direction:column;
text-align:center;

}

.hero-buttons{

justify-content:center;

}

.hero-stats{

justify-content:center;

}

.hero-character{

width:300px;

}

.hero h1{

font-size:48px;

}

.hero p{

font-size:18px;

}

}

</style>
<body>

<header>

<div class="logo">

<a href="/">

<img src="{{ asset('images/logo.png') }}" alt="Space Stone Stars">

</a>

</div>

<div class="menu">

<a href="/">Ana Sayfa</a>

<a href="{{ route('tournaments.index') }}">Turnuvalar</a>

@guest

<a href="{{ route('login') }}">Giriş Yap</a>

<a href="{{ route('register') }}" class="btn-login">

Kayıt Ol

</a>

@endguest

@auth

@if(auth()->user()->is_admin)

<a href="{{ route('dashboard') }}">Admin Paneli</a>

@else

<a href="{{ route('player.dashboard') }}">Oyuncu Paneli</a>

@endif

@endauth

</div>

</header>

<section class="hero">

<div class="hero-content">

<div class="hero-left">

<div class="badge">

🔥 TÜRKİYE PUBG MOBILE TURNUVA PLATFORMU

</div>

<h1>

SPACE STONE <span>STARS</span>

</h1>

<p>

Türkiye'nin profesyonel PUBG Mobile turnuva platformuna hoş geldin.

Gerçek ödüllü turnuvalara katıl, rakiplerini geride bırak ve zirveye adını yazdır.

Canlı oda sistemi, profesyonel organizasyon ve güvenli kayıt sistemiyle rekabetin tadını çıkar.

</p>

<div class="hero-buttons">

<a href="{{ route('tournaments.index') }}" class="hero-btn">

🏆 Turnuvaları İncele

</a>

@guest

<a href="{{ route('register') }}" class="hero-btn hero-btn2">

🚀 Hemen Kayıt Ol

</a>

@endguest

@auth

<a href="{{ auth()->user()->is_admin ? route('dashboard') : route('player.dashboard') }}" class="hero-btn hero-btn2">

👤 Panele Git

</a>

@endauth

</div>

<div class="hero-stats">

<div class="mini-card">

🏆

<strong>

{{ $tournaments->count() }}

</strong>

Turnuva

</div>

<div class="mini-card">

👥

<strong>

{{ \App\Models\User::count() }}

</strong>

Oyuncu

</div>

<div class="mini-card">

💰

<strong>

{{ number_format(\App\Models\Tournament::sum('prize_pool'),0,',','.') }}

₺

</strong>

Ödül

</div>

</div>

</div>


</div>

</section>

<div class="container">

<h2 class="section-title">
💎 NEDEN SPACE STONE STARS?
</h2>

<div class="grid">

<div class="card">
<h3>⚡ Hızlı Başvuru</h3>
<p>
Saniyeler içinde turnuvaya kayıt ol ve takımını oluştur.
</p>
</div>

<div class="card">
<h3>🏆 Gerçek Ödüller</h3>
<p>
Nakit ödüllü turnuvalarla rekabet et ve kazancını artır.
</p>
</div>

<div class="card">
<h3>🛡️ Güvenli Platform</h3>
<p>
Adil eşleşme sistemi ve profesyonel yönetim ile güvenli turnuvalar.
</p>
</div>

<div class="card">
<h3>👥 Güçlü Topluluk</h3>
<p>
PUBG Mobile oyuncularından oluşan aktif topluluğumuza katıl.
</p>
</div>

</div>

</div>

</div>

</div>

</div>

</div>
<div class="container">

<h2 class="section-title">

🏆 AKTİF TURNUVALAR

</h2>

<div class="grid">

@forelse($tournaments as $tournament)

<div class="card">

@if($tournament->status=="Kayıt Açık")

<div class="badge-card">
🟢 KAYITLAR AÇIK
</div>

@elseif($tournament->status=="Kayıt Kapandı")

<div class="badge-card" style="background:#f59e0b;">
🟡 KAYIT KAPANDI
</div>

@elseif($tournament->status=="Devam Ediyor")

<div class="badge-card" style="background:#3b82f6;">
🔵 DEVAM EDİYOR
</div>

@elseif($tournament->status=="Tamamlandı")

<div class="badge-card" style="background:#ef4444;">
🔴 TAMAMLANDI
</div>

@elseif($tournament->status=="Arşiv")

<div class="badge-card" style="background:#6b7280;">
📦 ARŞİV
</div>

@endif

<h3>

🏆 {{ $tournament->title }}

</h3>

<p>

🎮 <b>Oyun:</b>

{{ $tournament->game }}

</p>

<p>

📅 <b>Tarih:</b>

{{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}

</p>

<p>

🕒 <b>Başlangıç:</b>

{{ $tournament->time }}

</p>

<p>

💰 <b>Katılım:</b>

{{ number_format($tournament->entry_fee,0,',','.') }} ₺

</p>

<p>

👥 <b>Takım:</b>

{{ $tournament->teams_count }}

/

{{ $tournament->max_teams }}

</p>

@php

$percent = $tournament->max_teams > 0
? ($tournament->teams_count / $tournament->max_teams) * 100
: 0;

@endphp

<div style="margin:20px 0;">

<div style="
height:12px;
background:#1f2937;
border-radius:20px;
overflow:hidden;
">

<div style="
width:{{ $percent }}%;
height:100%;
background:linear-gradient(90deg,#22c55e,#7c3aed);
transition:.5s;
">

</div>

<div style="margin-top:20px;">
    <a href="{{ route('tournaments.show', $tournament) }}"
       style="
        display:block;
        text-align:center;
        padding:14px;
        border-radius:14px;
        text-decoration:none;
        font-weight:bold;
        color:white;
        background:linear-gradient(90deg,#7c3aed,#a855f7);
        transition:.3s;
        box-shadow:0 0 20px rgba(124,58,237,.35);
       ">
        🚀 Turnuvayı İncele
    </a>
</div>

</div>

</div>

<p style="font-weight:bold;color:#22c55e;">

Doluluk :

{{ number_format($percent,0) }}%

</p>
<hr style="margin:20px 0;border-color:#374151;">

<p style="font-size:18px;">
🥇
<b>{{ $tournament->first_prize ?? '-' }}</b>
</p>

<p style="font-size:18px;">
🥈
<b>{{ $tournament->second_prize ?? '-' }}</b>
</p>

<p style="font-size:18px;">
🥉
<b>{{ $tournament->third_prize ?? '-' }}</b>
</p>

@if(auth()->check())

<a href="{{ route('registration.create',$tournament->id) }}"
class="hero-btn"
style="display:block;text-align:center;margin-top:25px;">

🚀 Turnuvaya Katıl

</a>

@else

<a href="{{ route('login') }}"
class="hero-btn"
style="display:block;text-align:center;margin-top:25px;">

👤 Giriş Yap

</a>

@endif

</div>

@empty

<div class="card">

<h3>

😔 Henüz aktif turnuva bulunmuyor.

</h3>

<p>

Yeni turnuvalar çok yakında eklenecek.

</p>

</div>

@endforelse

</div>

</div>
<div class="container">

<h2 class="section-title">

📢 SON DUYURULAR

</h2>

<div class="grid">

@forelse($announcements as $announcement)

<div class="card">

<div class="badge-card" style="background:#7c3aed;">

📢 DUYURU

</div>

<h3>

{{ $announcement->title }}

</h3>

<p>

{{ $announcement->content }}

</p>

@if(isset($announcement->created_at))

<p style="margin-top:20px;color:#94a3b8;font-size:14px;">

🗓️ {{ $announcement->created_at->format('d.m.Y H:i') }}

</p>

@endif

</div>

@empty

<div class="card">

<h3>

📭 Henüz duyuru bulunmuyor.

</h3>

<p>

Yeni duyurular burada yayınlanacaktır.

</p>

</div>

@endforelse

</div>

</div>
<div class="container">

<h2 class="section-title">
    🏆 SON SONUÇLAR
</h2>

<div class="grid">

@forelse($results->take(1) as $result)

<div class="card" style="
    max-width:750px;
    margin:auto;
    background:#111827;
    border:1px solid rgba(255,255,255,.08);
    overflow:hidden;
">

    @if($result->image)

    <img
        src="{{ asset('storage/'.$result->image) }}"
        style="
            width:100%;
            max-height:420px;
            object-fit:cover;
            display:block;
        ">

    @endif

    <div style="padding:25px;">

        <span class="badge-card" style="background:#2563eb;">
            🏆 Match #{{ $result->match_number }}
        </span>

        <h3 style="
            margin-top:18px;
            color:white;
            font-size:28px;
            font-weight:700;
        ">
            {{ $result->title }}
        </h3>

        <p style="color:#94a3b8;margin-top:8px;">
            📅 {{ $result->created_at->format('d.m.Y') }}
        </p>

    </div>

</div>

@empty

<div class="card" style="text-align:center;">

    <h3>📸 Henüz sonuç paylaşılmadı.</h3>

    <p>Turnuva sonuçları burada yayınlanacaktır.</p>

</div>

@endforelse

</div>

</div>
<div class="container">

<h2 class="section-title">

📞 İLETİŞİM

</h2>

<div class="grid">

<div class="card">

<div class="badge-card" style="background:#22c55e;">

📱 WHATSAPP

</div>

<h3>

WhatsApp

</h3>

<p>

{{ $setting->whatsapp ?? 'Yakında eklenecek' }}

</p>

</div>

<div class="card">

<div class="badge-card" style="background:#3b82f6;">

📧 E-POSTA

</div>

<h3>

E-Posta

</h3>

<p>

{{ $setting->email ?? 'Yakında eklenecek' }}

</p>

</div>

<div class="card">

<div class="badge-card" style="background:#ec4899;">

📸 INSTAGRAM

</div>

<h3>

Instagram

</h3>

<p>

{{ $setting->instagram ?? 'Yakında eklenecek' }}

</p>

</div>

<div class="card">

<div class="badge-card" style="background:#5865F2;">

💬 DISCORD

</div>

<h3>

Discord

</h3>

<p>

{{ $setting->discord ?? 'Yakında eklenecek' }}

</p>

</div>

</div>

</div>
<div class="container">

<h2 class="section-title">

💳 ÖDEME BİLGİLERİ

</h2>

<div class="card">

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:25px;">

<div>

<h3 style="margin-bottom:15px;color:#22c55e;">

🏦 Banka

</h3>

<p>

{{ $setting->bank_name ?? '-' }}

</p>

</div>

<div>

<h3 style="margin-bottom:15px;color:#3b82f6;">

👤 Hesap Sahibi

</h3>

<p>

{{ $setting->account_name ?? '-' }}

</p>

</div>

<div>

<h3 style="margin-bottom:15px;color:#f59e0b;">

💳 IBAN

</h3>

<p style="word-break:break-all;">

{{ $setting->iban ?? '-' }}

</p>

</div>

</div>

</div>

</div>

<section style="padding:90px 20px;">

<div style="max-width:1200px;margin:auto;">

<div style="
background:linear-gradient(135deg,#6d28d9,#4f46e5);
padding:50px;
border-radius:25px;
text-align:center;
box-shadow:0 0 40px rgba(124,58,237,.35);
">

<h2 style="font-size:42px;margin-bottom:20px;">

🚀 Hazır mısın?

</h2>

<p style="font-size:20px;color:#e5e7eb;max-width:700px;margin:auto;line-height:1.8;">

Türkiye'nin en kaliteli PUBG Mobile turnuvalarına katıl,
takımını oluştur ve büyük ödüller için mücadele et.

</p>

<div style="margin-top:35px;display:flex;justify-content:center;gap:20px;flex-wrap:wrap;">

<a href="{{ route('tournaments.index') }}" class="hero-btn">

🏆 Turnuvaları Gör

</a>

@guest

<a href="{{ route('register') }}" class="hero-btn hero-btn2">

👤 Ücretsiz Kayıt Ol

</a>

@endguest

@auth

<a href="{{ auth()->user()->is_admin ? route('dashboard') : route('player.dashboard') }}" class="hero-btn hero-btn2">

🎮 Panele Git

</a>

@endauth

</div>

</div>

</div>

</section>
<footer>

<div style="max-width:1400px;margin:auto;">

<img
src="{{ asset('images/logo.png') }}"
style="
height:90px;
margin:auto;
margin-bottom:25px;
">

<h2>

SPACE STONE STARS

</h2>

<p style="margin-top:20px;">

{{ $setting->footer ?? 'Türkiye PUBG Mobile Turnuva Platformu. Profesyonel organizasyon, güvenli kayıt sistemi ve büyük ödüllü turnuvalar.' }}

</p>

<div style="
display:flex;
justify-content:center;
gap:20px;
flex-wrap:wrap;
margin-top:40px;
">

<a href="{{ route('tournaments.index') }}" class="hero-btn">

🏆 Turnuvalar

</a>

@guest

<a href="{{ route('register') }}" class="hero-btn hero-btn2">

🚀 Kayıt Ol

</a>

@endguest

@auth

@if(auth()->user()->is_admin)

<a href="{{ route('dashboard') }}" class="hero-btn hero-btn2">

👑 Admin Paneli

</a>

@else

<a href="{{ route('player.dashboard') }}" class="hero-btn hero-btn2">

🎮 Oyuncu Paneli

</a>

@endif

@endauth

</div>

<div style="
margin-top:50px;
display:flex;
justify-content:center;
gap:18px;
flex-wrap:wrap;
">

@if($setting && $setting->discord)

<a href="{{ $setting->discord }}"
target="_blank"
style="color:#5865F2;font-weight:bold;">

💬 Discord

</a>

@endif

@if($setting && $setting->instagram)

<a href="{{ $setting->instagram }}"
target="_blank"
style="color:#E1306C;font-weight:bold;">

📸 Instagram

</a>

@endif

@if($setting && $setting->whatsapp)

<a
    href="https://wa.me/{{ preg_replace('/[^0-9]/','',$setting->whatsapp) }}"
    target="_blank"
    style="color:#22c55e;font-weight:bold;"
>

    📱 WhatsApp

</a>

@endif

</div>

<p style="margin-top:45px;">

© {{ date('Y') }}

{{ $setting->site_name ?? 'SPACE STONE STARS' }}

Tüm Hakları Saklıdır.

</p>

</div>

</footer>

<script>

</script>

</body>

</html>