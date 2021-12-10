@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
<section id="section-sirket-haberleri">
    <div class="container">
        <div class="section-header d-flex text-dark-blue">
            <div class="section-title">ŞİRKET HABERLERİ</div>
            <div class="d-none d-md-block section-right">Tüm Şirket Haberlerini Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark-blue">Tüm Şirket Haberlerini Gör</div>

        <div class="row mt-3">
            @foreach($articles["Şirket Haberleri"]->take(1) as $article)
            <div class="col-xl-13 mb-5">
                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                    <div class="card news-card news-card-big ">
                        <div class="news-card-img-container bg-white">
                            <div style="background-image: url({{asset($article->image_path)}})" alt=""
                                 class="news-img"></div>
                            <div class="news-card-img-text text-dark-blue">{{$article->title}}
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
                @foreach($articles["Şirket Haberleri"]->slice(1)->take(3) as $article)
                <div class="col-sm-24">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="corporate-news-numbers text-dark-blue">1</div>
                        <div class="corporate-news-img">
                            <div class="image-card-16x10 border bg-white"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                        </div>
                        <div class="corporate-news-text">
                            <div class="text-dark-blue fw-bold">
                                {{$article->title}}
                            </div>
                            <div class="corporate-news-text-bottom">
                               <span
                                   class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
    <div class="row">
        @foreach($articles["Şirket Haberleri"]->slice(3)->take(8) as $article)
        <div class="col-24 col-md-12 col-lg-6 mt-3">
            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset($article->image_path)}})"></div>
                    <div class="company-text">
                        {{$article->title}}
                    </div>
                    <div class="company-bottom">
                          <span
                              class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
        <div class="row">
        @foreach($articles["Şirket Haberleri"]->slice(6)->take(20) as $article)

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
