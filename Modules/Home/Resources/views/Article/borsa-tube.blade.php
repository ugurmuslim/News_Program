@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    <section id="section-borsa-tube" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-light border-light">
                <div class="section-title">BORSA TUBE</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Borsa Tube'])}}">Tüm Borsa Youtube Videolarını Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm"><a
                    href="{{route('home_article.index',['type' => 'Borsa Tube'])}}">Tüm Borsa Youtube Videolarını Gör</a></div>

            <div class="row text-white">

                <div class="col-lg-14">
                    <div class="ratio ratio-16x9 mt-2" id="borsaEmbed">
                        @foreach($articles["Borsa Tube"]['ShowCase']->take(1) as $article)
                            <div class="image-card image-card-bw-16x10"
                                 style="background-image: url({{asset($article->image_path)}})"></div>

                            {{--<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>--}}
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-10  mt-2">
                    <div class="text-danger" style=" height:100%; overflow: hidden">
                        <div matchTo="borsaEmbed" class="match"
                             style="width: 100%; height: 0%; overflow: hidden; overflow-y:auto">
                            <div class="row px-3">
                                @foreach($articles["Borsa Tube"]['Normal']->take(8) as $article)
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
                @foreach($articles["Borsa Tube"]['Normal']->slice(8)->take(3) as $article)
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
                            <div class="channel-logo"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                        @endforeach
                    </div>
                    <div class="text-end" style="float:right; width:30px;">❯</div>
                </div>
            @foreach($articles["Borsa Tube"]["Normal"]->slice(6)->take(20) as $article)

                <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <a href={{$article->original_link}}">
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
