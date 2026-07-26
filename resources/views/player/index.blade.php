<x-app-layout>

<div style="max-width:1000px;margin:auto;padding:25px;">

    <h1>🎮 Oyuncu Paneli</h1>

    <br>

    <div style="background:#2563eb;color:white;padding:20px;border-radius:12px;">
        <h2>Hoşgeldin {{ auth()->user()->name }}</h2>

        <p>Turnuvalarını buradan takip edebilirsin.</p>
    </div>

</div>

</x-app-layout>