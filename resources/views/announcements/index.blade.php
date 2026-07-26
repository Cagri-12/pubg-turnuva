<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        📢 Duyuru Yönetimi
    </h2>

    <p class="stats-subtitle">
        Turnuva duyurularını buradan oluşturabilir ve yönetebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<div class="toolbar">

<a
href="{{ route('announcements.create') }}"
class="btn btn-green">

➕ Yeni Duyuru

</a>

</div>

    @if(session('success'))
        <div style="background:#16a34a;color:white;padding:15px;border-radius:10px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

     <table
style="
width:100%;
border-collapse:collapse;
overflow:hidden;
border-radius:15px;
background:#0f172a;
color:white;
">

        <thead>

        <tr style="background:#4f46e5;color:white;">

            <th style="padding:15px;">Başlık</th>
            <th>İçerik</th>
            <th>Durum</th>
            <th>Tarih</th>
            <th>İşlem</th>

        </tr>

        </thead>

        <tbody>

        @forelse($announcements as $announcement)

        <tr style="border-bottom:1px solid #ddd;text-align:center;">

            <td style="padding:15px;">
                {{ $announcement->title }}
            </td>

            <td>
                {{ $announcement->content }}
            </td>

            <td>

                @if($announcement->is_active)

                    <span style="color:#16a34a;font-weight:bold;">
                        🟢 Aktif
                    </span>

                @else

                    <span style="color:#dc2626;font-weight:bold;">
                        🔴 Pasif
                    </span>

                @endif

            </td>

            <td>
                {{ $announcement->created_at->format('d.m.Y H:i') }}
            </td>

            <td>

                <form action="{{ route('announcements.toggle',$announcement->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf

                    <button
                        style="background:#2563eb;color:white;border:none;padding:8px 15px;border-radius:8px;cursor:pointer;">

                        {{ $announcement->is_active ? 'Pasif Yap' : 'Aktif Yap' }}

                    </button>

                </form>

                <form action="{{ route('announcements.destroy',$announcement->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Duyuru silinsin mi?')"
                        style="background:#dc2626;color:white;border:none;padding:8px 15px;border-radius:8px;cursor:pointer;">

                        Sil

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="5" style="padding:40px;text-align:center;">

                📢 Henüz duyuru bulunmuyor.

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</div>

</x-app-layout>