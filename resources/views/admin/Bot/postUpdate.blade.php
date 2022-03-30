@extends('admin.layouts.master')
@section('extra_plugins')
    <script src="https://cdn.tiny.cloud/1/m0ee96ow3fu0fkmv687ilbm1ktuhlc0ogehbycr9qvqmjy89/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
          integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
            integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
@endsection
@section('style')
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endsection


@section('content')

    <div class="wrapper">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Botlar</h1>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Botlar</li>
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
                          action={{route('bot.store')}} enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">

                            <div class="col-md-9 row align-content-start">
                                <div class="col-10">
                                    <input name="id" type="number" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           value="{{isset($siteToCrawl) ? $siteToCrawl->id : null}}"
                                           hidden/>
                                    <label class="form-text">Kategori</label>
                                    <select class="form-control" name="CrawlType" required="required"
                                            id="category">
                                        @if(old('CrawlType'))
                                            <option
                                                value="{{old('CrawlType')}}">{{old('CrawlType') == 0 ? "RSS Crawler" : "Site Crawler"}}</option>
                                        @endif
                                        @if(isset($siteToCrawl))
                                            <option value="{{$siteToCrawl->crawl_type}}">{{$siteToCrawl->crawl_type == 0 ? "RSS Crawler" : "Site Crawler"}}</option>
                                        @endif
                                        <option value="0">RSS Crawler</option>
                                        <option value="1">Site Crawler</option>
                                    </select>
                                </div>
                                <div class="col-10">
                                    <label class="form-text">Link</label>
                                    <input name="ChannelLink" type="text" class="form-control"
                                           placeholder="RSS i veya youtube kanalını girin"
                                           id="ChannelLink"
                                           value="{{isset($siteToCrawl) ? $siteToCrawl->title : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>

                                <div class="col-10">
                                    <label class="form-text">İsim</label>
                                    <input name="Name" type="text" class="form-control"
                                           placeholder="Kanal İsmi"
                                           id="name"
                                               value="{{isset($siteToCrawl) ? $siteToCrawl->site_name : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>
                            </div>

                            <div class="col-md-3 row align-content-start">
                                <label class="form-text">Kategori</label>
                                <select class="form-control" name="ArticleTypeId" required="required" id="category">
                                    @if(old('ArticleTypeId'))
                                        <option
                                            value="{{old('ArticleTypeId')}}">{{\App\Models\ArticleType::find(old('ArticleTypeId'))->title}}</option>
                                    @endif
                                    @if(isset($siteToCrawl))
                                        <option value="{{$siteToCrawl->article_type_id}}">{{\App\Models\ArticleType::find($siteToCrawl->article_type_id)->title}}</option>
                                    @endif
                                    <option value=></option>
                                    @foreach($articleTypes as $type)
                                        <option value={{$type->id}}>{{$type->title }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </div>

                            <div class="col-12">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked"
                                           {{isset($siteToCrawl) ? ($siteToCrawl->status ? "checked" : "") : ""}} name="status">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Bot Çalışsın mı?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra_scripts')
    @include('admin.partials._postUpdate_javascript')
@endsection
