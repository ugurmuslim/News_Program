<header>
    <div id="headerTop">
        <div class="row">
            <ul style="list-style: none">
                <div class="social-icons" style="float: right; margin-left: 18px;">
                    <i class="fab fa-facebook-square" aria-hidden="true"></i>
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </div>

                <li style="float: right; margin-left: 18px; " >
                    <input type="text" class="search-input" placeholder="Haberlerde ara">
                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                </li>
                <li class="float-right" style="float: right; margin-left: 18px;">
                    <input type="text" class="search-input" placeholder="Hisse Kodu / hisse adı ara"
                           style="width: 150px;">
                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
    <div id="headerMain">
        <div class="container" style="max-width: 70%">
            <div class="row">
                <div style="width: 40%">
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-4" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a href="{{route('home_article.index',['type' => 'Hisse'])}}">HİSSE
                                    ÖNERİLERİ</a></div>
                        </div>
                        <div class="col-11" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a href="{{route('home_article.index',['type' => 'Borsa Tube'])}}">BORSA
                                    TUBE</a></div>
                        </div>
                        <div class="col-4" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a
                                    href="{{route('home_article.index',['type' => 'Şirket Haberleri'])}}">ŞİRKET
                                    HABERLERİ</a></div>
                        </div>
                    </div>
                </div>
                <div style="width: 20%; text-align: center"><a href="{{route('home.indextest')}}">
                        <div class="header-logo-big"></div>
                    </a>
                </div>
                <div style="width: 40%">
                    <div class="row">
                        <div class="col-4" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a href="{{route('home_article.index',['type' => 'Gündem'])}}">DOLAR</a>
                            </div>
                        </div>
                        <div class="col-11" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a href="{{route('home_article.index',['type' => 'Gündem'])}}">ALTIN</a>
                            </div>
                        </div>
                        <div class="col-4" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link"><a
                                    href="{{route('home_article.index',['type' => 'Gündem'])}}">COIN</a></div>
                        </div>
                        <div class="col-5" style="position: relative; height: 0px; padding-bottom:160px;">
                            <div class="header-link">
                                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="large-screen-menu" class="large-screen-menu" style="display:none;">
        <div class="row">
            <div class="col-md-20">
                <div class="row mt-5" style="padding-left: 10px;">
                    <div class="col-md-4">
                        <p class="large-screen-menu-headers">BORSA</p>
                        <div style="border:1px solid white"></div>
                        <ul class="large-screen-menu-lists">
                            <li>Borsa Tube</li>
                            <li>Twitter</li>
                            <li>Şirket Haberleri</li>
                            <li>Köşe Yazıları</li>
                            <li>Eğitim</li>
                        </ul>
                    </div>
                    <div class="col-md-20">
                        <p class="large-screen-menu-headers">RAPORLAR</p>
                        <div style="border:1px solid white"></div>
                        <div class="row mt-1" style="color: white;">
                            <div class="col-md-5">
                                <p class="large-screen-menu-headers">BORSA RAPORLARI</p>
                                <ul class="large-screen-menu-lists">
                                    <li>Bist</li>
                                    <li>Viop</li>
                                    <li>Hisse Öneriler</li>
                                    <li>Faiz</li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <p class="large-screen-menu-headers">DÖVİZ</p>
                                <ul class="large-screen-menu-lists">
                                    <li>Sterlin</li>
                                    <li>Yen</li>
                                    <li>Dolar</li>
                                    <li>Euro</li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <p class="large-screen-menu-headers">COIN</p>
                                <ul class="large-screen-menu-lists">
                                    <li>Bitcoin</li>
                                    <li>Ethereum</li>
                                    <li>Litecoin</li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <p class="large-screen-menu-headers">EMTIA</p>
                                <ul class="large-screen-menu-lists">
                                    <li>Altın</li>
                                    <li>Gümüş</li>
                                    <li>Petrol</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <p class="large-screen-menu-headers">PARITE</p>
                                <ul class="large-screen-menu-lists">
                                    <li>EUR/USD</li>
                                    <li>GBP/USD</li>
                                    <li>USD/JPY</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-24 bg-dark-orange mt-4">
                            <div class="col-md-24 bg-white h-100 tech-box">
                                <div class="tech-news-box-image"
                                     style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                                <div class="tech-news-box-caption" style="color:black;">
                                    dwadasdsad
                                    <div class="tech-text-bottom-sm text-white">
                                        <span class=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                            <div class="col-md-24 bg-white h-100 tech-box">
                                <div class="tech-news-box-image"
                                     style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                                <div class="tech-news-box-caption" style="color:black;">
                                    dwadasdsad
                                    <div class="tech-text-bottom-sm text-white">
                                        <span class=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="col-md-24 bg-dark-orange mt-4 match" matchTo="internet-second-row">
                            <div class="col-md-24 bg-white h-100 tech-box">
                                <div class="tech-news-box-image"
                                     style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)"></div>
                                <div class="tech-news-box-caption" style="color:black;">
                                    dwadasdsad
                                    <div class="tech-text-bottom-sm text-white">
                                        <span class=""></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="background-color: #ffead5">
                <div style="font-family: MillerTextItalic;  font-size:50px;  font-weight: bold">Stil
                </div>
                <div style="border:1px solid black"></div>
                <ul class="large-screen-menu-lists" style="color: black; float: right;">
                    <li>Spor</li>
                    <li>Teknoloji</li>
                    <li>Yaşam</li>
                    <li>Netkolik</li>
                    <li>Otomobil</li>
                    <li>Köşe Yazıları</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="headerBar">
        <div class="container" id="headerBarContainer">
            <div class="headerBarLink"><img src="{{asset('modules/home/sample/img/hepsi-parafesorde.png')}}"
                                            style="max-width: 175px;" alt="">
                <div class="headerBarLink"><a href="https://www.bloomberght.com/" target="_blank">Bloomberg HT</div>
                </a>
                <div class="headerBarLink"><a href="https://www.borsagundem.com/" target="_blank">Borsa Gündem</a></div>
                <div class="headerBarLink"><a href="https://hisse.net/" target="_blank">Hisse.net</a></div>
                <div class="headerBarLink"><a href="https://kanalfinans.com/" target="_blank">Kanal Finans</a></div>
                <div class="headerBarLink"><a href="https://www.borsamatik.com.tr/" target="_blank">Borsamatik</a></div>
                <div class="headerBarLink"><a href="https://www.borsatek.com/" target="_blank">Borsatek</a></div>
                <div class="headerBarLink"><a href="https://businessht.bloomberght.com/" target="_blank">BusinessHT</a>
                </div>
                <div class="headerBarLink"><a href="https://www.marketwatch.com/" target="_blank">Market Watch</a></div>
                <div class="headerBarLink"><a href="https://edition.cnn.com/business" target="_blank">CNN Business</a>
                </div>
            </div>
        </div>
    </div>
</header>

