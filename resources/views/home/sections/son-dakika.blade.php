<section id="section-son-dakika">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">SON DAKİKA</div>
            <div class="d-none d-md-block section-right">
                <a href="https://parafesor.net/kategori/son-dakika">Tüm Son Dakika Haberlerini Gör</a>
            </div>
            <div class="d-sm-block d-md-none section-right-sm">
                <a href="https://parafesor.net/kategori/son-dakika">Tüm Son Dakika Haberlerini Gör</a>
            </div>
        </div>
        <div class="container last-container-2">
            <div class="row last-row-1" style="position: relative">
                @foreach(array_slice($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,1) as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="col-lg-7 col-md-12 last-middle">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-md"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="last-min-sm-top">
                            <span class="clock-brand">
                                <i class="far fa-clock"></i> {{Carbon\Carbon::parse($article->article_date)->format('H:i')}}
                            </span>
                                </div>
                            </div>
                            <div class="last-min-title">
                                {{$article->title}}
                                <div class="last-min-text-bottom">
                                    <span>{{ Date::parse($article->article_date)->format('j F') }}</span>
                                    • {{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
                @foreach(array_slice($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],1,1) as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="d-lg-block col-lg-10 last-big">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-lg"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="last-min-sm-top"><span class="clock-brand" style="z-index: 999"><i
                                            class="far fa-clock"></i> {{Carbon\Carbon::parse($article->article_date)->format('H:i')}}</span>
                                </div>
                                <div class="last-min-caption"><p>{{$article->title}}</p>
                                    <div class="last-min-bottom-sm">
                                        <span class="text-white">{{ Date::parse($article->article_date)->format('j F') }} • {{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach(array_slice($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],2,1) as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="col-lg-7 col-md-12 last-middle">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-md"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="last-min-sm-top">
                            <span class="clock-brand">
                                <i class="far fa-clock"></i> {{Carbon\Carbon::parse($article->article_date)->format('H:i')}}
                            </span>
                                </div>
                            </div>
                            <div class="last-min-title">{{$article->title}}
                                <div class="last-min-text-bottom">
                                    <span>{{ Date::parse($article->article_date)->format('j F') }}</span>
                                    • {{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>
            <div class="last-min-slider" id="last-min-slider">
                @foreach(array_slice($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,5) as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="last-min-sm d-inline-block">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="last-min-sm-top">
                                <span><i class="far fa-clock"></i> {{Carbon\Carbon::parse($article->article_date)->format('H:i')}}</span>
                                <div class="last-min-top-line"></div>
                            </div>
                            <div class="col-24 last-min-sm-img"
                                 style="background-image: url({{asset($article->image_path)}})">
                            </div>
                            <div class="last-min-sm-title small-text">
                                <p>{{$article->title}}</p>
                                <div class="last-min-text-bottom small-last-min-bottom">
                                    <span>{{ Date::parse($article->article_date)->format('j F') }}</span>
                                    • {{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="last-slide-control">
                <span id="lastSlideBack"><i class="fas fa-angle-left"></i></span>
                <span id="lastSlideNext"><i class="fas fa-angle-right"></i></span>
            </div>
        </div>
</section>
