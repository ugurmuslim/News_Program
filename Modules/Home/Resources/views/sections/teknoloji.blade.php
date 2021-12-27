<section id="section-teknoloji">
    <div class="container">
        <div class="section-header d-flex text-purple">
            <div class="section-title">TEKNOLOJİ</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route('home_article.index', ['type'=>'Teknoloji'])}}">Tüm
                    Teknoloji Haberlerini Gör</a></div>
        </div>
    </div>
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-5">
                @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(3) as $article)
                    <div class="card news-card news-card-small">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="news-card-img-container">
                                <div style="background: url({{asset($article->image_path)}})" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text bg-white small-text">
                                    <p>{{$article->title}}</p>
                                </div>
                            </div>
                            <div class="news-card-bottom">
                            <span
                                class="text-purple">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-19">
                <div class="row">
                    <div class="col-lg-18 col-md-24 mt-1">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0" style="height: 400px;"
                             id="tech-second-row-anchor">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="news-card-slider-slide">
                                            <div class="tech-card-slider-slide-img text-white"
                                                 style="background-image: url({{asset($article->image_path)}})">
                                                <div class="tech-card-slider-slide-caption">
                                                        <span class="highlighted bg-purple">
                                                                                                    {{ \Illuminate\Support\Str::limit($article->title, 65, $end='...') }}

                                                        </span>
                                                    <div class=" sport-text-bottom-sm">

                                                    <span
                                                        class="text-white">{{ Date::parse($article->created_at)->format('j F') }}</span><span
                                                            class="text-white">  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
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
                        $persistent = count($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                        if($persistent) {
                            $teknolojiArticles = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                            $teknolojiArticlesBelow = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(3);
                        } else {
                            $teknolojiArticles = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                            $teknolojiArticlesBelow = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(5);
                        }
                    @endphp
                    <div class="col-lg-6 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                        @foreach($teknolojiArticles as $article)
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-purple h-100 tech-box">
                                    <div class="tech-news-box-image"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="tech-news-box-caption">
                                        <p>{{$article->title}}</p>

                                        <div class="tech-text-bottom-sm text-white">
                                                <span
                                                    class="">{{ Date::parse($article->created_at)->format('j F') }}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    @foreach($teknolojiArticlesBelow as $article)
                        <div class="col-sm-24 col-md-12 col-lg-8 mt-3">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="col-24 tech tech-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="tech-title"><p>{{$article->title}}</p>
                                    <div class="tech-text-bottom-sm">
                                    <span
                                        class="text-purple">{{ Date::parse($article->created_at)->format('j F') }}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
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
