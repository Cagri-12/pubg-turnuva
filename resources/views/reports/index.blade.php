<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🚨 Slot İşgal Bildirimleri
    </h2>

    <p class="stats-subtitle">
        Oyuncular tarafından gönderilen slot işgali bildirimlerini buradan inceleyebilir ve yönetebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

@if(session('success'))

<div style="
background:#22c55e;
color:white;
padding:15px;
border-radius:12px;
margin-bottom:25px;
">

{{ session('success') }}

</div>

@endif

<table
style="
width:100%;
border-collapse:collapse;
overflow:hidden;
border-radius:15px;
background:#111827;
color:white;
">

<thead>

<tr style="background:#6d28d9;">

<th style="padding:16px;">Bildiren</th>
<th>Turnuva</th>
<th>Slot</th>
<th>Player</th>
<th>Nick</th>
<th>Açıklama</th>
<th>Durum</th>
<th>Tarih</th>
<th>İşlem</th>

</tr>

</thead>

<tbody>

@forelse($reports as $report)

<tr style="
text-align:center;
border-bottom:1px solid rgba(255,255,255,.08);
">

<td style="padding:16px;">
{{ $report->user->name }}
</td>

<td>
{{ $report->tournament->title }}
</td>

<td>
{{ $report->slot }}
</td>

<td>
{{ $report->player }}
</td>

<td style="font-weight:bold;color:#a855f7;">
{{ $report->player_name }}
</td>

<td style="max-width:240px;">
{{ $report->description ?: '-' }}
</td>

<td>

@if($report->status == 'Bekliyor')

<span style="color:#facc15;font-weight:bold;">
🟡 Bekliyor
</span>

@elseif($report->status == 'İnceleniyor')

<span style="color:#3b82f6;font-weight:bold;">
🔵 İnceleniyor
</span>

@else

<span style="color:#22c55e;font-weight:bold;">
🟢 Çözüldü
</span>

@endif

</td>

<td style="color:#94a3b8;">
{{ $report->created_at->format('d.m.Y H:i') }}
</td>

<td>

@if($report->status != 'Çözüldü')

<form
action="{{ route('reports.approve',$report->id) }}"
method="POST"
style="display:inline;">

@csrf

<button
style="
background:#16a34a;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
margin-bottom:6px;
">

✅ Çözüldü

</button>

</form>

@endif

<form
action="{{ route('reports.destroy',$report->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button
onclick="return confirm('Bu bildirimi silmek istiyor musunuz?')"
style="
background:#dc2626;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
">

🗑 Sil

</button>

</form>

</td>

</tr>

@empty

<tr>

<td
colspan="9"
style="
padding:45px;
text-align:center;
color:#94a3b8;
">

🚨 Henüz slot işgali bildirimi bulunmuyor.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</x-app-layout>