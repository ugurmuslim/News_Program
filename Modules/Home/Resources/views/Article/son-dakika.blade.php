@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.son-dakika')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["Son Dakika"]->slice(8)->take(40) as $article)
            <!-- First Small News of the section -->
                <div class="last-min-sm d-inline-block" style="position:relative">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="last-min-sm-top"><span class="px-2 bg-white" style="z-index: 999"><i
                                    class="far fa-clock"></i> {{\Carbon\Carbon::parse($article->article_date)->format('H:d')}}</span>
                            <div class="last-min-top-line"></div>
                        </div>
                        <div class="col-24 last-min-sm-img"
                             style="background-image: url({{asset($article->image_path)}})">
                        </div>
                        <div class="last-min-sm-title small-text"><p>{{$article->title}}</p>
                        </div>
                        <div class="last-min-text-bottom small-last-min-bottom">
                            <span
                                class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span>  {{Carbon\Carbon::parse($article->article_date)->format('H:m')}} • parafesor</span>
                        </div>
                    </a>
                </div>
                <!-- First Small News of the section -->
            @endforeach
        </div>
    </div>
    @include('home::partials._javascript')

@endsection
