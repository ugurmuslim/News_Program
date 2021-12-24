@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
<div id="mainSliderContainer" class="keep-ratio" ratio="0.4167">
    <div id="mainSliderSlides">
        <div class="mainSliderSlideContainer" id="mainSliderLeft"></div>
        <div class="mainSliderSlideContainer" id="mainSliderRight"></div>

    </div>
    <div class="mainSliderLeftArrow" direction="previous"><span class="mainSliderArrowCaption">Önceki</span><div class="row"><i class="fas fa-arrow-left" style="font-size: 2em;"></i></div></div>
    <div class="mainSliderRightArrow" direction="next"><span class="mainSliderArrowCaption">Sonraki</span><div class="row"><i class="fas fa-arrow-right" style="font-size: 2em;"></i></div></div>
    <div id="mainSliderCover">

    </div>
</div>
<section id="section-gundem" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-danger border-danger">
            <div class="section-title">GÜNDEM</div>
            <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-danger">Tüm Gündem Haberlerini Gör</div>

        <div class="row">
            <div class="col-xl-18">
                <div class="row">
                    <!-- First Big News of the section -->
                    <div class="col-lg-12 mt-2">
                        <div class="card news-card news-card-big ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset('modules/home/sample/img/news/s1n1.webp')}})" alt="" class="news-img"></div>

                                <div class="news-card-img-text">Polat Enerji'nin Tamamının Satışı İçin
                                    Ortaklar Barclays'i Yetkilendirdi
                                </div>

                            </div>
                            <div class="news-card-body">
                                Türkiye'nin en büyük rüzgar enerjisi üreticilerinden Polat Enerji'nin tamamının satışı
                                için
                                ortaklar yatımı bankası Barclays'i yetkilendirdi. Türkiye'nin en büyük rüzgar enerjisi
                                üreticilerinden Polat Enerji'nin tamamının satışı için ortaklar
                            </div>
                            <div class="news-card-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>
                    </div>
                    <!-- First Big News of the section -->

                    <!-- First Big News Slider of the section -->
                    <div class="col-lg-12 mt-2">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0">
                            <div class="redFilterOverlay"></div>
                            <div class="news-card-slider-container">
                                <div class="news-card-slider-slide">

                                    <div class="news-card-slider-slide-img "
                                         style="background-image: url({{asset('modules/home/sample/img/news/s1s1p1.jpg')}})">
                                        <div class="news-card-slider-slide-caption text-white">Trump'ın damadından
                                            çağrı: Yarışı
                                            bırak artık
                                        </div>
                                    </div>
                                </div>
                                <div class="news-card-slider-slide">
                                    <div class="news-card-slider-slide-caption text-white">Mişa'nın damadından çağrı:
                                        Yarışı
                                        bırak artık
                                    </div>
                                    <div class="news-card-slider-slide-img "
                                         style="background-image: url(asset('modules/home/sample/img/news/s1n2.jpg')">

                                    </div>
                                </div>
                                <div class="news-card-slider-slide">
                                    <div class="news-card-slider-slide-caption text-white">Paşa'nın damadından çağrı:
                                        Yarışı
                                        bırak artık
                                    </div>
                                    <div class="news-card-slider-slide-img "
                                         style="background-image: url({{asset('modules/home/sample/img/news/s1n5.jpg')}})">

                                    </div>
                                </div>
                            </div>
                            <div class="news-card-slider-controls">
                                <div class="news-card-slider-control" direction="previous">❮</div>
                                <div class="news-card-slider-control" direction="next">❯</div>
                            </div>
                        </div>
                    </div>
                    <!-- First Big News Slider of the section -->

                    <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset('modules/home/sample/img/news/s1n5.jpg')}})" alt="" class="news-img"></div>
                                <div class="news-card-img-text">İsrail Suriye'deki İran Üssünü Vurdu</div>
                            </div>
                            <div class="news-card-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>
                    </div>
                    <!-- First Small News of the section -->

                    <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset('modules/home/sample/img/news/s1n3.jpg')}})" alt="" class="news-img"></div>
                                <div class="news-card-img-text">2021 Elektrik Fiyatları Belli Oldu Yeni Zam Oranları
                                </div>
                            </div>
                            <div class="news-card-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>
                    </div>
                    <!-- First Small News of the section -->

                    <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset('modules/home/sample/img/news/s1n3.jpg')}})" alt="" class="news-img"></div>
                                <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                            </div>
                            <div class="news-card-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>
                    </div>
                    <!-- First Small News of the section -->

                    <!-- First Small News of the section -->
                    <div class="col-lg-6 col-sm-12 mt-5">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset('modules/home/sample/img/news/s1n5.jpg')}})" alt="" class="news-img"></div>
                                <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                            </div>
                            <div class="news-card-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>
                    </div>
                    <!-- First Small News of the section -->

                </div>
            </div>

            <div class="d-none d-xl-block col-xl-6">
                <div class="col-24 mt-2 h-100">
                    <div class="card bg-dark-grey h-100" style="border-radius: 5px;">
                        <ul class="list-group list-group-flush">
                            <div style="background-color: #444444; padding: 5px; display: block">
                                <span style="margin-left:2%;color: white; font-size: 13px;">Kurlar</span>
                            </div>
                            @foreach($currencies['Fiat'] as $fiat)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12">
                                            {{$fiat->currency}}
                                        </div>
                                        <div class="col-6">
                                            <span
                                                style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->buying, 4, $end='') }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span style="{{$fiat->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($fiat->change, 5, $end='') }}%</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <div style="background-color: #444444; padding: 5px; display: block">
                                <span style="margin-left:2%;color: white; font-size: 13px;">Kripto Paralar</span>
                            </div>
                            @foreach($currencies['Crypto'] as $crypto)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12">
                                            {{$crypto->currency}}
                                        </div>
                                        <div class="col-6">
                                            <span
                                                style="{{$crypto->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($crypto->buying, 4, $end='') }}</span>
                                        </div>
                                        <div class="col-6">
                                            <span style="{{$crypto->change > 0 ? "color:green" : "color:red"}}">{{ \Illuminate\Support\Str::limit($crypto->change, 5, $end='') }}%</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
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
            <div class="d-none d-md-block section-right">Tüm Borsa Youtube Videolarını Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm">Tüm Borsa Youtube Videolarını Gör</div>

        <div class="row text-white">

            <div class="col-lg-14">
                <div class="ratio ratio-16x9 mt-2" id="borsaEmbed">
                    <div class="image-card image-card-bw-16x10"
                         style="background-image: url({{asset('modules/home/sample/img/news1/tv/a.png')}})"></div>
         {{--           <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>--}}
                </div>
            </div>
            <div class="col-lg-10  mt-2">
                <div class="text-danger" style=" height:100%; overflow: hidden">
                    <div matchTo="borsaEmbed" class="match"
                         style="width: 100%; height: 0%; overflow: hidden; overflow-y:auto">
                        <div class="row px-3">
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/a.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/b.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/c.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/d.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/e.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/f.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/h.png')}})"></div>
                            </div>
                            <div class="image-card-container">
                                <div class="image-card image-card-bw-16x10"
                                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/i.png')}})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8 image-cover image-card-bordered"
                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/i.png')}})">test
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8 image-cover image-card-bordered"
                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/ab.png')}})">test
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="image-card image-card-16x8  image-card-bordered image-cover"
                     style="background-image: url({{asset('modules/home/sample/img/news1/tv/ac.png')}})">test
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
                <div style="float:left; overflow-y: hidden; overflow-x: auto; text-align:center; width: calc(100% - 60px);margin-top:-25px; padding-bottom:10px; white-space: nowrap">
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news/portrait1.jpg')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-hbrglobal-Ab.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-apara-01.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-apara-A.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-blomberg-Ab.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-cnn-01.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/logo-ekoturk-Ab.png')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/y-kanal-1.jpg')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/y-kanal-1.jpg')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/y-kanal-3.jpg')}})"></div>
                    <div class="channel-logo" style="background-image: url({{asset('modules/home/sample/img/news1/tv/y-kanal-4.jpg')}})"></div>
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
            <div class="d-none d-md-block section-right">Tüm Twitter Yazılarını Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-info">Tüm Twitter Yazılarını Gör</div>


        <div class="row" data-masonry='{"percentPosition": true }'>

            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/479236154911232001/l0t8qh0i_400x400.jpeg">
                            </div>
                            <div class="float-start ms-2 mt-1">Şant Manukyan</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Piyasayı çok etkilemesini beklemem ama tabii ki Powell'ın konuşması önemli. Unutmayın ki henüz ataması yapılmış değil. Yani faizler konusunda net bir şey söylemesi zor ihtimal.
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1118084403291414528/GF-9hNSs_400x400.png">
                            </div>
                            <div class="float-start ms-2 mt-1">Taner Ozarslan</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Yaşam, aldığımız nefes sayısıyla değil, nefesimizi kesen anların sayısıyla ölçülür. George Carlin/ Zaman Paradoksu

                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 mb-3">
                <div class="card tweet-card bg-twitter text-white">
                    <div class="tweet-top">
                        <div class="tweet-user tweet-user-large">
                            <div class="float-start">
                                <img class="image-twitter image-twitter-large" src="https://pbs.twimg.com/profile_images/1118084403291414528/GF-9hNSs_400x400.png">
                            </div>
                            <div class="float-start ms-2 mt-0">
                                <div>Taner Ozarslan</div>
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
                        En çok üzüldüğüm şey kötü olanı hemen unutuyor olmamiz. Blr ay veya en geç bir yıl sonra yanan ağaçları, ölen canlıları, kahraman şehitleri unutacağız.

                        Yine önem vermeyip hiçbir şey  olmamış gibi yaşayacağız. Ta ki bir sonraki yangına kadar.

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="{{asset('modules/home/sample/img/news/s1n2.jpg')}}">
                            </div>
                            <div class="float-start ms-2 mt-1">Üzeyir Doğan</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Hisse Srounlarına pazartesi ve çarşamba günleri Youtube hesabından dilim döndüğünce aklım yettiğince cevap vermeye çalışıyorum

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/967915967094308864/GbOapiS6_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Emrah Altindis</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Cok ovdukleri Sehir Hastaneleri de birer vurgun kaynagi... Demin cok yakin bir arkadasim bu vurgun duzenini "yamyamlik" olarak ifade etti, gercekten hem de bu kez insan sagligini kullanarak yamyamlik...
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1365073890045808648/22yERgga_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Dr Barış Esen</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        “Vitaminli Ekonomiks” çıktı...Heyecanımız büyük.. Smiling face with smiling eyes Editörlüğünü yaptığım Ege Cansen ve Asaf Savaş Akat’ın yeni kitabına online dahil kitapçılardan ulaşabilirsiniz..
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/2076899625/322546_10150338266376288_529026287_8628759_81997148_o_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Atilla Yeşilada</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Güldem Atabay  hiper-enflasyon yolculuğumuzu yazdı

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1388215508793704462/fQS1SaUG_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Tuncay turşucu</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Yeni videomu yayına aldım. Bugün Youtube da video işleme süresi çok uzun sürdü. Nerdeyse 2 saattir yükleme ve işleme sürdü. Hatta HD sürüm işleme halen sürüyor ama ben bekleyemedim artık. Fed videodaki beklentime paralel hareket etti.

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1298249714039697408/YvLXMuHO_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Test User</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        30 Ağustos Zafer Bayramı'mız Kutlu Olsun. Bugünün benim için artık bir anlamı daha var. Oğlum Kemal Bora Özer bu anlamlı günde aramıza katıldı ☺️. Tüm insanlığa ve ülkesine hayırlı bir evlat olmasını dilerim. Sağlıkla, huzurla yaşa canım oğlum.
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1370837932291022850/L4lWQTOe_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Dr Artunç Kocabalkan</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        Hisse senedi piyasalarında  bugün psikoloji alınıp satılıyor. Ekonomik temeli olmayan aşırı para dan kaynaklanan bir balon bu. Bu psikolojik savaşı kazanan zamanında hissesini satanlar olacak. Unutmayın hayatta çıkış yani satış stratejisi olmayan hiçbir yatırım zarardan kaçamaz!

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card tweet-card tweet-card-small bg-white">
                    <div class="tweet-top">
                        <div class="tweet-user">
                            <div class="float-start">
                                <img class="image-twitter" src="https://pbs.twimg.com/profile_images/1266145266899521537/QXFpZHV0_400x400.jpg">
                            </div>
                            <div class="float-start ms-2 mt-1">Cüneyt Paksoy</div>
                        </div>
                        <div class="tweet-follower text-muted">
                            <span style="margin-right: 5px;">17B Takipçi</span>
                            <i class="fab fa-twitter text-twitter icon-twitter"></i>
                        </div>
                    </div>
                    <div class="tweet-body">
                        AA Finans'ta Finans Analisti olarak piyasa değerlendirmelerimizi paylaşacağız.Bu benim için mutluluk verici bir proje.Desteklerini esirgemeyen bütün değerli dost ve izleyenlere teşekkürler
                        Stratejist Cüneyt Paksoy piyasa değerlendirmeleri ile AA Finans'ta
                    </div>
                </div>
            </div>

        </div>
        <div
            style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px; text-align:center;">
            Daha Fazla Twitter Yazısı Gör
        </div>
    </div>
