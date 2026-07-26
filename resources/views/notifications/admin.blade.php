<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🔔 Bildirim Yönetimi
    </h2>

    <p class="stats-subtitle">
        Tüm kullanıcılara gönderilecek bildirimleri buradan oluşturabilirsiniz.
    </p>

</div>

</x-slot>

<div style="padding:30px;">

@if(session('success'))

<div class="success-box">
    {{ session('success') }}
</div>

@endif

<div class="page-card">

<h2 style="margin-bottom:25px;">
📢 Yeni Bildirim Gönder
</h2>

<form action="{{ route('notifications.send') }}" method="POST">

@csrf

<label>Başlık</label>

<input
type="text"
name="title"
class="input"
placeholder="Bildirim başlığı">

<br><br>

<label>Mesaj</label>

<textarea
name="message"
class="input"
rows="5"
placeholder="Bildirim mesajı"></textarea>

<br><br>

<label>Gönderilecek Kişi</label>

<select
name="user_id"
class="input">

<option value="all">
📢 Tüm Kullanıcılar
</option>

@foreach($users as $user)

<option value="{{ $user->id }}">
👤 {{ $user->name }}
</option>

@endforeach

</select>

<br><br>

<button class="btn btn-green">

📨 Bildirim Gönder

</button>

</form>

</div>

<br>

<div class="page-card">

<h2 style="margin-bottom:20px;">
📜 Son Bildirimler
</h2>

<table style="width:100%;border-collapse:collapse;">

<tr style="background:#4f46e5;color:white;">

<th style="padding:15px;">Başlık</th>

<th>Mesaj</th>

<th>Kullanıcı</th>

<th>Tarih</th>
<th>İşlem</th>

</tr>

@foreach($notifications as $notification)

<tr style="border-bottom:1px solid #eee;">

<td style="padding:15px;">
{{ $notification->title }}
</td>

<td>
{{ $notification->message }}
</td>

<td>
{{ optional($notification->user)->name }}
</td>

<td>
{{ $notification->created_at->format('d.m.Y H:i') }}
</td>

<td>

<form
action="{{ route('notifications.destroy',$notification) }}"
method="POST">

@csrf
@method('DELETE')

<button
style="
background:#dc2626;
color:white;
border:none;
padding:8px 12px;
border-radius:8px;
cursor:pointer;
">

🗑 Sil

</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</div>

</x-app-layout>