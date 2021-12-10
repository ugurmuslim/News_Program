@extends('home::layouts.master')

@section('content')
    <nav class="navbar navbar-expand-md navbar-light ">
        <div class="navbar-collapse collapse dual-nav order-2 order-md-1 justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Altın</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hisse Senedi</a>
                </li>
            </ul>
        </div>

        <a href="" class="navbar-brand mx-auto order-0 order-md-2 p-2"><img
                src="http://www.parafesor.net/imagesbuyuk/logo.png" alt="Parafesor.Net Finans Haber Portalı"></a>

        <div class="navbar-collapse collapse dual-nav order-3 order-md-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Hisse Senedi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Altın</a>
                </li>
            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav"
        ">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>


    <div id="black-header" style="background-color: black">
        <ul class="list-group list-group-horizontal justify-content-center p-2" style="border-radius: 12px;">
            <li class="list-group-item  d-inline-block">Bloomberg HT</li>
            <li class="list-group-item  d-inline-block">Borsa Gündem</li>
            <li class="list-group-item  d-inline-block">Hisse Net</li>
            <li class="list-group-item  d-inline-block">Kanal Finans</li>
            <li class="list-group-item  d-inline-block">Borsa Matik</li>
            <li class="list-group-item  d-inline-block">BorsaTek</li>
            <li class="list-group-item  d-inline-block">Business HT</li>
            <li class="list-group-item  d-inline-block">Market Watch</li>
            <li class="list-group-item  d-inline-block">CNN Business</li>
        </ul>
    </div>

    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                @foreach($slider as $s)
                    <li class="glide__slide">
                        <div class="cm-slide-item"
                             style="background-image: url(https://www.commentary.org/wp-content/uploads/2021/08/Crown_Heights_protest.jpg); height: 705px; background-repeat:no-repeat; background-position: center;"></div>
                    </li>
                    @endforeach
                    </ul>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
        </div>
    </div>


    <div class="container-xl mt-5">
        <section class="Gündem">
            <div class="row">
                <h2 class="section-headers">Gündem</h2><span> </span>
            </div>
            <div class="row mt-5">
                <div class="col-md-9">
                    <div class="row">
                        @foreach($articles["Gündem"]->take(2) as $article)
                            <div class="col-md-6">
                                <div class="post-image">
                                    <div class="post-image-box">
                                        <a href="https://www.commentary.org/noah-rothman/progressives-hand-democrats-another-embarrassment/">
                                            <img
                                                src="{{$article->image_path}}"
                                                style="max-width: 900px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <h1 class="post-body-title">
                                        {{$article->title}}
                                    </h1>
                                </div>
                                <p>fsdfdsf</p>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-5">

                        @foreach($articles["Gündem"]->slice(2)->take(4) as $article)
                            <div class="col-md-3">
                                <div class="post-image">
                                    <div class="post-image-box">
                                        <a href="{{route('article.show',['slug' =>  'sda0'])}}">
                                            <img
                                                src="{{$article->image_path}}"
                                                style="max-width: 300px;">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-body">
                                    <h1 class="post-body-title">
                                        {{$article->title}}
                                    </h1>
                                </div>
                                <div class="post-detail">
                                    <span
                                        class="date float-left">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span>
                                    <span
                                        class="time float-left ml-3">{{ Carbon\Carbon::parse($article->created_at)->format('H:m')}}</span>
                                    <span class="float-left ml-3">by parafesor</span>
                                </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div style="width: 24rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                            <li class="list-group-item">An item<span class="float-right">3</span><span
                                    class="float-right mr-5">+2.55%</span></li>
                    </div>
                </div>
            </div>
        </section>

        <section class="KöşeYazıları mt-5">
            <div class="row mt-5">
                <h2 class="section-headers">Şirket Haberleri</h2><span> </span>
            </div>

            <div class="row mt-5">
                <div class="col-md-8">
                    <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                         alt="Suresh Dasari Card">
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img"
                                     src={{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}} alt="Suresh Dasari
                                     Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="KmşeYazıları mt-5">
            <div class="row mt-5">
                <h2 class="section-headers">Köşe Yazıları</h2><span> </span>
            </div>

            <div class="row mt-5">
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-sm-5">
                                <img class="card-img" src="{{asset('images/dd6333663a3c025c66b6c289d0d292@2x.png')}}"
                                     alt="Suresh Dasari Card">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suresh Dasari</h5>
                                    <p class="card-text">Suresh Dasari is a founder and technical lead developer in
                                        tutlane.</p>
                                    <a href="#" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="EnÇokOkunanlar mt-5">
            <div class="row mt-5">
                <h2 class="section-headers">En Çok Okunanlar</h2><span> </span>
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset("images/n_40px-MiGROS_Logosvg.png")}}" alt="">
                        </div>
                        <div class="card-body">
                            fsafsdfdsf

                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="SonDakika mt-5">
            <div class="row mt-5">
                <h2 class="section-headers">Son Dakika</h2><span> </span>
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <img
                                src="{{$slider[0]->image_path}}"
                                style="max-width: 400px;">
                        </div>
                        <div class="card-body">
                            {{ $slider[0]->title }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">
                            <img
                                src="{{$slider[1]->image_path}}"
                                style="max-width: 400px;">
                        </div>
                        <div class="card-body">
                            {{ $slider[1]->title }}
                        </div>
                    </div>
                </div>
                @if(isset($slider[2]))
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img
                                    src="{{$slider[2]->image_path}}"
                                    style="max-width: 400px;">
                            </div>
                            <div class="card-body">
                                {{ $slider[2]->title }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    @foreach($slider->slice(3)->take(6) as $article)
                        <div class="col-md-2">
                            <div class="post-image">
                                <div class="post-image-box">
                                    <a href="{{route('article.show',['slug' =>  'sda0'])}}">
                                        <img
                                            src="{{$article->image_path}}"
                                            style="max-width: 300px;">
                                    </a>
                                </div>
                            </div>
                            <div class="post-body">
                                <h1 class="post-body-title">
                                    {{$article->title}}
                                </h1>
                            </div>
                            <div class="post-detail">
                                    <span
                                        class="date float-left">{{ Carbon\Carbon::parse($article->created_at)->format('d F')}}</span>
                                <span
                                    class="time float-left ml-3">{{ Carbon\Carbon::parse($article->created_at)->format('H:m')}}</span>
                                <span class="float-left ml-3">by parafesor</span>
                            </div>
                            </article>
                        </div>
            @endforeach

        </section>

    </div>

@endsection

