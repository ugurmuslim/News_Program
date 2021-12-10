@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    <section id="section-netkolik">
        <div class="container">
            <div class="section-header d-flex text-dark-orange">
                <div class="section-title">NETKOLİK</div>
                <div class="d-none d-md-block section-right"></div>
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
                        <div class="redFilterOverlay"></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Netkolik"]->take(3) as $article)

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
                        {{--<div class="news-card-slider-controls">
                            <div class="news-card-slider-control">❮
                            </div>
                            <div class="news-card-slider-control">❯
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="col-md-10">
                    @foreach($articles["Netkolik"]->take(1) as $article)
                        <div class="col-md-24 bg-dark-orange match" matchTo="internet-slider">
                            <div class="sport-card-slider-slide-img text-white"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class=""></div>

                                <div class="internet-card-slider-slide-caption">{{$article->title}}
                                    <div class="internet-text-bottom-sm">

                                        <span class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    @foreach($articles["Netkolik"]->slice(1)->take(1) as $article)
                        <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-dark-orange h-100 tech-box">
                                    <div class="tech-news-box-image"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="tech-news-box-caption">
                                        {{$article->title}}
                                        <div class="tech-text-bottom-sm text-white">
                                            <span class="">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-19">
                    <div class="row">
                        @foreach($articles["Netkolik"]->slice(2)->take(3) as $article)
                            <div class="col-md-8 mt-4">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="col-24">
                                        <div class="col-sm-24" id="internet-second-row">
                                            <div class="col-24 internet internet-md"
                                                 style="background-image: url({{asset($article->image_path)}})"></div>
                                            <div class="internet-title">
                                                <div class="multilineEllipsis"
                                                     multilineEllipsisMax="100">{{$article->title}}
                                                </div>
                                                <div class="card-bottom-date">
                                        <span
                                            class="text-dark-orange">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
                @foreach($articles["Netkolik"]->slice(5)->take(3) as $article)
                    <div class="col-md-8 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">

                            <div class="col-24">
                                <div class="col-sm-24 ">
                                    <div class="col-24 internet internet-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="internet-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="card-bottom-date">
                                    <span
                                        class="text-dark-orange">{{Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
            @foreach($articles["Netkolik"]->slice(6)->take(20) as $article)

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
