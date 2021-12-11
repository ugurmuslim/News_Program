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
