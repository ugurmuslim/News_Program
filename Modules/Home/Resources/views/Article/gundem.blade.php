@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    <section id="section-gundem" class="bg-light-grey">
        <div class="container">
            <div class="section-header d-flex text-danger border-danger">
                <div class="section-title">GÜNDEM</div>
                <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger">Tüm Gündem Haberlerini Gör</div>

            <div class="row">
                <div class="col-xl-18">
                    <div class="row">
                        <!-- First Big News of the section -->
                        <div class="col-lg-12 mt-2">
                            @foreach($articles["Gündem"]->take(1) as $article)
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="card news-card news-card-big ">
                                        <div class="news-card-img-container bg-light-grey">
                                            <div style="background: url({{asset($article->image_path)}})"
                                                 alt="{{$article->seoUrl}}" class="news-img"></div>
                                            <div class="news-card-img-text">{{$article->title}}
                                            </div>

                                        </div>
                                        <div class="news-card-body">
                                            {{$article->summary}}
                                        </div>
                                        <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!-- First Big News of the section -->

                        <!-- First Big News Slider of the section -->
                        <div class="col-lg-12 mt-2">
                            <div class="card news-card news-card-big cardSlider" currentSlide="0">
                                <div class="redFilterOverlay"></div>
                                <div class="news-card-slider-container">
                                    @foreach($articles["Gündem"]->slice(1)->take(4) as $article)
                                        <div class="news-card-slider-slide">
                                            <div class="news-card-slider-slide-img "
                                                 style="background-image: url({{asset($article->image_path)}})">
                                                <div
                                                    class="news-card-slider-slide-caption text-white">{{$article->title}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{--       <div class="news-card-slider-slide">
                                               <div class="news-card-slider-slide-caption text-white">Mişa'nın damadından çağrı:
                                                   Yarışı
                                                   bırak artık
                                               </div>
                                               <div class="news-card-slider-slide-img "
                                                    style="background-image: url({{asset("modules/home/sample/img/news/s1n2.jpg")}})">

                                               </div>
                                           </div>
                                           <div class="news-card-slider-slide">
                                               <div class="news-card-slider-slide-caption text-white">Paşa'nın damadından çağrı:
                                                   Yarışı
                                                   bırak artık
                                               </div>
                                               <div class="news-card-slider-slide-img "
                                                    style="background-image: url({{asset("modules/home/sample/img/news/s1n2.jpg")}})">
                                               </div>
                                           </div>--}}
                                </div>
                                <div class="news-card-slider-controls">
                                    <div class="news-card-slider-control" direction="previous">❮</div>
                                    <div class="news-card-slider-control" direction="next">❯</div>
                                </div>
                            </div>
                        </div>
                        <!-- First Big News Slider of the section -->

                    @foreach($articles["Gündem"]->slice(2)->take(4) as $article)

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

                <div class="d-none d-xl-block col-xl-6">
                    <div class="col-24 mt-2 h-100">
                        <div class="card bg-dark-grey h-100" style="border-radius: 5px;">
                            <ul class="list-group list-group-flush">
                                @foreach($currencies['Fiat'] as $fiat)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-12">
                                                {{$fiat->currency}}
                                            </div>
                                            <div class="col-6">
                                            <span
                                                style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->buying, 4, $end='') }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->change, 5, $end='') }}%</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                @foreach($currencies['Crypto'] as $crypto)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-12">
                                                {{$crypto->currency}}
                                            </div>
                                            <div class="col-6">
                                            <span
                                                style="{{$crypto->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($crypto->buying, 4, $end='') }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span style="{{$crypto->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($crypto->change, 5, $end='') }}%</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($articles["Gündem"]->slice(6)->take(20) as $article)

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
