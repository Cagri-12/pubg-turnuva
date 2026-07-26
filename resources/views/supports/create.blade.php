<x-app-layout>

<div class="admin-container">

    <div class="admin-hero">

        <div>

            <h1>🎧 Destek Talebi Oluştur</h1>

            <p>
                Yaşadığınız problemi detaylı şekilde yazarak destek ekibimize iletebilirsiniz.
                En kısa sürede size dönüş yapılacaktır.
            </p>

        </div>

    </div>

    <div class="page-card dark-card">

        @if($errors->any())

            <div class="success-box" style="background:#dc2626;margin-bottom:25px;">

                @foreach($errors->all() as $error)

                    <div>{{ $error }}</div>

                @endforeach

            </div>

        @endif

        <form action="{{ route('supports.store') }}" method="POST">

            @csrf

            <div style="margin-bottom:25px;">

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:10px;">
                    📝 Konu
                </label>

                <input
                    type="text"
                    name="subject"
                    placeholder="Konu giriniz..."
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                    "
                    required>

            </div>

            <div>

                <label style="display:block;color:#fff;font-weight:bold;margin-bottom:10px;">
                    💬 Mesaj
                </label>

                <textarea
                    name="message"
                    rows="8"
                    placeholder="Mesajınızı detaylı şekilde yazınız..."
                    style="
                        width:100%;
                        padding:15px;
                        background:#0f172a;
                        color:white;
                        border:1px solid rgba(255,255,255,.08);
                        border-radius:12px;
                        resize:vertical;
                    "
                    required></textarea>

            </div>

            <div style="margin-top:35px;">

                <button
                    type="submit"
                    class="btn btn-purple"
                    style="padding:15px 35px;">

                    📨 Destek Talebi Gönder

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>