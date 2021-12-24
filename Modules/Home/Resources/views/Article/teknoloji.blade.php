@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.teknoloji')
    <div class="container">
        <div class="row">
            @foreach($articlesDB["Teknoloji"]->slice(8)->take(40) as $article)
                <div class="col-sm-24 col-md-12 col-lg-8 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24 tech tech-md"
                             style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="tech-title">{{$article->title}}
                            <div class="tech-text-bottom-sm">
                                    <span
                                        class="text-purple">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>


    @include('home::partials._javascript')

@endsection
