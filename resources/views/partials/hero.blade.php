<style>

.hero{

    position:relative;
    min-height:100vh;

    display:flex;
    align-items:center;

    overflow:hidden;

    padding:140px 40px 80px;

    background:
    radial-gradient(circle at top right,rgba(124,58,237,.30),transparent 40%),
    radial-gradient(circle at bottom left,rgba(59,130,246,.18),transparent 35%),
    linear-gradient(180deg,#050814 0%,#0a1020 100%);

}

.hero::before{

    content:'';

    position:absolute;

    inset:0;

    background:url('/images/hero-bg.jpeg') no-repeat;

    background-size:cover;

    background-position:right center;

    opacity:.42;

    transform:scale(1);

}

.hero::after{

    content:'';

    position:absolute;

    inset:0;

    background:linear-gradient(
        90deg,
        rgba(5,8,20,.96) 0%,
        rgba(5,8,20,.75) 45%,
        rgba(5,8,20,.45) 100%
    );

}

.hero-container{

    position:relative;
    z-index:2;

    max-width:1400px;

    width:100%;

    margin:auto;

    display:grid;

    grid-template-columns:1.1fr .9fr;

    gap:70px;

    align-items:center;

    position:relative;

    z-index:5; 

}

.hero-badge{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:12px 20px;

    border-radius:50px;

    background:rgba(124,58,237,.18);

    border:1px solid rgba(168,85,247,.35);

    color:#d8b4fe;

    font-weight:700;

    margin-bottom:28px;

    backdrop-filter:blur(18px);

}

.hero-title{

    font-size:72px;

    line-height:1.05;

    font-weight:900;

    margin-bottom:25px;

}

.hero-title span{

    color:#a855f7;

}

.hero-text{

    font-size:20px;

    line-height:1.9;

    color:#cbd5e1;

    max-width:650px;

    margin-bottom:45px;

}

.hero-buttons{
    display:flex;
    flex-direction:column;
    gap:18px;
    align-items:center;
}

.hero-primary{

    padding:18px 36px;

    border-radius:14px;

    background:linear-gradient(135deg,#7c3aed,#9333ea);

    color:white;

    font-weight:800;

    transition:.35s;

    box-shadow:0 20px 40px rgba(124,58,237,.35);

}

.hero-primary:hover{

    transform:translateY(-6px);

}

.hero-secondary{

    padding:18px 36px;

    border-radius:14px;

    border:2px solid rgba(168,85,247,.4);

    backdrop-filter:blur(15px);

    transition:.35s;

}

.hero-secondary:hover{

    background:#7c3aed;

}

.hero-stats{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:18px;

    margin-top:45px;

}

.hero-card{

    padding:22px;

    text-align:center;

    border-radius:18px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

}

.hero-card strong{

    display:block;

    font-size:34px;

    color:#22c55e;

    margin:10px 0;

}

.hero-right{

    display:flex;

    justify-content:center;

    align-items:center;

}

.hero-character{

    width:560px;

    max-width:100%;

    filter:drop-shadow(0 0 60px rgba(124,58,237,.45));

    animation:floating 5s ease-in-out infinite;

}

@keyframes floating{

    0%,100%{

        transform:translateY(0);

    }

    50%{

        transform:translateY(-15px);

    }

}

@media(max-width:992px){

.hero{

    padding:120px 22px 60px;

}

.hero-container{

    grid-template-columns:1fr;

    text-align:center;

}

.hero-title{

    font-size:44px;

}

.hero-text{

    font-size:17px;

    margin:auto auto 35px;

}

.hero-buttons{

    justify-content:center;

}

.hero-stats{

    grid-template-columns:1fr;

}

.hero-character{

    width:340px;

    margin-top:25px;

}

}

</style>

<section class="hero">

<div class="hero-container">

<div class="hero-left">

<div class="hero-badge">

🔥 TÜRKİYE PUBG MOBILE TURNUVA PLATFORMU

</div>

<h1 class="hero-title">

SPACE STONE <span>STARS</span>

</h1>

<p class="hero-text">

Türkiye'nin profesyonel PUBG Mobile turnuva platformuna hoş geldin.

Gerçek ödüllü turnuvalara katıl, takımını kur, rakiplerini geride bırak ve zirveye adını yazdır.

</p>

<div class="hero-buttons">

<a href="{{ route('tournaments.index') }}" class="hero-primary">

🏆 Turnuvaları İncele

</a>

@guest

    <a href="{{ route('register') }}" class="hero-btn hero-secondary">
        🚀 Hemen Kayıt Ol
    </a>

    <a href="{{ route('login') }}" class="hero-btn hero-outline">
        🔑 Giriş Yap
    </a>

@else

    <a href="{{ route('player.dashboard') }}" class="hero-btn hero-secondary">
        🎮 Oyuncu Paneli
    </a>

@endauth

</div>

<div class="hero-stats">

    <div class="hero-card">

        🏆

        <strong>

            {{ $tournaments->count() }}

        </strong>

        Turnuva

    </div>

    <div class="hero-card">

        👥

        <strong>

            {{ \App\Models\User::count() }}

        </strong>

        Oyuncu

    </div>

    <div class="hero-card">

        💰

        <strong>

            {{ number_format(\App\Models\Tournament::sum('prize_pool'),0,',','.') }}₺

        </strong>

        Ödül Havuzu

    </div>

</div>

</div>

<div class="hero-glow glow-left"></div>
<div class="hero-glow glow-right"></div>

</section>

<style>

.hero-glow{

    position:absolute;

    width:450px;

    height:450px;

    border-radius:50%;

    filter:blur(130px);

    z-index:1;

    opacity:.35;

}

.glow-left{

    left:-150px;

    top:120px;

    background:#7c3aed;

}

.glow-right{

    right:-150px;

    bottom:-80px;

    background:#2563eb;

}

@media(max-width:992px){

.hero-glow{

    width:220px;

    height:220px;

    filter:blur(90px);

}

}

</style>

<script>

window.addEventListener('scroll',()=>{

    const hero=document.querySelector('.hero-character');

    if(hero){

        hero.style.transform='translateY('+(window.scrollY*0.08)+'px)';

    }

});

</script>