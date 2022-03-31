<section id="section-otomobil" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">OTOMOBİL</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{ route('home_article.index', ['type' => 'otomobil']) }}">Tüm
                    Otomobil Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                href="{{ route('home_article.index', ['type' => 'otomobil']) }}">Tüm Otomobil Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-15 h-100">
                <div class="card news-card news-card-big keep-ratio mb-sm-5 cardSlider" currentSlide="" ratio="0.55"
                     id="auto-slider" style="min-height: 440px">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach (array_slice($articles['Otomobil'][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,4) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
                            <div class="news-card-slider-slide">
                                <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                                    <div class="life-card-slider-slide-img text-white lazy"
                                         style="background-image: url({{ asset($article->image_path) }})">
                                        <div class="blueOverlay">

                                        </div>

                                        <div class="automobile-card-slider-slide-caption">
                                            <span class="highlighted bg-black">{{ $article->title }}</span>
                                            <div class=" sport-text-bottom-sm">

                                                <span
                                                    class="text-white bg-black">{{ Date::parse($article->article_date)->format('j F') }}
                                                    • {{ Carbon\Carbon::parse($article->article_date)->format('H:i') }} •
                                                    parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="automobile-card-slider-controls bg-black">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $otomobilArticles = array_slice($articles['Otomobil'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,1);
                $otomobilArticlesBelow = array_slice($articles['Otomobil'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],1,3);
                $otomobilArticlesFooterLeft = array_slice($articles['Otomobil'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],4,1);
                $otomobilArticlesFooterRight = array_slice($articles['Otomobil'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],5,1);
            @endphp
            @foreach ($otomobilArticles as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-md-9 ">
                    <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                        <div class="col-24 bg-dark">
                            <div class="col-sm-24 h-100">
                                <div class="col-24 automobile automobile-md lazy"
                                     style="background-image: url({{ asset($article->image_path) }})"></div>
                                <div class="automobile-title">
                                    <p>{{ $article->title }}</p>
                                    <div class="automobile-text-bottom">
                                        <span
                                            class="text-white">{{ Date::parse($article->article_date)->format('j F') }}</span><span>
                                            • {{ Carbon\Carbon::parse($article->article_date)->format('H:i') }} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row mt-5 mb-5">
            @foreach ($otomobilArticlesBelow as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-md-8">
                    <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                        <div class="col-24  bg-dark">
                            <div class="col-sm-24 ">
                                <div class="col-24 automobile automobile-md lazy"
                                     style="background-image: url({{ asset($article->image_path) }})"></div>
                                <div class="automobile-title"><p>{{ $article->title }}</p>
                                    <div class="automobile-text-bottom-sm">
                                        <span
                                            class="text-white">{{ Date::parse($article->article_date)->format('j F') }}</span><span>
                                            • {{ Carbon\Carbon::parse($article->article_date)->format('H:i') }} • parafesor</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            @foreach ($otomobilArticlesFooterLeft as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-md-24 col-lg-12 p-4 ">
                    <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                        <div class="row">

                            <div class="col-14 bg-secondary" style="padding: 0 3% 0 3%">
                                <div class="automobile-title"><p>{{ $article->title }}</p>
                                </div>
                                <div class="automobile-text-bottom-sm">
                                <span
                                    class="text-white">{{ Date::parse($article->article_date)->format('j F') }}
                                    • {{ Carbon\Carbon::parse($article->article_date)->format('H:i') }} • parafesor</span>
                                </div>
                            </div>
                            <div class="col-10"
                                 style="background-image: url({{ asset($article->image_path) }}); background-size: 100% 100%;">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach ($otomobilArticlesFooterRight as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                <div class="col-md-24 col-lg-12 p-4 ">
                    <a href="{{ route('article.show', ['slug' => $article->slug]) }}">
                        <div class="row">
                            <div class="col-10 lazy"
                                 style="background-image: url({{ asset($article->image_path) }}); background-size: 100% 100%">
                            </div>
                            <div class="col-14 bg-secondary" style="padding: 0 3% 0 3%">
                                <div class="automobile-title"><p>{{ $article->title }}</p>
                                </div>
                                <div class="automobile-text-bottom-sm">
                                <span
                                    class="text-white">{{ Date::parse($article->article_date)->format('j F') }}
                                    • {{ Carbon\Carbon::parse($article->article_date)->format('H:i') }} • parafesor</span>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

