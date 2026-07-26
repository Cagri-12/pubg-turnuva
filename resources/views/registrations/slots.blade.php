<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🎯 Slot Yönetimi
    </h2>

    <p class="stats-subtitle">
        Turnuvadaki takımların slotlarını buradan yönetebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<h2
style="
margin-bottom:25px;
font-size:28px;
font-weight:700;
color:white;
">

🏆 {{ $tournament->title }}

</h2>

<table style="
width:100%;
border-collapse:collapse;
overflow:hidden;
border-radius:15px;
">

<thead>

<tr style="
background:linear-gradient(135deg,#7c3aed,#4f46e5);
color:white;
height:60px;
font-size:17px;
letter-spacing:.5px;
">

<th style="padding:18px;">🎯 Slot</th>
<th style="padding:18px;">👥 Takım</th>
<th style="padding:18px;">📱 Telefon</th>

</tr>

</thead>

<tbody>

@forelse($registrations as $registration)

<tr style="
border-bottom:1px solid #e5e7eb;
transition:.3s;
">

<td style="
padding:18px;
text-align:center;
font-weight:bold;
font-size:18px;
color:#4f46e5;
">

{{ $registration->slot }}

</td>

<td style="padding:18px;">

👥 {{ $registration->team_name }}

</td>

<td style="padding:18px;">

📱 {{ $registration->phone }}

</td>

</tr>

@empty

<tr>

<td colspan="3"
style="
padding:40px;
text-align:center;
color:#6b7280;
font-size:18px;
">

📭 Henüz slot verilmiş takım bulunmuyor.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</x-app-layout>