@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
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
                    @foreach($articles["Teknoloji"]->take(3) as $article)
                        <div class="card news-card news-card-small">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="news-card-img-container bg-light-grey">
                                    <div style="background: url({{asset($article->image_path)}})" alt=""
                                         class="news-img"></div>
                                    <div class="news-card-img-text">{{$article->title}}</div>
                                </div>
                                <div class="news-card-bottom">
                            <span
                                class="text-purple">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-19">
                    <div class="row">
                        <div class="col-lg-18 col-md-24 mt-1 match" matchTo="tech-second-row-anchor">
                            <div class="card news-card news-card-big cardSlider" currentSlide="0">
                                <div class="redFilterOverlay"></div>
                                <div class="news-card-slider-container">
                                    @foreach($articles["Teknoloji"]->take(3) as $article)
                                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                            <div class="news-card-slider-slide">
                                                <div class="tech-card-slider-slide-img text-white"
                                                     style="background-image: url({{asset($article->image_path)}})">
                                                    <div class="tech-card-slider-slide-caption">{{$article->title}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="news-card-slider-controls">
                                    <div class="news-card-slider-control" direction="previous">❮</div>
                                    <div class="news-card-slider-control" direction="next">❯</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                            @foreach($articles["Teknoloji"]->slice(3)->take(1) as $article)
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="col-md-24 bg-purple h-100 tech-box">
                                        <div class="tech-news-box-image"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                        <div class="tech-news-box-caption">
                                            {{$article->title}}
                                            <div class="tech-text-bottom-sm text-white">
                                                <span class="">23 Ocak</span><span> • 14:35 • by parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        @foreach($articles["Teknoloji"]->slice(4)->take(3) as $article)
                            <div class="col-sm-24 col-md-12 col-lg-8 mt-3" id="tech-second-row-anchor">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="col-24 tech tech-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="tech-title">{{$article->title}}
                                        <div class="tech-text-bottom-sm">
                                    <span
                                        class="text-purple">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
    @include('home::partials._javascript')

@endsection
