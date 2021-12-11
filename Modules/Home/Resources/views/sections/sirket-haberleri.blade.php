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
