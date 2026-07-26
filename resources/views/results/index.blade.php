<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🏆 Sonuç Yönetimi
    </h2>

    <p class="stats-subtitle">
        Turnuva sonuçlarını buradan yönetebilir ve yayınlayabilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

    @if(session('success'))
        <div style="background:#16a34a;color:white;padding:15px;border-radius:10px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%;border-collapse:collapse;">

        <tr style="background:#4f46e5;color:white;">
            <th style="padding:12px;">Başlık</th>
            <th>Match</th>
            <th>Görsel</th>
            <th>İşlem</th>
        </tr>

        @forelse($results as $result)

        <tr style="text-align:center;border-bottom:1px solid #ddd;">

            <td style="padding:15px;">
                {{ $result->title }}
            </td>

            <td>
                {{ $result->match_number }}
            </td>

            <td>
                <img
                    src="{{ asset('storage/'.$result->image) }}"
                    width="150"
                    style="border-radius:10px;">
            </td>

            <td>

                @if(auth()->user()->is_admin)

                    <a href="{{ route('results.edit', $result->id) }}"
                       style="background:#16a34a;color:white;padding:8px 15px;text-decoration:none;border-radius:6px;">
                        ✏ Düzenle
                    </a>

                    <form
                        action="{{ route('results.destroy', $result->id) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Bu sonucu silmek istiyor musunuz?')"
                            style="background:#dc2626;color:white;padding:8px 15px;border:none;border-radius:6px;cursor:pointer;">

                            🗑 Sil

                        </button>

                    </form>

                @else

                    <span style="color:#16a34a;font-weight:bold;">
                        👀 Sadece Görüntülenebilir
                    </span>

                @endif

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4" style="padding:25px;text-align:center;">
                Henüz sonuç yüklenmemiş.
            </td>
        </tr>

        @endforelse

    </table>

</div>

</div>

</div>

</x-app-layout>