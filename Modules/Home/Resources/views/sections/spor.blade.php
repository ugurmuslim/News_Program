<section id="section-spor">
    <div class="container">
        <div class="section-header d-flex text-primary">
            <div class="section-title">SPOR</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route('home_article.index', ['type'=>'Spor'])}}">Tüm
                    Spor Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-red"><a
                href="{{route('home_article.index', ['type'=>'Spor'])}}">Tüm Spor Dakika Haberlerini Gör</a></div>
    </div>
    <div class="container">
        <div class="row" style="position: relative">
            <div class="col-lg-12 col-md-24 mt-1">
                <div class="card news-card news-card-big  cardSlider" currentSlide="0" style="height: 400px;">
                    <div class=""></div>
                    <div class="news-card-slider-container">
                        @foreach($articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="news-card-slider-slide">
                                    <div class="sport-card-slider-slide-img text-white"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="blueOverlay90"></div>

                                        <div class="sport-card-slider-slide-caption">
                                            <p>{{$article->title}}</p>
                                            <div class=" sport-text-bottom-sm">

                                                    <span
                                                        class="text-white">{{ Date::parse($article->created_at)->format('j F')}}</span><span
                                                    class="text-white">  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="sport-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-1" id="sport-first-row-anchor">
                @php
                    $persistent = count($articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                    if($persistent) {
                        $sporArticles = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                        $sporArticlesSecond = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $sporArticlesBelow = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(5);
                    } else {
                        $sporArticles = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $sporArticlesSecond = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                        $sporArticlesBelow = $articles["Spor"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(5);
                    }
                @endphp

                @foreach($sporArticles as $article)
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 sport sport-md"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="sport-title">
                            <p>{{ $article->title }}</p>
                            <div class="card-bottom-date">
                                     <span
                                         class="text-light-blue">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span></span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @foreach($sporArticlesSecond as $article)
                <div class="col-lg-6 col-md-12 mt-1">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 sport sport-md"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="sport-title">
                            <p>{{ $article->title}}</p>
                            <div class="card-bottom-date">
                            <span
                                class="text-light-blue">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        {{--      <div class="row mt-3">
                  <div class="col-lg-6 mt-3">
                      <div class="card sport-paper-card">
                          <div class="card-body">Fb</div>
                      </div>
                  </div>
                  <div class="col-lg-6 mt-3">
                      <div class="card sport-paper-card">
                          <div class="card-body">Fb</div>
                      </div>
                  </div>
                  <div class="col-lg-6 mt-3">
                      <div class="card sport-paper-card">
                          <div class="card-body">Fb</div>
                      </div>
                  </div>
                  <div class="col-lg-6 mt-3">
                      <div class="card sport-paper-card">
                          <div class="card-body">Fb</div>
                      </div>
                  </div>
              </div>--}}

        <div class="row mt-3">
            @foreach($sporArticlesBelow as $article)
                <div class="col-sm-12 col-md-8 col-lg-percent-20">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card news-card news-card-small mt-4 ">
                            <div class="news-card-img-container bg-white">
                                <div style="background: url({{asset($article->image_path)}})" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>{{ $article->title }}</p>

                                </div>
                            </div>
                            <div class="news-card-bottom" style="padding-left: 10%;">
                            <span
                                class="text-light-blue">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
