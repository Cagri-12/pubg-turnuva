<div class="dashboard-card">

    <div class="card-header">

        <h3>💬 Destek Merkezi</h3>

    </div>

    <div class="contact-card">

        <div class="contact-item">

            <div class="contact-icon">

                📧

            </div>

            <div>

                <span>E-Posta</span>

                <strong>

                    {{ $setting->email ?? 'support@spacestonestars.com' }}

                </strong>

            </div>

        </div>

        <div class="contact-item">

            <div class="contact-icon">

                📱

            </div>

            <div>

                <span>Telefon</span>

                <strong>

                    {{ $setting->phone ?? '-' }}

                </strong>

            </div>

        </div>

        <div class="contact-item">

            <div class="contact-icon">

                🌐

            </div>

            <div>

                <span>Website</span>

                <strong>

                    {{ $setting->site_name ?? 'SPACE STONE STARS' }}

                </strong>

            </div>

        </div>

    </div>

    <div class="contact-actions">

        <a href="mailto:{{ $setting->email ?? 'support@spacestonestars.com' }}"
           class="btn-primary">

            📧 E-Posta Gönder

        </a>

    </div>

</div>