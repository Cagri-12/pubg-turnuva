<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🎧 Destek Talepleri
    </h2>

    <p class="stats-subtitle">
        Oyuncuların gönderdiği destek taleplerini görüntüleyebilir ve cevaplayabilirsiniz.
    </p>

</div>

</x-slot>

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

@forelse($supports as $support)

<div class="page-card dark-card" style="margin-bottom:30px;">

<div style="
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
margin-bottom:25px;
">

<div>

<div style="color:#94a3b8;font-size:13px;">
👤 Oyuncu
</div>

<div style="color:white;font-weight:bold;font-size:18px;">
{{ $support->user->name }}
</div>

</div>

<div>

<div style="color:#94a3b8;font-size:13px;">
📅 Tarih
</div>

<div style="color:white;font-weight:bold;">
{{ $support->created_at->format('d.m.Y H:i') }}
</div>

</div>

<div>

<div style="color:#94a3b8;font-size:13px;">
📌 Konu
</div>

<div style="color:white;font-weight:bold;">
{{ $support->subject }}
</div>

</div>

<div>

<div style="color:#94a3b8;font-size:13px;">
📍 Durum
</div>

<div>

@if($support->status=="Bekliyor")

<span style="color:#facc15;font-weight:bold;">
🟡 Bekliyor
</span>

@elseif($support->status=="Cevaplandı")

<span style="color:#22c55e;font-weight:bold;">
🟢 Cevaplandı
</span>

@else

<span style="color:#ef4444;font-weight:bold;">
🔴 Kapandı
</span>

@endif

</div>

</div>

</div>

<hr style="border-color:#334155;margin:25px 0;">

<h3 style="color:white;font-size:18px;margin-bottom:12px;">
📨 Oyuncunun Mesajı
</h3>

<div style="
background:#111827;
border:1px solid #334155;
padding:20px;
border-radius:12px;
color:#e5e7eb;
line-height:1.8;
margin-bottom:25px;
">

{{ $support->message }}

</div>

<form action="{{ route('supports.reply',$support) }}" method="POST">

@csrf

<label style="color:white;font-weight:600;">
💬 Cevabınız
</label>

<textarea
name="reply"
rows="5"
placeholder="Oyuncuya cevabınızı yazın..."
style="
width:100%;
margin-top:10px;
padding:15px;
background:#1e293b;
color:white;
border:1px solid #334155;
border-radius:12px;
resize:vertical;
"></textarea>

<div style="margin-top:20px;">

<button
type="submit"
class="btn btn-green">

💬 Cevabı Gönder

</button>

</div>

</form>

</div>

@empty

<div class="page-card dark-card" style="text-align:center;padding:60px;">

<h3 style="color:white;font-size:22px;">
🎧 Henüz destek talebi bulunmuyor.
</h3>

<p style="color:#94a3b8;margin-top:10px;">
Oyuncular destek talebi oluşturduğunda burada listelenecektir.
</p>

</div>

@endforelse

</div>

</x-app-layout>