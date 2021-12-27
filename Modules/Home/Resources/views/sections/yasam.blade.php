<section id="section-yasam">
    <div class="container">
        <div class="section-header d-flex text-orange">
            <div class="section-title">YAŞAM</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route("home_article.index",['type' => 'Yaşam'])}}">Tüm Yaşam Haberlerini Gör</a></div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-14 mt-3">
                <div class="card news-card news-card-big keep-ratio cardSlider" currentSlide="0" ratio="0.5"
                     id="life-slider" style="height: 450px;">
                    <div class=""></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <div class="news-card-slider-slide">
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="life-card-slider-slide-img text-white"
                                     style="background-image: url({{asset($article->image_path)}})">
                                    <div class="yellowOverlay0">
                                        <div class="life-card-slider-slide-caption text-black"><p>{{$article->title}}</p>
                                            <div class="tech-text-bottom-sm">
                                    <span
                                        class="text-black">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                            </div>
                                        </div>  </div>


                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="news-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $persistent = count($articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                if($persistent) {
                    $yasamArticles = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                    $yasamArticlesSecond = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                    $yasamArticlesBelow = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(4);
                } else {
                    $yasamArticles = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                    $yasamArticlesSecond = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                    $yasamArticlesBelow = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(4);
                }
            @endphp
            <div class="col-md-5 match mt-3" matchTo="life-slider">
                @foreach($yasamArticles as $article)
                    <div class="col-md-24  match" matchTo="life-slider">
                        <a href="{{route('article.show',['slug'=> $article->slug])}}">
                            <div class="col-md-24 bg-white  h-100 tech-box">
                                <div class="tech-news-box-image "
                                     style="background-image: url({{asset($article->image_path)}}); height: 100%">
                                    <div class="life-second-image-caption">
                                        <p>{{$article->title}}</p>
                                        <div class="mt-1">
                                            Video <span class="fa fa-play-circle"></span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-5 match mt-3" matchTo="life-slider">
                @foreach($yasamArticlesSecond as $article)
                    <div class="col-md-24 match" matchTo="life-slider" style="border-bottom: 8px solid orange;">
                        <a href="{{route('article.show',['slug'=> $article->slug])}}">
                            <div class="col-md-24 bg-white  h-100 tech-box">
                                <div class="tech-news-box-image "
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="life-news-box-caption text-center">
                                    <p>{{$article->title}}</p>
                                    <div class="life-text-bottom-sm ">
                                            <span
                                                class="text-orange">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
        </div>
        <div class="row mb-4 mt-2">
            @foreach($yasamArticlesBelow as $article)
                <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 life life-md"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="life-title">
                            <p>  {{ $article->title }}</p>


                            <div class="life-text-bottom-sm">
                            <span
                                class="text-orange">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>
