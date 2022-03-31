<section id="section-egitim">
    <div class="container">
        <div class="section-header d-flex text-blue-alternative">
            <div class="section-title">EĞİTİM</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/egitim">Tüm
                    Eğitim Haberlerini Gör</a></div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-blue-alternative"><a
                href="https://parafesor.net/kategori/egitim">Tüm Eğitim Haberlerini Gör</a></div>
    </div>
    </div>
    <div class="container">
        <div class="row egitim-row">
            @foreach(array_slice($articles["Eğitim"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,8) as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div>
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 ">
                            <div class="col-sm-24 h-100">
                                <div class="col-24 education education-md lazy"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="education-title">
                                    <p>{{$article->title}}</p>
                                    <div class="education-text-bottom">
                                        <span>{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
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
