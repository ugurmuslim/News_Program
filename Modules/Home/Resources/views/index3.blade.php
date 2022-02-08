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
                        @foreach($mainSliders as $article)
                            <article class="glide__slide" data-glide-autoplay="4000">
                                <div class="cm-slide-item"
                                     style="background-image: url({{asset($article->image_path)}});">
                                    <div class="post-inner">
                                        <h2 class="entry-title"><a
                                                href="{{route('article.show',['slug' => $article->slug ])}}">{{$article->title}}</a>
                                        </h2>
                                        <ul class="post-meta"><span>son dakika</span>
                                            <li>{{ Date::parse($article->article_date)->format('j F')}}</li>
                                            <li>{{ Carbon\Carbon::parse($article->article_date)->format('H:i')}}</li>
                                            <li>parafesör</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="glide__overlay glide__overlay--right glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--right glide__overlay--bot"></div>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>ÖNCEKİ</span><i class="fas fa-arrow-left"></i></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>SONRAKİ</span><i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="slide-control-div">
                <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
                    <button class="slider__bullet glide__bullet glide__bullet--active" data-glide-dir="=0"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=1"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=2"></button>
                </div>
            </div>
        </div>
    </section>
   {{-- <section class="container-outer home-slide-container">
        <div class="glide">
            <div class="glide__wrapper">
                <div class="glide__overlay glide__overlay--left glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--left glide__overlay--bot"></div>
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        @foreach($mainSliders as $article)
                            <article class="glide__slide" data-glide-autoplay="4000">
                                <div class="cm-slide-item"
                                     style="background-image: url({{asset($article->image_path)}});">
                                    <div class="post-inner">
                                        <h2 class="entry-title"><a
                                                href="{{route('article.show',['slug' => $article->slug ])}}">{{$article->title}}</a>
                                        </h2>
                                        <ul class="post-meta"><span>son dakika</span>
                                            <li>{{ Date::parse($article->article_date)->format('j F')}}</li>
                                            <li>{{ Carbon\Carbon::parse($article->article_date)->format('H:i')}}</li>
                                            <li>parafesör</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="glide__overlay glide__overlay--right glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--right glide__overlay--bot"></div>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>Önceki</span><i
                        class="fas fa-arrow-left"></i></buttn>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>Sonraki</span><i
                        class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </section>--}}

    @include('home::sections.gundem')
    @include('home::sections.borsa-tube')
        @include('home::sections.twitter')
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
   {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages;

            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            console.log(image.classList);
                            image.classList.remove("lazy");
                            console.log(image.classList);
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload () {
                    if(lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function() {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function(img) {
                            if(img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if(lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        })

    </script>--}}

@endsection
