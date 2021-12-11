<section id="section-twitter-yazileri" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-twitter">
            <div class="section-title">TWITTER YAZILARI</div>
            <div class="d-none d-md-block section-right"><a
                    href="{{route('home_article.index',['type' => 'Twitter'])}}">Tüm Twitter Yazılarını Gör</a>
            </div>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-dark-blue"><a
                href="{{route('home_article.index',['type' => 'Twitter'])}}">Tüm Twitter Yazılarını Gör</a>
        </div>
        <div class=" d-sm-block d-md-none section-right-sm text-info">Tüm Twitter Yazılarını Gör</div>


        <div class="row" data-masonry='{"percentPosition": true }'>

            @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->take(2) as $article)
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
                                {{--  <div class="tweet-follower text-muted">
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

            @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(2)->take(1) as $article)
                <div class="col-24 col-md-12 mb-3">
                    <a href="https://twitter.com/user/status/{{$article->external_site_id}}">

                        <div class="card tweet-card bg-twitter text-white">
                            <div class="tweet-top">
                                <div class="tweet-user tweet-user-large">
                                    <div class="float-start">
                                        <img class="image-twitter image-twitter-large"
                                             src="{{ $article->externalSourceUser->image }}">
                                    </div>
                                    <div class="float-start ms-2 mt-0">
                                        <div>{{ $article->externalSourceUser->name }}</div>
                                        {{--                              <div style="font-size:0.8em; font-weight: normal"> 53B Takipçi</div>--}}
                                    </div>
                                </div>
                                <div class="tweet-follower text-white">
                                    <i class="fab fa-twitter icon-twitter text-white float-end"></i>

                                </div>
                                <div class="tweet-slider-controls">
                                    <div class="tweet-slider-control">❮</div>
                                    <div class="tweet-slider-control">❯</div>
                                </div>
                            </div>
                            <div class="tweet-body text-white">
                                {{ \Illuminate\Support\Str::limit($article->body, 150, $end='...') }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            @foreach($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL]->slice(3)->take(10) as $article)
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
        <div
            style="margin-left:auto; margin-right: auto; border-bottom:solid 1px #AAAAAA; width:auto; padding:10px 35px; font-size:0.9em; margin-top:30px; text-align:center;">
            <a href="{{route('home_article.index',['type' => 'Twitter'])}}">
                Daha Fazla Twitter Yazısı Gör
            </a>
        </div>
    </div>
</section>
