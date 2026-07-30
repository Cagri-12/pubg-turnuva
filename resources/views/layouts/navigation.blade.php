<style>

:root{
    --nav-bg:#0b1020;
    --sidebar:#111827;
    --purple:#7c3aed;
    --purple2:#a855f7;
    --text:#ffffff;
    --muted:#94a3b8;
    --border:rgba(255,255,255,.08);
}

.player-navbar{
    position:sticky;
    top:0;
    z-index:999;
    height:78px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 28px;
    background:rgba(8,12,24,.92);
    backdrop-filter:blur(18px);
    border-bottom:1px solid var(--border);
}

.nav-left{
    display:flex;
    align-items:center;
    gap:18px;
}

.logo{
    display:flex;
    align-items:center;
    gap:14px;
    text-decoration:none;
}

.logo img{
    width:48px;
    height:48px;
    object-fit:contain;
}

.logo-title{
    display:block;
    color:white;
    font-weight:900;
    font-size:20px;
    letter-spacing:.5px;
}

.logo-title strong{
    color:#c084fc;
}

.logo small{
    color:var(--muted);
    font-size:11px;
    letter-spacing:2px;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:22px;
}

.nav-icon{
    position:relative;
    color:#fff;
    text-decoration:none;
    font-size:24px;
    transition:.3s;
}

.nav-icon:hover{
    transform:translateY(-2px);
}

.badge{
    position:absolute;
    top:-8px;
    right:-10px;
    min-width:20px;
    height:20px;
    border-radius:50%;
    background:#ef4444;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:11px;
    font-weight:bold;
}

.user-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.avatar{
    width:46px;
    height:46px;
    border-radius:50%;
    background:linear-gradient(135deg,var(--purple),var(--purple2));
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    font-weight:800;
    font-size:18px;
    box-shadow:0 8px 20px rgba(124,58,237,.35);
}

.user-info strong{
    display:block;
    color:#fff;
    font-size:15px;
}

.user-info small{
    color:var(--muted);
}

.menu-toggle{
    display:none;
    border:none;
    background:none;
    color:white;
    font-size:28px;
    cursor:pointer;
}

.sidebar{
    position:fixed;
    left:0;
    top:78px;
    width:270px;
    height:calc(100vh - 78px);
    background:rgba(10,15,30,.96);
    backdrop-filter:blur(20px);
    border-right:1px solid var(--border);
    padding:28px 18px;
    display:flex;
    flex-direction:column;
    transition:.35s;
}

.sidebar-header{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:30px;
}

.sidebar-header img{
    width:42px;
}

.sidebar-header h3{
    color:white;
    font-size:20px;
    margin:0;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:14px 16px;
    margin-bottom:10px;
    border-radius:14px;
    text-decoration:none;
    color:#dbe4f3;
    transition:.30s;
    font-weight:600;
}

.sidebar a:hover,
.sidebar a.active{
    background:linear-gradient(135deg,var(--purple),#5b21b6);
    color:#fff;
    transform:translateX(6px);
}

.logout-btn{
    width:100%;
    margin-top:25px;
    border:none;
    padding:15px;
    border-radius:14px;
    background:#ef4444;
    color:#fff;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}

.logout-btn:hover{
    background:#dc2626;
}

.mobile-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.55);
    opacity:0;
    visibility:hidden;
    transition:.3s;
    z-index:998;
}

.mobile-overlay.active{
    opacity:1;
    visibility:visible;
}

@media(max-width:992px){

    .menu-toggle{
        display:block;
    }

    .sidebar{
        left:-280px;
        z-index:999;
    }

    .sidebar.active{
        left:0;
    }

    .logo small{
        display:none;
    }

    .user-info{
        display:none;
    }

    .player-navbar{
        padding:0 16px;
    }

}
</style>

<nav class="player-navbar">

    <div class="nav-left">

        <button id="menuToggle" class="menu-toggle">
            ☰
        </button>

        <a href="{{ auth()->user()->is_admin ? route('dashboard') : route('player.dashboard') }}" class="logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo">

            <div class="logo-text">

                <span class="logo-title">
                    SPACE STONE <strong>STARS</strong>
                </span>

                <small>PUBG MOBILE TOURNAMENT</small>

            </div>

        </a>

    </div>

    <div class="nav-right">

        <a href="{{ route('notifications.index') }}" class="nav-icon">

            🔔

            @if($notificationCount)

                <span class="badge">
                    {{ $notificationCount }}
                </span>

            @endif

        </a>

        <div class="user-box">

            <div class="avatar">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <div class="user-info">

                <strong>{{ auth()->user()->name }}</strong>

                <small>

                    @if(auth()->user()->is_admin)
                        Administrator
                    @else
                        Oyuncu
                    @endif

                </small>

            </div>

        </div>

    </div>

</nav>

<div id="mobileOverlay" class="mobile-overlay"></div>

<aside id="sidebar" class="sidebar">

    <div class="sidebar-header">

        <img src="{{ asset('images/logo.png') }}">

        <h3>SPACE STONE</h3>

    </div>

    @if(auth()->user()->is_admin)

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('tournaments.index') }}">
            🏆 Turnuvalar
        </a>

        <a href="{{ route('registrations.index') }}">
            📝 Başvurular
        </a>

        <a href="{{ route('rooms.index') }}">
            🎮 Oda Yönetimi
        </a>

        <a href="{{ route('results.index') }}">
            🏅 Sonuçlar
        </a>

        <a href="{{ route('users.index') }}">
            👥 Kullanıcılar
        </a>

        <a href="{{ route('settings.index') }}">
            ⚙ Ayarlar
        </a>

    @else

        <a href="{{ route('player.dashboard') }}"
           class="{{ request()->routeIs('player.dashboard') ? 'active' : '' }}">
            🏠 Panelim
        </a>

        <a href="{{ route('tournaments.index') }}">
            🏆 Turnuvalar
        </a>

        <a href="{{ route('supports.index') }}">
            🎧 Destek
        </a>

        <a href="{{ route('profile.edit') }}">
            👤 Profilim
        </a>

    @endif

    <form method="POST" action="{{ route('logout') }}" style="margin-top:auto;">

        @csrf

        <button class="logout-btn">

            🚪 Güvenli Çıkış

        </button>

    </form>

</aside>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const menuBtn = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('mobileOverlay');

    function openMenu(){
        sidebar.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu(){
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if(menuBtn){
        menuBtn.addEventListener('click', openMenu);
    }

    if(overlay){
        overlay.addEventListener('click', closeMenu);
    }

    document.querySelectorAll('.sidebar a').forEach(link=>{
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', e=>{
        if(e.key === 'Escape'){
            closeMenu();
        }
    });

});
</script>