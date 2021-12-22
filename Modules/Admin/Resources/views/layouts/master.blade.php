<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parafesor | Dashboard</title>
    @yield('extra_plugins')
    <link rel="shortcut icon" type="image/jpg" href="{{asset('modules/home/sample/img/logo-icon.svg')}}"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ Module::asset('admin:plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ Module::asset('admin:plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->

    <link rel="stylesheet"
          href="{{ Module::asset('admin:dist/css/dropzone/dropzone.css') }}">

    <link rel="stylesheet"
          href="{{ Module::asset('admin:plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ Module::asset('admin:plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ Module::asset('admin:dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ Module::asset('admin:plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ Module::asset('admin:plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ Module::asset('admin:plugins/summernote/summernote-bs4.min.css') }}">
</head>
@yield('style')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img  class="animation__shake" src="{{asset('modules/home/sample/img/logo-icon.svg')}}" alt="Parafesor" height="60" width="60">
</div>

@include('admin::partials._nav')
@include('admin::partials._flash_messages')
@yield('content')

<!-- ./wrapper -->

<!-- jQuery -->
<script src={{ Module::asset('admin:plugins/jquery/jquery.min.js') }}></script>

<!-- jQuery UI 1.11.4 -->
<script src={{ Module::asset('admin:plugins/jquery-ui/jquery-ui.min.js') }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ Module::asset('admin:plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- ChartJS -->
<script src={{ Module::asset('admin:plugins/chart.js/Chart.min.js') }}></script>
<!-- Sparkline -->
<script src={{ Module::asset('admin:plugins/sparklines/sparkline.js') }}></script>
<script src={{ Module::asset('admin:plugins/jqvmap/jquery.vmap.min.js') }}></script>
<script src={{ Module::asset('admin:plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
<!-- jQuery Knob Chart -->
<script src={{ Module::asset('admin:plugins/jquery-knob/jquery.knob.min.js') }}></script>
<!-- daterangepicker -->
<script src={{ Module::asset('admin:plugins/moment/moment.min.js') }}></script>
<script src={{ Module::asset('admin:plugins/daterangepicker/daterangepicker.js') }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ Module::asset('admin:plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
<!-- Summernote -->
<script src={{ Module::asset('admin:plugins/summernote/summernote-bs4.min.js') }}></script>
<!-- overlayScrollbars -->
<script src={{ Module::asset('admin:plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ Module::asset('admin:dist/js/adminlte.min.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ Module::asset('admin:dist/js/demo.js') }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ Module::asset('admin:dist/js/pages/dashboard.js') }}></script>

<script src={{ Module::asset('admin:dist/js/dropzone/dropzone.js') }}></script>

@yield('extra_scripts')

</body>
</html>
