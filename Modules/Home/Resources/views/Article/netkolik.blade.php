@extends('home::layouts.master')

@section('content')
    @include('home::partials._header')
    @include('home::sections.netkolik')
    <div class="container">
        <div class="row">
        @foreach($articlesDB["Netkolik"]->slice(8)->take(40) as $article)
                <div class="col-md-8 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">

                        <div class="col-24">
                            <div class="col-sm-24 ">
                                <div class="col-24 internet internet-md"
                                     style="background-image: url({{asset($article->image_path)}})"></div>
                                <div class="internet-title">
                                    <div class="multilineEllipsis" multilineEllipsisMax="100">{{$article->title}}
                                    </div>
                                    <div class="card-bottom-date">
                                    <span
                                        class="text-dark-orange">{{Date::parse($article->created_at)->format('j F')}}</span><span> • {{ Carbon\Carbon::parse($article->created_at)->format('H:m')}} • parafesor</span>
                                    </div>
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
