<section id="section-en-cok-okunanlar" class="bg-dark-grey">
    <div class="container">
        <div class="section-header d-flex text-white">
            <div class="section-title">EN ÇOK OKUNANLAR</div>
            <div class="d-none d-md-block section-right"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @php
                $i = 1;
            @endphp
            @foreach($mostReads as $article)
                <div class="col-sm-24 col-md-12 col-lg-6 mt-3">
                    <a href="{{route('article.show',['slug' => $article->slug ])}}">
                        <div class="most-red">
                            <div class="most-red-image"
                                 style="background-image: url({{asset($article->image_path)}})"></div>
                            <div class="most-red-text">
                                <div class="most-red-index">{{$i}}</div>
                                <p>{{ $article->title }}</p>

                            </div>
                            <div class="most-red-bottom">
                                   <span
                                   >{{ Date::parse($article->article_date)->format('j F')}}</span> • <span>{{Carbon\Carbon::parse($article->article_date)->format('H:i')}} • parafesor</span>
                            </div>
                        </div>
                    </a>
                </div>
                @php
                    $i++
                @endphp
            @endforeach
            <div
                style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #F5F5F5; color:#F5F5F5; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px;">
                <a href="{{route("home_article.index",['type' => 'en-cok-okunanlar'])}}">

                    Tümünü Gör
                </a>

            </div>
        </div>
    </div>
</section>
