@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.yasam')
    <div class="container">
        <div class="row">
            @foreach($articlesDB["Yaşam"]->slice(6)->take(40) as $article)
                <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 life life-md"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="life-title">
                            <p>  {{ $article->title }}</p>


                            <div class="life-text-bottom-sm">
                            <span
                                class="text-orange">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @include('home::partials._javascript')

@endsection
