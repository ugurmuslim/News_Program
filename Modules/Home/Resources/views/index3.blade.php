@extends('home::layouts.master')
@section('content')
    @include('home::partials._header')
    <div id="mainSliderContainer" class="keep-ratio" ratio="0.4167">
        <div id="mainSliderSlides">
            <div class="mainSliderSlideContainer" id="mainSliderLeft"></div>
            <div class="mainSliderSlideContainer" id="mainSliderRight"></div>
            <div class="mainSliderLeftArrow" direction="previous"><i class="fas fa-arrow-left"
                                                                     style="font-size: 2em;"></i></div>
            <div class="mainSliderRightArrow" direction="next"><i class="fas fa-arrow-right"
                                                                  style="font-size: 2em;"></i></div>
        </div>
        <div id="mainSliderCover">

        </div>
    </div>
@include('home::sections.gundem')
   {{-- <section id="section-gundem" class="bg-light-grey">
        <div class="container">
            <div class="section-header d-flex text-danger border-danger">
                <div class="section-title">GÜNDEM</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Gündem'])}}">Tüm
                        Gündem Haberlerini Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                    href="{{route("home_article.index",['type' => 'Gündem'])}}">Tüm Gündem Haberlerini Gör</a></div>

            <div class="row">
                <div class="col-xl-18">
                    <div class="row">
                        <!-- First Big News of the section -->
                        <div class="col-lg-12 mt-2">
                            @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::SECOND_SLIDER]->take(1) as $article)
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="card news-card news-card-big ">
                                        <div class="news-card-img-container bg-light-grey">
                                            <div
                                                style="background: url({{asset($article->image_path)}}); height: 330px;"
                                                alt="{{$article->seoUrl}}" class="news-img"></div>
                                            <div class="news-card-img-text big-title">{{$article->title}}
                                            </div>

                                        </div>
                                        <div class="news-card-body">
                                            <p>{{$article->summary}}</p>
                                        </div>
                                        <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->formatLocalized('%d de %B %Y')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>

                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!-- First Big News of the section -->

                        <!-- First Big News Slider of the section -->
                        <div class="col-lg-12 mt-2">
                            <div class="card news-card news-card-big cardSlider" currentSlide="0">
                                <div class=""></div>
                                <div class="news-card-slider-container">
                                    @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                            <div class="news-card-slider-slide">
                                                <div class="news-card-slider-slide-img"
                                                     style="background-image: url({{asset($article->image_path)}});
                                                         background-color: #ea212d;
                                                         background-blend-mode: multiply;">
                                                    <div
                                                        class="news-card-slider-slide-caption text-white">
                                                        <p>{{ $article->title }}</p>
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
                        <!-- First Big News Slider of the section -->
                    @php
                        $gundemPersistent = count($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                        if($gundemPersistent) {
                        $gundemNormalCount = 3;

                        } else {
                        $gundemNormalCount = 4;
                        }
                    @endphp
                    @if($gundemPersistent)
                        @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1) as $article)
                            <!-- First Small News of the section -->
                                <div class="col-lg-6 col-sm-12 mt-5">
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="card news-card news-card-small ">
                                            <div class="news-card-img-container bg-light-grey">
                                                <div style="background: url({{asset($article->image_path)}})"
                                                     class="news-img"></div>
                                                <div class="news-card-img-text small-text truncate-overflow">
                                                    <p>{{ $article->title }}</p>
                                                </div>
                                            </div>
                                            <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        @endforeach
                    @endif
                    @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take($gundemNormalCount) as $article)

                        <!-- First Small News of the section -->
                            <div class="col-lg-6 col-sm-12 mt-5">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="card news-card news-card-small ">
                                        <div class="news-card-img-container bg-light-grey">
                                            <div style="background: url({{asset($article->image_path)}})" alt=""
                                                 class="news-img"></div>
                                            <div class="news-card-img-text small-text">
                                                <p>{{ $article->title }}</p></div>
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
                                <div style="background-color: #444444; padding: 5px; display: block">
                                    <span style="margin-left:2%;color: white; font-size: 13px;">Kurlar</span>
                                </div>
                                @foreach($currencies['Fiat'] as $fiat)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-12">
                                                {{$fiat->currency}}
                                            </div>

                                            <div class="col-6">
                                                --}}{{--                                                <span style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->change, 5, $end='') }}%</span>--}}{{--
                                            </div>
                                            <div class="col-6">
                                            <span
                                                style="">{{ \Illuminate\Support\Str::limit($fiat->buying, 6, $end='') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <div style="background-color: #444444; padding: 5px; display: block">
                                    <span style="margin-left:2%;color: white; font-size: 13px;">Kripto Paralar</span>
                                </div>
                                @foreach($currencies['Crypto'] as $crypto)
                                    <li class="list-group-item" style="font-family: HelveticaNeueMedium">
                                        <div class="row">
                                            <div class="col-12">
                                                {{$crypto->currency}}
                                            </div>

                                            <div class="col-6">
                                                <span
                                                    style="{{$crypto->change > 0 ? "color:#00eb00" : "color:#ff0000"}}">{{ number_format($crypto->change,2) }}%</span>
                                            </div>
                                            <div class="col-6">
                                            <span
                                                style="{{$crypto->change > 0 ? "color:#00eb00" : "color:#ff0000"}}">{{number_format($crypto->buying, 2) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>--}}


    <section id="section-borsa-tube" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-light border-light">
                <div class="section-title">BORSA TUBE</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Borsa Tube'])}}">Tüm Borsa Youtube Videolarını
                        Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm"><a
                    href="{{route('home_article.index',['type' => 'Borsa Tube'])}}">Tüm Borsa Youtube Videolarını
                    Gör</a></div>

            <div class="row text-white">

                <div class="col-lg-14">
                    <div class="ratio ratio-16x9 mt-2" id="borsaEmbed">
                        @foreach($articles["Borsa Tube"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(1) as $article)
                            <div class="image-card image-card-bw-16x10"
                                 style="background-image: url({{asset($article->image_path)}})"></div>

                            {{--<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>--}}
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-10  mt-2">
                    <div class="text-danger" style=" height:100%; overflow: hidden">
                        <div matchTo="borsaEmbed" class="match"
                             style="width: 100%;  overflow: hidden; overflow-y:auto">
                            {{--style="width: 100%; height: 0%; overflow: hidden; overflow-y:auto">--}}
                            <div class="row px-3">
                                @foreach($articles["Borsa Tube"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(8) as $article)
                                    <div class="image-card-container">
                                        <a href="{{$article->original_link}}">
                                            <div class="image-card image-card-bw-16x10"
                                                 style="background-image: url({{asset($article->image_path)}})"></div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                @foreach($articles["Borsa Tube"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(8)->take(3) as $article)
                    <div class="col-md-8 mt-3">
                        <a href="{{$article->original_link}}">
                            <div class="image-card image-card-16x8 image-cover image-card-bordered"
                                 style="background-image: url({{asset($article->image_path)}})">test
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5 text-white">
                <div class="col-md-24">
                    <div
                        style="width:100%; height: 1px; background-color: #CCCCCC; text-align:center; line-height: 0px; ">
                        <span style="color:#f5f5f5;" class="bg-dark-grey px-2">En Çok Okunanlar</span>
                    </div>
                </div>
                <div class="col-24 mt-5 mb-2 pt-3" id="most-red">
                    <div style="float:left; width:30px;">❮</div>
                    <div
                        style="float:left; overflow-y: hidden; overflow-x: auto; text-align:center; width: calc(100% - 60px);margin-top:-25px; padding-bottom:10px; white-space: nowrap">
                        @foreach($articles["Borsa Tube"]['Channel']->take(9) as $article)
                            <a href="{{$article->original_link}}" target="_blank">
                                <div class="channel-logo"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                            </a>
                        @endforeach
                    </div>
                    <div class="text-end" style="float:right; width:30px;">❯</div>
                </div>
            </div>
        </div>
    </section>


    <section id="section-twitter-yazileri" class="bg-light-grey">
        <div class="container">
            <div class="section-header d-flex text-twitter">
                <div class="section-title">TWITTER YAZILARI</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Twitter'])}}">Tüm Twitter Yazılarını Gör</a>
                </div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                    href="{{route('home_article.index',['type' => 'Twitter'])}}">Tüm Twitter Yazılarını Gör</a>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-info">Tüm Twitter Yazılarını Gör</div>


            <div class="row" data-masonry='{"percentPosition": true }'>

                @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(2) as $article)
                    <div class="col-12 col-lg-6 mb-3">
                        <a href="https://twitter.com/user/status/{{$article->external_site_id}}">
                            <div class="card tweet-card tweet-card-small bg-white">
                                <div class="tweet-top">
                                    <div class="tweet-user">
                                        <div class="float-start">
                                            <img class="image-twitter" src="{{$article->externalSourceUser->image}}">
                                        </div>
                                        <div class="float-start ms-2 mt-1">{{$article->externalSourceUser->name}}</div>
                                    </div>
                                    {{--  <div class="tweet-follower text-muted">
                                          <span style="margin-right: 5px;">17B Takipçi</span>
                                          <i class="fab fa-twitter text-twitter icon-twitter"></i>
                                      </div>--}}
                                </div>
                                <div class="tweet-body">
                                    {{ \Illuminate\Support\Str::limit($article->body, 100, $end='...') }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1) as $article)
                    <div class="col-24 col-md-12 mb-3">
                        <a href="https://twitter.com/user/status/{{$article->external_site_id}}">

                            <div class="card tweet-card bg-twitter text-white">
                                <div class="tweet-top">
                                    <div class="tweet-user tweet-user-large">
                                        <div class="float-start">
                                            <img class="image-twitter image-twitter-large"
                                                 src="{{ $article->externalSourceUser->image }}">
                                        </div>
                                        <div class="float-start ms-2 mt-0">
                                            <div>{{ $article->externalSourceUser->name }}</div>
                                            {{--                              <div style="font-size:0.8em; font-weight: normal"> 53B Takipçi</div>--}}
                                        </div>
                                    </div>
                                    <div class="tweet-follower text-white">
                                        <i class="fab fa-twitter icon-twitter text-white float-end"></i>

                                    </div>
                                    <div class="tweet-slider-controls">
                                        <div class="tweet-slider-control">❮</div>
                                        <div class="tweet-slider-control">❯</div>
                                    </div>
                                </div>
                                <div class="tweet-body text-white">
                                    {{ \Illuminate\Support\Str::limit($article->body, 150, $end='...') }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(10) as $article)
                    <div class="col-12 col-lg-6 mb-3">
                        <a href="https://twitter.com/user/status/{{$article->external_site_id}}">
                            <div class="card tweet-card tweet-card-small bg-white">
                                <div class="tweet-top">
                                    <div class="tweet-user">
                                        <div class="float-start">
                                            <img class="image-twitter" src="{{$article->externalSourceUser->image}}">
                                        </div>
                                        <div class="float-start ms-2 mt-1">{{$article->externalSourceUser->name}}</div>
                                    </div>
                                    {{--<div class="tweet-follower text-muted">
                                        <span style="margin-right: 5px;">17B Takipçi</span>
                                        <i class="fab fa-twitter text-twitter icon-twitter"></i>
                                    </div>--}}
                                </div>
                                <div class="tweet-body">
                                    {{ \Illuminate\Support\Str::limit($article->body, 100, $end='...') }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div
                style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px; text-align:center;">
                <a href="{{route('home_article.index',['type' => 'Twitter'])}}">
                    Daha Fazla Twitter Yazısı Gör
                </a>
            </div>
        </div>
    </section>

    <section id="section-sirket-haberleri">
        <div class="container">
            <div class="section-header d-flex text-dark-blue">
                <div class="section-title">ŞİRKET HABERLERİ</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Şirket Haberleri'])}}">Tüm Şirket Haberlerini
                        Gör</a>
                </div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                    href="{{route('home_article.index',['type' => 'Şirket Haberleri'])}}">Tüm Şirket Haberlerini Gör</a>
            </div>

            <div class="row mt-3">
                @foreach($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1) as $article)
                    <div class="col-xl-13 mb-5">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card news-card news-card-big" id="corporate-new-showcase">
                                <div class="news-card-img-container bg-white">
                                    <div style="background-image: url({{asset($article->image_path)}})" alt=""
                                         class="news-img"></div>
                                    <div class="news-card-img-text text-dark-blue big-title"
                                         style="max-width: 60%">{{$article->title}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{--<div class="col-xl-13 mb-5">
                    <div class="card news-card news-card-big ">
                        <div class="news-card-img-container bg-white">
                            <div style="background-image: url({{asset("modules/home/sample/img/news/s1n1.webp")}})" alt=""
                                 class="news-img"></div>
                            <div class="news-card-img-text text-dark-blue">Polat Enerji'nin Tamamının Satışı İçin
                                Ortaklar Barclays'i Yetkilendirdi
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="col-xl-11">
                    <div class="row">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(3) as $article)
                            <div class="col-sm-24">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="corporate-news-numbers text-dark-blue">{{$i}}</div>
                                    <div class="corporate-news-img">
                                        <div class="image-card-16x10 border bg-white"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                    </div>
                                    <div class="corporate-news-text">
                                        <p class="text-dark-blue">
                                            {{ $article->title }}
                                        </p>
                                        <div class="corporate-news-text-bottom">
                               <span
                                   class="">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
            <div class="row">
                @foreach($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(8) as $article)
                    <div class="col-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card">
                                <div class="corporate-triangle"></div>
                                <div class="company-image"
                                     style="background-image: url({{asset($article->image_path)}}); background-position: left; margin-left: 5%; "></div>
                                <div class="company-text" style="padding-left: 5%;">
                                    <p>{{$article->summary}}</p>
                                </div>
                                <div class="company-bottom">
                          <span
                              class="text-dark-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="section-kose-yazilari" class="bg-light-grey">
        <div class="container">
            <div class="section-header d-flex text-dark">
                <div class="section-title">KÖŞE YAZILARI</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index', ['type'=> 'Köşe Yazıları'])}}">Tüm Köşe Yazılarını Gör</a>
                </div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark"><a
                    href="{{route('home_article.index', ['type'=> 'Köşe Yazıları'])}}">Tüm Köşe Yazılarını Gör</a></div>

        </div>
        <div class="container">
            <div class="row">
                @foreach($articles["Köşe Yazıları"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(12) as $article)
                    <div class="col-xl-8 col-md-12 mt-1 article">
                        <a href="{{$article->original_link}}" class="non-decoration">
                            <div class="row">
                                <div class="article-image"
                                     style="background-image: url({{$article->image_path}})"></div>
                                <div class="article-text">
                                    <div class="article-text-title">{{$article->title}}</div>
                                    <div class="article-text-body">
                                        <p>{{ $article->body }}</p>
                                    </div>
                                    {{--<div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>--}}
                                    <div class="article-logo-bottom"><img
                                            src="{{asset('modules/home/sample/img/newspaper-logos/sozcu.svg')}}" alt=""
                                            style="background-color: red" width="80px;"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div
                    style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px;">
                    Daha Fazla Köşe Yazısı Gör
                </div>
            </div>
        </div>
    </section>


    {{-- <section id="section-borsa-raporlari">
         <div class="container">
             <div class="section-header d-flex">
                 <div class="section-title">BORSA RAPORLARI</div>
                 <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
             </div>
         </div>
     </section>--}}


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
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                            <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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

                                            <span class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                            <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
                                class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span>  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="section-en-cok-okunanlar" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-white">
                <div class="section-title">EN ÇOK OKUNANLAR</div>
                <div class="d-none d-md-block section-right"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @php
                    $i = 1;
                @endphp
                @foreach($mostReads as $article)
                    <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="most-red">
                                <div class="most-red-image"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="most-red-text">
                                    <div class="most-red-index">{{$i}}</div>
                                    <p>{{ $article->title }}</p>

                                </div>
                                <div class="most-red-bottom">
                                   <span
                                   >{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span> • <span>{{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @php
                        $i++
                    @endphp
                @endforeach
                <div
                    style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #F5F5F5; color:#F5F5F5; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px;">
                    <a href="{{route("home_article.index",['type' => 'En Çok Okunanlar'])}}">

                        Tümünü Gör
                    </a>

                </div>
            </div>
        </div>
    </section>
    <section id="section-stil" style="background-color: #ffead5;padding-top: 20px; padding-bottom: 15px;">

        <div style="font-family: MillerTextItalic; font-size:56px; padding-left:100px; font-weight: bold">Stil</div>
    </section>

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
                                                        class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span
                                                        class="text-white">  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
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
                                         class="text-light-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span></span>
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
                                class="text-light-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span></span>
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
                                class="text-light-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
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
                    @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(3) as $article)
                        <div class="card news-card news-card-small">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="news-card-img-container">
                                    <div style="background: url({{asset($article->image_path)}})" alt=""
                                         class="news-img"></div>
                                    <div class="news-card-img-text bg-white small-text">
                                        <p>{{$article->title}}</p>
                                    </div>
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
                        <div class="col-lg-18 col-md-24 mt-1">
                            <div class="card news-card news-card-big cardSlider" currentSlide="0" style="height: 400px;"
                                 id="tech-second-row-anchor">
                                <div class=""></div>
                                <div class="news-card-slider-container">
                                    @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                            <div class="news-card-slider-slide">
                                                <div class="tech-card-slider-slide-img text-white"
                                                     style="background-image: url({{asset($article->image_path)}})">
                                                    <div class="tech-card-slider-slide-caption">
                                                        <span class="highlighted bg-purple">
                                                                                                    {{ \Illuminate\Support\Str::limit($article->title, 65, $end='...') }}

                                                        </span>
                                                        <div class=" sport-text-bottom-sm">

                                                    <span
                                                        class="text-white">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span
                                                                class="text-white">  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="news-card-slider-controls tech-slider-controls">
                                    <div class="news-card-slider-control" direction="previous">❮</div>
                                    <div class="news-card-slider-control" direction="next">❯</div>
                                </div>
                            </div>
                        </div>
                        @php
                            $persistent = count($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                            if($persistent) {
                                $teknolojiArticles = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                                $teknolojiArticlesBelow = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(3);
                            } else {
                                $teknolojiArticles = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                                $teknolojiArticlesBelow = $articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(5);
                            }
                        @endphp
                        <div class="col-lg-6 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                            @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(1) as $article)
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="col-md-24 bg-purple h-100 tech-box">
                                        <div class="tech-news-box-image"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                        <div class="tech-news-box-caption">
                                            {{ \Illuminate\Support\Str::limit($article->title, 100, $end='...') }}

                                            <div class="tech-text-bottom-sm text-white">
                                                <span
                                                    class="">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-4 mt-2">
                        @foreach($articles["Teknoloji"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(3) as $article)
                            <div class="col-sm-24 col-md-12 col-lg-8 mt-3">
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


    <section id="section-yasam">
        <div class="container">
            <div class="section-header d-flex text-orange">
                <div class="section-title">YAŞAM</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Yaşam'])}}">Tüm Yaşam Haberlerini Gör</a></div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-14 mt-3">
                    <div class="card news-card news-card-big keep-ratio cardSlider" currentSlide="0" ratio="0.5"
                         id="life-slider" style="height: 450px;">
                        <div class=""></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                <div class="news-card-slider-slide">
                                    <div class="life-card-slider-slide-img text-white"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="yellowOverlay0">
                                            <div class="life-card-slider-slide-caption text-black"><p>{{$article->title}}</p>
                                                <div class="tech-text-bottom-sm">
                                    <span
                                        class="text-black">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                                </div>
                                            </div>  </div>


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
                @php
                    $persistent = count($articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                    if($persistent) {
                        $yasamArticles = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                        $yasamArticlesSecond = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $yasamArticlesBelow = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(4);
                    } else {
                        $yasamArticles = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $yasamArticlesSecond = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                        $yasamArticlesBelow = $articles["Yaşam"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(4);
                    }
                @endphp
                <div class="col-md-5 match mt-3" matchTo="life-slider">
                    @foreach($yasamArticles as $article)
                        <div class="col-md-24  match" matchTo="life-slider">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-white  h-100 tech-box">
                                    <div class="tech-news-box-image "
                                         style="background-image: url({{asset($article->image_path)}}); height: 100%">
                                        <div class="life-second-image-caption">
                                            <p>{{$article->title}}</p>
                                            <div class="mt-1">
                                                Video <span class="fa fa-play-circle"></span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-5 match mt-3" matchTo="life-slider">
                    @foreach($yasamArticlesSecond as $article)
                        <div class="col-md-24  match " matchTo="life-slider" style="border-bottom: 8px solid orange;">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-white  h-100 tech-box">
                                    <div class="tech-news-box-image "
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="life-news-box-caption text-center">
                                        <p>{{$article->title}}</p>
                                        <div class="life-text-bottom-sm ">
                                            <span
                                                class="text-orange">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
                   <div class="row mt-3">
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
                    </div>
            <div class="row mb-4 mt-2">
                @foreach($yasamArticlesBelow as $article)
                    <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 life life-md"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="life-title">
                                <p>  {{ $article->title }}</p>


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
                            @foreach($articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                <div class="news-card-slider-slide">
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="life-card-slider-slide-img text-white"
                                             style="background-image: url({{asset($article->image_path)}})">
                                            <div class="blueOverlay">

                                            </div>

                                            <div class="automobile-card-slider-slide-caption">
                                                <span class="highlighted bg-black">{{$article->title}}</span>
                                                <div class=" sport-text-bottom-sm">

                                                    <span
                                                        class="text-white bg-black">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="automobile-card-slider-controls bg-black"
                        ">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            @php
                $persistent = count($articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                if($persistent) {
                    $otomobilArticles = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                    $otomobilArticlesBelow = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(3);
                    $otomobilArticlesFooterLeft = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(1);
                    $otomobilArticlesFooterRight = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(4)->take(1);
                } else {
                    $otomobilArticles = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);

                    $otomobilArticlesBelow = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(3);
                                  $otomobilArticlesFooterLeft = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(1);
                    $otomobilArticlesFooterRight = $articles["Otomobil"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(5)->take(1);
                }
            @endphp
            @foreach($otomobilArticles as $article)
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
            @foreach($otomobilArticlesBelow as $article)
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
            @foreach($otomobilArticlesFooterLeft as $article)
                <div class="col-md-24 col-lg-12 p-4 ">
                    <div class="row">

                        <div class="col-14 bg-secondary" style="padding: 0 3% 0 3%">
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
            @foreach($otomobilArticlesFooterRight as $article)
                <div class="col-md-24 col-lg-12 p-4 ">
                    <div class="row">
                        <div class="col-10"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="col-14 bg-secondary" style="padding: 0 3% 0 3%">
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
        </div>
    </section>
    <section id="section-netkolik">
        <div class="container">
            <div class="section-header d-flex text-dark-orange">
                <div class="section-title">NETKOLİK</div>
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
                        <div></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)

                                <div class="news-card-slider-slide">
                                    <div class="life-card-slider-slide-img"
                                         style="background-image: url({{asset($article->image_path)}})">
                                        <div class="blueOverlay">

                                        </div>

                                        <div class="internet-card-slider-slide-caption big-title">
                                            <div style="background-color: #fe6845; padding: 20px 0px 20px 10px;">
                                                {{ \Illuminate\Support\Str::limit($article->title, 65, $end='...') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="internet-card-slider-controls" style="background-color: #fe6845;">
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
                @php
                    $persistent = count($articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                    if($persistent) {
                        $netkolikArticles = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                        $netkolikArticlesBelowFirst = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $netkolikArticlesBelowSecond = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(3);
                        $netkolikArticlesFooter = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(1);
                    } else {
                        $netkolikArticles = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);

                                       $netkolikArticlesBelowFirst = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                        $netkolikArticlesBelowSecond = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(3);
                        $netkolikArticlesFooter = $articles["Netkolik"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(5)->take(3);
                    }
                @endphp
                <div class="col-md-10">
                    @foreach($netkolikArticles as $article)
                        <div class="col-lg-24 col-md-24 mt-1">
                            <div class="card news-card news-card-big match " matchTo="internet-slider">
                                <div class="news-card-slider-container">
                                    <div class="news-card-slider-slide">
                                        <div class="sport-card-slider-slide-img "
                                             style="background-image: url(https://cdn.sporx.com/img/59/2021/20210805_2_49495353_67675352.jpg)">
                                            <div class="orangeOverlay90"></div>

                                            <div class="sport-card-slider-slide-caption">Kadro değeri 14 milyon euroyu
                                                aşan
                                                takımların mücadelesi
                                                <div class=" sport-text-bottom-sm">

                                                    <span class="">23 Ocak • 14:35 • by parafesor</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    @foreach($netkolikArticlesBelowFirst as $article)
                        <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-dark-orange h-100 tech-box">
                                    <div class="tech-news-box-image"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="internet-news-box-caption">
                                        {{$article->title}}
                                        <div class="tech-text-bottom-sm">
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
                        @foreach($netkolikArticlesBelowSecond as $article)
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
                @foreach($netkolikArticlesFooter as $article)
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

        </div>
    </section>
    <section id="section-egitim">
        <div class="container">
            <div class="section-header d-flex text-blue-alternative">
                <div class="section-title">EĞİTİM</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Eğitim'])}}">Tüm
                        Eğitim Haberlerini Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                    href="{{route("home_article.index",['type' => 'Eğitim'])}}">Tüm Eğitim Haberlerini Gör</a></div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($articles["Eğitim"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(8) as $article)
                    <div class="col-xl-6 col-lg-8 col-md-12">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 ">
                                <div class="col-sm-24 h-100">
                                    <div class="col-24 education education-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="education-title">{{$article->title}}
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--<section id="section-kripto-paralar" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex">
                <div class="section-title">GÜNDEM</div>
                <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
            </div>
        </div>
    </section>
    <section id="section-hisse-onerileri">
        <div class="container">
            <div class="section-header d-flex">
                <div class="section-title">GÜNDEM</div>
                <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
            </div>
        </div>
    </section>--}}

    <section id="section-crypto" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-white">
                <div class="section-title">KRİPTO PARALAR</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm
                        Kripto Haberlerini Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                    href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm Kripto Haberlerini Gör</a></div>
        </div>
        </div>
        <div class="container">
            <div class="row" style="position: relative">
                <div class="col-md-12 h-100">
                    <div class="card news-card news-card-big  mb-sm-5 cardSlider" currentSlide=""
                         id="crypto-slider"
                         style="height: 400px">
                        <div></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(4) as $article)
                                <div class="news-card-slider-slide">
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="life-card-slider-slide-img text-white"
                                             style="background-image: url({{asset($article->image_path)}})">
                                            <div class="blueOverlay">

                                            </div>

                                            <div class="crypto-card-slider-slide-caption">
                                                <div style="background-color: #000; padding: 10px;">
                                                    {{$article->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="crypto-card-slider-controls bg-orange">
                            <div class="news-card-slider-control" direction="previous">❮</div>
                            <div class="news-card-slider-control" direction="next">❯</div>
                        </div>
                    </div>
                </div>
                @php
                    $persistent = count($articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]) > 0;
                    if($persistent) {
                        $kriptoArticles = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::PERSISTENT]->take(1);
                        $kriptoArticlesHeadSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $kriptoArticlesBelowFirst = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                        $kriptoArticlesBelowSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(3);
                        $kriptoArticlesFooter = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(4);
                    } else {
                        $kriptoArticles = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(1);
                        $kriptoArticlesHeadSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(1)->take(1);
                        $kriptoArticlesBelowFirst = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1);
                        $kriptoArticlesBelowSecond = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(1);
                        $kriptoArticlesFooter = $articles["Kripto"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(4)->take(4);
                        }
                @endphp

                @foreach($kriptoArticles as $article)
                    <div class="col-md-6 match" matchTo="crypto-slider">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 bg-dark match" matchTo="crypto-slider">
                                <div class="col-sm-24 h-100">
                                    <div class="col-24 crypto crypto-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="crypto-first-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="crypto-text-bottom">
                                    <span
                                        style="color:#f2b01b;">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-6 match" matchTo="crypto-slider">
                    @foreach($kriptoArticlesHeadSecond as $article)
                        <div class="col-md-24 match" matchTo="crypto-slider">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="col-md-24 bg-white  h-100 tech-box">
                                    <div class="tech-news-box-image "
                                         style="background-color: black;)}}); height: 100%">
                                        {{--       <div class="tech-news-box-image "
                                                    style="background-image: url({{asset($article->image_path)}}); height: 100%">--}}
                                        <div class="crypto-second-image-caption">
                                            Gültekin Bey Haftalık Bitcoin Analizi
                                            <div class="mt-1">
                                                Video <span class="fa fa-play-circle"></span>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="row mt-4">
                @foreach($kriptoArticlesBelowFirst as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="row">
                                <div class="col-10 bg-orange crypto-wide-section">
                                    <div class="crypto-title" style="color: black;">
                                        {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                    </div>
                                    <div class="crypto-text-bottom-sm">
                                        <span>{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                    </div>
                                </div>
                                <div class="col-14"
                                     style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach($kriptoArticlesBelowSecond as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="row">
                                <div class="col-14"
                                     style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                                <div class="col-10 bg-orange crypto-wide-section">
                                    <div class="crypto-title" style="color: black;">
                                        {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}

                                    </div>
                                    <div class="crypto-text-bottom-sm">
                                        <span>{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5" style="height: 450px;">
                @foreach($kriptoArticlesFooter as $article)
                    <div class="col-md-6">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24  bg-dark">
                                <div class="col-sm-24 ">
                                    <div class="col-24 crypto crypto-md"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                    <div class="crypto-title">
                                        {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                        <div class="crypto-text-bottom-sm">
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
        </div>
    </section>
    <section id="section-hisse-onerileri">
        <div class="container">
            <div class="section-header d-flex text-black">
                <div class="section-title">HİSSE ÖNERİLERİ</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Hisse'])}}">Tüm Hisse Önerilerini
                        Gör</a>
                </div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                    href="{{route('home_article.index',['type' => 'Hisse'])}}">Tüm Hisse Önerilerini Gör</a>
            </div>

            <div class="row">
                <div class="col-12" style="border-bottom: 1px solid black;">
                    <button class="share-recommendation-button active">Hisse Raporları</button>
                    <button class="share-recommendation-button">Aracı Kurum Tavsiyeleri</button>
                </div>

                <div class="col-6">
                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                    <input type="text" class="share-recommendation-search-input" placeholder="Hisse Adı / Kodu Yazınız">

                </div>

                <div class="col-6">
                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                    <input type="text" class="share-recommendation-search-input"
                           placeholder="Aracı Kurum Adı / Analist Adı">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xl-13 mb-5">
                    <div class="row">
                        @foreach($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(2) as $article)
                            <div class="col-lg-12 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="col-md-24 bg-black h-100 tech-box">

                                        <div class="tech-news-box-image"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                        <div class="share-recommendation-box-caption">
                                            {{$article->title}}
                                            <div class="company-text mt-1" style="padding-left:0px;">
                                                {{ \Illuminate\Support\Str::limit($article->summary, 100, $end='...') }}
                                            </div>
                                            <div class="share-recommendation-text-bottom-sm text-white">
                                                <span class="">23 Ocak</span><span> • 14:35 • by parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{--<div class="col-xl-13 mb-5">
                    <div class="card news-card news-card-big ">
                        <div class="news-card-img-container bg-white">
                            <div style="background-image: url({{asset("modules/home/sample/img/news/s1n1.webp")}})" alt=""
                                 class="news-img"></div>
                            <div class="news-card-img-text text-dark-blue">Polat Enerji'nin Tamamının Satışı İçin
                                Ortaklar Barclays'i Yetkilendirdi
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="col-xl-11">
                    <div class="row">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(4) as $article)
                            <div class="col-sm-24">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="share-recommendation-news-numbers text-dark-blue">{{$i}}</div>
                                    <div class="share-recommendation-news-img">
                                        <div class="image-card-16x10 border bg-white"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                    </div>
                                    <div class="share-recommendation-news-text">
                                        <div class="text-black fw-bold">
                                            {{$article->title}}
                                        </div>
                                        <div class="share-recommendation-news-text-bottom">
                               <span
                                   style="color: #A2A2A2">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
            <div class="row">
                @foreach($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(8) as $article)
                    <div class="col-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card">
                                <div class="share-recommendation-triangle"></div>
                                <div style="padding: 30px;">
                                    <div class="text-black fw-bold text-left">
                                        {{$article->title}}
                                    </div>
                                    <div class="share-recommendation-text text-left mt-3">
                                        {{ \Illuminate\Support\Str::limit($article->summary, 100, $end='...') }}
                                    </div>
                                    <div class="share-recommendation-bottom mt-3">
                          <span
                              class="text-black">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="d-none" id="images"></div>

    <footer>

    </footer>
    @include('home::partials._javascript')

@endsection

