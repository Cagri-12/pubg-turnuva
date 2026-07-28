<x-app-layout>

<div id="toast" style="
    position: fixed;
    top: 20px;
    right: 20px;
    background: #7c3aed;
    color: white;
    padding: 14px 18px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,.3);
    display: none;
    z-index: 9999;
    font-weight: 600;
    transition: .3s;
">
    ✅ İşlem başarılı
</div>

<style>

:root{
    --bg:#050812;
    --card:rgba(15,23,42,.78);
    --border:rgba(255,255,255,.08);
    --purple:#7c3aed;
    --purple2:#a855f7;
    --text:#fff;
    --muted:#94a3b8;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:
    linear-gradient(rgba(4,7,18,.88),rgba(4,7,18,.94)),
    url('/images/space-bg.webp');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    color:var(--text);
}

.dashboard{
    max-width:1450px;
    margin:auto;
    padding:35px;
}

.header-card{

    position:relative;
    overflow:hidden;

    min-height:650px;

    border-radius:30px;

    padding:25px;

    background:
    linear-gradient(90deg,
    rgba(7,9,20,.82),
    rgba(7,9,20,.45)),
    url('/images/hero-banner.webp');

    background-size:cover;
    background-position:right center;

    border:1px solid rgba(255,255,255,.08);

    box-shadow:
    0 15px 45px rgba(0,0,0,.45);

}

.header-card::before{

    content:"";

    position:absolute;

    width:500px;
    height:500px;

    right:-180px;
    top:-180px;

    border-radius:50%;

    background:rgba(124,58,237,.18);

    filter:blur(80px);

}

.hero-content{

    position:relative;
    z-index:5;

}

.hero-badge{

    display:inline-block;

    background:rgba(124,58,237,.20);

    color:#fff;

    padding:10px 18px;

    border-radius:50px;

    border:1px solid rgba(255,255,255,.08);

    font-size:13px;

    letter-spacing:2px;

    margin-bottom:20px;

}

.hero-buttons{

    display:flex;

    gap:15px;

    flex-wrap:wrap;

    margin-top:25px;

}

