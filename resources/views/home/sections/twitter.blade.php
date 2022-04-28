<section id="section-twitter-yazileri" class="bg-light-grey">
    <div class="container">
        <div class="section-header d-flex text-twitter">
            <div class="section-title">TWITTER YAZILARI</div>
            <div class="d-none d-md-block section-right">
                <a href="https://parafesor.net/kategori/twitter">Tüm Twitter Yazılarını Gör</a>
            </div>
        </div>
        <div class="d-sm-block d-md-none section-right-sm text-twitter">
            <a href="https://parafesor.net/kategori/twitter">Tüm Twitter Yazılarını Gör</a>
        </div>
        <div class="row twitter-row" id="twitter-row" data-masonry='{"percentPosition": true }'>
            <div class="col-24 col-md-12 col-lg-6"></div>
            <div class="col-24 col-md-12 t-row-1">
                <div class="card news-card news-card-big cardSlider" currentSlide="" id="twitter-slider">
                    <div></div>
                    <div class="news-card-slider-container">
                        @foreach(array_slice($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],0,2) as $article)
                            @php
                                $article = (object) $article;
                            @endphp
                            <div class="news-card-slider-slide">
                                <a href="https://twitter.com/user/status/{{$article->external_site_id}}"
                                   target="_blank">
                                    <div class="card tweet-card tweet-card-small bg-white">
                                        <div class="tweet-top">
                                            <div class="tweet-user-image">
                                                <img class="image-twitter" loading="lazy"
                                                     src="{{$article->image}}">
                                            </div>
                                            <div class="tweet-user">
                                                <p class="tweet-username">{{$article->name}}</p>
                                                {{--                                                <span class="tweet-followers">37 B Takipçi</span>--}}
                                            </div>
                                        </div>
                                        <div class="tweet-body">
                                            <p>{{$article->body}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="twitter-card-slider-controls">
                        <div class="news-card-slider-control" direction="previous">❮</div>
                        <div class="news-card-slider-control" direction="next">❯</div>
                    </div>
                    <div class="twitter-icon"><i class="fab fa-twitter"></i></div>
                </div>
            </div>
            @foreach(array_slice($articles['Twitter'][\App\Parafesor\Constants\CategorySectionTypes::NORMAL],3,10) as $article)
                @php
                    $article = (object) $article;
                @endphp
                <div class="col-24 col-md-12 col-lg-6 small-tweet-card">
                    <a href="https://twitter.com/user/status/{{$article->external_site_id}}" target="_blank">
                        <div class="card tweet-card tweet-card-small bg-white">
                            <div class="tweet-top">
                                <div class="tweet-user-image">
                                    <img class="image-twitter" loading="lazy"
                                         src="{{$article->image}}">
                                </div>
                                <div class="tweet-user">
                                    <p class="tweet-username">{{$article->name}}</p>
                                    {{--                                <span class="tweet-followers">17B Takipçi <i class="fab fa-twitter"></i></span>--}}
                                </div>
                            </div>
                            <div class="tweet-body">
                                <p>{{$article->body}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="show-more-tweet">
            <a id="button-show-more-tweet" href="#">Daha Fazla Twitter Yazısı Gör
                <i class="fa fa-angle-down"></i>
            </a>
        </div>
    </div>

</section>


