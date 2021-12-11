@extends('home::layouts.master')
@section('content')
    @include('home::partials._header')
    <div id="mainSliderContainer" class="keep-ratio" ratio="0.4167">
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
    </div>
@include('home::sections.gundem')
@include('home::sections.borsa-tube')
@include('home::sections.twitter')
@include('home::sections.sirket-haberleri')
@include('home::sections.kose-yazilari')
@include('home::sections.son-dakika')
@include('home::sections.cok-okunanlar')


    {{-- <section id="section-borsa-raporlari">
         <div class="container">
             <div class="section-header d-flex">
                 <div class="section-title">BORSA RAPORLARI</div>
                 <div class="d-none d-md-block section-right">Tüm Gündem Haberlerini Gör</div>
             </div>
         </div>
     </section>--}}





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

    <footer>

    </footer>
    @include('home::partials._javascript')

@endsection

