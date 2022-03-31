<section id="section-netkolik">
    <div class="container">
        <div class="section-header d-flex text-dark-orange">
            <div class="section-title">NETKOLİK</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/netkolik">Tüm
                    Netkolik Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark-orange"><a
                href="https://parafesor.net/kategori/netkolik">Tüm Netkolik Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container">
        <div class="row net-row-1">
            <div class="col-md-14 net-col-1">
                <div class="card news-card news-card-big keep-ratio cardSlider" currentSlide="0" ratio="0.525"
                     id="internet-slider">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach(array_slice($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,4) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="news-card-slider-slide">
                                    <div class="life-card-slider-slide-img lazy"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="internet-card-slider-slide-caption big-title">
                                            <p>{{$article->title}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="internet-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $netkolikArticles = array_slice($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,1);
                               $netkolikArticlesBelowFirst = array_slice($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],1,1);
                $netkolikArticlesBelowSecond = array_slice($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],2,3);
                $netkolikArticlesFooter = array_slice($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],5,3);
            @endphp
            <div class="col-md-10 net-col-2">
                @foreach($netkolikArticles as $article)
                    @php
                        $article = (object) $article;
                    @endphp <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-lg-24 col-md-24">
                            <div class="card news-card news-card-big match" id="internet-second-row"
                                 matchTo="internet-slider">
                                <div class="news-card-slider-container">
                                    <div class="news-card-slider-slide">
                                        <div class="internet-card-slider-slide-img lazy"
                                             style="background-image: url({{asset($article->image_path)}})">
                                            <div class="internet-card-caption">
                                                <p>{{$article->title}}</p>
                                                <div class="internet-text-bottom-sm">
                                                    <span
                                                        class="">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
        <div class="row net-row-2">
            <div class="col-md-5">
                @foreach($netkolikArticlesBelowFirst as $article)
                    @php
                        $article = (object) $article;
                    @endphp
                    <div class="col-md-24 bg-dark-orange match" matchTo="internet-second-row">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-md-24 bg-dark-orange h-100 internet-box">
                                <div class="internet-news-box-image lazy"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="internet-news-box-caption">
                                    <p>{{$article->title}}</p>
                                    <div class="internet-text-bottom-sm">
                                        <span>{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
                        @php
                            $article = (object) $article;
                        @endphp
                        <div class="col-md-8">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="col-24">
                                    <div class="col-sm-24">
                                        <div class="col-24 internet internet-md"
                                             style="background-image:  url({{asset($article->image_path)}})"></div>
                                        <div class="internet-title">
                                            <p>{{$article->title}}</p>
                                            <div class="card-bottom-date">
                                                <span
                                                    class="text-dark-orange">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
        <div class="row net-row-3">
            @foreach($netkolikArticlesFooter as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-md-8">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24">
                            <div class="col-sm-24">
                                <div class="col-24 internet internet-md lazy"
                                     style="background-image:  url({{asset($article->image_path)}})"></div>
                                <div class="internet-title">
                                    <p>{{$article->title}}</p>
                                    <div class="card-bottom-date">
                                        <span
                                            class="text-dark-orange">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
