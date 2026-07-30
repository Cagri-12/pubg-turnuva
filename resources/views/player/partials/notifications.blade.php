<div class="dashboard-card">

    <div class="card-header">

        <h3>🔔 Bildirimler</h3>

        @if($stats['notifications'] > 0)
            <span class="badge bg-danger">
                {{ $stats['notifications'] }}
            </span>
        @endif

    </div>

    @if($notifications->count())

        <div class="notification-list">

            @foreach($notifications as $notification)

                <div class="notification-item">

                    <div class="notification-icon">

                        @if($notification->is_read)

                            ✅

                        @else

                            🔔

                        @endif

                    </div>

                    <div class="notification-content">

                        <h5>

                            {{ $notification->title }}

                        </h5>

                        <p>

                            {{ $notification->message }}

                        </p>

                        <small>

                            {{ $notification->created_at->diffForHumans() }}

                        </small>

                    </div>

                    <div class="notification-status">

                        @if($notification->is_read)

                            <span class="status success">

                                Okundu

                            </span>

                        @else

                            <span class="status pending">

                                Yeni

                            </span>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">

                🔔

            </div>

            <h4>

                Bildirim Yok

            </h4>

            <p>

                Şu anda herhangi bir bildirimin bulunmuyor.

            </p>

        </div>

    @endif

</div>