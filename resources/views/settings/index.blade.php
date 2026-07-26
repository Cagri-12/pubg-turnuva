<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        ⚙️ Site Ayarları
    </h2>

    <p class="stats-subtitle">
        Site bilgilerini, iletişim kanallarını ve banka bilgilerini buradan yönetebilirsiniz.
    </p>

</div>

</x-slot>

<style>

input,
textarea{

    width:100%;
    padding:14px;
    margin-top:8px;
    margin-bottom:20px;

    background:#1e293b;
    color:white;

    border:1px solid #334155;
    border-radius:10px;

}

input::placeholder,
textarea::placeholder{

    color:#94a3b8;

}

input:focus,
textarea:focus{

    outline:none;
    border-color:#6366f1;
    box-shadow:0 0 0 3px rgba(99,102,241,.2);

}

label{

    color:white;
    font-weight:600;

}

hr{

    margin:35px 0;
    border:1px solid #334155;

}

.section-heading{

    color:white;
    font-size:22px;
    font-weight:bold;
    margin-bottom:20px;

}

</style>

<div class="admin-container">

@if(session('success'))

<div style="
background:#16a34a;
color:white;
padding:15px;
border-radius:10px;
margin-bottom:20px;
">

{{ session('success') }}

</div>

@endif

<div class="page-card dark-card">

<form action="{{ route('settings.update') }}" method="POST">

@csrf

<div class="section-heading">
🌐 Site Bilgileri
</div>

<label>Site Adı</label>
<input
type="text"
name="site_name"
value="{{ $setting->site_name }}">

<label>Footer Yazısı</label>
<textarea
name="footer"
rows="4">{{ $setting->footer }}</textarea>

<hr>

<div class="section-heading">
📞 İletişim Bilgileri
</div>

<label>Telefon</label>
<input
type="text"
name="phone"
value="{{ $setting->phone }}">

<label>WhatsApp</label>
<input
type="text"
name="whatsapp"
value="{{ $setting->whatsapp }}">

<label>E-Posta</label>
<input
type="email"
name="email"
value="{{ $setting->email }}">

<hr>

<div class="section-heading">
📱 Sosyal Medya
</div>

<label>Instagram</label>
<input
type="text"
name="instagram"
value="{{ $setting->instagram }}">

<label>Discord</label>
<input
type="text"
name="discord"
value="{{ $setting->discord }}">

<label>YouTube</label>
<input
type="text"
name="youtube"
value="{{ $setting->youtube }}">

<label>TikTok</label>
<input
type="text"
name="tiktok"
value="{{ $setting->tiktok }}">

<hr>

<div class="section-heading">
🏦 Banka Bilgileri
</div>

<label>Banka</label>
<input
type="text"
name="bank_name"
value="{{ $setting->bank_name }}">

<label>IBAN</label>
<input
type="text"
name="iban"
value="{{ $setting->iban }}">

<label>Hesap Sahibi</label>
<input
type="text"
name="account_name"
value="{{ $setting->account_name }}">

<div style="margin-top:30px;">

<button
type="submit"
class="btn btn-green">

💾 Ayarları Kaydet

</button>

</div>

</form>

</div>

</div>

</x-app-layout>