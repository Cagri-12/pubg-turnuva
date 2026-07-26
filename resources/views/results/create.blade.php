<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🖼 Sonuç Görseli Yükle
    </h2>

    <p class="stats-subtitle">
        Seçilen turnuva için maç sonucunu ve ekran görüntüsünü buradan yükleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card" style="max-width:800px;margin:auto;">

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

    <form
        action="{{ route('results.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div style="margin-bottom:22px;">

            <label style="color:white;font-weight:600;">
                📝 Başlık
            </label>

            <input
                type="text"
                name="title"
                required
                placeholder="Örn: Erangel Final Sonuçları"
                style="
                    width:100%;
                    margin-top:8px;
                    padding:14px;
                    border-radius:12px;
                    border:1px solid rgba(255,255,255,.08);
                    background:#111827;
                    color:white;
                ">

        </div>

        <div style="margin-bottom:22px;">

            <label style="color:white;font-weight:600;">
                🎮 Match Numarası
            </label>

            <input
                type="number"
                name="match_number"
                required
                placeholder="Örn: 3"
                style="
                    width:100%;
                    margin-top:8px;
                    padding:14px;
                    border-radius:12px;
                    border:1px solid rgba(255,255,255,.08);
                    background:#111827;
                    color:white;
                ">

        </div>

        <div style="margin-bottom:30px;">

            <label style="color:white;font-weight:600;">
                📸 Sonuç Görseli
            </label>

            <input
                type="file"
                name="image"
                required
                style="
                    width:100%;
                    margin-top:10px;
                    padding:12px;
                    border-radius:12px;
                    border:1px solid rgba(255,255,255,.08);
                    background:#111827;
                    color:white;
                ">

        </div>

        <button
            type="submit"
            style="
                background:#16a34a;
                color:white;
                border:none;
                padding:14px 32px;
                border-radius:12px;
                cursor:pointer;
                font-size:16px;
                font-weight:600;
                transition:.25s;
            ">

            📤 Sonucu Yükle

        </button>

    </form>

</div>

</div>

</x-app-layout>