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
                        @foreach(array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,4) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
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
                $kriptoArticles = array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL], 0 ,1);
                $kriptoArticlesHeadSecond = array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],1,1);
                $kriptoArticlesBelowFirst = array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],2,1);
                $kriptoArticlesBelowSecond = array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,1);
                $kriptoArticlesFooter = array_slice($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],4,4);
            @endphp

            <div class="col-md-6 col-12 match c-box-2" matchTo="crypto-slider">
                @foreach($kriptoArticles as $article)
                    @php
                        $article = (object) $article;
                    @endphp
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
                    @php
                        $article = (object) $article;
                    @endphp
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
                @php
                    $article = (object) $article;
                @endphp
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
                                 style="background-image:  url({{asset($article->image_path)}});"></div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach($kriptoArticlesBelowSecond as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="col-md-24 col-lg-12">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-14 lazy"
                                 style="background-image: url({{asset($article->image_path)}}); "></div>
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
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-md-6">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24">
                            <div class="col-sm-24 ">
                                <div class="col-24 crypto crypto-md lazy"
                                     style="background-image: url({{asset($article->image_path)}}); "></div>
                                <div class="crypto-title">
                                    <p> {{$article->title}}</p>
                                    <div class="crypto-text-bottom">
                                        <div><span>{{ Date::parse($article->article_date)->format('j F')}} </span>
                                            • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} •
                                            parafesor
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
