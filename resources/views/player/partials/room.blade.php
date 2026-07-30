<div class="dashboard-card">

    <div class="card-header">

        <h3>🎮 Room Center</h3>

        @if($room)
            <span class="status active">
                Hazır
            </span>
        @else
            <span class="status pending">
                Bekleniyor
            </span>
        @endif

    </div>

    @if($room)

        <div class="room-grid">

            <div class="room-item">

                <label>Room ID</label>

                <div class="copy-box">

                    <strong id="roomId">
                        {{ $room->room_id }}
                    </strong>

                    <button
                        class="copy-btn"
                        onclick="copyText('roomId')">

                        📋

                    </button>

                </div>

            </div>

            <div class="room-item">

                <label>Room Password</label>

                <div class="copy-box">

                    <strong id="roomPassword">
                        {{ $room->room_password }}
                    </strong>

                    <button
                        class="copy-btn"
                        onclick="copyText('roomPassword')">

                        📋

                    </button>

                </div>

            </div>

            <div class="room-item">

                <label>Map</label>

                <strong>

                    {{ $room->map }}

                </strong>

            </div>

            <div class="room-item">

                <label>Match Date</label>

                <strong>

                    {{ $room->match_date }}

                </strong>

            </div>

            <div class="room-item">

                <label>Start Time</label>

                <strong>

                    {{ $room->start_time }}

                </strong>

            </div>

        </div>

        @if($room->announcement)

            <div class="room-announcement">

                <h5>

                    📢 Admin Duyurusu

                </h5>

                <p>

                    {{ $room->announcement }}

                </p>

            </div>

        @endif

    @else

        <div class="empty-state">

            <div class="empty-icon">

                🎮

            </div>

            <h4>

                Room Henüz Yayınlanmadı

            </h4>

            <p>

                Oda bilgileri admin tarafından yayınlandığında burada otomatik olarak görünecek.

            </p>

        </div>

    @endif

</div>