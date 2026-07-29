<header class="header">

    <div class="nav-container">

        <a href="{{ url('/') }}" class="logo">

            <img src="{{ asset('images/logo.png') }}"
                 alt="{{ $setting->site_name ?? 'Logo' }}">

            <div class="logo-text">

                <span>{{ $setting->site_name ?? 'SPACE STONE' }}</span>

                <small>STARS</small>

            </div>

        </a>

        <nav class="desktop-menu">

            <a href="{{ url('/') }}">Ana Sayfa</a>

            <a href="{{ route('tournaments.index') }}">
                Turnuvalar
            </a>

            <a href="#announcements">
                Duyurular
            </a>

            <a href="#results">
                Sonuçlar
            </a>

            <a href="#contact">
                İletişim
            </a>

        </nav>

        <div class="desktop-actions">

            @guest

                <a href="{{ route('login') }}"
                   class="login-btn">

                    Giriş Yap

                </a>

                <a href="{{ route('register') }}"
                   class="register-btn">

                    Kayıt Ol

                </a>

            @else

                @if(auth()->user()->is_admin)

                    <a href="{{ route('dashboard') }}"
                       class="panel-btn">

                        Admin Paneli

                    </a>

                @else

                    <a href="{{ route('player.dashboard') }}"
                       class="panel-btn">

                        Oyuncu Paneli

                    </a>

                @endif

            @endguest

        </div>

        <button id="menuToggle"
                class="mobile-menu-btn">

            ☰

        </button>

    </div>

</header>

<div id="mobileOverlay"
     class="mobile-overlay"></div>

<aside id="mobileMenu"
       class="mobile-menu">

    <div class="mobile-top">

        <h3>Menü</h3>

        <button id="closeMenu">

            ✕

        </button>

    </div>

    <nav class="mobile-links">

        <a href="{{ url('/') }}">
            🏠 Ana Sayfa
        </a>

        <a href="{{ route('tournaments.index') }}">
            🏆 Turnuvalar
        </a>

        <a href="#announcements">
            📢 Duyurular
        </a>

        <a href="#results">
            🏅 Sonuçlar
        </a>

        <a href="#contact">
            📞 İletişim
        </a>

        <hr>

        @guest

            <a href="{{ route('login') }}">
                🔑 Giriş Yap
            </a>

            <a href="{{ route('register') }}">
                🚀 Kayıt Ol
            </a>

        @else

            @if(auth()->user()->is_admin)

                <a href="{{ route('dashboard') }}">
                    👑 Admin Paneli
                </a>

            @else

                <a href="{{ route('player.dashboard') }}">
                    🎮 Oyuncu Paneli
                </a>

            @endif

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button class="logout-btn">

                    🚪 Çıkış Yap

                </button>

            </form>

        @endguest

    </nav>

</aside>

<style>

:root{
    --primary:#7c3aed;
    --primary-hover:#9333ea;
    --success:#22c55e;
    --bg:rgba(7,11,22,.88);
    --border:rgba(255,255,255,.08);
}

.header{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    z-index:1000;
    backdrop-filter:blur(20px);
    background:var(--bg);
    border-bottom:1px solid var(--border);
}

.nav-container{
    max-width:1400px;
    height:82px;
    margin:auto;
    padding:0 25px;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.logo{
    display:flex;
    align-items:center;
    gap:14px;
    text-decoration:none;
    color:#fff;
}

.logo img{
    width:56px;
    height:56px;
    object-fit:contain;
}

.logo-text{
    display:flex;
    flex-direction:column;
}

.logo-text span{
    font-size:20px;
    font-weight:900;
}

.logo-text small{
    color:var(--primary);
    letter-spacing:3px;
    font-size:12px;
    font-weight:700;
}

.desktop-menu{
    display:flex;
    align-items:center;
    gap:28px;
}

.desktop-menu a{
    color:#fff;
    text-decoration:none;
    font-weight:700;
    position:relative;
    transition:.25s;
}

.desktop-menu a::after{
    content:"";
    position:absolute;
    left:0;
    bottom:-8px;
    width:0;
    height:2px;
    background:var(--primary);
    transition:.3s;
}

.desktop-menu a:hover{
    color:var(--primary);
}

.desktop-menu a:hover::after{
    width:100%;
}

.desktop-actions{
    display:flex;
    align-items:center;
    gap:12px;
}

.login-btn,
.register-btn,
.panel-btn{

    text-decoration:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:700;
    transition:.3s;

}

.login-btn{

    color:#fff;
    border:1px solid rgba(255,255,255,.15);

}

.login-btn:hover{

    background:rgba(255,255,255,.08);

}

.register-btn{

    color:#fff;
    background:linear-gradient(135deg,var(--primary),var(--primary-hover));

}

.register-btn:hover{

    transform:translateY(-2px);

}

.panel-btn{

    color:#fff;
    background:linear-gradient(135deg,#16a34a,#22c55e);

}

.mobile-menu-btn{

    display:none;
    width:48px;
    height:48px;
    border:none;
    border-radius:12px;
    background:var(--primary);
    color:#fff;
    font-size:22px;
    cursor:pointer;

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

.mobile-menu{

    position:fixed;
    top:0;
    right:-340px;
    width:320px;
    max-width:90%;
    height:100vh;
    background:#0f172a;
    border-left:1px solid var(--border);
    transition:.35s;
    z-index:999;
    display:flex;
    flex-direction:column;

}

.mobile-menu.active{

    right:0;

}

.mobile-top{

    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:22px;
    border-bottom:1px solid var(--border);

}

.mobile-top h3{

    margin:0;
    color:#fff;

}

#closeMenu{

    background:none;
    border:none;
    color:#fff;
    font-size:28px;
    cursor:pointer;

}

.mobile-links{

    display:flex;
    flex-direction:column;
    padding:20px;

}

.mobile-links a{

    text-decoration:none;
    color:#fff;
    padding:14px 0;
    font-weight:700;

}

.mobile-links hr{

    border:none;
    border-top:1px solid var(--border);
    margin:18px 0;

}

.logout-btn{

    width:100%;
    margin-top:12px;
    padding:14px;
    border:none;
    border-radius:12px;
    cursor:pointer;
    background:#dc2626;
    color:#fff;
    font-weight:700;

}

body.menu-open{

    overflow:hidden;

}

@media(max-width:992px){

    .desktop-menu,
    .desktop-actions{

        display:none;

    }

    .mobile-menu-btn{

        display:flex;
        align-items:center;
        justify-content:center;

    }

    .logo-text span{

        font-size:17px;

    }

    .nav-container{

        height:76px;
        padding:0 18px;

    }

}

</style>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('mobileOverlay');
    const openBtn = document.getElementById('menuToggle');
    const closeBtn = document.getElementById('closeMenu');

    function openMenu() {
        menu.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('menu-open');
    }

    function closeMenu() {
        menu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('menu-open');
    }

    openBtn.addEventListener('click', openMenu);

    closeBtn.addEventListener('click', closeMenu);

    overlay.addEventListener('click', closeMenu);

    document.addEventListener('keydown', function(e){

        if(e.key === 'Escape'){
            closeMenu();
        }

    });

    document.querySelectorAll('.mobile-links a').forEach(link => {

        link.addEventListener('click', function(){

            closeMenu();

        });

    });

});

</script>

