<section id="section-gundem" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-danger border-danger">
            <div class="section-title">GÜNDEM</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/gundem">Tüm
                    Gündem Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger"><a href="https://parafesor.net/kategori/gundem">Tüm
                Gündem Haberlerini Gör</a></div>
        <div class="row g-row mt-2">
            <div class="col-xl-18">
                <div class="row g-child-row">
                    <div class="col-lg-12 g-box g-box-1">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0" id="firstCardSlide">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::SECOND_SLIDER]->take(3) as $article)
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="card news-card news-card-big ">
                                            <div class="news-card-img-container bg-light-grey">
                                                <div
                                                    style="background: url({{asset($article->image_path)}}); height: 330px;"
                                                    alt="" class="news-img lazy"></div>
                                                <div class="news-card-img-text big-title"><p>{{$article->title}}</p>
                                                </div>
                                            </div>
                                            <div class="news-card-body">
                                                <p>{{$article->summary}}</p>
                                                <span
                                                    class="text-danger">{{ Date::parse($article->article_date)->format('j F')}} </span>
                                                <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="news-card-slider-controls">
                                <div class="news-card-slider-control" direction="previous">❮</div>
                                <div class="news-card-slider-control" direction="next">❯</div>
                            </div>
                            <div class="total-slide"><span>1</span>/3</div>
                        </div>
                    </div>

                    <div class="col-lg-12 g-box g-box-2">
                        <div class="card news-card news-card-big cardSlider" id="secondCardSlide" currentSlide="0">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER]->take(6) as $article)
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="news-card-slider-slide">
                                            <div class="news-card-slider-slide-img lazy"
                                                 style="background-image: url({{asset($article->image_path)}});
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
                            <div class="total-slide"><span>1</span>/6</div>
                        </div>
                    </div>

                    @foreach($articles["Gündem"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(4) as $article)
                        <div class="col-lg-6 col-sm-12 col-12 g-box-4">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="card news-card news-card-small ">
                                    <div class="news-card-img-container bg-light-grey">
                                        <div
                                            style="background: url({{asset($article->image_path)}})"
                                            alt="" class="news-img lazy"></div>
                                        <div class="news-card-img-text small-text">
                                            <p>{{ $article->title }}</p>
                                            <div class="news-card-bottom"><span class="text-danger">{{ Date::parse($article->article_date)->format('j F')}} • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-xl-block col-xl-6 g-box-3">
                <div class="col-24">
                    <div class="card bg-dark-grey h-100">
                        <ul class="list-group list-group-flush">
                            {{--<div>
                                <span>Borsa Endeksleri</span>
                                <a href="#"><span>Tümünü Gör</span></a>
                            </div>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-11">Bist100</div>
                                    <div class="col-5"><span class="value-up">8,15</span></div>
                                    <div class="col-8"><span class="value-up">+2,55%</span></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-11">Bist30</div>
                                    <div class="col-5"><span class="value-up">9,45</span></div>
                                    <div class="col-8"><span class="value-up">+4,55%</span></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-11">Viop</div>
                                    <div class="col-5"><span class="value-down">1531,81</span></div>
                                    <div class="col-8"><span class="value-down">-2,55%</span></div>
                                </div>
                            </li>
   --}}                         <div>
                                <span>Kurlar</span>
                                <a href="#"><span>Tümünü Gör</span></a>
                            </div>
                            @foreach($currencies['Fiat'] as $fiat)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-11">{{$fiat->currency}}
                                        </div>
                                        <div class="col-5"><span
                                                class="{{$fiat->change > 0 ? 'value-up' : 'value-down' }}">{{ \Illuminate\Support\Str::limit($fiat->buying, 6, $end='') }}</span>
                                        </div>
                                        <div class="col-8"><span class="{{$fiat->change > 0 ? 'value-up' : 'value-down' }}">{{ number_format($fiat->change,2) }}%</span></div>
                                    </div>
                                </li>
                            @endforeach
                            <div>
                                <span>Kripto Paralar</span>
                                <a href="#"><span>Tümünü Gör</span></a>
                            </div>
                            @foreach($currencies['Crypto'] as $crypto)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-11">{{$crypto->currency}}</div>
                                        @php
                                            $numberFormat = 2;
                                          if(strlen((int) $crypto->buying) > 3 ) {
                                            $numberFormat = 0;
    }
                                        @endphp
                                        <div class="col-5"><span class="{{$crypto->change > 0 ? 'value-up' : 'value-down' }}">{{ number_format($crypto->buying, $numberFormat) }}</span></div>
                                        <div class="col-8"><span class="{{$crypto->change > 0 ? 'value-up' : 'value-down' }}">{{ number_format($crypto->change,2) }}%</span></div>
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
