<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🔔 Bildirim Yönetimi
    </h2>

    <p class="stats-subtitle">
        Sistemde oluşturulan tüm bildirimleri buradan görüntüleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

@forelse($notifications as $notification)

<div class="page-card dark-card" style="margin-bottom:25px;">

<div style="
display:flex;
justify-content:space-between;
align-items:flex-start;
gap:20px;
flex-wrap:wrap;
">

<div>

<div style="
color:#a855f7;
font-size:22px;
font-weight:bold;
margin-bottom:10px;
">

🔔 {{ $notification->title }}

</div>

<div style="
color:#e5e7eb;
font-size:16px;
line-height:1.8;
">

{{ $notification->message }}

</div>

</div>

<div style="
text-align:right;
min-width:140px;
">

<span style="
display:inline-block;
background:#4f46e5;
color:white;
padding:6px 12px;
border-radius:20px;
font-size:13px;
margin-bottom:12px;
">

📢 Sistem

</span>

<br>

<span style="
color:#94a3b8;
font-size:13px;
">

🕒 {{ $notification->created_at->diffForHumans() }}

</span>

</div>

</div>

</div>

@empty

<div class="page-card dark-card" style="text-align:center;padding:60px;">

<div style="font-size:60px;margin-bottom:15px;">
🔔
</div>

<h3 style="color:white;font-size:24px;margin-bottom:10px;">

Henüz bildiriminiz bulunmuyor.

</h3>

<p style="color:#94a3b8;">

Yeni sistem bildirimleri burada görüntülenecektir.

</p>

</div>

@endforelse

</div>

</x-app-layout>