@php
$menu = \Modules\Admin\Entities\Menu::orderBy('sort', 'ASC')->get();
@endphp

<header>
    <div style="background-color: #e5e5e5;">
        <div class="container">
            <div class="header__top">
                <div class="search__input__contanier">
                    <input class="search__input" type="text" placeholder="Haberlerde ara">
                    <i class="fa fa-search search__icon" aria-hidden="true"></i>
                </div>
                <div class="search__input__contanier">
                    <input class="search__input" type="text" placeholder="Hisse Kodu / Hisse Adı ara">
                    <i class="fa fa-search search__icon" aria-hidden="true"></i>
                </div>
                <div class="social-icons">
                    <i class="fab fa-facebook-square" aria-hidden="true"></i>
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <div class="container nav__contanier--desktop">
            <a href="{{ route('home.indextest') }}">
                <img src="{{ URL::asset('modules/home/sample/img/logo-icon.svg') }}" alt="Header Logo" width="150"
                    height="150">
            </a>

            <div class="nav__list">
                @foreach($menu as $m)
                    <a href="{{$m->url}}" class="nav__link">
                        {{$m->title}}
                    </a>
                @endforeach
               {{-- <a href="{{ route('home.indextest') }}" class="nav__link">
                    Dolar
                </a>
                <a href="{{ route('home.indextest') }}" class="nav__link">
                    Euro
                </a>
                <a href="{{ route('home.indextest') }}" class="nav__link">
                    Borsa
                </a>
                <a href="{{ route('home.indextest') }}" class="nav__link">
                    Teknoloji
                </a>
                <a href="{{ route('home.indextest') }}" class="nav__link">
                    Eğitim
                </a>
                <a href="{{ route('home.indextest') }}" class="nav__link">
                    Otomobil
                </a>--}}

            </div>

            <div style="display: flex; justify-content: center; align-items: center;">
                <button id="large-nav-menu-button" class="menu__button" onclick="toggleLargeNavMenu(event)">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        style="width: 44px; height: 44px; padding: 5px; pointer-events: none;" fill="none"
                        viewBox="0 0 24 24" stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div id="large-nav-menu" class="nav__menu__container">
                <div class="nav__menu__container--left">
                    <div class="nav__menu__item --bottom-line">
                        <p class="title">BORSA TUBE</p>
                        <p class="title">TWITTER</p>
                        <p class="title">ŞİRKET HABERLERİ</p>
                        <p class="title">KÖŞE YAZILARI</p>
                        <p class="title">EĞİTİM</p>
                    </div>
                    <div class="nav__menu__item --bottom-line">
                        <p class="title">SON DAKİKA</p>
                        <p class="title">HİSSE ÖNERİLERİ</p>
                        <p class="sub-title">Hisse Raporları</p>
                        <p class="sub-title">Aracı Kurum Tavsiyeleri</p>
                    </div>
                    <div class="nav__menu__item --bottom-line">
                        <p class="title">EN ÇOK OKUNANLAR</p>
                        <p class="title">HALKA ARZ</p>
                        <p class="sub-title">Bitcoin</p>
                        <p class="sub-title">Ethereum</p>
                        <p class="sub-title">Litecoin</p>
                    </div>
                    <div class="nav__menu__item --bottom-line">
                        <p class="sub-title">Sterlin</p>
                        <p class="sub-title">Yen</p>
                        <p class="sub-title">Dolar</p>
                        <p class="sub-title">Euro</p>
                        <p class="sub-title">Türk Lirası</p>
                    </div>
                    <div class="nav__menu__item --bottom-line">
                        <p class="sub-title">Bist</p>
                        <p class="sub-title">Viop</p>
                        <p class="sub-title">Faiz</p>
                        <p class="sub-title">Altın</p>
                        <p class="sub-title">Gümüş</p>
                        <p class="sub-title">Petrol</p>
                    </div>
                    <div class="nav__menu__item">
                        <p class="sub-title">Bist</p>
                        <p class="sub-title">Viop</p>
                        <p class="sub-title">Faiz</p>
                        <p class="sub-title">Altın</p>
                        <p class="sub-title">Gümüş</p>
                        <p class="sub-title">Petrol</p>
                    </div>
                </div>
                <div class="nav__menu__container--right">
                    <div class="title__container">
                        <span class="title">Stil</span>
                    </div>
                    <div class="list__container">
                        <a href="/#" class="list__item">Spor</a>
                        <a href="/#" class="list__item">Teknoloji</a>
                        <a href="/#" class="list__item">Yaşam</a>
                        <a href="/#" class="list__item">Netkolik</a>
                        <a href="/#" class="list__item">Otomobil</a>
                        <a href="/#" class="list__item">Köşe Yazıları</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container nav__contanier--mobile">
            <button id="drawer-nav-button" class="menu__button" onclick="toggleDrawerNav(event)">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; pointer-events: none;"
                    fill="none" viewBox="0 0 24 24" stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <a href="{{ route('home.indextest') }}" class="header__nav__logo">
                <img src="{{ URL::asset('modules/home/sample/img/logo-dark.svg') }}" alt="Header Logo" width="226"
                    height="54">
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24; height: 24;" fill="none" viewBox="0 0 24 24"
                stroke="black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>

            <div id="drawer-nav" class="drawer__navigation" style="display: none;">
                <div
                    style="display: flex; justify-content: flex-end; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; background-color: #242424">
                    <button style="outline: none; border: none; background-color: transparent;"
                        onclick="toggleDrawerNav(event)">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;" fill="none"
                            viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="top">
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa Tube</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Twitter</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Şirket Haberleri</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Köşe Yazıları</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Eğitim</a>
                        </h2>
                    </div>
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa Tube</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Twitter</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Şirket Haberleri</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Köşe Yazıları</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Eğitim</a>
                        </h2>
                    </div>
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa Tube</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Twitter</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Şirket Haberleri</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Köşe Yazıları</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Eğitim</a>
                        </h2>
                    </div>
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa Raporları</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Bist</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Döviz</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Coin</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Emtia</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Parite</a>
                        </h2>
                    </div>
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Faiz</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Veniam</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Vel</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Delectus</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Natus</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Quia</a>
                        </h2>
                    </div>
                </div>
                <div class="stil">
                    <div class="list__container">
                        <h1 class="title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Stil</a>
                        </h1>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Borsa Tube</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Twitter</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Şirket Haberleri</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Köşe Yazıları</a>
                        </h2>
                        <h2 class="sub-title">
                            <a href="/home#" style="" onclick="toggleDrawerNav(event)">Eğitim</a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #242424;">
        <div class="container">
            <div class="header__bottom">
                <img style="flex: none;" src="{{ asset('modules/home/sample/img/hepsi-parafesorde.png') }}" alt=""
                    width="175" height="55">
                <div class="nav__text__container">
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
            </div>
        </div>
    </div>
</header>
