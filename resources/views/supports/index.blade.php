<x-app-layout>

<div class="admin-container">

    <div class="admin-hero">

        <div>

            <h1>🎧 Destek Merkezi</h1>

            <p>
                Destek taleplerinizi buradan oluşturabilir, durumlarını takip edebilir
                ve admin ekibinden gelen cevapları görüntüleyebilirsiniz.
            </p>

        </div>

        <a href="{{ route('supports.create') }}" class="btn btn-purple">
            ➕ Yeni Talep
        </a>

    </div>

    @if(session('success'))

    <div class="success-box">
        {{ session('success') }}
    </div>

    @endif

    @forelse($supports as $support)

    <div class="page-card dark-card" style="margin-bottom:25px;">

        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:15px;">

            <div>

                <h2 style="color:#fff;font-size:24px;margin-bottom:8px;">
                    {{ $support->subject }}
                </h2>

                <span style="color:#94a3b8;font-size:14px;">
                    📅 {{ $support->created_at->format('d.m.Y H:i') }}
                </span>

            </div>

            @if($support->status=="Bekliyor")

                <span style="
                    background:#facc15;
                    color:#111827;
                    padding:8px 18px;
                    border-radius:30px;
                    font-weight:bold;
                ">
                    🟡 Bekliyor
                </span>

            @elseif($support->status=="Cevaplandı")

                <span style="
                    background:#16a34a;
                    color:white;
                    padding:8px 18px;
                    border-radius:30px;
                    font-weight:bold;
                ">
                    🟢 Cevaplandı
                </span>

            @else

                <span style="
                    background:#dc2626;
                    color:white;
                    padding:8px 18px;
                    border-radius:30px;
                    font-weight:bold;
                ">
                    🔴 Kapandı
                </span>

            @endif

        </div>

        <hr style="margin:25px 0;border-color:rgba(255,255,255,.08);">

        <h3 style="color:#cbd5e1;margin-bottom:12px;">
            📨 Gönderdiğiniz Mesaj
        </h3>

        <div style="
            background:#0f172a;
            padding:18px;
            border-radius:12px;
            color:#fff;
            border:1px solid rgba(255,255,255,.06);
        ">

            {{ $support->message }}

        </div>

        @if($support->reply)

            <h3 style="
                color:#22c55e;
                margin:25px 0 12px;
            ">
                💬 Admin Cevabı
            </h3>

            <div style="
                background:#052e16;
                padding:18px;
                border-radius:12px;
                border:1px solid rgba(34,197,94,.25);
                color:white;
            ">

                {{ $support->reply }}

            </div>

        @endif

    </div>

    @empty

    <div class="page-card dark-card" style="text-align:center;padding:70px 40px;">

        <div style="font-size:65px;margin-bottom:20px;">
            🎧
        </div>

        <h2 style="color:white;font-size:28px;margin-bottom:15px;">
            Henüz Destek Talebiniz Bulunmuyor
        </h2>

        <p style="
            color:#94a3b8;
            max-width:550px;
            margin:auto auto 30px;
        ">
            Bir sorun yaşarsanız destek ekibimize ulaşabilirsiniz.
            Oluşturacağınız tüm talepler burada listelenecektir.
        </p>

        <a href="{{ route('supports.create') }}" class="btn btn-purple">
            ➕ İlk Talebini Oluştur
        </a>

    </div>

    @endforelse

</div>

</x-app-layout>