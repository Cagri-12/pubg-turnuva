<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        📢 Yeni Duyuru Yayınla
    </h2>

    <p class="stats-subtitle">
        Oyunculara gösterilecek yeni duyuruyu buradan oluşturabilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card" style="max-width:850px;margin:auto;">

@if($errors->any())

<div style="
background:#dc2626;
color:white;
padding:15px;
border-radius:10px;
margin-bottom:25px;
">

@foreach($errors->all() as $error)

<div>{{ $error }}</div>

@endforeach

</div>

@endif

<form action="{{ route('announcements.store') }}" method="POST">

@csrf

<div style="margin-bottom:25px;">

<label style="color:white;font-weight:600;">
📢 Duyuru Başlığı
</label>

<input
type="text"
name="title"
placeholder="Örn: Kayıtlar Açıldı"
required
style="
width:100%;
margin-top:8px;
padding:14px;
background:#1e293b;
color:white;
border:1px solid #334155;
border-radius:10px;
">

</div>

<div style="margin-bottom:30px;">

<label style="color:white;font-weight:600;">
📝 Duyuru İçeriği
</label>

<textarea
name="content"
rows="8"
placeholder="Duyuru metnini buraya yazınız..."
required
style="
width:100%;
margin-top:8px;
padding:14px;
background:#1e293b;
color:white;
border:1px solid #334155;
border-radius:10px;
resize:vertical;
"></textarea>

</div>

<div style="display:flex;gap:15px;">

<button
type="submit"
class="btn btn-green">

📢 Yayınla

</button>

<a
href="{{ route('announcements.index') }}"
class="btn btn-gray">

⬅ Geri Dön

</a>

</div>

</form>

</div>

</div>

</x-app-layout>