<!doctype html>
<html lang="tr">
<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(87269010, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HYCW0HC457"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-HYCW0HC457');
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/87269010" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') Parafesör | Paranıza Akıl Verir</title>
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('seo_title', 'Parafesör | Paranıza Akıl Verir')"/>
    <meta property="og:description" content="@yield('seo_description', 'Parafesor')"/>
    <meta property="og:url" content="@yield('site_url', url()->current())"/>
    <meta property="og:site_name" content="Parafesor"/>
    <meta property="og:image" content="@yield('seo_image', 'Parafesor')"/>
    <meta property="og:article:publisher" content="https://www.parafesor.net"/>
    <meta property="og:article:published_time"
          content="@yield('article_pub_date',\Carbon\Carbon::now()->tz('Europe/Istanbul')->toAtomString())"/>
    <meta property="og:article:modified_time"
          content="@yield('article_pub_date',\Carbon\Carbon::now()->tz('Europe/Istanbul')->toAtomString())"/>
    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@parafesor">
    <meta name="twitter:creator" content="@parafesör">
    <meta name="twitter:title" content="@yield('seo_title', 'Parafesör | Paranıza Akıl Verir')">
    <meta name="twitter:description" content="@yield('seo_description', 'Parafesor')">
    <meta name="twitter:image" content="@yield('seo_image', 'Parafesor')">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/home/sample/img/logo-icon.svg') }}"/>
    <link href="{{ asset('assets/home/sample/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/home/sample/css/main.css') }}?v=13" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/home/sample/css/header.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/home/sample/css/common.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
    {{--    <script src="{{ asset('assets/home/sample/js/font-awesome/all.min.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
    @yield('extra_css')
</head>
<body class="home">
@yield('content')
@yield('extra_scripts')
<script src="{{asset('assets/home/sample/js/header.js')}}"></script>
</body>
</html>
