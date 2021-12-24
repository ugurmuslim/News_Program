@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.kripto')
    <div class="container">
        <div class="row mt-3">
        @foreach($articlesDB["Kripto"]->slice(7)->take(40) as $article)
                <div class="col-md-6 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="col-24  bg-dark">
                            <div class="col-sm-24 ">
                                <div class="col-24 crypto crypto-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="crypto-title">
                                    {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                    <div class="crypto-text-bottom-sm">
                                    <span
                                        class="text-white">{{ Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
                <!-- First Small News of the section -->
            @endforeach


        </div>
    </div>
    @include('home::partials._javascript')

@endsection
