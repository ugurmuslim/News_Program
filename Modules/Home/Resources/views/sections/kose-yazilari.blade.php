<section id="section-kose-yazilari" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-dark">
            <div class="section-title">KÖŞE YAZILARI</div>
            <div class="d-none d-md-block section-right"><a href="https://parafesor.net/kategori/kose-yazilari">Tüm Köşe
                    Yazılarını Gör</a>
            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark"><a
                href="https://parafesor.net/kategori/kose-yazilari">Tüm Köşe Yazılarını Gör</a></div>
    </div>
    <div class="container texts">
        <div class="row">
            @foreach($articles["Köşe Yazıları"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(12) as $article)
                <div class="col-xl-8 col-md-12 article">
                    <a href="{{$article->original_link}}" class="non-decoration">
                        <div class="row">
                            <div class="article-image"
                                 style="background-image: url({{$article->image_path}})"></div>
                            <div class="article-text">
                                <div class="article-text-title">
                                    <p>{{$article->title}}</p>
                                </div>
                                <div class="article-text-body">
                                    <p>{{ $article->summary }}</p>
                                </div>
                                <div class="article-logo-bottom">
{{--                                    <span class="author-date">Ege Cansen | 16 Şub 2022</span>--}}
                                    <img src="{{asset('modules/home/sample/img/newspaper-logos/sozcu.svg')}}" alt="Gateze İsmi">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="show-more-text">
                <a href="#">Daha Fazla Köşe Yazısı Gör
                    <i class="fa fa-angle-down"></i>
                </a>
            </div>
        </div>
    </div>
</section>
