<section id="section-spor">
    <div class="container">
        <div class="section-header d-flex text-primary">
            <div class="section-title">SPOR</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/spor">Tüm Spor
                    Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-red"><a href="https://parafesor.net/kategori/spor">Tüm
                Spor Dakika Haberlerini Gör</a></div>
    </div>
    <div class="container spor-container-2">
        <div class="row spor-row-1">
            <div class="col-lg-12 col-md-24 spor-slide">
                <div class="card news-card news-card-big cardSlider" currentSlide="" id="sport-slider">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <div class="news-card-slider-slide">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="life-card-slider-slide-img text-white lazy"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="sport-card-slider-slide-caption">
                                            <div class="sport-text-caption">
                                                <p>{{ $article->title }}</p>
                                            </div>
                                            <div class="sport-card-bottom-date">
                                                <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="sport-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $sporArticles = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(2);
                $sporArticlesBelow = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(5);
            @endphp
            @foreach($sporArticles as $article)
                <div class="col-lg-6 col-md-12 spor-2box">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 sport sport-md lazy"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="sport-title">
                            <p>{{ $article->title }}</p>
                            <div class="card-bottom-date">
                                <span>{{ Date::parse($article->article_date)->format('j F')}}</span>
                                • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row spor-row-2">
            @foreach($sporArticlesBelow as $article)
                <div class="sport-5box">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card news-card news-card-small">
                            <div class="news-card-img-container bg-white">
                                <div style="background-image: url({{asset($article->image_path)}})" alt=""
                                     class="news-img lazy"></div>
                                <div class="sport-mini-card">
                                    <p>{{ $article->title }}</p>
                                    <div class="news-card-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F')}}</span>
                                        • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
