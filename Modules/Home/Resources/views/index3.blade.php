@extends('home::layouts.master')
@section('content')
    @include('home::partials._header')
    {{--<div id="mainSliderContainer" class="keep-ratio" ratio="0.4167">
        <div id="mainSliderSlides">
            <div class="mainSliderSlideContainer" id="mainSliderLeft"></div>
            <div class="mainSliderSlideContainer" id="mainSliderRight"></div>
            <div class="mainSliderLeftArrow" direction="previous"><i class="fas fa-arrow-left"
                                                                     style="font-size: 2em;"></i></div>
            <div class="mainSliderRightArrow" direction="next"><i class="fas fa-arrow-right"
                                                                  style="font-size: 2em;"></i></div>
        </div>
        <div id="mainSliderCover">

        </div>
    </div>--}}
    <section class="container-outer home-slide-container">
        <div class="glide">
            <div class="glide__wrapper">
                <div class="glide__overlay glide__overlay--left glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--left glide__overlay--bot"></div>
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <article class="glide__slide" data-glide-autoplay="4000">
                            <div class="cm-slide-item" style="background-image: url(https://www.commentary.org/wp-content/uploads/2022/01/face-mask_ground_COVID.jpg);">
                                <div class="post-inner">
                                    <h2 class="entry-title"><a href="https://parafesor.net">Pandemide dikkat edilmesi gerekenler</a></h2>
                                    <ul class="post-meta"><span>son dakika</span>
                                        <li>28 Ocak</li>
                                        <li>12:25</li>
                                        <li>parafesör</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                        <article class="glide__slide" data-glide-autoplay="4000">
                            <div class="cm-slide-item" style="background-image: url(https://parafesor.net/images/61e7f57680abd.webp);">
                                <div class="post-inner">
                                    <h2 class="entry-title"><a href="https://parafesor.net">Morgan Stanley ve BOFA Finansallarını Açıkladı</a></h2>
                                    <ul class="post-meta"><span>son dakika</span>
                                        <li>21 Ocak</li>
                                        <li>15:25</li>
                                        <li>parafesör</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                        <article class="glide__slide" data-glide-autoplay="4000">
                            <div class="cm-slide-item" style="background-image: url(https://parafesor.net/images/61e7fb5f2e18e.webp);">
                                <div class="post-inner">
                                    <h2 class="entry-title"><a href="https://parafesor.net">'Tosuncuk' Tutuklu Kalmaya Devam Edecek</a></h2>
                                    <ul class="post-meta"><span>son dakika</span>
                                        <li>21 Ocak</li>
                                        <li>15:25</li>
                                        <li>parafesör</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="glide__overlay glide__overlay--right glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--right glide__overlay--bot"></div>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>Önceki</span><i class="fas fa-arrow-left"></i></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>Sonraki</span><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </section>

    @include('home::sections.gundem')
    @include('home::sections.borsa-tube')
{{--    @include('home::sections.twitter')--}}
    @include('home::sections.sirket-haberleri')
    @include('home::sections.kose-yazilari')
    @include('home::sections.son-dakika')
    @include('home::sections.en-cok-okunanlar')

    <section id="section-stil" style="background-color: #ffead5;padding-top: 20px; padding-bottom: 15px;">

        <div style="font-family: MillerTextItalic; font-size:56px; padding-left:100px; font-weight: bold">Stil</div>
    </section>

    @include('home::sections.spor')
    @include('home::sections.teknoloji')
    @include('home::sections.yasam')
    @include('home::sections.otomobil')
    @include('home::sections.netkolik')
    @include('home::sections.egitim')
    @include('home::sections.kripto')
    @include('home::sections.hisse')

    <div class="d-none" id="images"></div>
    {{-- <section id="section-borsa-raporlari">
         <div class="container">
             <div class="section-header d-flex">
                 <div class="section-title">BORSA RAPORLARI</div>
                 <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
             </div>
         </div>
     </section>--}}
    <footer>

    </footer>
    @include('home::partials._javascript')

@endsection
