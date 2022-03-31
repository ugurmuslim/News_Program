<section id="section-sirket-haberleri">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">ŞİRKET HABERLERİ</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/sirket-haberleri">Tüm
                    Şirket Haberlerini
                    Gör</a>
            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm "><a href="https://parafesor.net/kategori/sirket-haberleri">Tüm
                Şirket Haberlerini Gör</a>
        </div>
        <div class="row s-row-1">
            @foreach(array_slice($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,1) as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-xl-13 corporate2">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card news-card news-card-big" id="corporate-new-showcase">
                            <div class="news-card-img-container bg-white lazy">
                                <div
                                    style="background-image: url({{asset($article->image_path)}})"
                                    alt="" class="news-img"></div>
                                <div class="corporate-big-img-text">
                                    <p>{{$article->title}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-xl-11 corporate3">
                <div class="row">
                    @php
                        $i = 1;
                    @endphp
                    @foreach(array_slice($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,3) as $article)
                        @php
                            $article = (object) $article;
                        @endphp
                        <div class="col-sm-24">
                            <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                <div class="corporate-news-numbers ">{{$i}}</div>
                                <div class="corporate-news-img">
                                    <div class="image-card-16x10 border bg-white lazy"
                                         style="background-image: url({{asset($article->image_path)}})"></div>
                                </div>
                                <div class="corporate-news-text">
                                   <p>
                                        {{$article->title}}
                                    </p>
                                    <div class="corporate-news-text-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F') }}</span>
                                        • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
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
        <div class="corporate-divider"></div>
        <div class="row s-row-2">
            @foreach(array_slice($articles["Şirket Haberleri"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,8) as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-24 col-md-12 col-lg-6">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card">
                            <div class="corporate-triangle"></div>
                            <div class="company-image lazy"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="company-text company-below-section">
                                <p>{{$article->title}}</p>
                            </div>
                            <div class="company-bottom">
                                <span>{{ Date::parse($article->article_date)->format('j F') }}</span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
