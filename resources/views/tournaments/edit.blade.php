<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        ✏️ Turnuvayı Düzenle
    </h2>

    <p class="stats-subtitle">
        Turnuva bilgilerini buradan güncelleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<form method="POST" action="{{ route('tournaments.update',$tournament->id) }}">

@csrf
@method('PUT')

<label class="form-label">🏆 Turnuva Adı</label>
<input
    type="text"
    name="title"
    value="{{ $tournament->title }}"
    class="input">

<label class="form-label">🎮 Oyun</label>
<input
    type="text"
    name="game"
    value="{{ $tournament->game }}"
    class="input">

<label class="form-label">📅 Tarih</label>
<input
    type="date"
    name="date"
    value="{{ $tournament->date }}"
    class="input">

<label class="form-label">🎮 Oda Yayın Saati</label>
<input
    type="time"
    name="room_publish_time"
    value="{{ $tournament->room_publish_time }}"
    class="input">

<label class="form-label">🚀 Başlangıç Saati</label>
<input
    type="time"
    name="time"
    value="{{ $tournament->time }}"
    class="input">

<label class="form-label">💰 Giriş Ücreti</label>
<input
    type="number"
    name="entry_fee"
    value="{{ $tournament->entry_fee }}"
    class="input">

<label class="form-label">👥 Maksimum Takım</label>
<input
    type="number"
    name="max_teams"
    value="{{ $tournament->max_teams }}"
    class="input">

<label class="form-label">🏆 Ödül Havuzu</label>
<input
    type="number"
    name="prize_pool"
    value="{{ $tournament->prize_pool }}"
    class="input">

<label class="form-label">🥇 1. Ödül</label>
<input
    type="text"
    name="first_prize"
    value="{{ $tournament->first_prize }}"
    class="input">

<label class="form-label">🥈 2. Ödül</label>
<input
    type="text"
    name="second_prize"
    value="{{ $tournament->second_prize }}"
    class="input">

<label class="form-label">🥉 3. Ödül</label>
<input
    type="text"
    name="third_prize"
    value="{{ $tournament->third_prize }}"
    class="input">

<label class="form-label">📝 Açıklama</label>
<textarea
    name="description"
    class="input"
    rows="6">{{ $tournament->description }}</textarea>

<label>📌 Durum</label>

<select
    name="status"
    class="input">

    <option value="Kayıt Açık" {{ $tournament->status=="Kayıt Açık" ? "selected":"" }}>
        Kayıt Açık
    </option>

    <option value="Kayıt Kapandı" {{ $tournament->status=="Kayıt Kapandı" ? "selected":"" }}>
        Kayıt Kapandı
    </option>

    <option value="Devam Ediyor" {{ $tournament->status=="Devam Ediyor" ? "selected":"" }}>
        Devam Ediyor
    </option>

    <option value="Tamamlandı" {{ $tournament->status=="Tamamlandı" ? "selected":"" }}>
        Tamamlandı
    </option>

    <option value="Arşiv" {{ $tournament->status=="Arşiv" ? "selected":"" }}>
        Arşiv
    </option>

</select>

<div style="margin-top:30px;display:flex;gap:15px;">

    <button
        type="submit"
        class="btn btn-green">

        💾 Değişiklikleri Kaydet

    </button>

</div>

</button>

</form>

</div>

</div>

</x-app-layout>