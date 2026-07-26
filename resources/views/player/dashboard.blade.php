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

.header-card{

    position:relative;
    overflow:hidden;

    background:
    linear-gradient(
        90deg,
        rgba(8,10,20,.60) 0%,
        rgba(8,10,20,.40) 35%,
        rgba(8,10,20,.35) 65%,
        rgba(8,10,20,.18) 100%
    ),
    url('/images/hero-banner.webp');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    min-height:340px;
    padding:55px 60px;

    border-radius:28px;
}

body{
    background:
        linear-gradient(
            rgba(5,8,18,.82),
            rgba(5,8,18,.90)
        ),
        url('/images/space-bg.webp');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;

    background-color:#050812;
}

.dashboard{
    max-width:1300px;
    margin:auto;
    padding:35px;

    background:transparent;
}

.header-card h1{
    font-size:38px;
    margin:0;
}

.header-card p{
    margin-top:10px;
    font-size:18px;
}

.grid{
    display:flex;
    flex-direction:column;
    gap:25px;
    margin-top:35px;
}

.card{
    background:#1e293b;
    color:white;
    border-radius:18px;
    padding:30px;
    margin-bottom:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.30);
}

.card-title{
    display:flex;
    align-items:center;
    gap:10px;

    font-size:22px;
    font-weight:700;

    margin-bottom:30px;

    color:#fff;
}

.info{
    margin:12px 0;
    font-size:18px;
}

.success{
    color:#22c55e;
    font-weight:bold;
}

.warning{
    color:#facc15;
    font-weight:bold;
}

.danger{
    color:#ef4444;
    font-weight:bold;
}

.top-grid{
    display:grid;
    grid-template-columns:1fr 1fr 320px;
    gap:25px;
    margin-bottom:25px;
}

.bottom-grid{
    display:grid;
    grid-template-columns:1fr 1fr 320px;
    gap:25px;
    margin-top:25px;
}

.info-item{
    margin-bottom:18px;
}

.info-item label{
    display:block;
    font-size:15px;
    color:#94a3b8;
    margin-bottom:6px;
}

.info-item strong{
    display:block;
    font-size:22px;
    font-weight:700;
    color:#fff;
}

</style>

<div class="dashboard">

<div class="header-card">

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <span
    class="hero-badge"
    style="color:#ffffff !important;"
>
    PUBG MOBILE TOURNAMENT
</span>

       <h1

style="

font-size:54px;

font-weight:900;

text-shadow:0 3px 20px rgba(0,0,0,.8);

line-height:1.1;

">

<span style="color:#c084fc;">

SPACE

</span>

<span style="color:#8b5cf6;">

STONE

</span>

<span style="color:#ffffff;">

STARS

</span>

</h1>

       <p
    class="hero-text"
    style="color:#ffffff !important; text-shadow:0 2px 10px rgba(0,0,0,.8) !important;"
>
    Compete • Survive • Become Legend
</p>

        <h3
    style="color:#ffffff !important; margin-top:12px; font-size:26px; font-weight:700;"
>
    Hoş Geldin
    <span style="color:#c084fc !important;">
        {{ auth()->user()->name }}
    </span>
    👋
</h3>

       <div class="hero-buttons" style="margin-top:18px;">

    <a href="{{ route('tournaments.index') }}"
   class="hero-btn"
   style="color:#ffffff !important;">
    🏆 Turnuvalar
</a>

   <a href="{{ route('supports.index') }}"
   class="hero-btn secondary"
   style="color:#ffffff !important;">
    🎧 Destek
</a>

</div>

    </div>

</div>

<div class="grid">

    <div class="top-grid">

        {{-- 🏆 Turnuva Bilgilerim --}}
        <div class="card">

            <div class="card-title">
                🏆 Turnuva Bilgilerim
            </div>

            @if($registration)

                <div class="info-grid" style="display:flex;flex-direction:column;gap:10px;">

                    <div class="info-item">
                        <label>🏆 Turnuva</label>
                        <strong>{{ $registration->tournament->title }}</strong>
                    </div>

                    <div class="info-item">
                        <label>👥 Takım</label>
                        <strong>{{ $registration->team_name }}</strong>
                    </div>

                    <div class="info-item">
                        <label>📱 Telefon</label>
                        <strong>{{ $registration->phone }}</strong>
                    </div>

                    <div class="info-item">
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
        onclick="copyText('room-id')"
        style="
        background:#7c3aed;
        color:white;
        border:none;
        border-radius:8px;
        padding:8px 12px;
        cursor:pointer;
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
        style="
        background:#7c3aed;
        color:white;
        border:none;
        border-radius:8px;
        padding:8px 12px;
        cursor:pointer;
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
               style="display:block;background:#4f46e5;color:white;padding:18px;border-radius:10px;text-decoration:none;margin-bottom:15px;">
                🏆 Aktif Turnuvalar
            </a>

            <a href="{{ route('supports.index') }}"
               style="display:block;background:#0891b2;color:white;padding:18px;border-radius:10px;text-decoration:none;margin-bottom:15px;">
                🎧 Destek Merkezi
            </a>

            <a href="{{ route('reports.create') }}"
               style="display:block;background:#dc2626;color:white;padding:18px;border-radius:10px;text-decoration:none;margin-bottom:15px;">
                🚨 Slot İşgali Bildir
            </a>

            <a href="{{ route('profile.edit') }}"
               style="display:block;background:#f59e0b;color:white;padding:18px;border-radius:10px;text-decoration:none;">
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