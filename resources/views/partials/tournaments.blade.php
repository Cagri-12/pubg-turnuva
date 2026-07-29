<style>

.tournaments{

    padding:110px 25px;

}

.tournaments-container{

    max-width:1400px;
    margin:auto;

}

.tournaments-header{

    text-align:center;
    margin-bottom:70px;

}

.tournaments-header h2{

    font-size:48px;
    font-weight:900;
    margin-bottom:15px;

}

.tournaments-header p{

    color:#9ca3af;
    font-size:18px;

}

.tournaments-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:30px;

}

.tournament-card{

    position:relative;

    overflow:hidden;

    border-radius:24px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    transition:.35s;

}

.tournament-card:hover{

    transform:translateY(-10px);

    border-color:#9333ea;

    box-shadow:0 20px 45px rgba(124,58,237,.30);

}

.tournament-top{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:25px 30px;

    border-bottom:1px solid rgba(255,255,255,.08);

}

.status{

    padding:8px 16px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;

}

.status.open{

    background:#16a34a;

}

.status.closed{

    background:#dc2626;

}

.status.live{

    background:#7c3aed;

}

.game{

    color:#9ca3af;

    font-weight:600;

}

.tournament-body{

    padding:30px;

}

.tournament-title{

    font-size:30px;

    font-weight:800;

    margin-bottom:25px;

}

.info-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:18px;

    margin-bottom:30px;

}

.info-box{

    background:rgba(255,255,255,.04);

    border-radius:16px;

    padding:18px;

}

.info-label{

    color:#9ca3af;

    font-size:13px;

    margin-bottom:6px;

}

.info-value{

    font-size:18px;

    font-weight:700;

}

.progress-title{

    display:flex;

    justify-content:space-between;

    margin-bottom:10px;

    font-size:15px;

}

.progress{

    width:100%;

    height:12px;

    border-radius:999px;

    overflow:hidden;

    background:rgba(255,255,255,.08);

}

.progress span{

    display:block;

    height:100%;

    background:linear-gradient(90deg,#22c55e,#7c3aed);

}

.card-buttons{

    display:flex;

    gap:15px;

    margin-top:30px;

}

.btn-card{

    flex:1;

    text-align:center;

    padding:14px;

    border-radius:14px;

    text-decoration:none;

    font-weight:700;

    transition:.3s;

}

.btn-detail{

    background:#1f2937;

    color:white;

}

.btn-detail:hover{

    background:#374151;

}

.btn-join{

    background:linear-gradient(135deg,#7c3aed,#9333ea);

    color:white;

}

.btn-join:hover{

    transform:scale(1.03);

}

@media(max-width:992px){

.tournaments-grid{

grid-template-columns:1fr;

}

.info-grid{

grid-template-columns:1fr;

}

.tournaments-header h2{

font-size:36px;

}

}

</style>

<section class="tournaments">

    <div class="tournaments-container">

        <div class="tournaments-header">

            <h2>AKTİF TURNUVALAR</h2>

            <p>
                Kayıtları devam eden ve yakında başlayacak turnuvalara hemen katıl.
            </p>

        </div>

        <div class="tournaments-grid">

            @forelse($tournaments as $tournament)

                @php

                    $percent = $tournament->max_teams > 0
                        ? min(100, round(($tournament->teams_count / $tournament->max_teams) * 100))
                        : 0;

                    $statusClass = match($tournament->status){
                        'Kayıt Açık' => 'open',
                        'Devam Ediyor' => 'live',
                        default => 'closed'
                    };

                @endphp

                <div class="tournament-card">

                    <div class="tournament-top">

                        <span class="status {{ $statusClass }}">
                            {{ $tournament->status }}
                        </span>

                        <span class="game">
                            {{ $tournament->game }}
                        </span>

                    </div>

                    <div class="tournament-body">

                        <h3 class="tournament-title">
                            {{ $tournament->title }}
                        </h3>

                        <div class="info-grid">

                            <div class="info-box">

                                <div class="info-label">
                                    💰 Ödül Havuzu
                                </div>

                                <div class="info-value">
                                    ₺{{ number_format($tournament->prize_pool,0,',','.') }}
                                </div>

                            </div>

                            <div class="info-box">

                                <div class="info-label">
                                    💳 Katılım Ücreti
                                </div>

                                <div class="info-value">

                                    @if($tournament->entry_fee > 0)

                                        ₺{{ number_format($tournament->entry_fee,0,',','.') }}

                                    @else

                                        Ücretsiz

                                    @endif

                                </div>

                            </div>

                            <div class="info-box">

                                <div class="info-label">
                                    📅 Tarih
                                </div>

                                <div class="info-value">
                                    {{ \Carbon\Carbon::parse($tournament->date)->format('d.m.Y') }}
                                </div>

                            </div>

                            <div class="info-box">

                                <div class="info-label">
                                    🕒 Saat
                                </div>

                                <div class="info-value">
                                    {{ $tournament->time }}
                                </div>

                            </div>

                        </div>

                                                <div class="progress-title">

                            <span>
                                👥 Takım Doluluğu
                            </span>

                            <span>
                                {{ $tournament->teams_count }} / {{ $tournament->max_teams }}
                            </span>

                        </div>

                        <div class="progress">

                            <span style="width: {{ $percent }}%"></span>

                        </div>

                        <div class="card-buttons">

                            <a href="{{ route('tournaments.show', $tournament) }}"
                               class="btn-card btn-detail">

                                Detaylar

                            </a>

                            @if($tournament->status == 'Kayıt Açık')

                                <a href="{{ route('registration.create', $tournament) }}"
                                   class="btn-card btn-join">

                                    Katıl

                                </a>

                            @else

                                <a href="#"
                                   class="btn-card btn-join"
                                   style="opacity:.6;pointer-events:none;">

                                    {{ $tournament->status }}

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div style="grid-column:1/-1;text-align:center;padding:60px;">

                    <h3>Şu anda aktif turnuva bulunmuyor.</h3>

                    <p style="color:#9ca3af;margin-top:15px;">
                        Yakında yeni turnuvalar eklenecek.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>