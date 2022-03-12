<section id="section-crypto" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title text-warning">KRİPTO PARALAR</div>
            <div class="d-none d-md-block section-right text-warning"><a href="https://parafesor.net/kategori/kripto">Tüm
                    Kripto Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-warning"><a
                href="https://parafesor.net/kategori/kripto">Tüm Kripto Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container">
        <div class="row c-row">
            <div class="col-md-12 c-box-1">
                <div class="card news-card news-card-big  mb-sm-5 cardSlider" currentSlide="" id="crypto-slider">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <div class="news-card-slider-slide">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="life-card-slider-slide-img text-white lazy"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="blueOverlay">
                                        </div>
                                        <div class="crypto-card-slider-slide-caption">
                                            <p>
                                                {{$article->title}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="crypto-card-slider-controls bg-orange">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $kriptoArticles = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                $kriptoArticlesHeadSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                $kriptoArticlesBelowFirst = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1);
                $kriptoArticlesBelowSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(1);
                $kriptoArticlesFooter = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(4);
            @endphp

            <div class="col-md-6 col-12 match c-box-2" matchTo="crypto-slider">
                @foreach($kriptoArticles as $article)
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 match" matchTo="crypto-slider">
                            <div class="col-sm-24 h-100">
                                <div class="col-24 crypto crypto-md lazy"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="crypto-first-title">
                                    <p>{{$article->title}}</p>
                                    <div class="crypto-text-bottom">
                                        <div><span>{{ Date::parse($article->article_date)->format('j F')}}</span>
                                            • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} •
                                            parafesor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="col-md-6 col-12 match c-box-3" matchTo="crypto-slider">
                @foreach($kriptoArticlesHeadSecond as $article)
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-md-24 match" matchTo="crypto-slider">
                            <div class="col-md-24 bg-white  h-100 tech-box">
                                <div class="tech-news-box-image lazy"
                                     style="background-image: url({{asset($article->image_path)}})">
                                    <div class="crypto-second-image-caption">
                                        <div class="crypto-first-title">
                                            <p> {{$article->title}}</p>
                                        </div>
                                        <div class="crypto-text-bottom">
                                            <div><span>{{ Date::parse($article->article_date)->format('j F')}} </span>
                                                • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} •
                                                parafesor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="row c-row-1">
            @foreach($kriptoArticlesBelowFirst as $article)
                <div class="col-md-24 col-lg-12">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-10 bg-orange crypto-wide-section">
                                <div class="crypto-title">
                                    <p> {{$article->title}}</p>
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                </div>
                            </div>
                            <div class="col-14 lazy"
                                 style="background-image:  url({{asset($article->image_path)}};"></div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach($kriptoArticlesBelowSecond as $article)
                <div class="col-md-24 col-lg-12">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-14 lazy"
                                 style="background-image: url({{asset($article->image_path)}}; "></div>
                            <div class="col-10 bg-orange crypto-wide-section">
                                <div class="crypto-title">
                                    <p> {{$article->title}}</p>
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="row c-row-2">
            @foreach($kriptoArticlesFooter as $article)
            <div class="col-md-6">
                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                    <div class="col-24">
                        <div class="col-sm-24 ">
                            <div class="col-24 crypto crypto-md lazy"
                                 style="background-image: url({{asset($article->image_path)}}; "></div>
                            <div class="crypto-title">
                                <p> {{$article->title}}</p>
                                <div class="crypto-text-bottom">
                                    <div><span>{{ Date::parse($article->article_date)->format('j F')}} </span>
                                        • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}}  • parafesor
                                    </div>
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
