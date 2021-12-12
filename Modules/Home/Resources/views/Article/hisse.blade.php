@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.hisse')
    <div class="container">
    <div class="row">
        @foreach($articlesDB->slice(12)->take(40) as $article)
            <div class="col-24 col-md-12 col-lg-6 mt-3">
                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                    <div class="card">
                        <div class="share-recommendation-triangle"></div>
                        <div style="padding: 30px;">
                            <div class="text-black fw-bold text-left">
                                {{$article->title}}
                            </div>
                            <div class="share-recommendation-text text-left mt-3">
                                {{ \Illuminate\Support\Str::limit($article->summary, 100, $end='...') }}
                            </div>
                            <div class="share-recommendation-bottom mt-3">
                          <span
                              class="text-black">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    </div>
    @include('home::partials._javascript')

@endsection
