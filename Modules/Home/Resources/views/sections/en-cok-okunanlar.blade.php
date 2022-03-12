<section id="section-en-cok-okunanlar" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">EN ÇOK OKUNANLAR</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row e-row-1">
            @php
                $i = 1;
            @endphp
            @foreach($mostReads as $article)
            <div class="col-sm-24 col-md-12 col-lg-6">
                <a href="{{route('article.show',['slug' => $article->slug ])}}">
                    <div class="most-red">
                        <div class="most-red-image lazy" style="background-image: url({{asset($article->image_path)}})"></div>
                        <div class="most-red-text">
                            <div class="most-red-index">{{$i}}</div>
                            <p>{{ $article->title }}</p>
                        </div>
                        <div class="most-red-bottom">
                            <span>{{ Date::parse($article->article_date)->format('j F')}}</span> • {{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor
                        </div>
                    </div>
                </a>
            </div>
                @php
                    $i++
                @endphp
            @endforeach
        </div>
    </div>
</section>
