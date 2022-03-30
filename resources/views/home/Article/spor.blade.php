@extends('home.layouts.master')

@section('content')
    @include('home.partials._header')
    @include('home.sections.spor')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["Spor"]->slice(6)->take(40) as $article)

            <!-- First Small News of the section -->
                <div class="col-sm-12 col-md-8 col-lg-percent-20">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card news-card news-card-small mt-4 ">
                            <div class="news-card-img-container bg-white">
                                <div style="background: url({{asset($article->image_path)}})" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text small-text">
                                    <p>{{ $article->title }}</p>

                                </div>
                            </div>
                            <div class="news-card-bottom" style="padding-left: 10%;">
                            <span
                                class="text-light-blue">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span></span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- First Small News of the section -->
            @endforeach


        </div>
    </div>

    @include('home.partials._javascript')

@endsection
