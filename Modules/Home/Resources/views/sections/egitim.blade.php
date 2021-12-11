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
