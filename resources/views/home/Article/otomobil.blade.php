@extends('home.layouts.master')

@section('content')
    @include('home.partials._header')
    @include('home.sections.otomobil')
    <div class="container">
    <div class="row">
    @foreach($articlesDB["Otomobil"]->slice(6)->take(40) as $article)
                <div class="col-md-8 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24  bg-dark">
                            <div class="col-sm-24 ">
                                <div class="col-24 automobile automobile-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="automobile-title">{{$article->title}}
                                    <div class="automobile-text-bottom-sm">
                                    <span
                                        class="text-white">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
        @endforeach


    </div>
    </div>
    @include('home.partials._javascript')

@endsection
