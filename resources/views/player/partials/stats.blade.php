<section class="stats-section">

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                🏆
            </div>

            <div class="stat-content">

                <h3>
                    {{ $stats['registrations'] }}
                </h3>

                <p>
                    Katıldığım Turnuva
                </p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div class="stat-content">

                <h3>
                    {{ $stats['team_name'] ?? '-' }}
                </h3>

                <p>
                    Takımım
                </p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                🎮
            </div>

            <div class="stat-content">

                <h3>

                    @if($stats['active_room'])

                        Hazır

                    @else

                        Bekleniyor

                    @endif

                </h3>

                <p>
                    Room Durumu
                </p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                🔔
            </div>

            <div class="stat-content">

                <h3>
                    {{ $stats['notifications'] }}
                </h3>

                <p>
                    Okunmamış Bildirim
                </p>

            </div>

        </div>

    </div>

</section>