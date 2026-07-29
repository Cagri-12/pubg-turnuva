<style>

.cta{

    position:relative;
    padding:130px 25px;
    overflow:hidden;

}

.cta::before{

    content:'';

    position:absolute;

    inset:0;

    background:
        radial-gradient(circle at left,#7c3aed33,transparent 45%),
        radial-gradient(circle at right,#22c55e22,transparent 45%);

    z-index:0;

}

.cta-container{

    position:relative;

    z-index:2;

    max-width:1200px;

    margin:auto;

    text-align:center;

    padding:70px 50px;

    border-radius:32px;

    background:rgba(255,255,255,.05);

    backdrop-filter:blur(18px);

    border:1px solid rgba(124,58,237,.25);

    box-shadow:0 20px 50px rgba(0,0,0,.35);

}

.cta-badge{

    display:inline-block;

    padding:10px 22px;

    border-radius:999px;

    background:#7c3aed;

    font-weight:700;

    margin-bottom:25px;

}

.cta-title{

    font-size:58px;

    font-weight:900;

    line-height:1.2;

    margin-bottom:25px;

}

.cta-text{

    max-width:760px;

    margin:auto;

    color:#cbd5e1;

    line-height:1.9;

    font-size:18px;

}

.cta-buttons{

    display:flex;

    justify-content:center;

    gap:20px;

    margin-top:45px;

    flex-wrap:wrap;

}

.cta-btn{

    padding:18px 40px;

    border-radius:16px;

    text-decoration:none;

    font-weight:800;

    transition:.3s;

}

.cta-primary{

    background:linear-gradient(135deg,#7c3aed,#9333ea);

    color:white;

}

.cta-primary:hover{

    transform:translateY(-4px);

    box-shadow:0 20px 40px rgba(124,58,237,.35);

}

.cta-secondary{

    border:1px solid rgba(255,255,255,.15);

    color:white;

}

.cta-secondary:hover{

    background:rgba(255,255,255,.08);

}

@media(max-width:992px){

.cta{

padding:90px 20px;

}

.cta-container{

padding:45px 30px;

}

.cta-title{

font-size:38px;

}

.cta-text{

font-size:16px;

}

}

</style>

<section class="cta">

    <div class="cta-container">

        <span class="cta-badge">

            🚀 SPACE STONE STARS

        </span>

        <h2 class="cta-title">

            Takımını Kur,
            <br>
            Zirveye Oyna!

        </h2>

        <p class="cta-text">

            PUBG Mobile turnuvalarında kendini kanıtla.
            Profesyonel organizasyonlar, güvenli kayıt sistemi ve
            ödüllü turnuvalar seni bekliyor.

        </p>

        <div class="cta-buttons">

            <a href="{{ route('tournaments.index') }}"
               class="cta-btn cta-primary">

                🏆 Turnuvaları Gör

            </a>

            @guest

                <a href="{{ route('register') }}"
                   class="cta-btn cta-secondary">

                    👤 Hemen Kayıt Ol

                </a>

            @else

                <a href="{{ route('player.dashboard') }}"
                   class="cta-btn cta-secondary">

                    🎮 Oyuncu Paneli

                </a>

            @endguest

        </div>

    </div>

</section>