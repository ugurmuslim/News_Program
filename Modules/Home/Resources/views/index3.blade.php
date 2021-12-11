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
@include('home::sections.borsa-tube')
@include('home::sections.twitter')
@include('home::sections.sirket-haberleri')
@include('home::sections.kose-yazilari')
@include('home::sections.son-dakika')
@include('home::sections.cok-okunanlar')


    {{-- <section id="section-borsa-raporlari">
         <div class="container">
             <div class="section-header d-flex">
                 <div class="section-title">BORSA RAPORLARI</div>
                 <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
             </div>
         </div>
     </section>--}}





    <section id="section-stil" style="background-color: #ffead5;padding-top: 20px; padding-bottom: 15px;">

        <div style="font-family: MillerTextItalic; font-size:56px; padding-left:100px; font-weight: bold">Stil</div>
    </section>
    @include('home::sections.spor')

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

