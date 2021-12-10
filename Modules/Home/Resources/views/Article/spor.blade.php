@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
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
                        <div class="col-lg-10 col-md-24 mt-1">
                            <div class="card news-card news-card-big match cardSlider" currentSlide="0"
                                 matchTo="sport-first-row-anchor">
                                <div class="redFilterOverlay"></div>
                                <div class="news-card-slider-container">
                                    @foreach($articles["Spor"]->take(3) as $article)
                                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                            <div class="news-card-slider-slide">
                                                <div class="sport-card-slider-slide-img text-white"
                                                     style="background-image: url({{asset($article->image_path)}})">
                                                    <div class="blueOverlay90"></div>

                                                    <div class="sport-card-slider-slide-caption">{{$article->title}}
                                                        <div class=" sport-text-bottom-sm">

                                                            <span class="text-white">23 Ocak • 14:35 • by parafesor</span>
                                                        </div>
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
                        <div class="col-lg-7 col-md-12 mt-1" id="sport-first-row-anchor">
                            @foreach($articles["Spor"]->slice(3)->take(1) as $article)
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="col-24 sport sport-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="sport-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="card-bottom-date">
                                            <span>{{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        @foreach($articles["Spor"]->slice(4)->take(1) as $article)
                            <div class="col-lg-7 col-md-12 mt-1">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="col-24 sport sport-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="sport-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="card-bottom-date">
                                            <span>{{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
                        @foreach($articles['Spor']->slice(5)->take(5) as $article)
                            <div class="col-sm-12 col-md-8 col-lg-percent-20">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="card news-card news-card-small mt-4 ">
                                        <div class="news-card-img-container bg-white">
                                            <div style="background: url({{asset($article->image_path)}})" alt=""
                                                 class="news-img"></div>
                                            <div class="news-card-img-text">{{$article->title}}</div>
                                        </div>
                                        <div class="news-card-bottom">
                            <span
                                class="text-light-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                    @foreach($articles["Spor"]->slice(6)->take(20) as $article)

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
