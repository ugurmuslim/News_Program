@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    <section id="section-yasam">
        <div class="container">
            <div class="section-header d-flex text-orange">
                <div class="section-title">YAŞAM</div>
                <div class="d-none d-md-block section-right">Tüm Yaşam Haberlerini Gör</div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-14 mt-3">
                    <div class="card news-card news-card-big keep-ratio cardSlider" currentSlide="0" ratio="0.5"
                         id="life-slider">
                        <div class="a"></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Yaşam"]->take(3) as $article)
                                <div class="news-card-slider-slide">
                                    <div class="life-card-slider-slide-img text-white"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="blueOverlay">

                                        </div>

                                        <div class="life-card-slider-slide-caption">{{$article->title}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="news-card-slider-controls">
                            <div class="news-card-slider-control" direction="previous">❮</div>
                            <div class="news-card-slider-control" direction="next">❯</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 match mt-3" matchTo="life-slider">
                    @foreach($articles["Yaşam"]->take(1) as $article)
                        <div class="col-md-24 mt-4 match " matchTo="life-slider">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-white  h-100 tech-box">
                                    <div class="tech-news-box-image "
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="life-news-box-caption">
                                        {{$article->title}}
                                        <div class="life-text-bottom-sm ">
                                            <span class="">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-5 match mt-3" matchTo="life-slider">
                    @foreach($articles["Yaşam"]->slice(1)->take(1) as $article)
                        <div class="col-md-24 mt-4 match " matchTo="life-slider">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-white  h-100 tech-box">
                                    <div class="tech-news-box-image "
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="life-news-box-caption">
                                        {{$article->title}}
                                        <div class="life-text-bottom-sm ">
                                            <span class="">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--        <div class="row mt-3">
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
                    </div>--}}
            <div class="row mb-4 mt-2">
                @foreach($articles["Yaşam"]->slice(2)->take(4) as $article)
                    <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 life life-md"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="life-title">{{$article->title}}
                                <div class="life-text-bottom-sm">
                            <span
                                class="text-orange">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>



        </div>
    </section>
    @include('home::partials._javascript')

@endsection
