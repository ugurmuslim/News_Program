@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.kripto')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["Kripto"]->slice(7)->take(40) as $article)
                <div class="col-md-24 col-lg-12 p-4 ">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="row">
                            <div class="col-10 bg-orange crypto-wide-section">
                                <div class="crypto-title" style="color: black;">
                                    {{ \Illuminate\Support\Str::limit($article->title, 70, $end='...') }}
                                </div>
                                <div class="crypto-text-bottom-sm">
                                    <span>{{ Carbon\Carbon::parse($article->created_at)->format('d F')}} • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                                </div>
                            </div>
                            <div class="col-14"
                                 style="background-image: url(https://i4.hurimg.com/i/hurriyet/75/0x0/61821b494e3fe113306aabb2.jpg)"></div>
                        </div>
                    </a>
                </div>
                <!-- First Small News of the section -->
            @endforeach


        </div>
    </div>
    @include('home::partials._javascript')

@endsection
