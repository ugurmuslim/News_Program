@extends('home::layouts.master')

@section('title', $article->title)
{{--
@section('meta_keywords', $article->seo_keywords)
@section('meta_description', $article->seo_description)
@section('meta_title', $article->seo_title)
--}}


@section('content')
    @include('home::partials._header')
    <div class="container">
        <div class="col-md-16 offset-md-4">
            <h1 style="display: block; text-align: center">{{$article->title}}</h1>
        </div>
        <div class="image mt-5 mx-auto d-block" style="max-width: 1000px;">
            <img
                src="{{asset($article->image_path)}}"
                class="rounded mx-auto d-block img-fluid" alt="...">
        </div>

        <div class="container">
            <div class="col-md-16 offset-md-4 mt-5">
                <div class="row summary ">
            <span class="font-italic">
                {!! $article->summary !!}
            </span>
                </div>
                <div class="news-card-bottom mt-5">
            <span
                class="text-danger">{{ Date::parse($article->article_date)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                </div>
                <div class="row mt-5">
                    {!! $article->body !!}

                </div>
            </div>
        </div>
    </div>
@endsection
