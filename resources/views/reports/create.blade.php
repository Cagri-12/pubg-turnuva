<x-app-layout>

<div style="
    max-width:720px;
    margin:30px auto;
    background:linear-gradient(135deg,#6d28d9,#4f46e5);
    border-radius:18px;
    padding:30px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
">

    <h1 style="margin:0;font-size:32px;font-weight:bold;">
        🚨 Kaçak Oyuncu Bildir
    </h1>

    <p style="margin-top:10px;color:#ddd6fe;">
        Turnuva kurallarını ihlal eden oyuncuları buradan yönetime bildirebilirsiniz.
    </p>

</div>

<div style="max-width:700px;margin:auto;padding:30px;">

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

    @if ($errors->any())
        <div style="
            background:#dc2626;
            color:white;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        ">
            <ul style="margin:0;padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="
        background:rgba(15,23,42,.92);
        border:1px solid rgba(255,255,255,.08);
        border-radius:18px;
        padding:30px;
        box-shadow:0 10px 25px rgba(0,0,0,.35);
    ">

        <form action="{{ route('reports.store') }}" method="POST">
            @csrf

            <div style="margin-bottom:22px;">

                <label style="color:white;font-weight:600;display:block;margin-bottom:8px;">
                    🏆 Turnuva
                </label>

                <select
                    name="tournament_id"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        background:#0f172a;
                        color:white;
                        border:1px solid #334155;
                        border-radius:10px;
                        outline:none;
                    ">

                    <option value="">Turnuva Seçiniz</option>

                    @foreach($tournaments as $tournament)
                        <option value="{{ $tournament->id }}">
                            {{ $tournament->title }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:22px;">

                <label style="color:white;font-weight:600;display:block;margin-bottom:8px;">
                    🎯 Slot No
                </label>

                <input
                    type="number"
                    name="slot"
                    min="1"
                    max="100"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        background:#0f172a;
                        color:white;
                        border:1px solid #334155;
                        border-radius:10px;
                        outline:none;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="color:white;font-weight:600;display:block;margin-bottom:8px;">
                    👤 Player No
                </label>

                <input
                    type="number"
                    name="player"
                    min="1"
                    max="4"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        background:#0f172a;
                        color:white;
                        border:1px solid #334155;
                        border-radius:10px;
                        outline:none;
                    ">

            </div>

            <div style="margin-bottom:22px;">

                <label style="color:white;font-weight:600;display:block;margin-bottom:8px;">
                    🎮 Oyuncu Nicki
                </label>

                <input
                    type="text"
                    name="player_name"
                    required
                    style="
                        width:100%;
                        padding:14px;
                        background:#0f172a;
                        color:white;
                        border:1px solid #334155;
                        border-radius:10px;
                        outline:none;
                    ">

            </div>

            <div style="margin-bottom:25px;">

                <label style="color:white;font-weight:600;display:block;margin-bottom:8px;">
                    📝 Açıklama (İsteğe Bağlı)
                </label>

                <textarea
                    name="description"
                    rows="5"
                    style="
                        width:100%;
                        padding:14px;
                        background:#0f172a;
                        color:white;
                        border:1px solid #334155;
                        border-radius:10px;
                        outline:none;
                        resize:vertical;
                    "></textarea>

            </div>

            <button
                type="submit"
                style="
                    width:100%;
                    background:linear-gradient(135deg,#7c3aed,#4f46e5);
                    color:white;
                    padding:16px;
                    border:none;
                    border-radius:12px;
                    font-size:17px;
                    font-weight:bold;
                    cursor:pointer;
                    transition:.3s;
                ">

                🚨 Raporu Gönder

            </button>

        </form>

    </div>

</div>

</x-app-layout>