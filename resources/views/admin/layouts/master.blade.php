<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parafesor | Dashboard</title>
    @yield('extra_plugins')
    <link rel="shortcut icon" type="image/jpg" href="{{asset('assets/home/sample/img/logo-icon.svg')}}"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->

    <link rel="stylesheet"
          href="{{ asset('assets/admin/dist/css/dropzone/dropzone.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
</head>
@yield('style')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img  class="animation__shake" src="{{asset('assets/home/sample/img/logo-icon.svg')}}" alt="Parafesor" height="60" width="60">
</div>

@include('admin.partials._nav')
@include('admin.partials._flash_messages')
@yield('content')

<!-- ./wrapper -->

<!-- jQuery -->
<script src={{ asset('assets/admin/plugins/jquery/jquery.min.js') }}></script>

<!-- jQuery UI 1.11.4 -->
<script src={{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- ChartJS -->
<script src={{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}></script>
<!-- Sparkline -->
<script src={{ asset('assets/admin/plugins/sparklines/sparkline.js') }}></script>
<script src={{ asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js') }}></script>
<script src={{ asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js') }}></script>
<script src={{ asset('assets/admin/plugins/select2/js/select2.js') }}></script>
<!-- daterangepicker -->
<script src={{ asset('assets/admin/plugins/moment/moment.min.js') }}></script>
<script src={{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
<!-- Summernote -->
<script src={{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}></script>
<!-- overlayScrollbars -->
<script src={{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('assets/admin/dist/js/adminlte.min.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset('assets/admin/dist/js/demo.js') }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset('assets/admin/dist/js/pages/dashboard.js') }}></script>

<script src={{ asset('assets/admin/dist/js/dropzone/dropzone.js') }}></script>

@yield('extra_scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function (image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazy");

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function () {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function (img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    })

</script>
</body>
</html>
