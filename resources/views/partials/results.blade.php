<style>

.results{

    padding:110px 25px;

}

.results-container{

    max-width:1400px;
    margin:auto;

}

.results-header{

    text-align:center;
    margin-bottom:65px;

}

.results-header h2{

    font-size:48px;
    font-weight:900;
    margin-bottom:15px;

}

.results-header p{

    color:#9ca3af;
    font-size:18px;

}

.results-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));

    gap:28px;

}

.result-card{

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    overflow:hidden;

    backdrop-filter:blur(18px);

    transition:.35s;

}

.result-card:hover{

    transform:translateY(-10px);

    border-color:#7c3aed;

    box-shadow:0 20px 45px rgba(124,58,237,.30);

}

.result-image{

    position:relative;

    overflow:hidden;

}

.result-image img{

    width:100%;

    height:240px;

    object-fit:cover;

    transition:.4s;

    display:block;

}

.result-card:hover .result-image img{

    transform:scale(1.06);

}

.result-overlay{

    position:absolute;

    inset:0;

    background:linear-gradient(to top,rgba(0,0,0,.65),transparent);

    opacity:0;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:40px;

    transition:.3s;

}

.result-card:hover .result-overlay{

    opacity:1;

}

.result-content{

    padding:24px;

}

.result-content h3{

    font-size:22px;

    margin-bottom:12px;

}

.result-meta{

    display:flex;

    justify-content:space-between;

    flex-wrap:wrap;

    gap:10px;

    color:#9ca3af;

    font-size:14px;

}

@media(max-width:768px){

.results-header h2{

font-size:36px;

}

.result-image img{

height:210px;

}

}

</style>

<section class="results">

    <div class="results-container">

        <div class="results-header">

            <h2>Son Maç Sonuçları</h2>

            <p>
                Tamamlanan turnuvaların sonuç görsellerini inceleyebilirsiniz.
            </p>

        </div>

        <div class="results-grid">

            @forelse($results as $result)

                <a href="{{ asset('storage/' . $result->image) }}"
                   class="result-card"
                   target="_blank">

                    <div class="result-image">

                        <img
                            src="{{ asset('storage/' . $result->image) }}"
                            alt="{{ $result->title }}"
                        >

                        <div class="result-overlay">
                            🔍
                        </div>

                    </div>

                    <div class="result-content">

                        <h3>{{ $result->title }}</h3>

                        <div class="result-meta">

                            <span>
                                🎮 Maç #{{ $result->match_number }}
                            </span>

                            <span>
                                📅 {{ $result->created_at->format('d.m.Y') }}
                            </span>

                        </div>

                    </div>

                </a>

            @empty

                <div class="result-card">

                    <div class="result-content" style="text-align:center;padding:60px 30px;">

                        <h3>Henüz Sonuç Yok</h3>

                        <p style="color:#9ca3af;margin-top:12px;">
                            İlk maç sonuçları yayınlandığında burada görüntülenecek.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>