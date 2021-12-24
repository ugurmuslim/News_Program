@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.borsa-tube')
    <div class="container">
        <div class="row">
        @foreach($articles["Borsa Tube"]["Normal"]->take(20) as $article)

            <!-- First Small News of the section -->
                <div class="col-lg-6 col-sm-12 mt-5">
                    <a href={{$article->original_link}}">
                            <div class=" card news-card news-card-small ">
                    <div class="news-card-img-container bg-light-grey">
                        <div style="background: url({{asset($article->image_path)}})" alt=""
                             class="news-img"></div>
                        <div class="news-card-img-text">{{$article->title}}</div>
                    </div>
                    <div class="news-card-bottom">
                                    <span
                                        class="text-danger">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                    </div>
                </div>
                </a>
        </div>
        <!-- First Small News of the section -->
        @endforeach
    </div>
    </div>

    @include('home::partials._javascript')

@endsection
