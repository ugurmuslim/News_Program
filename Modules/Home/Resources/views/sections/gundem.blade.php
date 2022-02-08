<section id="section-gundem" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-danger border-danger">
            <div class="section-title">GÜNDEM</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/gundem">Tüm
                    Gündem Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a href="https://parafesor.net/kategori/gundem">Tüm Gündem Haberlerini Gör</a></div>
        <div class="row">
            <div class="col-xl-18">
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0" id="firstCardSlide">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::SECOND_SLIDER]->take(6) as $article)
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="card news-card news-card-big ">
                                        <div class="news-card-img-container bg-light-grey">
                                            <div style="background: url({{asset($article->image_path)}}); height: 330px;" alt="" class="news-img lazy"></div>
                                            <div class="news-card-img-text big-title"><p>{{$article->title}}</p>
                                            </div>
                                        </div>
                                        <div class="news-card-body">
                                            <p>{{$article->summary}}</p>
                                            <span class="text-danger">{{ Date::parse($article->article_date)->format('j F')}} </span> <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                        </div>

                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="news-card-slider-controls" style="display: none;"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="card news-card news-card-big cardSlider"  id="secondCardSlide" currentSlide="0">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(6) as $article)
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="news-card-slider-slide">
                                        <div class="news-card-slider-slide-img lazy" style="background-image: url({{asset($article->image_path)}});
                                                     background-color: #ea212d;
                                                     background-blend-mode: multiply;">
                                            <div class="news-card-slider-slide-caption text-white">
                                                <p>{{$article->title}}</p>
                                                <span>{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
                            <ul class="slideNumber">
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>6</li>
                            </ul>
                        </div>
                    </div>

                    @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(4) as $article)
                    <div class="col-lg-6 col-sm-12 col-12 mt-4">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card news-card news-card-small ">
                                <div class="news-card-img-container bg-light-grey">
                                    <div style="background: url({{asset($article->image_path)}})" alt="" class="news-img lazy"></div>
                                    <div class="news-card-img-text small-text">
                                        <p>{{ $article->title }}</p>
                                        <div class="news-card-bottom"><span class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span> <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-xl-block col-xl-6">
                <div class="col-24">
                    <div class="card bg-dark-grey mt-2 h-100" >
                        <ul class="list-group list-group-flush">
                            <div>
                                <span>Kurlar</span>
                            </div>
                            @foreach($currencies['Fiat'] as $fiat)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-11">
                                        {{$fiat->currency}}
                                    </div>
                                    <div class="col-5">
                                    </div>
                                    <div class="col-8">
                                        <span style="">{{ \Illuminate\Support\Str::limit($fiat->buying, 6, $end='') }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <div>
                                <span>Kripto Paralar</span>
                            </div>
                            @foreach($currencies['Crypto'] as $crypto)
                                <li class="list-group-item" style="font-family: HelveticaNeueMedium">
                                <div class="row">
                                    <div class="col-8">
                                        {{$crypto->currency}}
                                    </div>
                                    @php
                                        $numberFormat = 2;
                                      if(strlen((int) $crypto->buying) > 3 ) {
                                        $numberFormat = 0;
}
                                    @endphp
                                    <div class="col-8">
                                        <span style="color:#ff0000">{{ number_format($crypto->change,2) }}%</span>
                                    </div>
                                    <div class="col-8">
                                        <span style="color:#ff0000">{{ number_format($crypto->buying, $numberFormat) }}</span>
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
</section>


{{--
<section id="section-gundem" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-danger border-danger">
            <div class="section-title">GÜNDEM</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route("home_article.index",['type' => 'gundem'])}}">Tüm
                    Gündem Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                href="{{route("home_article.index",['type' => 'gundem'])}}">Tüm Gündem Haberlerini Gör</a></div>

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
                                        <div class="news-card-img-text big-title"><p>{{$article->title}}</p>
                                        </div>

                                    </div>
                                    <div class="news-card-body">
                                        <p>{{$article->summary}}</p>
                                    </div>
                                    <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
                @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(4) as $article)

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
                                        class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
                                        <div class="col-11">
                                            {{$fiat->currency}}
                                        </div>

                                        <div class="col-6">
                                            --}}
{{--                                                <span style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->change, 5, $end='') }}%</span>--}}{{--

                                        </div>
                                        <div class="col-7">
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
                                        <div class="col-11">
                                            {{$crypto->currency}}
                                        </div>
                                        @php
                                            $numberFormat = 2;
                                          if(strlen((int) $crypto->buying) > 3 ) {
                                            $numberFormat = 0;
  }
                                        @endphp
                                        <div class="col-6">
                                                <span
                                                    style="{{$crypto->change > 0 ? "color:#00eb00" : "color:#ff0000"}}">{{ number_format($crypto->change,2) }}%</span>
                                        </div>
                                        <div class="col-7">
                                            <span
                                                style="{{$crypto->change > 0 ? "color:#00eb00" : "color:#ff0000"}}">{{number_format($crypto->buying, $numberFormat) }}</span>
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
</section>
--}}
