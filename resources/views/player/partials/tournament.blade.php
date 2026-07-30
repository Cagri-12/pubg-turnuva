<div class="dashboard-card">

    <div class="card-header">

        <h3>🏆 Aktif Turnuvam</h3>

        @if($registration)
            <span class="status active">
                {{ ucfirst($registration->status) }}
            </span>
        @endif

    </div>

    @if($registration)

        <div class="tournament-info">

            <div class="info-row">

                <span>🎮 Turnuva</span>

                <strong>
                    {{ $registration->tournament->title }}
                </strong>

            </div>

            <div class="info-row">

                <span>👥 Takım</span>

                <strong>
                    {{ $registration->team_name }}
                </strong>

            </div>

            <div class="info-row">

                <span>📅 Tarih</span>

                <strong>
                    {{ $registration->tournament->date }}
                </strong>

            </div>

            <div class="info-row">

                <span>🕒 Saat</span>

                <strong>
                    {{ $registration->tournament->time }}
                </strong>

            </div>

            <div class="info-row">

                <span>💵 Giriş Ücreti</span>

                <strong>
                    {{ $registration->tournament->entry_fee }}
                </strong>

            </div>

            <div class="info-row">

                <span>🥇 Ödül Havuzu</span>

                <strong class="text-warning">
                    {{ $registration->tournament->prize_pool }}
                </strong>

            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('tournaments.show', $registration->tournament) }}"
               class="btn-primary">

                Turnuvayı Görüntüle →

            </a>

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">

                🏆

            </div>

            <h4>

                Aktif Turnuvan Yok

            </h4>

            <p>

                Henüz herhangi bir turnuvaya kayıt olmadın.

            </p>

            <a href="{{ route('home') }}" class="btn-primary">

                Turnuvaları İncele

            </a>

        </div>

    @endif

</div>