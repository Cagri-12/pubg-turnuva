<div class="dashboard-card">

    <div class="card-header">

        <h3>📢 Son Duyurular</h3>

    </div>

    @if($announcements->count())

        <div class="announcement-list">

            @foreach($announcements as $announcement)

                <div class="announcement-item">

                    <div class="announcement-icon">
                        📣
                    </div>

                    <div class="announcement-content">

                        <h5>

                            {{ $announcement->title }}

                        </h5>

                        <p>

                            {{ Str::limit($announcement->content,120) }}

                        </p>

                        <small>

                            {{ $announcement->created_at->format('d.m.Y H:i') }}

                        </small>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">

                📢

            </div>

            <h4>

                Duyuru Bulunamadı

            </h4>

            <p>

                Şu anda yayınlanmış aktif bir duyuru yok.

            </p>

        </div>

    @endif

</div>