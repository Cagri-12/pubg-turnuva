<style>

.footer{

    margin-top:80px;
    border-top:1px solid rgba(255,255,255,.08);
    background:rgba(255,255,255,.03);

}

.footer-container{

    max-width:1400px;
    margin:auto;
    padding:70px 25px 35px;

}

.footer-grid{

    display:grid;
    grid-template-columns:2fr 1fr 1fr;
    gap:50px;

}

.footer-title{

    font-size:28px;
    font-weight:900;
    margin-bottom:18px;

}

.footer-text{

    color:#9ca3af;
    line-height:1.9;

}

.footer-heading{

    font-size:20px;
    margin-bottom:20px;
    font-weight:800;

}

.footer-links{

    display:flex;
    flex-direction:column;
    gap:14px;

}

.footer-links a{

    color:#cbd5e1;
    text-decoration:none;
    transition:.25s;

}

.footer-links a:hover{

    color:#22c55e;
    transform:translateX(6px);

}

.footer-bottom{

    margin-top:50px;
    padding-top:25px;
    border-top:1px solid rgba(255,255,255,.08);

    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;

    color:#9ca3af;

}

.footer-social{

    display:flex;
    gap:14px;
    flex-wrap:wrap;

}

.footer-social a{

    width:46px;
    height:46px;

    display:flex;
    justify-content:center;
    align-items:center;

    border-radius:14px;

    background:rgba(255,255,255,.05);

    text-decoration:none;

    transition:.3s;

    color:white;

    font-size:20px;

}

.footer-social a:hover{

    background:#7c3aed;

    transform:translateY(-4px);

}

@media(max-width:900px){

.footer-grid{

grid-template-columns:1fr;

gap:40px;

}

.footer-bottom{

flex-direction:column;

text-align:center;

}

}

</style>

<footer class="footer">

    <div class="footer-container">

        <div class="footer-grid">

            <div>

                <h2 class="footer-title">
                    {{ $setting->site_name ?? 'SPACE STONE STARS' }}
                </h2>

                <p class="footer-text">
                    {{ $setting->footer ?? 'PUBG Mobile turnuvaları, profesyonel organizasyonlar ve rekabet dolu mücadeleler için doğru adres.' }}
                </p>

            </div>

            <div>

                <h3 class="footer-heading">
                    İletişim
                </h3>

                <div class="footer-links">

                    @if(!empty($setting->email))
                        <a href="mailto:{{ $setting->email }}">
                            📧 {{ $setting->email }}
                        </a>
                    @endif

                    @if(!empty($setting->phone))
                        <a href="tel:{{ $setting->phone }}">
                            📞 {{ $setting->phone }}
                        </a>
                    @endif

                    @if(!empty($setting->whatsapp))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}"
                           target="_blank">
                            💬 WhatsApp
                        </a>
                    @endif

                </div>

            </div>

            <div>

                <h3 class="footer-heading">
                    Bizi Takip Et
                </h3>

                <div class="footer-social">

                    @if(!empty($setting->discord))
                        <a href="{{ $setting->discord }}" target="_blank" title="Discord">
                            🎮
                        </a>
                    @endif

                    @if(!empty($setting->instagram))
                        <a href="{{ $setting->instagram }}" target="_blank" title="Instagram">
                            📷
                        </a>
                    @endif

                    @if(!empty($setting->youtube))
                        <a href="{{ $setting->youtube }}" target="_blank" title="YouTube">
                            ▶️
                        </a>
                    @endif

                    @if(!empty($setting->tiktok))
                        <a href="{{ $setting->tiktok }}" target="_blank" title="TikTok">
                            🎵
                        </a>
                    @endif

                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <div>
                © {{ date('Y') }}
                {{ $setting->site_name ?? 'SPACE STONE STARS' }}.
                Tüm hakları saklıdır.
            </div>

            <div>
                Made with ❤️ for PUBG Mobile Players
            </div>

        </div>

    </div>

</footer>