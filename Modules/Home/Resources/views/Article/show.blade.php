@extends('home::layouts.master')

@section('title', $article->title . " |")
@section('seo_description', $article->seo_description)
@section('seo_title', $article->seo_title)
@section('site_url', url()->current())
@section('article_pub_date', \Carbon\Carbon::parse($article->article_date)->tz('Europe/Istanbul')->toAtomString())
@section('article_modified_date', \Carbon\Carbon::parse($article->updated_at)->tz('Europe/Istanbul')->toAtomString())

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
