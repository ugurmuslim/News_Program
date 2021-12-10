@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
<section id="section-kose-yazilari" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-dark">
            <div class="section-title">KÖŞE YAZILARI</div>
            <div class="d-none d-md-block section-right">Tüm Köşe Yazılarını Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark">Tüm Köşe Yazılarını Gör</div>

    </div>
    <div class="container">
        <div class="row">
            @foreach($articles["Köşe Yazıları"]->take(12) as $article)
                <div class="col-xl-8 col-md-12 mt-1 article">
                    <a href="{{$article->original_link}}" class="non-decoration">
                        <div class="row">
                            <div class="article-image" style="background-image: url({{$article->image_path}})"></div>
                            <div class="article-text">
                                <div class="article-text-title">{{$article->title}}</div>
                                <div class="article-text-body multilineEllipsis"
                                     multilineEllipsisMax="100">{{ \Illuminate\Support\Str::limit($article->body, 100, $end='...') }}
                                </div>
                                <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
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

    @include('home::partials._javascript')

@endsection
