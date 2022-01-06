<section id="section-crypto" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">KRİPTO PARALAR</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm
                    Kripto Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm Kripto Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container">
        <div class="row" style="position: relative">
            <div class="col-md-12 h-100">
                <div class="card news-card news-card-big  mb-sm-5 cardSlider" currentSlide=""
                     id="crypto-slider"
                     style="height: 400px">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <div class="news-card-slider-slide">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="life-card-slider-slide-img text-white"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="blueOverlay">

                                        </div>

                                        <div class="crypto-card-slider-slide-caption">
                                            <div style="background-color: #000; padding: 10px;">
                                                {{$article->title}}
                                            </div>
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
                $persistent = count($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                if($persistent) {
                    $kriptoArticles = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                    /*$kriptoArticlesHeadSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);*/
                    $kriptoArticlesBelowFirst = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                    $kriptoArticlesBelowSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                    $kriptoArticlesFooter = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(4);
                } else {
                    $kriptoArticles = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                    /*$kriptoArticlesHeadSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);*/
                    $kriptoArticlesBelowFirst = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                    $kriptoArticlesBelowSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1);
                    $kriptoArticlesFooter = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(4);
                    }
            @endphp

            @foreach($kriptoArticles as $article)
                <div class="col-md-6 match" matchTo="crypto-slider">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 bg-dark match" matchTo="crypto-slider">
                            <div class="col-sm-24 h-100">
                                <div class="col-24 crypto crypto-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="crypto-first-title">
                                    <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                    </div>
                                    <div class="crypto-text-bottom">
                                    <span
                                        style="color:#f2b01b;">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-6 match" matchTo="crypto-slider">
{{--                @foreach($kriptoArticlesHeadSecond as $article)--}}
                    <div class="col-md-24 match" matchTo="crypto-slider">
                            <div class="col-md-24 bg-white  h-100 tech-box">
                                <div class="tech-news-box-image "
                                     style="background-color: black;)}}); height: 100%">
                                    {{--       <div class="tech-news-box-image "
                                                style="background-image: url({{asset($article->image_path)}}); height: 100%">--}}
                                    <div class="crypto-second-image-caption">
                                        Gültekin Bey Haftalık Bitcoin Analizi
                                        <div class="mt-1">
                                            Video <span class="fa fa-play-circle"></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                    </div>
{{--                @endforeach--}}
            </div>

        </div>

        <div class="row mt-4">
            @foreach($kriptoArticlesBelowFirst as $article)
                <div class="col-md-24 col-lg-12 p-4 ">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-10 bg-orange crypto-wide-section">
                                <div class="crypto-title" style="color: black;">
                                    {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                </div>
                            </div>
                            <div class="col-14"
                                 style="background-image: url({{$article->image_path}}); background-size: 100% 100%;"></div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach($kriptoArticlesBelowSecond as $article)
                <div class="col-md-24 col-lg-12 p-4 ">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-14"
                                 style="background-image: url({{$article->image_path}}); background-size: 100% 100%;"></div>
                            <div class="col-10 bg-orange crypto-wide-section">
                                <div class="crypto-title" style="color: black;">
                                    {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}

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
        <div class="row mt-5" style="height: 450px;">
            @foreach($kriptoArticlesFooter as $article)
                <div class="col-md-6">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24  bg-dark">
                            <div class="col-sm-24 ">
                                <div class="col-24 crypto crypto-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="crypto-title">
                                    {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                    <div class="crypto-text-bottom-sm">
                                    <span
                                        class="text-white">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
