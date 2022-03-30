@extends('home.layouts.master')
@section('extra_css')
    <link href="{{ asset('assets/home/sample/css/detail.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/home/sample/css/footer.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('title', $article->title . " | Parafesör | Paranıza Akıl Verir")
@section('seo_description', $article->seo_description)
@section('seo_title', $article->seo_title)
@section('seo_image', asset($article->image_path))
@section('site_url', url()->current())
@section('article_pub_date', \Carbon\Carbon::parse($article->article_date)->tz('Europe/Istanbul')->toAtomString())
@section('article_modified_date', \Carbon\Carbon::parse($article->updated_at)->tz('Europe/Istanbul')->toAtomString())

@section('content')
    @include('home.partials._header')
    <div class="container detail">
        <div class="detail-title col detail-title" style="text-align: center">
            <p>PARAFESÖR / {{mb_strtoupper($article->articleType->title, 'UTF-8')}}</p>
            <h1>{{$article->title}}</h1>
            <div class="news-card-bottom mt-3">
                <span>{{ Date::parse($article->article_date)->format('j F')}}
                    • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
            </div>
        </div>
        <div class="container">
            <div class="col mt-4">
                <div class="row summary ">
                    <span>
                        {!! $article->summary !!}
                    </span>
                </div>
            </div>
        </div>
        <div class="image mt-5 col d-block">
            <img src="{{asset($article->image_path)}}" class="rounded mx-auto d-block img-fluid" alt="...">
        </div>
        <div class="container detail-content">
            <div class="col mt-5">
                <div class="row">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
        <p class="articleId" style="display: none;">{{$article->id}}</p>
    </div>
    <div class="container other-news">
        <div class="col">
            <div class="row">
                <h4>DİĞER {{strtoupper($article->articleType->title)}} HABERLERİ</h4>
            </div>
            <div class="row">
                @foreach($relatedArticles->take(8) as $article)
                    <div class="col-lg-6 col-sm-12 col-12 mt-4">
                        <a href="{{route('article.show',['slug' => $article->slug ])}}">
                            <div class="card news-card news-card-small ">
                                <div class="news-card-img-container">
                                    <div style="background: url({{asset($article->image_path)}})"
                                         alt="" class="news-img"></div>
                                    <div class="news-card-img-text small-text">
                                        <p>{{$article->title}}</p>
                                        <div class="news-card-bottom"><span
                                                    class="text-danger">{{ Date::parse($article->article_date)->format('j F')}} </span>
                                            <span> • {{ Carbon\Carbon::parse($article->article_date)->format('H:i')}} •
                                                parafesor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('home.partials._footer')
@endsection
@section('extra_scripts')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{url()->current()}}"
  },
  "headline": "{{$article->title}}",
  "image": "{{asset($article->image_path)}}",
  "author": {
    "@type": "Organization",
    "name": "Parafesor",
    "url": "{{url('/')}}"
    }
    },
  "publisher": {
    "@type": "Organization",
    "name": "Parafesor",
    "logo": {
      "@type": "ImageObject",
      "url": "{{asset('assets/home/sample/img/logo-dark.svg')}}"
    }
  },
  "datePublished": "{{$article->article_date->format('Y-m-d')}}",
  "dateModified": "{{$article->updated_at}}",
}

    </script>
@endsection
