<header class="header">

    <div class="nav-container">

        <a href="/" class="logo">

            <img src="{{ asset('images/logo.png') }}" alt="Space Stone Stars">

            <div class="logo-text">

                <span>SPACE STONE</span>

                <small>STARS</small>

            </div>

        </a>

        <nav class="desktop-menu">

            <a href="/">Ana Sayfa</a>

            <a href="{{ route('tournaments.index') }}">Turnuvalar</a>

            @guest
                <a href="{{ route('login') }}">Giriş Yap</a>

                <a href="{{ route('register') }}" class="register-btn">
                    Kayıt Ol
                </a>
            @endguest

            @auth

                @if(auth()->user()->is_admin)

                    <a href="{{ route('dashboard') }}" class="panel-btn">
                        Admin Paneli
                    </a>

                @else

                    <a href="{{ route('player.dashboard') }}" class="panel-btn">
                        Oyuncu Paneli
                    </a>

                @endif

            @endauth

        </nav>

        <button class="mobile-menu-btn">

            ☰

        </button>

    </div>

</header>

<style>

.header{

    position:fixed;
    top:0;
    left:0;
    width:100%;
    z-index:999;

    backdrop-filter:blur(20px);
    background:rgba(7,11,22,.85);

    border-bottom:1px solid rgba(255,255,255,.08);

}

.nav-container{

    max-width:1400px;
    margin:auto;

    height:90px;

    padding:0 30px;

    display:flex;
    align-items:center;
    justify-content:space-between;

}

.logo{

    display:flex;
    align-items:center;
    gap:14px;

}

.logo img{

    width:64px;
    height:64px;
    object-fit:contain;

}

.logo-text{

    display:flex;
    flex-direction:column;

}

.logo-text span{

    font-size:22px;
    font-weight:900;
    letter-spacing:1px;

}

.logo-text small{

    color:#a855f7;
    font-size:14px;
    font-weight:700;
    letter-spacing:3px;

}

.desktop-menu{

    display:flex;
    align-items:center;
    gap:28px;

}

.desktop-menu a{

    color:white;
    font-weight:700;
    transition:.30s;

}

.desktop-menu a:hover{

    color:#a855f7;

}

.register-btn{

    padding:13px 24px;

    border-radius:12px;

    background:linear-gradient(135deg,#7c3aed,#9333ea);

}

.panel-btn{

    padding:13px 24px;

    border-radius:12px;

    background:#22c55e;

}

.mobile-menu-btn{

    display:none;

    width:48px;
    height:48px;

    border:none;

    border-radius:12px;

    background:#7c3aed;

    color:white;

    font-size:22px;

    cursor:pointer;

}

@media(max-width:992px){

    .nav-container{

        height:80px;

        padding:0 18px;

    }

    .logo img{

        width:52px;
        height:52px;

    }

    .logo-text span{

        font-size:17px;

    }

    .logo-text small{

        font-size:11px;

    }

    .desktop-menu{

        display:none;

    }

    .mobile-menu-btn{

        display:flex;

        align-items:center;
        justify-content:center;

    }

}

</style>