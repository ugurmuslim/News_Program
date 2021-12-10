@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    <section id="section-otomobil" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-white">
                <div class="section-title">OTOMOBİL</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Otomobil'])}}">Tüm
                        Otomobil Haberlerini Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                    href="{{route("home_article.index",['type' => 'Otomobil'])}}">Tüm Otomobil Haberlerini Gör</a></div>
        </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-15 h-100">
                    <div class="card news-card news-card-big keep-ratio mb-sm-5 cardSlider" currentSlide="" ratio="0.55"
                         id="auto-slider"
                         style="min-height: 440px">
                        <div></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Otomobil"]->take(4) as $article)
                                <div class="news-card-slider-slide">
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="life-card-slider-slide-img text-white"
                                             style="background-image: url({{asset($article->image_path)}})">
                                            <div class="blueOverlay">

                                            </div>

                                            <div class="life-card-slider-slide-caption">{{$article->title}}
                                            </div>
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
                @foreach($articles["Otomobil"]->take(1) as $article)
                    <div class="col-md-9 ">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 bg-dark">
                                <div class="col-sm-24 h-100">
                                    <div class="col-24 automobile automobile-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="automobile-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="automobile-text-bottom">
                                    <span
                                        class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                @foreach($articles["Otomobil"]->slice(1)->take(3) as $article)
                    <div class="col-md-8">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24  bg-dark">
                                <div class="col-sm-24 ">
                                    <div class="col-24 automobile automobile-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="automobile-title">{{$article->title}}
                                        <div class="automobile-text-bottom-sm">
                                    <span
                                        class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                @foreach($articles["Otomobil"]->slice(4)->take(1) as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <div class="row">

                            <div class="col-14 bg-secondary ">
                                <div class="automobile-title">{{$article->title}}
                                </div>
                                <div class="automobile-text-bottom-sm">
                                    <span class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                            <div class="col-10"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                        </div>
                    </div>
                @endforeach
                @foreach($articles["Otomobil"]->slice(5)->take(1) as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <div class="row">
                            <div class="col-10"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="col-14 bg-secondary ">
                                <div class="automobile-title">{{$article->title}}
                                </div>
                                <div class="automobile-text-bottom-sm">
                                    <span class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
            @foreach($articles["Otomobil"]->slice(6)->take(20) as $article)

                <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card news-card news-card-small ">
                                <div class="news-card-img-container bg-light-grey">
                                    <div style="background: url({{asset($article->image_path)}})" alt=""
                                         class="news-img"></div>
                                    <div class="news-card-img-text">{{$article->title}}</div>
                                </div>
                                <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- First Small News of the section -->
                @endforeach


            </div>
        </div>
    </section>
    @include('home::partials._javascript')

@endsection