</section>

<section id="section-sirket-haberleri">
    <div class="container">
        <div class="section-header d-flex text-dark-blue">
            <div class="section-title">ŞİRKET HABERLERİ</div>
            <div class="d-none d-md-block section-right">Tüm Şirket Haberlerini Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark-blue">Tüm Şirket Haberlerini Gör</div>

        <div class="row mt-3">
            <div class="col-xl-13 mb-5">
                <div class="card news-card news-card-big ">
                    <div class="news-card-img-container bg-white">
                        <div style="background-image: url({{asset('modules/home/sample/img/news/s1n1.webp')}})" alt="" class="news-img"></div>
                        <div class="news-card-img-text text-dark-blue">Polat Enerji'nin Tamamının Satışı İçin
                            Ortaklar Barclays'i Yetkilendirdi
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-11">
                <div class="row">
                    <div class="col-sm-24">
                        <div class="corporate-news-numbers text-dark-blue">1</div>
                        <div class="corporate-news-img">
                            <div class="image-card-16x10 border bg-white"
                                 style="background-image: url(https://logowik.com/content/uploads/images/316_siemens.jpg)"></div>
                        </div>
                        <div class="corporate-news-text ">
                            <div class="text-dark-blue fw-bold">
                                Siemens Gamesa, İzmir'de rüzgar türbini Ar-Ge merkezi kurdu. Dünyadaki 6 Ar-Ge
                                merkezinden biri
                            </div>
                            <div class="corporate-news-text-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-24 mt-3">
                        <div class="corporate-news-numbers text-dark-blue">2</div>
                        <div class="corporate-news-img ">
                            <div class="image-card-16x10 border bg-white "
                                 style="background-image: url(https://www.duycom.com/wp-content/uploads/2019/05/arcelik-logo-cw-cw.jpg)"></div>
                        </div>
                        <div class="corporate-news-text">
                            <div class="text-dark-blue fw-bold">
                                Türkiye'nin en büyük rüzgar enerjisi üreticilerinden Polat Enerji'nin tamamının satışı
                            </div>
                            <div class="corporate-news-text-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-24 mt-3">
                        <div class="corporate-news-numbers text-dark-blue">3</div>
                        <div class="corporate-news-img">
                            <div class="image-card-16x10 border bg-white"
                                 style="background-image: url(https://logowik.com/content/uploads/images/jp-morgan9803.jpg)"></div>
                        </div>
                        <div class="corporate-news-text">
                            <div class="text-dark-blue fw-bold">
                                Türkiye'nin en büyük rüzgar enerjisi üreticilerinden Polat Enerji'nin tamamının satışı
                            </div>
                            <div class="corporate-news-text-bottom">
                                <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
        <div class="row">
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url(https://logowik.com/content/uploads/images/719_yapikredibankasi.jpg)"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url({{asset('modules/home/sample/img/news/migros.png')}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url(https://searchvectorlogo.com/wp-content/uploads/2020/09/sabanci-holding-logo-vector.png)"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url(https://www.duycom.com/wp-content/uploads/2019/05/arcelik-logo-cw-cw.jpg)"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url(https://s.turkcell.com.tr/SiteAssets/Hakkimizda/genel-bakis/logolarimiz/TURKCELL_YATAY_ERKEK_LOGO.jpg)"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url({{asset('modules/home/sample/img/news1/sirket-logolar/-Ihalesinin-1-Oturumun-9-Martta-Yaplaca-Akland-468204.jpg')}})"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url(https://imaj.emlakjet.com/proje/resize/640/480/v1622922829/naal07qto4hcfxssoopi.jpg)"></div>
                    <div class="company-text">
                        Şirketin net karı 2020 yılı genelinde ise yıllık yüzde 58 artışla 29.2 milyar dolara çıktı.
                        Haberin devam metni gelecek kısımlarda. 2021 haberleri Migros tanıtım sayfası...
                    </div>
                    <div class="company-bottom">
                        <span class="text-danger">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="company-image" style="background-image: url({{asset('modules/home/sample/img/news1/sirket-logolar/-Ihalesinin-1-Oturumun-9-Martta-Yaplaca-Akland-468204.jpg')}})"></div>
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
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index', ['type'=> 'Köşe Yazıları'])}}">Tüm Köşe Yazılarını Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark"><a
                    href="{{route('home_article.index', ['type'=> 'Köşe Yazıları'])}}">Tüm Köşe Yazılarını Gör</a></div>

        </div>
        <div class="container">
            <div class="row">
                @foreach($articles["Köşe Yazıları"]["Normal"]->take(12) as $article)
                    <div class="col-xl-8 col-md-12 mt-1 article">
                        <a href="{{$article->original_link}}" class="non-decoration">
                            <div class="row">
                                <div class="article-image"
                                     style="background-image: url({{$article->image_path}})"></div>
                                <div class="article-text">
                                    <div class="article-text-title">{{$article->title}}</div>
                                    <div class="article-text-body multilineEllipsis"
                                         multilineEllipsisMax="100">{{ \Illuminate\Support\Str::limit($article->body, 100, $end='...') }}
                                    </div>
                                    {{--<div class="article-text-bottom">Ege Cansen | 16 Şubat 2021</div>--}}
                                    <div class="article-logo-bottom" ><img src="{{asset('modules/home/sample/img/newspaper-logos/sozcu.svg')}}" alt="" style="background-color: red" width="80px;"></div>
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

{{--<section id="section-borsa-raporlari">
    <div class="container">
        <div class="section-header d-flex">
            <div class="section-title">BORSA RAPORLARI</div>
            <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
        </div>
    </div>
</section>--}}


    <section id="section-son-dakika">
        <div class="container">
            <div class="section-header d-flex text-red">
                <div class="section-title">SON DAKİKA</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Son Dakika'])}}">Tüm Son Dakika Haberlerini Gör
                    </a></div>

            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-red"><a
                href="{{route('home_article.index',['type' => 'Son Dakika'])}}">Tüm Son Dakika Haberlerini Gör</a></div>

        </div>
        <div class="container mt-4">
            <div class="row" style="position: relative">
                {{--@if(isset($articles["Son Dakika"]) && $articles["Son Dakika"]->take(1))
                    <div class="d-sm-block d-lg-none col-md-24  mt-1">
                        <div class="col-24 last-min last-min-lg"
                             style="background-image: url({{asset($articles["Son Dakika"][0]->image_path)}})">
                            <div class="redOverlay0">
                                <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                            class="far fa-clock"></i> 16:39</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif--}}

                @foreach($articles["Son Dakika"]["Normal"]->take(1) as $article)
                    <div class="col-lg-7 col-md-12 mt-1">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-md"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                            class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                                </div>
                            </div>
                            <div class="last-min-title ">{{$article->title}}
                                <div class="d-sm-block d-md-none last-min-text-bottom-sm">
                            <span
                                class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                            <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach($articles["Son Dakika"]["Normal"]->slice(1)->take(1) as $article)
                    <div class="d-none d-lg-block col-lg-10  mt-1">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-lg"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="redOverlay0">

                                    <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                                class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                                    </div>
                                    <div class="last-min-caption">{{$article->title}}
                                        <div class="last-min-bottom-sm">

                                            <span class="text-white">{{ Date::parse($article->created_at)->format('j F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                @foreach($articles["Son Dakika"]["Normal"]->slice(2)->take(1) as $article)
                    <div class="col-lg-7 col-md-12 mt-1">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 last-min last-min-md"
                                 style="background-image: url({{asset($article->image_path)}})">
                                <div class="last-min-sm-top"><span class="px-2 text-white" style="z-index: 999"><i
                                            class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                                </div>
                            </div>
                            <div class="last-min-title">{{$article->title}}
                                <div class="d-sm-block d-md-none last-min-text-bottom-sm">
                            <span
                                class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                            <div class="d-none d-md-block last-min-text-bottom">
                        <span
                            class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <hr class="mt-4">
            <div class="last-min-slider" data-simplebar>
                @foreach($articles["Son Dakika"]["Normal"]->slice(2)->take(5) as $article)
                    <div class="last-min-sm d-inline-block" style="position:relative">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="last-min-sm-top"><span class="px-2 bg-white" style="z-index: 999"><i
                                        class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->created_at)->format('H:d')}}</span>
                                <div class="last-min-top-line"></div>
                            </div>
                            <div class="col-24 last-min-sm-img"
                                 style="background-image: url({{asset($article->image_path)}})">
                            </div>
                            <div class="last-min-sm-title">{{$article->title}}</div>
                            <div class="last-min-text-bottom">
                            <span
                                class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span>  {{Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

<section id="section-en-cok-okunanlar" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">EN ÇOK OKUNANLAR</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://iatkv.tmgrup.com.tr/876035/600/314/0/0/1200/628?u=https%3A%2F%2Fitkv.tmgrup.com.tr%2F2021%2F04%2F14%2Fucak-bileti-olan-yolcular-yasaktan-muaf-mi-seyahat-izin-belgesi-nasil-alinir-1618384131987.jpg)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">1</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://img.fanatik.com.tr/img/78/740x418/61822fb8ae298bc2d4f4a75a.jpg)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">2</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://phantom-marca.unidadeditorial.es/6da2fe66156684ffbce1174c65352c38/resize/1320/f/jpg/assets/multimedia/imagenes/2021/07/03/16253040938558.jpg)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">3</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://www.indyturk.com/sites/default/files/styles/1368x911/public/article/main_image/2021/10/08/771271-1507124059.jpg?itok=uff1Ya2p)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">4</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://teknosafari.net/wp-content/uploads/2021/01/facebook-temsilci.jpg)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">5</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url({{asset('modules/home/sample/img/news1/grammy-odulleri.png')}})"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">6</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url(https://iaftm.tmgrup.com.tr/412dc3/385/218/0/86/2048/1247?u=https://iftm.tmgrup.com.tr/2021/09/30/fenerbahce-olympiakos-maci-saat-kacta-hangi-kanalda-canli-yayinlacanak-fb-maci-canli-fenerbahce-olympiakos-maci-11leri-1633020132127.jpg)"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">7</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">

                <div class="most-red">
                    <div class="most-red-image" style="background-image: url({{asset('modules/home/sample/img/news/s1n1.webp')}})"></div>
                    <div class="most-red-text">
                        <div class="most-red-index">8</div>
                        Aksigorta'dan yüzde 100 oranında kar payı haberi
                    </div>
                    <div class="most-red-bottom">
                        <span>23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>

            <div style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #F5F5F5; color:#F5F5F5; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px;">
                Tümünü Gör
            </div>

        </div>
    </div>
</section>
<section id="section-stil" style="background-color: #ffead5;padding-top: 20px; padding-bottom: 15px;">

    <div style="font-family: MillerTextItalic; font-size:56px; padding-left:100px; font-weight: bold">Stil</div>
</section>

<section id="section-spor">
    <div class="container">
        <div class="section-header d-flex text-primary">
            <div class="section-title">SPOR</div>
            <div class="d-none d-md-block section-right">Tüm Son Dakika Haberlerini Gör</div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-red">Tüm Son Dakika Haberlerini Gör</div>
    </div>
    <div class="container">
        <div class="row" style="position: relative">
            <div class="col-lg-10 col-md-24 mt-1">
                <div class="card news-card news-card-big match " matchTo="sport-first-row-anchor">
                    <div class="news-card-slider-container">
                        <div class="news-card-slider-slide">
                            <div class="sport-card-slider-slide-img text-white"
                                 style="background-image: url(https://cdn.sporx.com/img/59/2021/20210805_2_49495353_67675352.jpg)">
                                <div class="blueOverlay90"></div>

                                <div class="sport-card-slider-slide-caption">Kadro değeri 14 milyon euroyu aşan
                                    takımların mücadelesi
                                    <div class=" sport-text-bottom-sm">

                                        <span class="text-white">23 Ocak • 14:35 • parafesor</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="news-card-slider-controls">
                            <div class="news-card-slider-control" direction="previous">❮</div>
                            <div class="news-card-slider-control" direction="next">❯</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mt-1" id="sport-first-row-anchor">
                <div class="col-24 sport sport-md" style="background-image: url(https://img.fanatik.com.tr/img/78/740x418/61822fb8ae298bc2d4f4a75a.jpg)"></div>
                <div class="sport-title">
                    <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan KMaliye
                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                    </div>
                    <div class="card-bottom-date">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mt-1">
                <div class="col-24 sport sport-md" style="background-image: url(https://iaftm.tmgrup.com.tr/412dc3/385/218/0/86/2048/1247?u=https://iftm.tmgrup.com.tr/2021/09/30/fenerbahce-olympiakos-maci-saat-kacta-hangi-kanalda-canli-yayinlacanak-fb-maci-canli-fenerbahce-olympiakos-maci-11leri-1633020132127.jpg)"></div>
                <div class="sport-title">
                    <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan KMaliye
                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                    </div>
                    <div class="card-bottom-date">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>

            </div>
        </div>
  {{--      <div class="row mt-3">
            <div class="col-lg-6 mt-3">
                <div class="card sport-paper-card">
                    <div class="card-body">Fb</div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="card sport-paper-card">
                    <div class="card-body">Fb</div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="card sport-paper-card">
                    <div class="card-body">Fb</div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="card sport-paper-card">
                    <div class="card-body">Fb</div>
                </div>
            </div>
        </div>
--}}
        <div class="row mt-3">
            <div class="col-sm-12 col-md-8 col-lg-percent-20">
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container bg-white">
                        <div style="background: url(https://media.fenerbahce.org/getmedia/51365518-1a84-4aeb-b353-7d6ab18b21a0/fbbekogaziantepkpk.jpg?width=1200&height=675&ext=.jpg?width=780&height=439)" alt="" class="news-img"></div>
                        <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-percent-20">
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container bg-white">
                        <div style="background: url(https://cdnuploads.aa.com.tr/uploads/Contents/2021/10/19/thumbs_b_c_6cf97cc1fbc8ccf68055e253815e5b01.jpg?v=222701)" alt="" class="news-img"></div>
                        <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8  col-lg-percent-20">
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container bg-white">
                        <div style="background: url(https://iaftm.tmgrup.com.tr/3dee47/385/218/0/58/750/483?u=https://iftm.tmgrup.com.tr/2021/11/03/besiktas-trabzonspor-canli-izle-besiktas-trabzonspor-maci-ne-zaman-besiktas-trabzonspor-derbisi-hangi-kanalda-canli-yayinlanacak-derbi-saat-kacta-1635947429861.jpeg)" alt="" class="news-img"></div>
                        <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-percent-20">
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container bg-white">
                        <div style="background: url(https://phantom-marca.unidadeditorial.es/6da2fe66156684ffbce1174c65352c38/resize/1320/f/jpg/assets/multimedia/imagenes/2021/07/03/16253040938558.jpg)" alt="" class="news-img"></div>
                        <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8  col-lg-percent-20">
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container bg-white">
                        <div style="background: url(https://gmedia.playstation.com/is/image/SIEPDC/nba-2k22-screenshot-04-ps4-ps5-en-22july21?$native$)" alt="" class="news-img"></div>
                        <div class="news-card-img-text">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-light-blue">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-teknoloji">
    <div class="container">
        <div class="section-header d-flex text-purple">
            <div class="section-title">TEKNOLOJİ</div>
            <div class="d-none d-md-block section-right">Tüm Teknoloji Haberlerini Gör</div>
        </div>
    </div>
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-5">
                <div class="card news-card news-card-small ">
                    <div class="news-card-img-container">
                        <div style="background: url(https://trthaberstatic.cdn.wp.trt.com.tr/resimler/1510000/twitter-reuters-1510721_2.jpg)" alt="" class="news-img"></div>
                        <div class="news-card-img-text bg-light-grey">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container ">
                        <div style="background: url(https://teknosafari.net/wp-content/uploads/2021/01/facebook-temsilci.jpg)" alt="" class="news-img"></div>
                        <div class="news-card-img-text bg-light-grey">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
                <div class="card news-card news-card-small mt-4 ">
                    <div class="news-card-img-container">
                        <div style="background: url(https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/GE3GCEBRW4I6ZABWPWZFLP7ROY.jpg)" alt="" class="news-img"></div>
                        <div class="news-card-img-text bg-light-grey">2050'de Dünyaya Hükmedecek Ülkeler Belli Oldu!</div>
                    </div>
                    <div class="news-card-bottom">
                        <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>
            </div>
            <div class="col-md-19">
                <div class="row">
                    <div class="col-lg-18 col-md-24 mt-1 match" matchTo="tech-second-row-anchor">
                        <div class="card news-card news-card-big cardSlider" currentSlide="0">
                            <div class=""></div>
                            <div class="news-card-slider-container">
                                <div class="news-card-slider-slide">
                                    <div class="tech-card-slider-slide-img text-white"
                                         style="background-image: url(https://www.indyturk.com/sites/default/files/styles/1368x911/public/article/main_image/2021/10/08/771271-1507124059.jpg?itok=uff1Ya2p)">
                                        <div class="tech-card-slider-slide-caption"><span class="highlighted bg-purple">Piyasa değeri çokçok milyon euroyu aşan
                                            takımların mücadelesi</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="news-card-slider-slide">
                                    <div class="tech-card-slider-slide-img text-white"
                                         style="background-image: url({{asset('modules/home/sample/img/news/s1n3.jpg')}})">
                                        <div class="tech-card-slider-slide-caption"><span class="highlighted bg-purple">Kadro değeri 14 milyon euroyu aşan
                                            takımların mücadelesi</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="news-card-slider-controls tech-slider-controls">
                                <div class="news-card-slider-control" direction="previous">❮</div>
                                <div class="news-card-slider-control" direction="next">❯</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                        <div class="col-md-24 bg-purple h-100 tech-box">
                            <div class="tech-news-box-image" style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                            <div class="tech-news-box-caption">
                            Bitcoin, Etherium ve Altcoin'lerde son durum ne? 25 Mart 2021 BTC, ETH ve XRP kaç Dolar/TL oldu?
                                <div class="tech-text-bottom-sm text-white">
                                    <span class="">23 Ocak</span><span> • 14:35 • parafesor</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-4 mt-2">

                    <div class="col-sm-24 col-md-12 col-lg-8 mt-3" id="tech-second-row-anchor">
                        <div class="col-24 tech tech-md" style="background-image: url(https://cdnuploads.aa.com.tr/uploads/Contents/2021/10/28/thumbs_b_c_a1693caea49a038614b185774617bead.jpg?v=144147)"></div>
                        <div class="tech-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                            <div class="tech-text-bottom-sm">
                                <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-24 col-md-12 col-lg-8 mt-3">
                        <div class="col-24 tech tech-md" style="background-image: url(https://iatkv.tmgrup.com.tr/876035/600/314/0/0/1200/628?u=https%3A%2F%2Fitkv.tmgrup.com.tr%2F2021%2F04%2F14%2Fucak-bileti-olan-yolcular-yasaktan-muaf-mi-seyahat-izin-belgesi-nasil-alinir-1618384131987.jpg)"></div>
                        <div class="tech-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                            <div class="tech-text-bottom-sm">
                                <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-24 col-md-12 col-lg-8 mt-3">
                        <div class="col-24 tech tech-md" style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                        <div class="tech-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                            <div class="tech-text-bottom-sm">
                                <span class="text-purple">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section id="section-yasam">
    <div class="container">
        <div class="section-header d-flex text-orange">
            <div class="section-title">YAŞAM</div>
            <div class="d-none d-md-block section-right">Tüm Yaşam Haberlerini Gör</div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-14 mt-3">
                <div class="card news-card news-card-big keep-ratio cardSlider" currentSlide="0" ratio="0.5"
                     id="life-slider">
                    <div class="yellowOverlay0"></div>
                    <div class="news-card-slider-container">
                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img "
                                 style="background-image: url(https://4sdh5ekllrln.merlincdn.net/wp-content/uploads/2020/05/corona-downloaded-pixabay-1280x430.jpg)">
                                <div class="life-card-slider-slide-caption text-black">2021 Grammy Ödülleri Coronavirus Salgını Sebebiyle Ertelendi. Lorem Ipsum
                                </div>
                            </div>
                        </div>

                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img "
                                 style="background-image: url(({{asset('modules/home/sample/img/news1/pexels-photo-2817318.jpg')}}))">
                                <div class="life-card-slider-slide-caption text-black">Kadro değeri 33 milyon euroyu
                                    aşan
                                    takımların mücadelesi
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="news-card-slider-controls life-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 match mt-3" matchTo="life-slider">
                <div class="col-md-24  match " matchTo="life-slider">

                    <div class="col-md-24 bg-white  h-100 tech-box">
                            <div class="tech-news-box-image "
                                 style="background-image: url(https://i.ytimg.com/vi/PkkV1vLHUvQ/maxresdefault.jpg)"></div>
                            <div class="life-news-box-caption">
                                    Lorem f fdsfdsfdasd
                                <div class="life-text-bottom-sm ">
                                    <span class="">2021 • parafesor</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-5 match mt-3" matchTo="life-slider">
                <div class="col-md-24  match " matchTo="life-slider">
                    <div class="col-md-24 bg-white  h-100 tech-box">
                        <div class="tech-news-box-image "
                             style="background-image: url(https://i.ytimg.com/vi/PkkV1vLHUvQ/maxresdefault.jpg)"></div>
                        <div class="life-news-box-caption">
                            Lorem f fdsfdsfdasd
                            <div class="life-text-bottom-sm ">
                                <span class=""> • parafesor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  {{--      <div class="row mt-3">
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
            <div class="col-4 col-md-2 mt-3">
                <div class="life-starsign-icon keep-ratio" ratio="1"></div>
            </div>
        </div>--}}
        <div class="row mb-4 mt-2">

            <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                <div class="col-24 life life-md" style="background-image: url(https://fdn.gsmarena.com/imgroot/news/20/10/netflix-india-free-weekend/-1200/gsmarena_001.jpg)"></div>
                <div class="life-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                    <div class="life-text-bottom-sm">
                        <span class="text-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>

            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3 ">
                <div class="col-24 life life-md" style="background-image: url(https://im.haberturk.com/2021/10/11/ver1633944874/3217819_810x458.jpg)"></div>
                <div class="life-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                    <div class="life-text-bottom-sm">
                        <span class="text-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>

            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3 h-100">
                <div class="col-24 life life-md" style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                <div class="life-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                    <div class="life-text-bottom-sm">
                        <span class="text-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>

            </div>
            <div class="col-sm-24 col-md-12 col-lg-6 mt-3 ">
                <div class="col-24 life life-md" style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                <div class="life-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı bilmiyor
                    <div class="life-text-bottom-sm">
                        <span class="text-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>


<section id="section-otomobil" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">OTOMOBİL</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-15 h-100">
                <div class="card news-card news-card-big keep-ratio mb-sm-5 cardSlider" currentSlide="0" ratio="0.55"
                     id="auto-slider"
                     style="min-height: 440px">
                    <div class=""></div>
                    <div class="news-card-slider-container">
                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img text-white"
                                 style="background-image: url(https://cdn.motor1.com/images/mgl/vEJmQ/s1/bmw-i8-m-rendering.jpg)">
                                <div class="automobile-card-slider-slide-caption"><span class="highlighted bg-dark">Otomobil Devleri Malzeme Yetersizliğinden Üretimlerini Durdurdu</span></div>
                            </div>
                        </div>
                        <div class="news-card-slider-slide">
                            <div class="automobile-card-slider-slide-img text-white"
                                 style="background-image: url(https://cdn.motor1.com/images/mgl/vEJmQ/s1/bmw-i8-m-rendering.jpg)">
                                <div class="automobile-card-slider-slide-caption"><span class="highlighted bg-dark">Kadro değeri 55 milyon euroyu aşan
                                    takımların mücadelesi</span>
                                </div>
                            </div>
                        </div>
                        <div class="news-card-slider-slide">
                            <div class="automobile-card-slider-slide-img text-white"
                                 style="background-image: url(https://cdn.motor1.com/images/mgl/vEJmQ/s1/bmw-i8-m-rendering.jpg)">
                                <div class="automobile-card-slider-slide-caption"><span class="highlighted bg-dark">Kadro değeri 14 milyon doları aşan
                                    takımların mücadelesi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-card-slider-controls automobile-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="col-24 bg-dark">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 automobile automobile-md"
                             style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/1/13/2019_BMW_740d_xDrive_M_Sport_Automatic_3.0_Front.jpg)"></div>
                        <div class="automobile-title">
                            <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan KMaliye
                                Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan
                                KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                            </div>
                            <div class="automobile-text-bottom">
                                <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="col-24  bg-dark">
                    <div class="col-sm-24 ">
                        <div class="col-24 automobile automobile-md"
                             style="background-image: url(https://www.mercedes-benz.com/en/company/_jcr_content/root/slider/sliderchilditems/slideritem/image/MQ7-0-image-20191025121730/01-mercedes-benz-ag-company-3400x1440.jpeg)"></div>
                        <div class="automobile-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                            <div class="automobile-text-bottom-sm">
                                <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-24  bg-dark">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 automobile automobile-md"
                             style="background-image: url(https://i.ytimg.com/vi/PkkV1vLHUvQ/maxresdefault.jpg)"></div>
                        <div class="automobile-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                            <div class="automobile-text-bottom-sm">
                                <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-24  bg-dark">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 automobile automobile-md"
                             style="background-image: url(https://i.teknolojioku.com/storage/files/images/2021/10/07/togg-test-asamasindan-yeni-fotograf-7Tto_cover.jpg)"></div>
                        <div class="automobile-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                            <div class="automobile-text-bottom-sm">
                                <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-24 col-lg-12 p-4 ">
                <div class="row">
                    <div class="col-10" style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                    <div class="col-14 bg-secondary ">
                        <div class="automobile-title">TAYSAD Başkanı Kanca: Tofaş'ın bu kararı sürpriz oldu
                        </div>
                        <div class="automobile-text-bottom-sm">
                            <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-24 col-lg-12 p-4 ">
                <div class="row">
                    <div class="col-10 " style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                    <div class="col-14  bg-secondary ">
                        <div class="automobile-title">Volkswagen batarya fabrikası için yer ve partner arıyor işte
                            adaylar

                        </div>
                        <div class="automobile-text-bottom-sm">
                            <span class="text-white">23 Ocak</span><span> • 14:35 • parafesor</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-netkolik ">
    <div class="container">
        <div class="section-header d-flex text-dark-orange">
            <div class="section-title">NETKOLİK</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-14">
                <div class="card news-card news-card-big mb-sm-5 keep-ratio cardSlider" currentSlide="0" ratio="0.525"
                     id="internet-slider">
                    <div class="redFilterOverlay"></div>
                    <div class="news-card-slider-container">
                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img text-white"
                                 style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)">
                                <div class="life-card-slider-slide-caption">Kadro değeri 14 milyon euroyu aşan
                                    takımların mücadelesi
                                </div>
                            </div>
                        </div>
                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img text-white"
                                 style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)">
                                <div class="life-card-slider-slide-caption">Kadro değeri 98 milyon euroyu aşan
                                    takımların mücadelesi
                                </div>
                            </div>
                        </div>
                        <div class="news-card-slider-slide">
                            <div class="life-card-slider-slide-img text-white"
                                 style="background-image: url(img/news/s1s1p1.jpg)">
                                <div class="life-card-slider-slide-caption">Kadro değeri 41 milyon euroyu aşan
                                    takımların mücadelesi
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-lg-24 col-md-24 mt-1">
                    <div class="card news-card news-card-big match " matchTo="internet-slider">
                        <div class="news-card-slider-container">
                            <div class="news-card-slider-slide">
                                <div class="sport-card-slider-slide-img text-white"
                                     style="background-image: url(https://cdn.sporx.com/img/59/2021/20210805_2_49495353_67675352.jpg)">
                                    <div class="orangeOverlay90"></div>

                                    <div class="sport-card-slider-slide-caption">Kadro değeri 14 milyon euroyu aşan
                                        takımların mücadelesi
                                        <div class=" sport-text-bottom-sm">

                                            <span class="text-white">23 Ocak • 14:35 • parafesor</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                    <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                            <div class="col-md-24 bg-dark-orange h-100 tech-box">
                                <div class="tech-news-box-image"
                                     style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                                <div class="tech-news-box-caption">
                                    dwadasdsad
                                    <div class="tech-text-bottom-sm text-white">
                                        <span class="">23123 • parafesor</span>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="col-md-19">
                <div class="row">
                    <div class="col-md-8 mt-4">
                        <div class="col-24">
                            <div class="col-sm-24" id="internet-second-row">
                                <div class="col-24 internet internet-md"
                                     style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                                <div class="internet-title">
                                    <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan
                                        KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                                        Bakanlığı'ndan K
                                    </div>
                                    <div class="card-bottom-date">
                                        <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4">
                        <div class="col-24">
                            <div class="col-sm-24 ">
                                <div class="col-24 internet internet-md"
                                     style="background-image: url(https://i2.milimaj.com/i/milliyet/75/0x410/5ea3e9d85542830ca0699880.jpg)"></div>
                                <div class="internet-title">
                                    <div class="multilineEllipsis" multilineEllipsisMax="100">KMaliye Bakanlığı'ndan K
                                    </div>
                                    <div class="card-bottom-date">
                                        <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4">
                        <div class="col-24">
                            <div class="col-sm-24 ">
                                <div class="col-24 internet internet-md"
                                     style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                                <div class="internet-title">
                                    <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan
                                        KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                                        Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye
                                        Bakanlığı'ndan K
                                    </div>
                                    <div class="card-bottom-date">
                                        <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 mt-3">
                <div class="col-24">
                    <div class="col-sm-24 ">
                        <div class="col-24 internet internet-md"
                             style="background-image: url(https://c8.alamy.com/comp/E3PNFN/kulturpark-the-culture-park-izmir-turkey-eurasia-E3PNFN.jpg)"></div>
                        <div class="internet-title">
                            <div class="multilineEllipsis" multilineEllipsisMax="100">Miye Bakanlığı'ndan KMaliye
                                Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                            </div>
                            <div class="card-bottom-date">
                                <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 internet internet-md"
                             style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                        <div class="internet-title">
                            <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan KMaliye
                                Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan
                                KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                            </div>
                            <div class="card-bottom-date">
                                <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 internet internet-md"
                             style="background-image: url({{asset('modules/home/sample/img/news/sliderNext.webp')}})"></div>
                        <div class="internet-title">
                            <div class="multilineEllipsis" multilineEllipsisMax="100">Maliye Bakanlığı'ndan KMaliye
                                Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan
                                KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan KMaliye Bakanlığı'ndan K
                            </div>
                            <div class="card-bottom-date">
                                <span class="text-dark-orange">23 Ocak</span><span> • 14:35 • parafesor</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="section-egitim">
    <div class="container">
        <div class="section-header d-flex text-blue-alternative">
            <div class="section-title">EĞİTİM</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(http://img.gazetevatan.com/vatanmediafile/Haber598x362/2019/11/04/e-okul-giris-1-donem-sinav-sonuclari-aciklandi-e-4277998.Jpeg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://static.birgun.net/resim/haber-detay-resim/2020/09/20/meb-den-yarin-baslayacak-yuz-yuze-egitime-iliskin-aciklama-783017-5.jpg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://trthaberstatic.cdn.wp.trt.com.tr/resimler/1590000/yuz-yuze-egitim-1591754.jpg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://img3.aksam.com.tr/resize/576x324/imgsdisk/2021/09/12/t25_karantinada-okul-yok-yari-130.jpg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://media.istockphoto.com/vectors/happy-school-children-standing-in-front-of-school-building-vector-id820839120)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://iaahbr.tmgrup.com.tr/cb3afa/806/378/0/0/864/404?u=https://iahbr.tmgrup.com.tr/2020/07/09/meb-e-kayit-sorgulama-ilkokul-1-ortaokul-5-sinif-kayitlari-ne-zaman-2020-2021-cocugum-hangi-okula-gidecek-1594293257969.jpg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://i.sozcu.com.tr/wp-content/uploads/2020/09/30/iecrop/universite-acilisi-shutterstock__16_9_1600923232_16_9_1601456709.jpg)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-8 col-md-12">
                <div class="col-24 ">
                    <div class="col-sm-24 h-100">
                        <div class="col-24 education education-md"
                             style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                        <div class="education-title">Maliye Bakanlığı'ndan Kılıçdaroglu'na yanıt: Aradaki ayrımı
                            bilmiyor
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section id="section-crypto" class="bg-dark-grey">
        <div class="container">
            <div class="section-header d-flex text-white">
                <div class="section-title">KRİPTO PARALAR</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm
                        Kripto Haberlerini Gör</a></div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-danger"><a
                    href="{{route("home_article.index",['type' => 'Kripto'])}}">Tüm Kripto Haberlerini Gör</a></div>
        </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-15 h-100">
                    <div class="card news-card news-card-big keep-ratio mb-sm-5 cardSlider" currentSlide="" ratio="0.55"
                         id="crypto-slider"
                         style="min-height: 440px">
                        <div></div>
                        <div class="news-card-slider-container">
                            @foreach($articles["Kripto"]["ShowCase"]->take(4) as $article)
                                <div class="news-card-slider-slide">
                                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                        <div class="life-card-slider-slide-img text-white"
                                             style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)">
                                            <div class="blueOverlay">

                                            </div>

                                            <div class="life-card-slider-slide-caption">{{$article->title}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="news-card-slider-controls">
                            <div class="news-card-slider-control" direction="previous">❮</div>
                            <div class="news-card-slider-control" direction="next">❯</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 match mt-3" matchTo="crypto-slider">
                    <div class="col-md-24  match " matchTo="crypto-slider">

                        <div class="col-md-24  h-100 tech-box">
                            <div class="tech-news-box-image "
                                 style="background-image: url(https://i.ytimg.com/vi/PkkV1vLHUvQ/maxresdefault.jpg)"></div>
                            <div class="crypto-news-box-caption text-white">
                                Lorem f fdsfdsfdasd
                                <div class="life-text-bottom-sm text-white ">
                                    <span class="">2021 • parafesor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 match mt-3" matchTo="crypto-slider">
                    <div class="col-md-24  match " matchTo="crypto-slider">

                        <div class="col-md-24 h-100 tech-box">
                            <div class="tech-news-box-image "
                                 style="background-image: url(https://i.ytimg.com/vi/PkkV1vLHUvQ/maxresdefault.jpg)"></div>
                            <div class="crypto-news-box-caption text-white">
                                Lorem f fdsfdsfdasd
                                <div class="life-text-bottom-sm text-white">
                                    <span class="">2021 • parafesor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               {{-- @foreach($articles["Kripto"]["Normal"]->take(1) as $article)
                    <div class="col-md-9 ">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24 bg-dark">
                                <div class="col-sm-24 h-100">
                                    <div class="col-24 crypto crypto-md"
                                         style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                                    <div class="crypto-title">
                                        <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                        </div>
                                        <div class="crypto-text-bottom">
                                    <span
                                        class="text-white">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach--}}
            </div>

            <div class="row mt-4">
                @foreach($articles["Kripto"]["Normal"]->slice(4)->take(1) as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <div class="row">

                            <div class="col-14 bg-orange crypto-wide-section">
                                <div class="crypto-title text-black">{{$article->title}}
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span class="text-black">{{ Date::parse($article->created_at)->format('j F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                            <div class="col-10"
                                 style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                        </div>
                    </div>
                @endforeach
                @foreach($articles["Kripto"]["Normal"]->slice(5)->take(1) as $article)
                    <div class="col-md-24 col-lg-12 p-4 ">
                        <div class="row">
                            <div class="col-10"
                                 style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                            <div class="col-14 bg-orange crypto-wide-section" >
                                <div class="crypto-title text-black">{{$article->title}}
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span class="text-black">{{ Date::parse($article->created_at)->format('j F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                @foreach($articles["Kripto"]["Normal"]->slice(1)->take(4) as $article)
                    <div class="col-md-6">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="col-24  bg-dark">
                                <div class="col-sm-24 ">
                                    <div class="col-24 crypto crypto-md"
                                         style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                                    <div class="crypto-title">{{$article->title}}
                                        <div class="crypto-text-bottom-sm">
                                    <span
                                        class="text-white">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
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
    <section id="section-hisse-onerileri">
        <div class="container">
            <div class="section-header d-flex text-dark-blue">
                <div class="section-title">HİSSE ÖNERİLERİ</div>
                <div class="d-none d-md-block section-right"><a
                        href="{{route('home_article.index',['type' => 'Hisse'])}}">Tüm Hisse Önerilerini
                        Gör</a>
                </div>
            </div>
            <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                    href="{{route('home_article.index',['type' => 'Hisse'])}}">Tüm Hisse Önerilerini Gör</a>
            </div>

            <div class="row mt-3">
                <div class="col-xl-13 mb-5">
                    <div class="row">
                        @foreach($articles["Hisse"]["ShowCase"]->take(2) as $article)
                            <div class="col-lg-12 col-md-24 mt-1 match " matchTo="tech-second-row-anchor">
                                <a href="{{route('article.show',['slug'=> $article->slug])}}">
                                    <div class="col-md-24 bg-black h-100 tech-box">
                                        <div class="tech-news-box-image"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                        <div class="tech-news-box-caption">
                                            {{$article->title}}
                                            <div class="company-text mt-1" style="padding-left:0px;">
                                                {{ \Illuminate\Support\Str::limit($article->summary, 100, $end='...') }}
                                            </div>
                                            <div class="tech-text-bottom-sm text-white">
                                                <span class="">23 Ocak</span><span> • 14:35 • parafesor</span>
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
                        @foreach($articles["Hisse"]["Normal"]->take(3) as $article)
                            <div class="col-sm-24">
                                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                                    <div class="share-recommendation-news-numbers text-dark-blue">1</div>
                                    <div class="share-recommendation-news-img">
                                        <div class="image-card-16x10 border bg-white"
                                             style="background-image: url({{asset($article->image_path)}})"></div>
                                    </div>
                                    <div class="share-recommendation-news-text">
                                        <div class="text-dark-blue fw-bold">
                                            {{$article->title}}
                                        </div>
                                        <div class="share-recommendation-news-text-bottom">
                               <span
                                   class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div style="width:100%; height: 1px;" class="bg-dark-blue my-3"></div>
            <div class="row">
                @foreach($articles["Hisse"]["Normal"]->slice(3)->take(8) as $article)
                    <div class="col-24 col-md-12 col-lg-6 mt-3">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card">
                                <div class="company-image"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="text-dark-blue fw-bold text-center">
                                    {{$article->title}}
                                </div>
                                <div class="company-text text-center mt-1">
                                    {{ \Illuminate\Support\Str::limit($article->summary, 100, $end='...') }}
                                </div>
                                <div class="company-bottom">
                          <span
                              class="text-danger">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
<div class="d-none" id="images">

</div>
<footer>

</footer>
    @include('home::partials._javascript')
@endsection
