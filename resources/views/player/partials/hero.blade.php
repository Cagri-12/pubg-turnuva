<section class="hero-section">

    <div class="hero-card">

        <div class="hero-content">

            <div class="hero-text">

                <span class="hero-badge">
                    🎮 PLAYER DASHBOARD
                </span>

                <h1>
                    Hoş Geldin,
                    {{ auth()->user()?->name }}
                </h1>

                @if($registration)

                    <p>

                        <strong>{{ $registration->team_name }}</strong>

                        takımı ile

                        <strong>{{ $registration->tournament->title }}</strong>

                        turnuvasına kayıtlısın.

                    </p>

                @else

                    <p>

                        Henüz herhangi bir turnuvaya kayıtlı değilsin.

                    </p>

                @endif

            </div>

            <div class="hero-status">

                @if($registration)

                    <div class="status-card">

                        <span class="status-title">

                            Kayıt Durumu

                        </span>

                        <h3>

                            {{ ucfirst($registration->status) }}

                        </h3>

                    </div>

                @else

                    <div class="status-card">

                        <span class="status-title">

                            Durum

                        </span>

                        <h3>

                            Kayıt Yok

                        </h3>

                    </div>

                @endif

            </div>

        </div>

        @if($registration)

        <div class="hero-footer">

            <div class="hero-item">

                <span>🏆 Turnuva</span>

                <strong>

                    {{ $registration->tournament->title }}

                </strong>

            </div>

            <div class="hero-item">

                <span>📅 Tarih</span>

                <strong>

                    {{ $registration->tournament->date }}

                </strong>

            </div>

            <div class="hero-item">

                <span>🕒 Saat</span>

                <strong>

                    {{ $registration->tournament->time }}

                </strong>

            </div>

            <div class="hero-item">

                <span>👥 Takım</span>

                <strong>

                    {{ $registration->team_name }}

                </strong>

            </div>

        </div>

        @endif

    </div>

</section>