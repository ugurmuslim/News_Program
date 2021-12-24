<section id="section-son-dakika">
    <div class="container">
        <div class="section-header d-flex text-red">
            <div class="section-title">SON DAKİKA</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route('home_article.index',['type' => 'Son Dakika'])}}">Tüm Son Dakika Haberlerini Gör
                </a></div>

        </div>
    </div>
    <div class=" d-sm-block d-md-none section-right-sm text-red"><a
            href="{{route('home_article.index',['type' => 'Son Dakika'])}}">Tüm Son Dakika Haberlerini Gör</a></div>

    </div>
    <div class="container mt-4">
        <div class="row" style="position: relative">
            {{--@if(isset($articles["Son Dakika"]) && $articles["Son Dakika"]->take(1))
                <div class="d-sm-block d-lg-none col-md-24  mt-1">
                    <div class="col-24 last-min last-min-lg"
                         style="background-image: url({{asset($articles["Son Dakika"][0]->image_path)}})">
                        <div class="redOverlay0">
                            <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                        class="far fa-clock"></i> 16:39</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif--}}

            @foreach($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1) as $article)
                <div class="col-lg-7 col-md-12 mt-1">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 last-min last-min-md"
                             style="background-image: url({{asset($article->image_path)}})">
                            <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                        class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                            </div>
                        </div>
                        <div class="last-min-title">{{$article->title}}
                            <div class="d-sm-block d-md-none last-min-text-bottom-sm">
                            <span
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </div>
                        <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                        </div>
                    </a>
                </div>
            @endforeach

            @foreach($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1) as $article)
                <div class="d-none d-lg-block col-lg-10  mt-1">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 last-min last-min-lg"
                             style="background-image: url({{asset($article->image_path)}})">
                            <div class="redOverlay0">

                                <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                            class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                                </div>
                                <div class="last-min-caption"><p>{{$article->title}}</p>
                                    <div class="last-min-bottom-sm">

                                        <span class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            @foreach($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1) as $article)
                <div class="col-lg-7 col-md-12 mt-1">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 last-min last-min-md"
                             style="background-image: url({{asset($article->image_path)}})">
                            <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                        class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                            </div>
                        </div>
                        <div class="last-min-title"><p>{{$article->title}}</p>
                            <div class="d-sm-block d-md-none last-min-text-bottom-sm">
                            <span
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </div>
                        <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <hr class="mt-4">
        <div class="last-min-slider" data-simplebar>
            @foreach($articles["Son Dakika"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(5) as $article)
                <div class="last-min-sm d-inline-block" style="position:relative">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="last-min-sm-top"><span class="px-2 bg-white" style="z-index: 999"><i
                                    class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                            <div class="last-min-top-line"></div>
                        </div>
                        <div class="col-24 last-min-sm-img"
                             style="background-image: url({{asset($article->image_path)}})">
                        </div>
                        <div class="last-min-sm-title small-text"><p>{{$article->title}}</p>
                        </div>
                        <div class="last-min-text-bottom small-last-min-bottom">
                            <span
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span>  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
