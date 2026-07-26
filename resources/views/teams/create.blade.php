<x-app-layout>

<div style="max-width:700px;margin:auto;padding:30px;">

    <h1 style="font-size:30px;font-weight:bold;margin-bottom:30px;">
        👥 Takım Oluştur
    </h1>

    @if ($errors->any())
        <div style="background:#dc2626;color:white;padding:15px;border-radius:10px;margin-bottom:20px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST"
          action="{{ route('teams.store') }}"
          enctype="multipart/form-data">

        @csrf

        <input type="hidden"
       name="tournament_id"
       value="1">

        <label>👥 Takım Adı</label>

        <input type="text"
               name="team_name"
               required
               style="width:100%;padding:12px;margin:10px 0 20px;border-radius:10px;">

        <label>🖼 Takım Logosu</label>

        <input type="file"
               name="logo"
               accept="image/*"
               required
               style="width:100%;padding:12px;margin:10px 0 20px;">

        <label>📱 WhatsApp</label>

        <input type="text"
               name="whatsapp"
               required
               placeholder="05XXXXXXXXX"
               style="width:100%;padding:12px;margin:10px 0 20px;border-radius:10px;">

        <button type="submit"
                style="background:#16a34a;color:white;padding:15px 30px;border:none;border-radius:10px;font-size:18px;cursor:pointer;">

            ✅ Takımı Kaydet

        </button>

    </form>

</div>

</x-app-layout>