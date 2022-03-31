<section id="section-hisse-onerileri">
    <div class="container">
        <div class="section-header d-flex text-black">
            <div class="section-title">HİSSE ÖNERİLERİ</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/hisse">Tüm Hisse
                    Önerilerini
                    Gör</a>
            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                href="https://parafesor.net/kategori/hisse">Tüm Hisse Önerilerini Gör</a>
        </div>
        <div class="row mt-4 h-row-3">
            <div class="col-14">
                <ul class="nav nav-pills" id="hisseOnerileri" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="hisseraporlari-tab" data-bs-toggle="tab"
                                data-bs-target="#hisseraporlari" type="button" role="tab" aria-controls="hisseraporlari"
                                aria-selected="true">Hisse Raporları
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="aracikurumtavsiyeleri-tab" data-bs-toggle="tab"
                                data-bs-target="#aracikurumtavsiyeleri" type="button" role="tab"
                                aria-controls="aracikurumtavsiyeleri" aria-selected="false">Aracı Kurum Tavsiyeleri
                        </button>
                    </li>
                </ul>
            </div>

            <div class="col-10">
                <div class="row">
                    <div class="col-12">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <input type="text" class="share-recommendation-search-input"
                               placeholder="Hisse Adı / Kodu Yazınız">
                    </div>
                    <div class="col-12">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <input type="text" class="share-recommendation-search-input"
                               placeholder="Aracı Kurum Adı / Analist Adı">
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content col-xl-14" id="hisseOnerileriContent">
            <div class="tab-pane fade show active" id="hisseraporlari" role="tabpanel"
                 aria-labelledby="hisseraporlari-tab">

                <!-- Birinci Tab -->

                <div class="row h-row-4">
                    <div class="col">
                        <div class="row">
                            @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,2) as $article)
                                @php
                                    $article = (object) $article;
                                @endphp
                                <div class="col-lg-12 col-md-24">
                                    <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                        <div class="col-md-24 h-100 tech-box">
                                            <div class="share-recommendation-triangle"></div>
                                            <div class="tech-news-box-image lazy"
                                                 style="background-image: url({{asset($article->image_path)}}"></div>
                                            <div class="share-recommendation-box-caption">
                                                <div class="hisse-box-caption">
                                                    <p>{{$article->title}}</p>
                                                </div>
                                                <div class="company-text">
                                                    <p>{{$article->summary}}</p>
                                                </div>
                                                <div class="share-recommendation-text-bottom-sm text-white">
                                                    <span
                                                        class="">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 hisse-4haber">
                    <div class="row">
                        @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,4) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
                            <div class="col-sm-24">
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="share-recommendation-news-img">
                                        <div class="image-card-16x10 border bg-white lazy"
                                             style="background-image: url({{asset($article->image_path)}}"></div>
                                    </div>
                                    <div class="share-recommendation-news-text">
                                        <div class="text-black small-company-title">
                                            <p>{{$article->title}}</p>
                                        </div>
                                        <div class="share-recommendation-news-text-bottom">
                                            {{ Date::parse($article->article_date)->format('j F')}} <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row h-row-5">
                    @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,8) as $article)
                        @php
                            $article = (object) $article;
                        @endphp
                        <div class="col-24 col-md-12 col-lg-6">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="card">
                                    <div class="share-recommendation-triangle"></div>
                                    <div class="company-image lazy"
                                         style="background-image: url({{asset($article->image_path)}}"></div>
                                    <div class="text-caption company-below-row">
                                        <p>{{$article->title}}</p>
                                    </div>
                                    <div class="share-recommendation-text  company-below-row text-left">
                                        <p>{{$article->summary}}</p>
                                    </div>
                                    <div class="share-recommendation-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F')}}</span>
                                        • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="tab-pane fade" id="aracikurumtavsiyeleri" role="tabpanel"
                 aria-labelledby="aracikurumtavsiyeleri-tab">

                <!-- ikinci Tab -->
                <div class="row h-row-4">
                    <div class="col">
                        <div class="row">
                            @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::MAIN_SLIDER],0,2) as $article)
                                @php
                                    $article = (object) $article;
                                @endphp
                                <div class="col-lg-12 col-md-24">
                                    <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                        <div class="col-md-24 h-100 tech-box">
                                            <div class="share-recommendation-triangle"></div>
                                            <div class="tech-news-box-image lazy"
                                                 style="background-image: url({{asset($article->image_path)}}"></div>
                                            <div class="share-recommendation-box-caption">
                                                <div class="hisse-box-caption">
                                                    <p>{{$article->title}}</p>
                                                </div>
                                                <div class="company-text">
                                                    <p>{{$article->summary}}</p>
                                                </div>
                                                <div class="share-recommendation-text-bottom-sm text-white">
                                                    <span
                                                        class="">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 hisse-4haber">
                    <div class="row">
                        @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,4) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
                            <div class="col-sm-24">
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="share-recommendation-news-img">
                                        <div class="image-card-16x10 border bg-white lazy"
                                             style="background-image: url({{asset($article->image_path)}}"></div>
                                    </div>
                                    <div class="share-recommendation-news-text">
                                        <div class="text-black small-company-title">
                                            <p>{{$article->title}}</p>
                                        </div>
                                        <div class="share-recommendation-news-text-bottom">
                                            {{ Date::parse($article->article_date)->format('j F')}} <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row h-row-5">
                    @foreach(array_slice($articles["Hisse"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,8) as $article)
                        @php
                            $article = (object) $article;
                        @endphp
                        <div class="col-24 col-md-12 col-lg-6">
                            <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                <div class="card">
                                    <div class="share-recommendation-triangle"></div>
                                    <div class="company-image lazy"
                                         style="background-image: url({{asset($article->image_path)}}"></div>
                                    <div class="text-caption company-below-row">
                                        <p>{{$article->title}}</p>
                                    </div>
                                    <div class="share-recommendation-text  company-below-row text-left">
                                        <p>{{$article->summary}}</p>
                                    </div>
                                    <div class="share-recommendation-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F')}}</span>
                                        • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
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

