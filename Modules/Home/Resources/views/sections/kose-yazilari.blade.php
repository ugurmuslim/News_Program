<section id="section-kose-yazilari" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-dark">
            <div class="section-title">KÖŞE YAZILARI</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route('home_article.index', ['type'=> 'kose-yazilari'])}}">Tüm Köşe Yazılarını Gör</a>
            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark"><a
                href="{{route('home_article.index', ['type'=> 'kose-yazilari'])}}">Tüm Köşe Yazılarını Gör</a></div>

    </div>
    <div class="container">
        <div class="row">
            @foreach($articles["Köşe Yazıları"][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(12) as $article)
                <div class="col-xl-8 col-md-12 mt-1 article">
                    <a href="{{$article->original_link}}" class="non-decoration">
                        <div class="row">
                            <div class="article-image"
                                 style="background-image: url({{$article->image_path}})"></div>
                            <div class="article-text">
                                <div class="article-text-title"><p>{{$article->title}}</p></div>
                                <div class="article-text-body">
                                    <p>{{ $article->body }}</p>
                                </div>
                                {{--<div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>--}}
                                <div class="article-logo-bottom"><img
                                        src="{{asset('modules/home/sample/img/newspaper-logos/sozcu.svg')}}" alt=""
                                        style="background-color: red" width="80px;"></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div
                style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px;">
                Daha Fazla Köşe Yazısı Gör
            </div>
        </div>
    </div>
</section>
