@extends('home.layouts.master')

@section('content')
    @include('home.partials._header')
    @include('home.sections.twitter')
    <div class="container">
        <div class="row">
            @foreach($articlesDB['Twitter']->slice(13)->take(50) as $article)
                <div class="col-12 col-lg-6 mb-3">
                    <a href="https://twitter.com/user/status/{{$article->external_site_id}}">
                        <div class="card tweet-card tweet-card-small bg-white">
                            <div class="tweet-top">
                                <div class="tweet-user">
                                    <div class="float-start">
                                        <img class="image-twitter" src="{{$article->externalSourceUser->image}}">
                                    </div>
                                    <div class="float-start ms-2 mt-1">{{$article->externalSourceUser->name}}</div>
                                </div>
                                {{--<div class="tweet-follower text-muted">
                                    <span style="margin-right: 5px;">17B Takipçi</span>
                                    <i class="fab fa-twitter text-twitter icon-twitter"></i>
                                </div>--}}
                            </div>
                            <div class="tweet-body">
                                {{ \Illuminate\Support\Str::limit($article->body, 100, $end='...') }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
    @include('home.partials._javascript')

@endsection
