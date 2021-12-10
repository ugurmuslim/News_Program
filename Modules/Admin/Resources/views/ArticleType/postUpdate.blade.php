@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Makaleler</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Makaleler</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form id="form" method="post" data-parsley-validate
                          action={{route('articleType.postUpdate',[$articleType->id])}} enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-md-9 row align-content-start">
                                @php
                                    $images = [];
                                @endphp

                                @foreach($imageDimensions as $imageType => $dimensions)
                                    <div class="col-12">
                                        @foreach($dimensions as $dimension => $value)
                                            <label
                                                class="form-text">{{$imageType . " - " .  strtoupper($dimension)}}</label>
                                            <input name="images[{{$imageType}}][{{$dimension}}]" type="array"
                                                   class="form-control"
                                                   placeholder="Lorem ipsum dolor"
                                                   id="siteImage"
                                                   value="{{$value}}"
                                                   required="required" maxlength="200" autocomplete="off"/>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="col-12 hr"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-5">Kaydet</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
