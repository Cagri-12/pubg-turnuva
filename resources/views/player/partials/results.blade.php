<div class="dashboard-card">

    <div class="card-header">

        <h3>🏆 Sonuçlar</h3>

    </div>

    @if($results->count())

        <div class="results-list">

            @foreach($results as $result)

                <div class="result-item">

                    <div class="result-image">

                        @if($result->image)

                            <img
                                src="{{ asset('storage/' . $result->image) }}"
                                alt="{{ $result->title }}">

                        @else

                            <div class="no-image">

                                🏆

                            </div>

                        @endif

                    </div>

                    <div class="result-content">

                        <h5>

                            {{ $result->title }}

                        </h5>

                        <p>

                            Match {{ $result->match_number }}

                        </p>

                    </div>

                    <div class="result-action">

                        @if($result->image)

                            <a
                                href="{{ asset('storage/' . $result->image) }}"
                                target="_blank"
                                class="btn-primary">

                                Görüntüle

                            </a>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">

                🏆

            </div>

            <h4>

                Sonuç Bulunamadı

            </h4>

            <p>

                Henüz yayınlanmış maç sonucu bulunmuyor.

            </p>

        </div>

    @endif

</div>