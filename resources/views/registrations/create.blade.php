<x-app-layout>

<div class="admin-container">

    <div class="admin-hero">

        <div>

            <h1>🏆 Turnuvaya Katıl</h1>

            <p>
                Turnuva başvurunuzu tamamlamak için aşağıdaki ödeme bilgilerini kullanarak
                ödemenizi gerçekleştirip başvuru formunu doldurunuz.
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="success-box">

            {{ session('success') }}

        </div>

    @endif

    <div class="page-card dark-card">

        <h2 class="section-title stats-title">
            🎮 Turnuva Bilgileri
        </h2>

        <div style="
            background:#0f172a;
            border:1px solid rgba(255,255,255,.08);
            border-radius:15px;
            padding:25px;
            margin-bottom:30px;
        ">

            <h3 style="color:#8b5cf6;font-size:26px;font-weight:bold;margin-bottom:15px;">

                {{ $tournament->title }}

            </h3>

            <p style="color:#e5e7eb;">
                🎮 {{ $tournament->game }}
            </p>

            <p style="color:#e5e7eb;">
                📅 {{ $tournament->date }}
                &nbsp;&nbsp;🕒 {{ $tournament->time }}
            </p>

            <p style="
                margin-top:15px;
                color:#22c55e;
                font-size:20px;
                font-weight:bold;
            ">

                💰 Katılım Ücreti:
                {{ number_format($tournament->entry_fee,0,',','.') }} ₺

            </p>

        </div>

        <h2 class="section-title stats-title">
            💳 Ödeme Bilgileri
        </h2>

        <div style="
            background:#111827;
            border:1px solid rgba(255,255,255,.08);
            border-radius:15px;
            padding:25px;
            margin-bottom:25px;
        ">

            <h3 style="color:#22c55e;margin-bottom:20px;">

                🏦 Garanti BBVA

            </h3>

            <p style="color:#d1d5db;">
                <b>Alıcı:</b> ÇAĞRI AKARCA
            </p>

            <input
                id="iban1"
                type="text"
                value="TR680006200001800006862448"
                readonly
                style="
                    width:100%;
                    padding:15px;
                    background:#0f172a;
                    color:white;
                    border:1px solid rgba(255,255,255,.08);
                    border-radius:12px;
                    margin:15px 0;
                ">

            <button
                type="button"
                class="btn btn-purple"
                onclick="copyIBAN('iban1')">

                📋 IBAN'ı Kopyala

            </button>

        </div>

        <div style="
            background:#111827;
            border:1px solid rgba(255,255,255,.08);
            border-radius:15px;
            padding:25px;
            margin-bottom:25px;
        ">

            <h3 style="color:#8b5cf6;margin-bottom:20px;">

                🏦 Enpara

            </h3>

            <p style="color:#d1d5db;">
                <b>Alıcı:</b> KEMAL AKARCA
            </p>

            <input
                id="iban2"
                type="text"
                value="TR020015700000000098677018"
                readonly
                style="
                    width:100%;
                    padding:15px;
                    background:#0f172a;
                    color:white;
                    border:1px solid rgba(255,255,255,.08);
                    border-radius:12px;
                    margin:15px 0;
                ">

            <button
                type="button"
                class="btn btn-purple"
                onclick="copyIBAN('iban2')">

                📋 IBAN'ı Kopyala

            </button>

        </div>

        <div style="
            background:#052e16;
            border:1px solid rgba(34,197,94,.35);
            border-radius:15px;
            padding:25px;
            margin-bottom:35px;
        ">

            <h3 style="color:#22c55e;font-size:22px;">

                💰 Ödenecek Tutar:
                {{ number_format($tournament->entry_fee,0,',','.') }} ₺

            </h3>

            <p style="margin-top:15px;color:#d1fae5;">

                📌 <b>Banka Açıklaması:</b>
                <span style="color:#f87171;font-weight:bold;">
                    Boş Bırakınız
                </span>

            </p>

            <p style="margin-top:10px;color:#fff;">

                📸 Ödeme yaptıktan sonra aşağıdaki formdan dekontunuzu yükleyiniz.

            </p>

        </div>

        <h2 class="section-title stats-title">
            📝 Başvuru Bilgileri
        </h2>

        <form
            action="{{ route('registration.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <input
                type="hidden"
                name="tournament_id"
                value="{{ $tournament->id }}">

            <div style="margin-bottom:22px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:8px;">
                    👤 Ad Soyad
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ auth()->user()->name }}"
                    readonly
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:8px;">
                    📧 E-Posta
                </label>

                <input
                    type="text"
                    value="{{ auth()->user()->email }}"
                    readonly
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:8px;">
                    📱 Telefon
                </label>

                <input
                    type="text"
                    name="phone"
                    required
                    placeholder="05XXXXXXXXX"
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:8px;">
                    👥 Takım Adı
                </label>

                <input
                    type="text"
                    name="team_name"
                    required
                    placeholder="Takım adınızı giriniz"
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:8px;">
                    💳 Havale Gönderen Ad Soyad
                </label>

                <input
                    type="text"
                    name="sender_name"
                    required
                    placeholder="Ödemeyi yapan kişinin adı"
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <div style="margin-bottom:30px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:10px;">
                    📸 Dekont Yükle
                </label>

                <input
                    type="file"
                    name="receipt"
                    required
                    style="
                        width:100%;
                        padding:12px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    ">

            </div>

            <button
                type="submit"
                class="btn btn-purple"
                style="
                    width:100%;
                    padding:16px;
                    font-size:17px;
                    font-weight:bold;
                ">

                ✅ Turnuvaya Başvur

            </button>

        </form>

    </div>

</div>

<script>

function copyIBAN(id){

    const iban = document.getElementById(id);

    navigator.clipboard.writeText(iban.value);

    if(typeof showToast === 'function'){

        showToast('✅ IBAN başarıyla kopyalandı.');

    }else{

        alert("✅ IBAN başarıyla kopyalandı.");

    }

}

</script>

</x-app-layout>