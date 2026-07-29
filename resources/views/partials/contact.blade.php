<style>

.contact{

    padding:110px 25px;

}

.contact-container{

    max-width:1400px;
    margin:auto;

}

.contact-header{

    text-align:center;
    margin-bottom:70px;

}

.contact-header h2{

    font-size:48px;
    font-weight:900;
    margin-bottom:15px;

}

.contact-header p{

    color:#9ca3af;
    font-size:18px;

}

.contact-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:30px;

}

.contact-card{

    position:relative;

    overflow:hidden;

    padding:35px;

    border-radius:24px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    transition:.35s;

    text-decoration:none;

    color:white;

}

.contact-card:hover{

    transform:translateY(-10px);

    border-color:#9333ea;

    box-shadow:0 20px 45px rgba(124,58,237,.30);

}

.contact-icon{

    width:80px;

    height:80px;

    border-radius:22px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:38px;

    margin-bottom:25px;

    background:linear-gradient(135deg,#7c3aed,#9333ea);

}

.contact-card h3{

    font-size:28px;

    margin-bottom:15px;

}

.contact-card p{

    color:#cbd5e1;

    line-height:1.8;

}

.contact-arrow{

    margin-top:25px;

    font-weight:700;

    color:#22c55e;

}

@media(max-width:992px){

.contact-grid{

grid-template-columns:1fr;

}

.contact-header h2{

font-size:36px;

}

.contact-card{

padding:28px;

}

}

</style>

<section class="contact">

    <div class="contact-container">

        <div class="contact-header">

            <h2>Bize Ulaşın</h2>

            <p>
                Sorularınız, destek talepleriniz ve iş birlikleri için bizimle iletişime geçin.
            </p>

        </div>

        <div class="contact-grid">

            <a href="#" class="contact-card">

                <div class="contact-icon">🎮</div>

                <h3>Discord</h3>

                <p>

                    Topluluğumuza katıl, turnuva duyurularını ilk sen öğren ve
                    oyuncularla iletişim kur.

                </p>

                <div class="contact-arrow">

                    Sunucuya Katıl →

                </div>

            </a>

            <a href="#" class="contact-card">

                <div class="contact-icon">📷</div>

                <h3>Instagram</h3>

                <p>

                    Etkinliklerimizi, kazananları ve duyuruları Instagram
                    hesabımızdan takip edebilirsin.

                </p>

                <div class="contact-arrow">

                    Profili Gör →

                </div>

            </a>

            <a href="mailto:destek@example.com" class="contact-card">

                <div class="contact-icon">✉️</div>

                <h3>E-Posta</h3>

                <p>

                    Teknik destek, iş birlikleri ve diğer tüm konular için bize
                    e-posta gönderebilirsin.

                </p>

                <div class="contact-arrow">

                    Mail Gönder →

                </div>

            </a>

            <a href="{{ route('supports.create') }}" class="contact-card">

                <div class="contact-icon">🛟</div>

                <h3>Destek Talebi</h3>

                <p>

                    Hesabın veya turnuvan ile ilgili bir sorun mu yaşadın?
                    Destek talebi oluştur.

                </p>

                <div class="contact-arrow">

                    Destek Aç →

                </div>

            </a>

        </div>

    </div>

</section>