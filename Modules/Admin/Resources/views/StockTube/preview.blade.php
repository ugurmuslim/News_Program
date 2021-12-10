@extends('home::layouts.master')
@section('title', $title)
@section('content')
    @include('home::partials._header')
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

    <div>


    </div>
    <div class="title text-center">
        <h1>{{$title}}</h1>
    </div>

    <div class="image">
        <div class="image mt-5">
            <img
                id="preview_img"
                src="{{$image}}"
                class="rounded mx-auto d-block" alt="...">
        </div>
        {{--       <img
                   src="https://media.istockphoto.com/photos/illustration-of-generic-compact-car-front-view-closeup-shot-picture-id1147135094"
                   class="rounded mx-auto d-block" alt="...">--}}
    </div>


    <div class="container mt-5">
        <div class="row summary ">
            <span class="font-italic">
                {{$summary}}
            </span>
        </div>

        <div class="row mt-5">
            {!! $body !!}}
        </div>
    </div>
@endsection
@section('extra_scripts')

    <script>
        /* $(document).ready(function () {
             console.log({{$image}});
        console.log(URL.createObjectURL({{$image}}));
        $("#preview_img").src = URL.createObjectURL({{$image}});
    });*/
    </script>
@endsection
