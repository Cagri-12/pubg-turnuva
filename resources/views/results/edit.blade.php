<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        ✏️ Sonucu Düzenle
    </h2>

    <p class="stats-subtitle">
        Turnuva sonucunu buradan güncelleyebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

<form
action="{{ route('results.update', $result->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<label>🏆 Başlık</label>

<input
type="text"
name="title"
value="{{ $result->title }}"
class="input"
style="margin-bottom:18px;">

<label>🎯 Maç No</label>

<input
type="number"
name="match_number"
value="{{ $result->match_number }}"
class="input"
style="margin-bottom:18px;">

<label>🖼️ Yeni Resim (İsteğe Bağlı)</label>

<input
type="file"
name="image"
class="input"
style="margin-bottom:30px;padding:10px;">

<div style="display:flex;gap:15px;flex-wrap:wrap;">

<button
type="submit"
class="btn btn-green">

💾 Güncelle

</button>

<a
href="{{ route('results.index') }}"
class="btn btn-blue">

⬅ Geri Dön

</a>

</div>

</form>

</div>

</div>

</x-app-layout>