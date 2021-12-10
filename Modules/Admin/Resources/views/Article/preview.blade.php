@extends('home::layouts.master')
@section('title', $title)
@section('content')
    @include('home::partials._header')

    <div>


    </div>
    <div class="title text-center">
        <h1>{{$title}}</h1>
    </div>

    <div class="image">
        <div class="image mt-5 mx-auto d-block" style="max-width: 1000px;">
            <img
                src="{{$image}}"
                class="rounded mx-auto d-block img-fluid" alt="...">
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
            {!! $body !!}
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
