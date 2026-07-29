<style>

.stats-section{

    padding:100px 25px;

    position:relative;

}

.stats-container{

    max-width:1400px;

    margin:auto;

}

.stats-title{

    text-align:center;

    font-size:48px;

    font-weight:900;

    margin-bottom:20px;

}

.stats-subtitle{

    text-align:center;

    color:#9ca3af;

    font-size:18px;

    margin-bottom:60px;

}

.stats-grid{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:25px;

}

.stat-box{

    position:relative;

    overflow:hidden;

    padding:35px;

    border-radius:24px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    transition:.35s;

}

.stat-box:hover{

    transform:translateY(-10px);

    border-color:#9333ea;

    box-shadow:0 20px 45px rgba(124,58,237,.30);

}

.stat-icon{

    width:70px;

    height:70px;

    border-radius:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:32px;

    background:linear-gradient(135deg,#7c3aed,#9333ea);

    margin-bottom:25px;

}

.stat-number{

    font-size:48px;

    font-weight:900;

    color:#22c55e;

    margin-bottom:12px;

}

.stat-title{

    font-size:22px;

    font-weight:700;

    margin-bottom:10px;

}

.stat-desc{

    color:#9ca3af;

    line-height:1.8;

}

@media(max-width:992px){

.stats-grid{

grid-template-columns:1fr;

}

.stats-title{

font-size:36px;

}

.stat-number{

font-size:40px;

}

}

</style>

<section class="stats-section">

<div class="stats-container">

<h2 class="stats-title">

PLATFORM İSTATİSTİKLERİ

</h2>

<p class="stats-subtitle">

Türkiye'nin en hızlı büyüyen PUBG Mobile turnuva platformu

</p>

<div class="stats-grid">

<div class="stat-box">

<div class="stat-icon">

🏆

</div>

<div class="stat-number">

{{ $tournaments->count() }}

</div>

<div class="stat-title">

Aktif Turnuva

</div>

<div class="stat-desc">

Her hafta yeni ödüllü turnuvalar düzenlenmektedir.

</div>

</div>

<div class="stat-box">

<div class="stat-icon">

👥

</div>

<div class="stat-number">

{{ \App\Models\User::count() }}

</div>

<div class="stat-title">

Toplam Oyuncu

</div>

<div class="stat-desc">

Platformumuza kayıtlı profesyonel oyuncular.

</div>

</div>

<div class="stat-box">

<div class="stat-icon">

💰

</div>

<div class="stat-number">

{{ number_format(\App\Models\Tournament::sum('prize_pool'),0,',','.') }}₺

</div>

<div class="stat-title">

Toplam Ödül

</div>

<div class="stat-desc">

Dağıtılan ve dağıtılacak ödül havuzu.

</div>

</div>

</div>

</div>

</section>