.hero-btn{

    padding:14px 28px;

    border-radius:14px;

    background:linear-gradient(135deg,#7c3aed,#4f46e5);

    color:#fff;

    text-decoration:none;

    font-weight:700;

    transition:.30s;

    box-shadow:0 10px 25px rgba(124,58,237,.35);

}

.hero-btn:hover{

    transform:translateY(-4px);

    box-shadow:0 20px 35px rgba(124,58,237,.50);

}

.hero-btn.secondary{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(15px);

}

.grid{

    margin-top:35px;

}

.top-grid,
.bottom-grid{

    display:grid;

    grid-template-columns:1fr 1fr 320px;

    gap:25px;

    margin-bottom:25px;

}

.card{

    background:var(--card);

    backdrop-filter:blur(18px);

    border:1px solid var(--border);

    border-radius:22px;

    padding:28px;

    transition:.30s;

    box-shadow:0 10px 35px rgba(0,0,0,.30);

}

.card:hover{

    transform:translateY(-5px);

    border-color:rgba(124,58,237,.45);

    box-shadow:0 20px 45px rgba(124,58,237,.18);

}

.card-title{

    display:flex;

    align-items:center;

    gap:10px;

    font-size:22px;

    font-weight:800;

    margin-bottom:25px;

}

.info-item{

    margin-bottom:18px;

}

.info-item label{

    color:var(--muted);

    font-size:14px;

}

.info-item strong{

    display:block;

    margin-top:5px;

    font-size:21px;

}

.info{

    margin:14px 0;

    font-size:17px;

}

.success{

    color:#22c55e;

}

.warning{

    color:#facc15;

}

.danger{

    color:#ef4444;

}

img{

    max-width:100%;

    border-radius:15px;

}

@media(max-width:1200px){

.top-grid,
.bottom-grid{

grid-template-columns:1fr;

}

.dashboard{

padding:18px;

}

.header-card{

padding:35px;

}

.header-card h1{

font-size:42px !important;

}

}

.info-item strong{
font-size:22px;
font-weight:800;
margin-top:6px;
color:white;
}

.quick-btn{
display:flex;
align-items:center;
gap:12px;
padding:18px;
margin-bottom:15px;
border-radius:14px;
text-decoration:none;
color:#fff;
background:rgba(255,255,255,.05);
border:1px solid rgba(255,255,255,.08);
transition:.3s;
font-weight:700;
}

.quick-btn:hover{
background:#7c3aed;
transform:translateX(6px);
box-shadow:0 10px 30px rgba(124,58,237,.35);
}

.info-grid{
display:flex;
flex-direction:column;
gap:18px;
}

.info-box{
background:rgba(255,255,255,.05);
padding:18px;
border-radius:16px;
border:1px solid rgba(255,255,255,.08);
transition:.30s;
}

.info-box:hover{
background:rgba(124,58,237,.10);
border-color:#7c3aed;
transform:translateY(-3px);
box-shadow:0 12px 25px rgba(124,58,237,.20);
}

.info-box label{
display:block;
font-size:14px;
color:#94a3b8;
margin-bottom:8px;
}

.info-box strong{
font-size:22px;
font-weight:800;
color:#fff;
}

@media (max-width:768px){

.dashboard{
    padding:15px;
}

.header-card{
    padding:25px;
    min-height:auto;
    text-align:center;
}

.header-card h1{
    font-size:34px !important;
}

.hero-buttons{
    flex-direction:column;
}

.hero-btn{
    width:100%;
}

.top-grid,
.bottom-grid{
    grid-template-columns:1fr;
}

.card{
    padding:20px;
}

}

/* ===========================
   MOBİL GÖRÜNÜM
=========================== */

@media (max-width:768px){

.dashboard{
    padding:15px;
}

.header-card{
    padding:25px;
    min-height:auto;
    text-align:center;
}

.hero-badge{
    font-size:11px;
    letter-spacing:1px;
}

.header-card h1{
    font-size:34px !important;
    line-height:1.2;
}

.hero-content p{
    font-size:15px !important;
    max-width:100% !important;
}

.hero-content>div{
    justify-content:center !important;
}

.hero-buttons{
    flex-direction:column;
}

.hero-btn{
    width:100%;
    text-align:center;
}

.top-grid,
.bottom-grid{
    display:grid;
    grid-template-columns:1fr;
    gap:20px;
}

.card{
    padding:20px;
}

.card-title{
    font-size:20px;
}

.info-box strong{
    font-size:18px;
}

.info{
    font-size:15px;
    word-break:break-word;
}

img{
    width:100%;
    height:auto;
}

button{
    width:100%;
    margin-top:10px;
}

}

</style>

<div class="dashboard">

<div class="header-card">

    <div class="hero-content">

        <span class="hero-badge">
            PUBG MOBILE TOURNAMENT
        </span>

        <h1 style="
            font-size:58px;
            font-weight:900;
            line-height:1.05;
            margin-top:10px;
            text-shadow:0 8px 30px rgba(0,0,0,.65);
        ">
            <span style="color:#c084fc;">SPACE</span>
            <span style="color:#8b5cf6;">STONE</span>
            <span style="color:#ffffff;">STARS</span>
        </h1>

        <p style="
            margin-top:18px;
            font-size:19px;
            color:#e2e8f0;
            max-width:620px;
            line-height:1.7;
        ">
            PUBG Mobile turnuvalarına katıl, takımını yönet ve Space Stone Stars
            topluluğunun bir parçası ol.
        </p>

        <div style="
            margin-top:30px;
            display:flex;
            align-items:center;
            gap:15px;
            flex-wrap:wrap;
        ">

            <div style="
                width:62px;
                height:62px;
                border-radius:50%;
                background:rgba(255,255,255,.08);
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:28px;
                backdrop-filter:blur(10px);
            ">
                👤
            </div>

            <div>

                <div style="
                    color:#94a3b8;
                    font-size:14px;
                ">
                    Hoş Geldin
                </div>

                <div style="
                    font-size:30px;
                    font-weight:800;
                    color:#fff;
                ">
                    {{ auth()->user()->name }}
                </div>

            </div>

        </div>

        <div class="hero-buttons">

            <a href="{{ route('tournaments.index') }}"
               class="hero-btn">
                🏆 Turnuvalar
            </a>

            <a href="{{ route('supports.index') }}"
               class="hero-btn secondary">
                🎧 Destek Merkezi
            </a>

        </div>

    </div>

</div>

<div class="grid">

    <div class="top-grid">

        {{-- 🏆 Turnuva Bilgilerim --}}
        <div class="card">

            <div class="card-title" style="
justify-content:space-between;
border-bottom:1px solid rgba(255,255,255,.08);
padding-bottom:18px;
">

    <span style="display:flex;align-items:center;gap:10px;">
        🏆 Turnuva Bilgilerim
    </span>

    <span style="
        background:rgba(124,58,237,.18);
        color:#c084fc;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:700;
    ">
        Oyuncu
    </span>

</div>

           @if($registration)

<div class="info-grid">

    <div class="info-item info-box">
        <label>🏆 Turnuva</label>
        <strong>{{ $registration->tournament->title }}</strong>
    </div>

    <div class="info-item info-box">
        <label>👥 Takım</label>
        <strong>{{ $registration->team_name }}</strong>
    </div>

    <div class="info-item info-box">
        <label>📱 Telefon</label>
        <strong>{{ $registration->phone }}</strong>
    </div>

    <div class="info-item info-box">

        <label>📋 Başvuru Durumu</label>

        @if($registration->status=="Onaylandı")

            <strong class="success">🟢 Onaylandı</strong>

        @elseif($registration->status=="Bekliyor")

            <strong class="warning">🟡 Bekliyor</strong>

        @else

            <strong class="danger">🔴 Reddedildi</strong>

        @endif

    </div>

</div>

@else

<p class="info">
    Henüz bir turnuvaya kayıt olmadınız.
</p>

@endif

        </div>

        {{-- 🎮 Oda Bilgileri --}}
        <div class="card">

            <div class="card-title">
                🎮 Oda Bilgileri
            </div>

            @if($registration && $registration->status=="Onaylandı")

                @if($room)

                    <p class="info">
                        🎯 <b>Slot:</b>
                        {{ $registration->slot ?? '-' }}
                    </p>

                    <div class="info" style="display:flex;justify-content:space-between;align-items:center;gap:10px;">

    <div>
        🆔 <b>Room ID:</b>
        <span id="room-id">{{ $room->room_id }}</span>
    </div>

    <button
    onclick="copyText('room-password')"
    style="
        background:linear-gradient(135deg,#7c3aed,#5b21b6);
        border:none;
        border-radius:10px;
        padding:10px 15px;
        color:#fff;
        font-weight:bold;
        cursor:pointer;
        transition:.30s;
        box-shadow:0 10px 25px rgba(124,58,237,.40);
    ">
    📋
</button>

</div>

                    <div class="info" style="display:flex;justify-content:space-between;align-items:center;gap:10px;">

    <div>
        🔑 <b>Şifre:</b>
        <span id="room-password">{{ $room->room_password }}</span>
    </div>

    <button
        onclick="copyText('room-password')"
background:linear-gradient(135deg,#7c3aed,#5b21b6);
border:none;
border-radius:10px;
padding:10px 15px;
font-weight:bold;
cursor:pointer;
transition:.30s;
transform:translateY(-2px);
box-shadow:0 10px 25px rgba(124,58,237,.40);
 ">
        📋
    </button>

</div>

                    <p class="info">
                        🗺️ <b>Harita:</b>
                        {{ $room->map }}
                    </p>

                    <p class="info">
                        🚀 <b>Başlangıç:</b>
                        {{ $room->start_time }}
                    </p>

                    @if($room->announcement)

                        <hr style="margin:20px 0;border-color:#334155;">

                        <p class="info">
                            📢 <b>Admin Duyurusu</b>
                        </p>

                        <div style="background:#0f172a;padding:15px;border-radius:10px;">
                            {{ $room->announcement }}
                        </div>

                    @endif

                @else

                    <div style="background:#ef4444;padding:18px;border-radius:12px;font-weight:bold;">
                        Henüz oda oluşturulmamış.
                    </div>

                @endif

            @else

                <div style="background:#334155;padding:18px;border-radius:12px;">
                    Başvurunuz onaylandıktan sonra oda bilgileri burada görüntülenecektir.
                </div>

            @endif

        </div>

        {{-- ⚡ Hızlı Menü --}}
        <div class="card">

            <div class="card-title">
                ⚡ Hızlı Menü
            </div>

          <a href="{{ route('tournaments.index') }}"
class="quick-btn">
🏆 Aktif Turnuvalar
</a>

<a href="{{ route('supports.index') }}"
class="quick-btn">
🎧 Destek Merkezi
</a>

<a href="{{ route('reports.create') }}"
class="quick-btn">
🚨 Slot İşgali Bildir
</a>

<a href="{{ route('profile.edit') }}"
class="quick-btn">
👤 Profilim
</a>

        </div>

    </div> {{-- top-grid bitiş --}}

    <div class="bottom-grid">

        {{-- 📢 Son Duyurular --}}
        <div class="card">

            <div class="card-title">
                📢 Son Duyurular
            </div>

            @if($announcements->count())

                @foreach($announcements as $announcement)

                    <div style="background:#0f172a;padding:18px;border-radius:12px;margin-bottom:15px;">

                        <h3 style="margin-top:0;color:#c084fc;">
                            {{ $announcement->title }}
                        </h3>

                        <p>{{ $announcement->content }}</p>

                    </div>

                @endforeach

            @else

                <p>Henüz aktif duyuru bulunmuyor.</p>

            @endif

        </div>

        {{-- 📸 Son Sonuç --}}
        <div class="card">

            <div class="card-title">
                📸 Son Sonuç
            </div>

            @if($result)

                <p>🏆 {{ $result->title }}</p>

                <p>
                    Maç No :
                    {{ $result->match_number }}
                </p>

                @if($result->image)

                    <img
                        src="{{ asset('storage/'.$result->image) }}"
                        style="width:100%;border-radius:15px;margin-top:15px;">

                        <a
    href="{{ asset('storage/'.$result->image) }}"
    target="_blank"
    style="
        display:inline-block;
        margin-top:18px;
        padding:12px 22px;
        background:linear-gradient(135deg,#7c3aed,#4f46e5);
        color:#fff;
        text-decoration:none;
        border-radius:12px;
        font-weight:700;
        transition:.3s;
    "
    onmouseover="this.style.transform='translateY(-2px)'"
    onmouseout="this.style.transform='translateY(0)'"
>
    🔍 Sonucu Gör
</a>

                @endif

            @else

                Henüz sonuç paylaşılmadı.

            @endif

        </div>

        {{-- ☎️ İletişim --}}
        <div class="card">

            <div class="card-title">
                ☎️ İletişim
            </div>

            <p>
                📱 WhatsApp
                <br><br>
                <b>{{ $setting->whatsapp ?? 'Henüz eklenmedi' }}</b>
            </p>

            <hr style="margin:20px 0;border-color:#334155;">

            <p>
                📧 E-Posta
                <br><br>
                <b>{{ $setting->email ?? 'Henüz eklenmedi' }}</b>
            </p>

            <hr style="margin:20px 0;border-color:#334155;">

            <p>
                📸 Instagram
                <br><br>
                <b>{{ $setting->instagram ?? 'Henüz eklenmedi' }}</b>
            </p>

            <hr style="margin:20px 0;border-color:#334155;">

            <p>
                💬 Discord
                <br><br>
                <b>{{ $setting->discord ?? 'Henüz eklenmedi' }}</b>
            </p>

        </div>

    </div> {{-- bottom-grid bitiş --}}

    <div class="bottom-grid">

        {{-- 🔔 Bildirimler --}}
        <div class="card">

            <div class="card-title">
                🔔 Bildirimler
            </div>

            @if($notification)

    <div style="
        background:#0f172a;
        padding:15px;
        border-radius:10px;
        border-left:5px solid #7c3aed;
    ">

        <h4 style="margin:0;color:#c084fc;">
            {{ $notification->title }}
        </h4>

        <p style="margin-top:8px;">
            {{ $notification->message }}
        </p>

        <small style="color:#94a3b8;">
            {{ $notification->created_at->diffForHumans() }}
        </small>

    </div>

@else

    <p>Henüz bildiriminiz yok.</p>

@endif

        </div>

        {{-- 👤 Hesap Bilgileri --}}
        <div class="card">

            <div class="card-title">
                👤 Hesap Bilgileri
            </div>

            <p>
                👤 Oyuncu
                <br>
                <b>{{ auth()->user()->name }}</b>
            </p>

            <br>

            <p>
                📧 {{ auth()->user()->email }}
            </p>

            @if($registration)

                <hr style="margin:20px 0;border-color:#334155;">

                <p>
                    🏆 Katıldığı Turnuva
                    <br>
                    <b>{{ $registration->tournament->title }}</b>
                </p>

            @endif

        </div>

        {{-- Boş sütun (3'lü hizalama için) --}}
        <div></div>

    </div> {{-- bottom-grid bitiş --}}

</div> {{-- grid bitiş --}}

</div>

</div>

</div>

</div>

</div>

<script>
function showToast(message) {

    const toast = document.getElementById('toast');

    toast.innerText = message;
    toast.style.display = 'block';

    setTimeout(() => {
        toast.style.display = 'none';
    }, 2000);

}

function copyText(id) {

    const text = document.getElementById(id).innerText;

    navigator.clipboard.writeText(text);

    showToast("✅ Panoya kopyalandı");

}
</script>

</x-app-layout>