<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <meta name="description" content="">-->
    <!--    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">-->
    <!--    <meta name="generator" content="Hugo 0.88.1">-->
    <title>Headers · Bootstrap v5.1</title>

    <!--    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">-->
    <!-- Bootstrap core CSS -->
    <link href="{{asset("modules/home/sample/css/bootstrap.css")}}" rel="stylesheet">
    <link href="{{asset("modules/home/sample/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("modules/home/sample/css/color.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
            integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
            async></script>
    <script src="js/font-awesome/all.min.js"></script>
    <!-- Favicons -->
    <!--    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">-->
    <!--    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">-->
    <!--    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">-->
    <!-- Custom styles for this template -->
    <!--    <link href="headers.css" rel="stylesheet">-->
</head>
<body>
<header>

</header>
<section id="section-gundem" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-danger border-danger">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
        <div class="row">
            <div class="col-xl-18">
                <div class="row">
                    <!-- First Big News of the section -->
                    <div class="col-lg-12 mt-2">
                        @if(isset($articles["Gündem"]) && $articles["Gündem"]->take(1))
                            <a href="{{route('article.show',['slug' => $articles["Gündem"][0]->slug ])}}">
                                <div class="card news-card news-card-big ">
                                    <div class="news-card-img-container bg-light-grey">
                                        <img src="{{asset($articles["Gündem"][0]->image_path)}}" alt=""
                                             class="news-img">
                                        <div class="news-card-img-text">{{$articles["Gündem"][0]->title}}
                                        </div>

                                    </div>
                                    <div class="news-card-body">
                                        {{$articles["Gündem"][0]->summary}}
                                    </div>
                                    <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($articles["Gündem"][0]->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($articles["Gündem"][0]->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <!-- First Big News of the section -->

                    <!-- First Big News Slider of the section -->
                    <div class="col-lg-12 mt-2">
                        <div class="card news-card news-card-big">
                            <div class="news-card-slider-container">
                                <div class="news-card-slider-slide">
                                    <div class="news-card-slider-slide-img text-white"
                                         style="background-image: url({{asset("modules/home/sample/img/news/s1s1p1.jpg")}})">
                                        <div class="news-card-slider-slide-caption">Trump'ın damadından çağrı: Yarışı
                                            bırak artık
                                        </div>

                                    </div>
                                </div>
                                <div class="news-card-slider-controls">
                                    <div class="news-card-slider-control">❮
                                    </div>
                                    <div class="news-card-slider-control">❯
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>@foreach($articles["Gündem"]->slice(2)->take(4) as $article)

                    <!-- First Small News of the section -->
                        <div class="col-lg-6 col-sm-12 mt-5">
                            <div class="card news-card news-card-small ">
                                <div class="news-card-img-container bg-light-grey">
                                    <img src="{{$article->image_path}}" alt="" class="news-img">
                                    <div class="news-card-img-text">{{$article->title}}</div>
                                </div>
                                <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                        </div>
                        <!-- First Small News of the section -->
                @endforeach
                    <!-- First Big News Slider of the section -->

                </div>
            </div>

            <div class="d-none d-xl-block col-xl-6">
                <div class="col-24 mt-2 h-100">
                    <div class="card bg-dark-grey h-100" style="border-radius: 5px;">
                        test
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="section-borsa-tube" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-light border-light">
            <div class="section-title">BORSA TUBE</div>
            <div class="section-right">Tüm Borsa Youtube Videolarını Gör</div>
        </div>
        <div class="row text-white">
            <div class="col-lg-14">
                <div class="ratio ratio-16x9 mt-2" id="borsaEmbed">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-10  mt-2">
                <div class="text-danger" style=" height:100%; overflow: hidden">
                    <div matchTo="borsaEmbed" class="match"
                         style="width: 100%; height: 0%; overflow: hidden; overflow-y:auto">
                        <div class="row px-3">
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image:url({{asset("modules/home/sample/img/news/news1.jpg")}})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8 image-cover image-card-bordered"
                     style="background-image: url(/img/news/news1.jpg)">test
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8 image-cover image-card-bordered"
                     style="background-image: url(/img/news/news1.jpg)">test
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8  image-card-bordered image-cover"
                     style="background-image: url({{asset("modules/home/sample/img/news/news1.jpg")}})">test
                </div>
            </div>
        </div>
        <div class="row mt-5 text-white">
            <div class="col-md-24">
                <div style="width:100%; height: 1px; background-color: #CCCCCC; text-align:center; line-height: 0px; ">
                    <span style="color:#f5f5f5;" class="bg-dark-grey px-2">En Çok Okunanlar</span>
                </div>
            </div>
            <div class="col-24 mt-5 mb-2 pt-3" id="most-red">
                <div style="float:left; width:30px;">❮</div>
                <div
                    style="float:left; overflow-y: hidden; overflow-x: auto; text-align:center; width: calc(100% - 60px);margin-top:-25px; padding-bottom:10px; white-space: nowrap">
                    <div class="channel-logo"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="channel-logo"
                         style="background-image:url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                </div>
                <div class="text-end" style="float:right; width:30px;">❯</div>
            </div>
        </div>
    </div>
</section>


<section id="section-twitter-yazileri" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-twitter">
            <div class="section-title">TWITTER YAZILARI</div>
            <div class="section-right">Tüm Twitter Yazılarını Gör</div>
        </div>


        <div class="row mt-3" data-masonry='{"percentPosition": true }'>

            @foreach($articles['Twitter']->take(2) as $article)
                <div class="col-12 col-lg-6 mb-3">
                    <a href="https://twitter.com/redirect/status/" . {{$article->external_site_id}}>
                        <div class="card tweet-card tweet-card-small bg-white">
                            <div class="tweet-top">
                                <div class="tweet-user">
                                    <div class="float-start">
                                        <img class="image-twitter" src="{{$article->externalSourceUser->image}}">
                                    </div>
                                    <div class="float-start ms-2 mt-1">{{$article->externalSourceUser->name}}</div>
                                </div>
                                <div class="tweet-follower text-muted">
                                    <span style="margin-right: 5px;">17B Takipçi</span>
                                    <i class="fab fa-twitter text-twitter icon-twitter"></i>
                                </div>
                            </div>
                            <div class="tweet-body">
                                {{ $article->body }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @if(isset($articles['Twitter'][2]))
                <div class="col-24 col-md-12 mb-3">
                    <a href="https://twitter.com/redirect/status/" . {{$articles['Twitter'][2]->external_site_id}}>
                        <div class="card tweet-card bg-twitter text-white">
                            <div class="tweet-top">
                                <div class="tweet-user tweet-user-large">
                                    <div class="float-start">
                                        <img class="image-twitter image-twitter-large"
                                             src="{{ $articles['Twitter'][2]->externalSourceUser->image }}">
                                    </div>
                                    <div class="float-start ms-2 mt-0">
                                        <div>{{ $articles['Twitter'][2]->externalSourceUser->name }}</div>
                                        <div style="font-size:0.8em; font-weight: normal"> 53B Takipçi</div>
                                    </div>
                                </div>
                                <div class="tweet-follower text-white">
                                    <i class="fab fa-twitter icon-twitter text-white float-end"></i>

                                </div>
                                <div class="tweet-slider-controls">
                                    <div class="tweet-slider-control">❮</div>
                                    <div class="tweet-slider-control">❯</div>
                                </div>
                            </div>
                            <div class="tweet-body text-white">
                                {{ $articles['Twitter'][2]->body }}
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            @foreach($articles['Twitter']->slice(3)->take(10) as $article)
                <div class="col-12 col-lg-6 mb-3">
                    <a href="https://twitter.com/redirect/status/" . {{$article->external_site_id}}>
                        <div class="card tweet-card tweet-card-small bg-white">
                            <div class="tweet-top">
                                <div class="tweet-user">
                                    <div class="float-start">
                                        <img class="image-twitter" src="{{$article->externalSourceUser->image}}">
                                    </div>
                                    <div class="float-start ms-2 mt-1">{{$article->externalSourceUser->name}}</div>
                                </div>
                                <div class="tweet-follower text-muted">
                                    <span style="margin-right: 5px;">17B Takipçi</span>
                                    <i class="fab fa-twitter text-twitter icon-twitter"></i>
                                </div>
                            </div>
                            <div class="tweet-body">
                                {{ $article->body }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="section-sirket-haberleri">
    <div class="container">
        <div class="section-header d-flex text-dark-blue">
            <div class="section-title">ŞİRKET HABERLERİ</div>
            <div class="section-right"></div>
        </div>
        <div class="row mt-3">
            @foreach($articles["Şirket Haberleri"]->take(1) as $article)
                <div class="col-xl-13 mb-5">
                    <div class="card news-card news-card-big ">
                        <div class="news-card-img-container bg-white">
                            <img src="{{asset($article->image_path)}}" style="max-width: 650px; max-height: 365px;"
                                 alt="" class="news-img">
                            <div class="news-card-img-text text-dark-blue">{{$article->title}}
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xl-11">
                <div class="row">
                    @foreach($articles["Şirket Haberleri"]->slice(1)->take(3) as $article)
                        <div class="col-sm-24">
                            <div class="corporate-news-numbers text-dark-blue">1</div>
                            <div class="corporate-news-img">
                                <div class="image-card-16x10 border bg-white"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                            </div>
                            <div class="corporate-news-text">
                                <div class="text-dark-blue fw-bold">
                                    {{$article->title}}
                                </div>
                                <div class="corporate-news-text-bottom">
                               <span
                                   class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
        <div class="row">
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/migros.png")}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section id="section-kose-yazilari" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-dark">
            <div class="section-title">KÖŞE YAZILARI</div>
            <div class="section-right">Tüm Köşe Yazılarını Gör</div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-12 mt-1 article">
                <div class="row">
                    <div class="article-image"
                         style="background-image: url({{asset("modules/home/sample/img/news/portrait1.jpg")}})"></div>
                    <div class="article-text">
                        <div class="article-text-title">Enflasyon Değil Deflasynon Var Koronovirüs Adında Namert</div>
                        <div class="article-text-body">Koronavirüs adında namert bir mikrop, son bir yıl içinde dünya
                            ile birlikte ülkemizdeki insanlara da zorluklar yaşattı ve yaşatıyor. Sadece emeklileri...
                        </div>
                        <div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>
                    </div>
                </div>
            </div>

            <div
                style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.7em; margin-top:30px;">
                Daha Fazla Köşe Yazısı Gör
            </div>
        </div>
    </div>
</section>


<section id="section-borsa-raporlari">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">BORSA RAPORLARI</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-son-dakika">
    <div class="container">
        <div class="section-header d-flex text-red">
            <div class="section-title">SON DAKİKA</div>
            <div class="section-right">Tüm Son Dakika Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-en-cok-okunanlar" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">EN ÇOK OKUNANLAR</div>
            <div class="section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($mostReads as $article)
                <div class="col-12 col-lg-6 mt-3">
                    <div class="most-red">
                        <div class="most-red-image"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="most-red-text">
                            <div class="most-red-index">1</div>
                            {{ $article->title }}
                        </div>
                        <div class="most-red-bottom">
                    <span
                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div
                style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #F5F5F5; color:#F5F5F5; width:auto; padding:10px 35px; font-size:0.7em; margin-top:30px;">
                Daha Fazla Köşe Yazısı Gör
            </div>

        </div>
    </div>
</section>
<section id="section-stil">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-spor">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-teknoloji">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-yasam">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-otomobil" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-netkolik">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-egitim">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-kripto-paralar" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<section id="section-hisse-onerileri">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">GÜNDEM</div>
            <div class="section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>
<footer>

</footer>
<script>


    window.addEventListener('resize', matchAll);

    function matchAll() {
        matchHeight();
    }

    function matchHeight() {
        console.log("matching")
        let matchList = document.getElementsByClassName("match");
        for (let m of matchList) {
            let height = document.getElementById(m.attributes.matchTo.value).offsetHeight;
            console.log(height)
            m.style.height = height + "px";
            console.log(m.style.height)
        }
    }

    matchAll()
</script>

</body>
</html>
