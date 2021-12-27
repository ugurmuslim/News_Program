<section id="section-netkolik">
    <div class="container">
        <div class="section-header d-flex text-dark-orange">
            <div class="section-title">NETKOLİK</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route("home_article.index",['type' => 'Netkolik'])}}">Tüm
                    Netkolik Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                href="{{route("home_article.index",['type' => 'Netkolik'])}}">Tüm Netkolik Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-14">
                <div class="card news-card news-card-big mb-sm-5 keep-ratio cardSlider" currentSlide="0"
                     ratio="0.525"
                     id="internet-slider">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">

                            <div class="news-card-slider-slide">
                                <div class="life-card-slider-slide-img"
                                     style="background-image: url({{asset($article->image_path)}})">
                                    <div class="blueOverlay">

                                    </div>

                                    <div class="internet-card-slider-slide-caption big-title">
                                        <p style="background-color: #fe6845;">
                                            {{ $article->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="internet-card-slider-controls" style="background-color: #fe6845;">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                    {{--<div class="news-card-slider-controls">
                        <div class="news-card-slider-control">❮
                        </div>
                        <div class="news-card-slider-control">❯
                        </div>
                    </div>--}}
                </div>
            </div>
            @php
                $persistent = count($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                if($persistent) {
                    $netkolikArticles = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                    $netkolikArticlesBelowFirst = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                    $netkolikArticlesBelowSecond = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(3);
                    $netkolikArticlesFooter = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(1);
                } else {
                    $netkolikArticles = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);

                                   $netkolikArticlesBelowFirst = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                    $netkolikArticlesBelowSecond = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(3);
                    $netkolikArticlesFooter = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(5)->take(3);
                }
            @endphp
            <div class="col-md-10">
                @foreach($netkolikArticles as $article)
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                    <div class="col-lg-24 col-md-24 mt-1">
                        <div class="card news-card news-card-big match " matchTo="internet-slider">
                            <div class="news-card-slider-container">
                                <div class="news-card-slider-slide">
                                    <div class="sport-card-slider-slide-img "
                                         style="background-image: url({{$article->image_path}})">
                                        <div class="orangeOverlay90"></div>

                                        <div class="internet-card-caption"><p>{{$article->title}}</p>
                                            <div class=" sport-text-bottom-sm">

                                                <span class="">23 Ocak • 14:35 • parafesor</span>
                                            </div>

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
        <div class="row">
            <div class="col-md-5">
                @foreach($netkolikArticlesBelowFirst as $article)
                    <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                        <a href="{{route('article.show',['slug'=> $article->slug])}}">
                            <div class="col-md-24 bg-dark-orange h-100 tech-box">
                                <div class="tech-news-box-image"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="internet-news-box-caption">
                                   <p>{{$article->title}}</p>
                                    <div class="tech-text-bottom-sm">
                                        <span class="">{{ Date::parse($article->created_at)->format('j F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-19">
                <div class="row">
                    @foreach($netkolikArticlesBelowSecond as $article)
                        <div class="col-md-8 mt-4">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="col-24">
                                    <div class="col-sm-24" id="internet-second-row">
                                        <div class="col-24 internet internet-md"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                        <div class="internet-title">
                                            <p>{{$article->title}}</p>
                                            <div class="card-bottom-date">
                                        <span
                                            class="text-dark-orange">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-3">
            @foreach($netkolikArticlesFooter as $article)
                <div class="col-md-8 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">

                        <div class="col-24">
                            <div class="col-sm-24 ">
                                <div class="col-24 internet internet-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="internet-title">
                                    <p>{{$article->title}}</p>
                                    <div class="card-bottom-date">
                                    <span
                                        class="text-dark-orange">{{Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
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
