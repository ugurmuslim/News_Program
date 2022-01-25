<!doctype html>
<html lang="en">

<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(87269010, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/87269010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') Parafesör | Paranıza Akıl Verir</title>
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('seo_title', 'Parafesor')" />
    <meta property="og:description" content="@yield('seo_description', 'Parafesor')" />
    <meta property="og:url" content="@yield('site_url', url()->current())" />
    <meta property="og:site_name" content="Parafesor" />
    <meta property="og:article:publisher" content="https://www.parafesor.net" />
    <meta property="og:article:published_time" content="@yield('article_pub_date',\Carbon\Carbon::now()->tz('Europe/Istanbul')->toAtomString())" />
    <meta property="og:article:modified_time" content="@yield('article_pub_date',\Carbon\Carbon::now()->tz('Europe/Istanbul')->toAtomString())" />
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('modules/home/sample/img/logo-icon.svg') }}" />
    <!--    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">-->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('modules/home/sample/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/main.css') }}" rel="stylesheet" type="text/css" />
    {{-- Header Resources - Start --}}
    <link href="{{ asset('modules/home/sample/css/header.css') }}" rel="stylesheet" type="text/css" />
    {{-- Header Resources - End --}}
    <link href="{{ asset('modules/home/sample/css/topSlider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/articles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/corporate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/share-recommendation.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/tweets.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/tube.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/most-red.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/last-min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/sport.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/life.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/tech.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/automobile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/crypto.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/internet.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('modules/home/sample/css/education.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('modules/home/sample/css/common.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modules/home/sample/css/glide.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('modules/home/sample/css/font-awesome/all.min.css') }}"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>
    <script src="{{ asset('modules/home/sample/js/font-awesome/all.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('extra_css')
    <!-- Favicons -->
    <!--    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">-->
    <!--    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">-->
    <!--    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">-->
    <!--    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">-->
    <!-- Custom styles for this template -->
    <!--    <link href="headers.css" rel="stylesheet">-->
</head>

<body class="home">
    @yield('content')
    @yield('extra_scripts')
    <script src="{{asset('modules/home/sample/js/header.js')}}"></script>

</body>

</html>
