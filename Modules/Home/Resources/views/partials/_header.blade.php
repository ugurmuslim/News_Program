<header>
    <div style="background-color: #e5e5e5;">
        <div class="container">
            <div class="header__top">
                <div class="search__input__contanier">
                    <input class="search__input" type="text" placeholder="Hisse Kodu / Hisse Adı ara">
                    <i class="fa fa-search search__icon" aria-hidden="true"></i>
                </div>
                <div class="search__input__contanier">
                    <input class="search__input" type="text" placeholder="Haberlerde ara">
                    <i class="fa fa-search search__icon" aria-hidden="true"></i>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <div class="container nav__contanier--desktop">
            <div class="nav__list">
                <a href="/"><img src="{{asset('modules/home/sample/img/logo-dark.svg')}}" alt="Parafesör Logo"
                                 height="76"></a>
                <ul class="nav nav-pills main_menu_ul">
                    @if($headerMenu)
                        @foreach($headerMenu as $menu)
                            <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                        @endforeach
                    @endif
                </ul>
                <div class="toggle_menu_icon_div">
                    <button id="large-nav-menu-button" class="menu__button" onclick="toggleLargeNavMenu(event)">
                        <svg id="menu_icon_rigth" xmlns="http://www.w3.org/2000/svg"
                             style="width: 44px; height: 44px; padding: 5px; pointer-events: none;" fill="none"
                             viewBox="0 0 24 24" stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="large-nav-menu" class="nav__menu__container">
                <div class="nav__menu__container--left">
                    @if($megaMenu)
                        @foreach($megaMenu->chunk(5) as $chunks)
                            <div class="nav__menu__item {{$loop->index<5  ? '--bottom-line' : ''}}">
                                @foreach($chunks as $menu)
                                    <a href="{{$menu->url}}"
                                       {{$menu->external ? 'target="_blank"' : ''}} class="{{$menu->uppercase ? 'text-uppercase': ''}} {{$menu->bold ? 'title': 'sub-title'}}">{{$menu->title}}</a>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="nav__menu__container--right">
                    <div class="title__container">
                        <span class="title">Stil</span>
                    </div>
                    <div class="list__container">
                        <a href="/kategori/spor" class="list__item">Spor</a>
                        <a href="/kategori/teknoloji" class="list__item">Teknoloji</a>
                        <a href="/kategori/yasam" class="list__item">Yaşam</a>
                        <a href="/kategori/netkolik" class="list__item">Netkolik</a>
                        <a href="/kategori/otomobil" class="list__item">Otomobil</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container nav__contanier--mobile">
            <button id="drawer-nav-button" class="menu__button">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; pointer-events: none;"
                     fill="none" viewBox="0 0 24 24" stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <a href="/" class="header__nav__logo">
                <img src="{{asset('modules/home/sample/img/logo-dark.svg')}}" alt="Header Logo" width="226" height="54">
            </a>
            <svg id="mobile_search_icon2" xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;"
                 fill="none" viewBox="0 0 24 24" stroke="black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <div id="drawer-nav" class="drawer__navigation">
                <div style="display: flex; justify-content: flex-end; background-color: #242424">
                    <button id="menu_close_icon" style="outline: none; border: none; background-color: transparent;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;" fill="none"
                             viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="top">
                    <div class="list__container">
                        @if(!is_null($headerMenu))
                            @foreach($headerMenu as $menu)
                                <h1 class="title"><a href="{{$menu->url}}">{{$menu->title}}</a></h1>
                            @endforeach
                        @endif
                    </div>
                    <div class="list__container">
                        @if($megaMenu)
                            @foreach($megaMenu->chunk(5) as $chunks)
                                @foreach($chunks as $menu)
                                    <h2 class="sub-title">
                                        <a href="{{$menu->url}}"
                                           {{$menu->external ? 'target="_blank"' : ''}} class="{{$menu->uppercase ? 'text-uppercase': ''}}">{{$menu->title}}</a>
                                    </h2>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                    <div class="stil">
                        <div class="list__container">
                            <h1 class="title">
                                <a href="/home#" onclick="toggleDrawerNav(event)">Stil</a>
                            </h1>

                            <h2 class="sub-title">
                                <a href="/kategori/spor" class="list__item">Spor</a>
                            </h2>
                            <h2 class="sub-title">
                                <a href="/kategori/teknoloji" class="list__item">Teknoloji</a>
                            </h2>
                            <h2 class="sub-title">
                                <a href="/kategori/yasam" class="list__item">Yaşam</a>
                            </h2>
                            <h2 class="sub-title">
                                <a href="/kategori/netkolik" class="list__item">Netkolik</a>
                            </h2>
                            <h2 class="sub-title">
                                <a href="/kategori/otomobil" class="list__item">Otomobil</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="second_main_menu_div">
            <div class="container">
                <div class="header__bottom">
                    <div class="nav__text__container" id="nav__text__container">
                        <img style="flex: none;" src="{{asset('modules/home/sample/img/hepsi-parafesorde.png')}}" alt=""
                             width="175" height="55">
                        <a class="nav__text" href="https://www.bloomberght.com/" target="_blank">Bloomberg HT</a>
                        <a class="nav__text" href="https://www.borsagundem.com/" target="_blank">Borsa Gündem</a>
                        <a class="nav__text" href="https://hisse.net/" target="_blank">Hisse.net</a>
                        <a class="nav__text" href="https://kanalfinans.com/" target="_blank">Kanal Finans</a>
                        <a class="nav__text" href="https://www.borsamatik.com.tr/" target="_blank">Borsamatik</a>
                        <a class="nav__text" href="https://www.borsatek.com/" target="_blank">Borsatek</a>
                        <a class="nav__text" href="https://businessht.bloomberght.com/" target="_blank">BusinessHT</a>
                        <a class="nav__text" href="https://www.marketwatch.com/" target="_blank">Market Watch</a>
                        <a class="nav__text" href="https://edition.cnn.com/business" target="_blank">CNN Business</a>
                    </div>
                    <div id="mobile_search_input2_div">
                        <input id="mobile_search_input2" class="search__input" type="text"
                               placeholder="Parafesör'de Ara...">
                        <i id="search_input_times" class="fa fa-times"></i>
                    </div>
                </div>
            </div>
        </div>
</header>
