<x-app-layout>

<div class="admin-hero">

    <h2 class="section-title stats-title">
        🏆 Yeni Turnuva
    </h2>

    <p class="stats-subtitle">
        Yeni turnuva oluşturmak için aşağıdaki bilgileri doldurun.
    </p>

</div>

<div class="page-card dark-card">

<div class="admin-container">

<div class="page-card dark-card">

<form
action="{{ route('tournaments.store') }}"
method="POST">

@csrf

<div class="stats-grid">

<div>

<label class="form-label">
    🏆 Turnuva Adı
</label>

<input
type="text"
name="title"
class="input"
required>

</div>

<div>

<label>🎮 Oyun</label>

<input
type="text"
name="game"
class="input"
required>

</div>

<div>

<label>📅 Turnuva Tarihi</label>

<input
type="date"
name="date"
class="input"
required>

</div>

<div>

<label>🎮 Oda Yayın Saati</label>

<input
type="time"
name="room_publish_time"
class="input"
required>

</div>

<div>

<label>🚀 Başlangıç Saati</label>

<input
type="time"
name="time"
class="input"
required>

</div>

<div>

<label>💰 Giriş Ücreti</label>

<input
type="number"
name="entry_fee"
class="input"
required>

</div>

<div>

<label>👥 Maksimum Takım</label>

<input
type="number"
name="max_teams"
class="input"
required>

</div>

<div>

<label>🏆 Toplam Ödül Havuzu</label>

<input
type="number"
name="prize_pool"
class="input"
required>

</div>

</div>

<h2 style="margin:35px 0 20px;">
🥇🥈🥉 Ödül Dağılımı
</h2>

<div class="stats-grid">

<div>

<label>🥇 Birincilik</label>

<input
type="text"
name="first_prize"
class="input"
placeholder="Örn: 5000₺">

</div>

<div>

<label>🥈 İkincilik</label>

<input
type="text"
name="second_prize"
class="input"
placeholder="Örn: 3000₺">

</div>

<div>

<label>🥉 Üçüncülük</label>

<input
type="text"
name="third_prize"
class="input"
placeholder="Örn: 2000₺">

</div>

</div>

<div style="margin-top:30px;">

<label>📝 Açıklama</label>

<textarea
name="description"
class="input"
rows="5"
placeholder="Turnuva hakkında açıklama yazın..."></textarea>

</div>

<div style="margin-top:25px;">

<label>📢 Durum</label>

<select
name="status"
class="input">

<option value="Kayıt Açık">🟢 Kayıt Açık</option>
<option value="Kayıt Kapandı">🟡 Kayıt Kapandı</option>
<option value="Devam Ediyor">🔵 Devam Ediyor</option>
<option value="Tamamlandı">🏁 Tamamlandı</option>
<option value="Arşiv">📦 Arşiv</option>

</select>

</div>

<div style="margin-top:35px;text-align:right;">

<button
type="submit"
class="btn btn-green"
onclick="
this.disabled=true;
this.innerHTML='⏳ Turnuva Oluşturuluyor...';
this.form.submit();
">

🏆 Turnuvayı Oluştur

</button>

</div>

</form>

</div>

</div>

</x-app-layout>