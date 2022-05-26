@extends('home.layouts.master')
@section('content')
    @include('home.partials._header')
    <section class="container-outer home-slide-container">
        <div class="glide">
            <div class="glide__wrapper">
                <div class="glide__overlay glide__overlay--left glide__overlay--top"></div>
                <div class="glide__overlay glide__overlay--left glide__overlay--bot"></div>
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        @foreach($mainSliders as $article)
                            @php
                                $article = (object) $article;
                            @endphp
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
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>ÖNCEKİ</span><i
                        class="fas fa-arrow-left"></i></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>SONRAKİ</span><i
                        class="fas fa-arrow-right"></i></button>
            </div>
            <div class="slide-control-div">
                <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
                    <button class="slider__bullet glide__bullet glide__bullet--active" data-glide-dir="=0"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=1"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=2"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=3"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=4"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=5"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=6"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=7"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=8"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=9"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=10"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=11"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=12"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=13"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=14"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=15"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=16"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=17"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=18"></button>
                    <button class="slider__bullet glide__bullet" data-glide-dir="=19"></button>
                </div>
            </div>
        </div>
    </section>
    @include('home.sections.gundem')
    @include('home.sections.kripto')
    @include('home.sections.hisse')
    @include('home.sections.borsa-tube')
    @include('home.sections.sirket-haberleri')
    @include('home.sections.kose-yazilari')
    @include('home.sections.twitter')
    @include('home.sections.son-dakika')
    @include('home.sections.en-cok-okunanlar')
    <section id="section-stil">
        <div class="container">Stil</div>
    </section>

    @include('home.sections.spor')
    @include('home.sections.teknoloji')
    @include('home.sections.yasam')
    @include('home.sections.otomobil')
    @include('home.sections.netkolik')
    @include('home.sections.egitim')

    <div class="d-none" id="images"></div>

    @include('home.partials._footer')

    @include('home.partials._javascript')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var lazyloadImages;

            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                var imageObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function (image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function () {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function (img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
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

    </script>
    <script>

        var next = document.getElementById('lastSlideNext');
        next.onclick = function () {
            var width = itemCount();
            var container = document.getElementById('last-min-slider');
            sideScroll(container, 'right', 10, width, 20);
        };

        var back = document.getElementById('lastSlideBack');
        back.onclick = function () {
            var width = itemCount();
            var container = document.getElementById('last-min-slider');
            sideScroll(container, 'left', 10, width, 20);

        };

        function itemCount() {
            var numbers = /^[0-9]+$/;

            const items = document.querySelectorAll('.last-min-sm');
            const oneItem = items[1].currentStyle || window.getComputedStyle(items[1]);
            const width = Number(oneItem.width.replace(/[^0-9]/g, ''));
            const value = Number(oneItem.marginRight.replace(/[^0-9]/g, ''));
            console.log("Width: " + width + "value : " + value);
            return (width + value);
        }

        function sideScroll(element, direction, speed, distance, step) {
            scrollAmount = 0;
            var slideTimer = setInterval(function () {
                if (direction == 'left') {
                    element.scrollLeft -= step;
                } else {
                    element.scrollLeft += step;
                }
                scrollAmount += step;
                if (scrollAmount >= distance) {
                    window.clearInterval(slideTimer);
                }
            }, speed);
        }

        //Drag to Scroll
        const slider = document.querySelector('.last-min-slider');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX);
            slider.scrollLeft = scrollLeft - walk;
        });


    </script>
@endsection
