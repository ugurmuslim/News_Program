<section id="section-teknoloji">
    <div class="container">
        <div class="section-header d-flex text-purple">
            <div class="section-title">TEKNOLOJİ</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/teknoloji">Tüm
                    Teknoloji Haberlerini Gör</a></div>
        </div>
        <div class="d-sm-block d-md-none section-right-sm"><a href="https://parafesor.net/kategori/teknoloji">Tüm
                Teknoloji Haberlerini Gör</a></div>
    </div>
    <div class="container tekno-container-2">
        <div class="row tekno-row-1">
            <div class="col-md-5 tekno-col-1">
                @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(3) as $article)
                    <div class="card news-card news-card-small">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="news-card-img-container">
                                <div
                                    style="background-image: url({{asset($article->image_path)}})"
                                    alt="" class="news-img lazy"></div>
                                <div class="news-card-img-text bg-white small-text">
                                    <p>{{$article->title}}</p>
                                    <div class="news-card-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F') }}</span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="col-md-19 tekno-col-2">
                <div class="row tekno-alt-1">
                    <div class="col-lg-18 col-md-24">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0"
                             id="tech-second-row-anchor">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="news-card-slider-slide">
                                        <div class="tech-card-slider-slide-img text-white lazy"
                                             style="background-image: url({{asset($article->image_path)}})">
                                            <div class="tech-card-slider-slide-caption">
                                                <div class="tech-caption-text bg-purple">
                                                    <div class="tech-slide-new-caption">
                                                        <p>{{$article->title}}</p>
                                                    </div>
                                                </div>
                                                <div class="tech-text-bottom-sm">
                                                    <span>{{ Date::parse($article->article_date)->format('j F') }} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="news-card-slider-controls tech-slider-controls">
                                <div class="news-card-slider-control" direction="previous">❮</div>
                                <div class="news-card-slider-control" direction="next">❯</div>
                            </div>
                        </div>
                    </div>
                    @php
                        $teknolojiArticles = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(1);
                       $teknolojiArticlesBelow = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(3);
                    @endphp
                    <div class="col-lg-6 col-md-24 match " matchTo="tech-second-row-anchor">
                        @foreach($teknolojiArticles as $article)
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-md-24 bg-purple h-100 tech-box">
                                <div class="tech-news-box-image lazy"
                                     style="background-image:  url({{asset($article->image_path)}})"></div>
                                <div class="tech-news-box-caption">
                                    <p>{{$article->title}}</p>
                                    <div class="tech-text-bottom-sm">
                                        <span>{{ Date::parse($article->article_date)->format('j F') }} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
                <div class="row tekno-alt-2">
                    @foreach($teknolojiArticlesBelow as $article)
                    <div class="col-sm-24 col-md-12 col-lg-8">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 tech tech-md lazy"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="tech-title">
                                <p>{{$article->title}}</p>

                                <div class="news-card-bottom">
                                    <span>{{ Date::parse($article->article_date)->format('j F') }} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
