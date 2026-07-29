<style>

.announcements{

    padding:110px 25px;

}

.announcements-container{

    max-width:1400px;
    margin:auto;

}

.announcement-header{

    text-align:center;
    margin-bottom:70px;

}

.announcement-header h2{

    font-size:48px;
    font-weight:900;
    margin-bottom:15px;

}

.announcement-header p{

    color:#9ca3af;
    font-size:18px;

}

.announcement-grid{

    display:grid;

    grid-template-columns:1.4fr .9fr;

    gap:35px;

}

.main-news{

    background:linear-gradient(
        180deg,
        rgba(20,25,45,.95),
        rgba(12,15,28,.95)
    );

    border:1px solid rgba(124,58,237,.25);

    border-radius:28px;

    padding:40px;

    transition:.35s;

}

.main-news:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 45px rgba(124,58,237,.30);

}

.news-badge{

    display:inline-block;

    background:#7c3aed;

    padding:8px 16px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;

    margin-bottom:25px;

}

.main-news h3{

    font-size:34px;

    margin-bottom:20px;

}

.main-news p{

    color:#cbd5e1;

    line-height:1.9;

}

.news-date{

    margin-top:30px;

    color:#9ca3af;

}

.news-list{

    display:flex;

    flex-direction:column;

    gap:20px;

}

.news-item{

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    border-radius:20px;

    padding:24px;

    transition:.3s;

}

.news-item:hover{

    transform:translateX(8px);

    border-color:#9333ea;

}

.news-item h4{

    margin-bottom:10px;

    font-size:20px;

}

.news-item small{

    color:#9ca3af;

}

@media(max-width:992px){

.announcement-grid{

grid-template-columns:1fr;

}

.announcement-header h2{

font-size:36px;

}

.main-news h3{

font-size:28px;

}

}

</style>

<section class="announcements">

    <div class="announcements-container">

        <div class="announcement-header">

            <h2>Duyurular</h2>

            <p>
                Platformumuzdaki en son gelişmeler ve önemli bilgilendirmeler.
            </p>

        </div>

        @if($announcements->count())

            <div class="announcement-grid">

                @php
                    $featured = $announcements->first();
                @endphp

                <div class="main-news">

                    <span class="news-badge">
                        📢 Son Duyuru
                    </span>

                    <h3>
                        {{ $featured->title }}
                    </h3>

                    <p>
                        {{ \Illuminate\Support\Str::limit(strip_tags($featured->content), 280) }}
                    </p>

                    <div class="news-date">

                        📅 {{ $featured->created_at->format('d.m.Y H:i') }}

                    </div>

                </div>

                <div class="news-list">

                    @foreach($announcements->skip(1) as $announcement)

                        <div class="news-item">

                            <h4>
                                {{ $announcement->title }}
                            </h4>

                            <small>

                                📅 {{ $announcement->created_at->format('d.m.Y H:i') }}

                            </small>

                            <p style="margin-top:15px;color:#cbd5e1;line-height:1.7;">

                                {{ \Illuminate\Support\Str::limit(strip_tags($announcement->content),120) }}

                            </p>

                        </div>

                    @endforeach

                </div>

            </div>

        @else

            <div style="text-align:center;padding:70px;background:rgba(255,255,255,.05);border-radius:20px;">

                <h3>Henüz duyuru bulunmuyor.</h3>

                <p style="margin-top:15px;color:#9ca3af;">
                    Yeni duyurular burada yayınlanacaktır.
                </p>

            </div>

        @endif

    </div>

</section>