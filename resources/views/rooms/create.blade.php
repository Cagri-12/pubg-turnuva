<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        ➕ Oda Oluştur
    </h2>

    <p class="stats-subtitle">
        Turnuva için yeni oda oluşturabilir ve oda bilgilerini ekleyebilirsiniz.
    </p>

</div>

</x-slot>

<div style="
max-width:900px;
margin:auto;
padding:35px;
">

@if(session('success'))

<div style="
background:#16a34a;
color:white;
padding:18px;
border-radius:12px;
margin-bottom:25px;
font-size:17px;
font-weight:bold;
">

{{ session('success') }}

</div>

@endif

<div style="
background:#111827;
border-radius:20px;
padding:35px;
box-shadow:0 20px 45px rgba(0,0,0,.30);
">

<h2 style="
color:white;
margin-bottom:30px;
font-size:28px;
">

🏆 Turnuva Oda Bilgileri

</h2>

<form action="{{ route('rooms.store') }}" method="POST">

@csrf

<div style="margin-bottom:25px;">

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

🏆 Turnuva

</label>

<select
name="tournament_id"
required
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

<option value="">
Turnuva Seçiniz
</option>

@foreach($tournaments as $tournament)

<option value="{{ $tournament->id }}">
{{ $tournament->title }}
</option>

@endforeach

</select>

</div>

<div style="
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
">

<div>

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

🎮 Room ID

</label>

<input
type="text"
name="room_id"
required
placeholder="Örn: 12345678"
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

</div>

<div>

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

🔑 Room Şifresi

</label>

<input
type="text"
name="room_password"
required
placeholder="Şifre"
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

</div>

</div>

<div style="
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
margin-top:25px;
">

<div>

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

🗺️ Harita

</label>

<select
name="map"
required
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

<option value="Erangel">Erangel</option>
<option value="Miramar">Miramar</option>
<option value="Sanhok">Sanhok</option>
<option value="Rondo">Rondo</option>

</select>

</div>

<div>

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

📅 Maç Tarihi

</label>

<input
type="date"
name="match_date"
required
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

</div>

</div>

<div style="margin-top:25px;">

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

🕒 Başlangıç Saati

</label>

<input
type="time"
name="start_time"
required
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
">

</div>

<div style="margin-top:25px;">

<label style="
color:white;
font-weight:bold;
display:block;
margin-bottom:10px;
">

📢 Oyunculara Gönderilecek Duyuru

</label>

<textarea
name="announcement"
rows="6"
placeholder="Örnek: Lütfen maçtan 15 dakika önce lobiye giriş yapınız."
style="
width:100%;
padding:15px;
border-radius:12px;
background:#1f2937;
color:white;
border:1px solid #374151;
resize:none;
"></textarea>

</div>

<div style="
margin-top:30px;
background:#1f2937;
border-left:5px solid #4f46e5;
padding:20px;
border-radius:12px;
color:#d1d5db;
line-height:28px;
">

<h3 style="
margin-top:0;
color:white;
">

ℹ️ Bilgilendirme

</h3>

• Oda oluşturulduğunda onaylanan tüm takımlara otomatik bildirim gönderilir.

<br>

• Oyuncular oda bilgilerini kendi panellerinden görebilir.

<br>

• Oda bilgilerini değiştirmek isterseniz yeni bir oda oluşturabilir veya mevcut odayı düzenleyebilirsiniz.

</div>

<button
type="submit"
style="
margin-top:30px;
width:100%;
padding:18px;
background:linear-gradient(90deg,#4f46e5,#7c3aed);
color:white;
font-size:18px;
font-weight:bold;
border:none;
border-radius:15px;
cursor:pointer;
transition:.3s;
">

🚀 Odayı Oluştur

</button>

</form>

</div>

</div>

</x-app-layout>