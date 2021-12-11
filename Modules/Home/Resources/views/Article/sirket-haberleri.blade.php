@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.sirket-haberleri')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["Şirket Haberleri"]->slice(6)->take(20) as $article)
                <div class="col-24 col-md-12 col-lg-6 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="card">
                            <div class="corporate-triangle"></div>
                            <div class="company-image"
                                 style="background-image: url({{asset($article->image_path)}}); background-position: left; margin-left: 5%; "></div>
                            <div class="company-text" style="padding-left: 5%;">
                                <p>{{$article->summary}}</p>
                            </div>
                            <div class="company-bottom">
                          <span
                              class="text-dark-blue">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • by parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    @include('home::partials._javascript')


@endsection
