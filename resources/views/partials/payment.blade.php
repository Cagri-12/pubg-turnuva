<style>

.payment{

    padding:110px 25px;

}

.payment-container{

    max-width:900px;
    margin:auto;

}

.payment-card{

    position:relative;

    overflow:hidden;

    padding:50px;

    border-radius:28px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    text-align:center;

    transition:.35s;

}

.payment-card:hover{

    border-color:#7c3aed;

    box-shadow:0 25px 55px rgba(124,58,237,.30);

    transform:translateY(-6px);

}

.payment-icon{

    width:90px;

    height:90px;

    margin:auto auto 25px;

    border-radius:24px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

    background:linear-gradient(135deg,#7c3aed,#9333ea);

}

.payment-title{

    font-size:42px;

    font-weight:900;

    margin-bottom:15px;

}

.payment-desc{

    color:#9ca3af;

    margin-bottom:40px;

    line-height:1.8;

}

.payment-info{

    display:grid;

    gap:18px;

    margin-bottom:35px;

}

.payment-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    padding:18px 22px;

    border-radius:16px;

    background:rgba(255,255,255,.04);

    border:1px solid rgba(255,255,255,.05);

}

.payment-label{

    color:#9ca3af;

    font-weight:600;

}

.payment-value{

    font-weight:700;

    word-break:break-all;

}

.copy-btn{

    border:none;

    cursor:pointer;

    padding:16px 34px;

    border-radius:16px;

    font-weight:700;

    color:white;

    background:linear-gradient(135deg,#22c55e,#16a34a);

    transition:.3s;

}

.copy-btn:hover{

    transform:translateY(-3px);

    box-shadow:0 18px 35px rgba(34,197,94,.35);

}

@media(max-width:768px){

.payment-card{

padding:35px 22px;

}

.payment-title{

font-size:32px;

}

.payment-item{

flex-direction:column;

align-items:flex-start;

}

}

</style>

<section class="payment">

    <div class="payment-container">

        <div class="payment-card">

            <div class="payment-icon">
                💳
            </div>

            <h2 class="payment-title">
                Ödeme Bilgileri
            </h2>

            <p class="payment-desc">
                Turnuva kayıt ücretini aşağıdaki banka hesabına gönderebilir, ardından dekontunu kayıt sırasında yükleyebilirsin.
            </p>

            <div class="payment-info">

                <div class="payment-item">

                    <span class="payment-label">
                        🏦 Banka
                    </span>

                    <span class="payment-value">
                        {{ $setting->bank_name ?? '-' }}
                    </span>

                </div>

                <div class="payment-item">

                    <span class="payment-label">
                        👤 Hesap Sahibi
                    </span>

                    <span class="payment-value">
                        {{ $setting->account_name ?? '-' }}
                    </span>

                </div>

                <div class="payment-item">

                    <span class="payment-label">
                        💳 IBAN
                    </span>

                    <span class="payment-value" id="ibanText">
                        {{ $setting->iban ?? '-' }}
                    </span>

                </div>

            </div>

            <button class="copy-btn" onclick="copyIBAN()">
                📋 IBAN'ı Kopyala
            </button>

        </div>

    </div>

</section>

<script>
function copyIBAN() {

    const iban = document.getElementById('ibanText').innerText.trim();

    if (!iban || iban === '-') {
        alert('IBAN bilgisi bulunamadı.');
        return;
    }

    navigator.clipboard.writeText(iban).then(() => {
        alert('IBAN başarıyla kopyalandı.');
    }).catch(() => {
        alert('Kopyalama işlemi başarısız oldu.');
    });

}
</script>