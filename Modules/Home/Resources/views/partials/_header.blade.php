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

                <li style="float: right; margin-left: 18px; ">
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
        <div class="container header__nav__contanier--desktop">
            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Dolar
            </a>
            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Euro
            </a>
            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Borsa
            </a>

            <a href="{{ route('home.indextest') }}" class="header__nav__logo">
                <img src="{{ URL::asset('modules/home/sample/img/logo-icon.svg') }}" alt="Header Logo" width="150"
                    height="150">
            </a>

            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Dolar
            </a>
            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Eğitim
            </a>
            <a href="{{ route('home.indextest') }}" class="header__nav__link">
                Otomobil
            </a>
        </div>
        <div class="container header__nav__contanier--mobile">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24; height: 24;" fill="none" viewBox="0 0 24 24"
                stroke="black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <a href="{{ route('home.indextest') }}" class="header__nav__logo">
                <img src="{{ URL::asset('modules/home/sample/img/logo-dark.svg') }}" alt="Header Logo" width="226"
                    height="54">
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24; height: 24;" fill="none" viewBox="0 0 24 24"
                stroke="black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
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
                                    style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)">
                                </div>
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
                        <div class="col-md-24 bg-dark-orange mt-4">
                            <div class="col-md-24 bg-white h-100 tech-box">
                                <div class="tech-news-box-image"
                                    style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)">
                                </div>
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
                        <div class="col-md-24 bg-dark-orange mt-4">
                            <div class="col-md-24 bg-white h-100 tech-box">
                                <div class="tech-news-box-image"
                                    style="background-image: url(https://i2.cnnturk.com/i/cnnturk/75/800x400/5f4642f9214ed8165ce5a0ae)">
                                </div>
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
            <div class="headerBarLink"><img src="{{ asset('modules/home/sample/img/hepsi-parafesorde.png') }}"
                    style="max-width: 175px;" alt="">
                <div class="headerBarLink"><a href="https://www.bloomberght.com/" target="_blank">Bloomberg HT</div>
                </a>
                <div class="headerBarLink"><a href="https://www.borsagundem.com/" target="_blank">Borsa Gündem</a>
                </div>
                <div class="headerBarLink"><a href="https://hisse.net/" target="_blank">Hisse.net</a></div>
                <div class="headerBarLink"><a href="https://kanalfinans.com/" target="_blank">Kanal Finans</a></div>
                <div class="headerBarLink"><a href="https://www.borsamatik.com.tr/" target="_blank">Borsamatik</a>
                </div>
                <div class="headerBarLink"><a href="https://www.borsatek.com/" target="_blank">Borsatek</a></div>
                <div class="headerBarLink"><a href="https://businessht.bloomberght.com/" target="_blank">BusinessHT</a>
                </div>
                <div class="headerBarLink"><a href="https://www.marketwatch.com/" target="_blank">Market Watch</a>
                </div>
                <div class="headerBarLink"><a href="https://edition.cnn.com/business" target="_blank">CNN Business</a>
                </div>
            </div>
        </div>
    </div>
</header>
