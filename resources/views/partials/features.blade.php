<style>

.features{

    padding:110px 25px;
    position:relative;

}

.features-container{

    max-width:1400px;
    margin:auto;

}

.features-header{

    text-align:center;
    margin-bottom:70px;

}

.features-header h2{

    font-size:48px;
    font-weight:900;
    margin-bottom:18px;

}

.features-header p{

    color:#9ca3af;
    font-size:18px;
    max-width:700px;
    margin:auto;
    line-height:1.8;

}

.features-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:30px;

}

.feature-card{

    position:relative;

    overflow:hidden;

    border-radius:28px;

    padding:40px;

    background:linear-gradient(
        180deg,
        rgba(18,25,45,.92),
        rgba(10,14,28,.95)
    );

    border:1px solid rgba(124,58,237,.25);

    backdrop-filter:blur(20px);

    transition:.35s;

}

.feature-card:hover{

    transform:translateY(-12px);

    border-color:#a855f7;

    box-shadow:
        0 20px 45px rgba(124,58,237,.35),
        0 0 35px rgba(168,85,247,.15);

}

.feature-card::before{

    content:'';

    position:absolute;

    left:0;
    top:0;

    width:100%;
    height:4px;

    background:linear-gradient(
        90deg,
        #7c3aed,
        #22c55e
    );

}

.feature-icon{

    width:80px;
    height:80px;

    border-radius:22px;

    display:flex;

    justify-content:center;
    align-items:center;

    font-size:38px;

    background:linear-gradient(
        135deg,
        #7c3aed,
        #9333ea
    );

    margin-bottom:30px;

    box-shadow:0 0 35px rgba(124,58,237,.35);

}

.feature-card h3{

    font-size:30px;

    margin-bottom:18px;

    font-weight:800;

}

.feature-card p{

    color:#cbd5e1;

    line-height:1.9;

    font-size:17px;

}

@media(max-width:992px){

.features{

padding:80px 20px;

}

.features-grid{

grid-template-columns:1fr;

}

.features-header h2{

font-size:36px;

}

.feature-card{

padding:30px;

}

}

</style>

<section class="features">

<div class="features-container">

<div class="features-header">

<h2>

NEDEN SPACE STONE STARS?

</h2>

<p>

Profesyonel PUBG Mobile oyuncuları için geliştirilen güvenli,
hızlı ve ödül odaklı turnuva platformu.

</p>

</div>

<div class="features-grid">

<div class="feature-card">

<div class="feature-icon">

⚡

</div>

<h3>

Hızlı Başvuru

</h3>

<p>

Takımını saniyeler içerisinde oluştur, başvurunu tamamla ve
anında turnuvaya katıl.

</p>

</div>

<div class="feature-card">

<div class="feature-icon">

🏆

</div>

<h3>

Gerçek Para Ödülü

</h3>

<p>

Yüksek ödül havuzuna sahip profesyonel PUBG Mobile
turnuvalarında mücadele et.

</p>

</div>

<div class="feature-card">

<div class="feature-icon">

🛡️

</div>

<h3>

Güvenli Sistem

</h3>

<p>

Profesyonel yönetim paneli, oda sistemi ve
adil oyun kuralları ile güvenli rekabet.

</p>

</div>

<div class="feature-card">

<div class="feature-icon">

👥

</div>

<h3>

Aktif Topluluk

</h3>

<p>

Türkiye'nin en güçlü PUBG Mobile topluluğuna katıl,
kendini kanıtla ve zirveye yüksel.

</p>

</div>

</div>

</div>

</section>