<div class="dashboard-card">

    <div class="card-header">

        <h3>⚡ Hızlı İşlemler</h3>

    </div>

    <div class="quick-actions-grid">

        <a href="{{ route('home') }}" class="quick-action-card">

            <div class="action-icon">
                🏆
            </div>

            <div class="action-content">

                <h5>Turnuvalar</h5>

                <p>Yeni turnuvaları incele</p>

            </div>

        </a>

        @if($registration)

            <a href="{{ route('tournaments.show', $registration->tournament) }}" class="quick-action-card">

                <div class="action-icon">
                    🎮
                </div>

                <div class="action-content">

                    <h5>Turnuvam</h5>

                    <p>Turnuva detaylarını görüntüle</p>

                </div>

            </a>

        @else

            <a href="{{ route('home') }}" class="quick-action-card">

                <div class="action-icon">
                    📝
                </div>

                <div class="action-content">

                    <h5>Kayıt Ol</h5>

                    <p>Yeni turnuvaya başvur</p>

                </div>

            </a>

        @endif

        <a href="{{ route('player.dashboard') }}" class="quick-action-card">

            <div class="action-icon">
                🔔
            </div>

            <div class="action-content">

                <h5>Bildirimler</h5>

                <p>Son bildirimlerini kontrol et</p>

            </div>

        </a>

        <a href="{{ route('contact') }}" class="quick-action-card">

            <div class="action-icon">
                📞
            </div>

            <div class="action-content">

                <h5>Destek</h5>

                <p>Bizimle iletişime geç</p>

            </div>

        </a>

    </div>

</div>