@extends('home.layouts.master')

@section('content')
    @include('home.partials._header')
    {{--    @include('home.sections.en-cok-okunanlar')--}}
    @include('home.partials._javascript')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["En Çok Okunanlar"] as $article)

            <!-- First Small News of the section -->
                <div class="col-lg-6 col-sm-12 mt-5">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card news-card news-card-small ">
                            <div class="news-card-img-container bg-light-grey">
                                <div style="background: url({{asset($article->image_path)}})" alt=""
                                     class="news-img"></div>
                                <div class="news-card-img-text"><p>{{$article->title}}</p></div>
                            </div>
                            <div class="news-card-bottom">
                                     <span
                                         class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- First Small News of the section -->
            @endforeach
        </div>
    </div>
    @include('home.partials._header')

@endsection
