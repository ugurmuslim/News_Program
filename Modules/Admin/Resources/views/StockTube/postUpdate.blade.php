@extends('admin::layouts.master')
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
                            <h1 class="m-0">{{$channel ? "Kanallar" : "Videolar"}}</h1>
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
                          action={{route('stockTube.store')}} enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">

                            <input name="channel" type="number" class="form-control"
                                   value="{{isset($article) ? $article->channel : $channel}}"
                                   maxlength="200" autocomplete="off" hidden/>

                            <input name="category" type="number" class="form-control" id="category"
                                   value="{{\App\Parafesor\Constants\ArticleTypes::BorsaTube}}"
                                   maxlength="200" autocomplete="off" hidden/>

                            <input name="ArticleId" type="number" class="form-control"
                                   placeholder="Lorem ipsum dolor"
                                   value="{{isset($article) ? $article->id : null}}"
                                   maxlength="200" autocomplete="off" hidden/>

                            <div class="col-md-9 row align-content-start">
                                <div class="col-12">
                                    <label class="form-text">Başlık</label>
                                    <input name="Title" type="text" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           id="articleTitle"
                                           value="{{isset($article) ? $article->title : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>


                                <div class="col-12 hr"></div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <label style="color: black;">Resim</label>
                                            <br>
                                            {{--<input type="file" name="image" />
        --}}                                    {{--<input type="file" name="select_file" id="articleImage">--}}
                                            <input type="file" name="image" class="image">
                                            <input type="text" name="image1" class="image" id="croppedImage" hidden>

                                            @if(isset($article) && $article->image_path)
                                                <div class="mt-5" style="{{$article->channel ?  "max-width: 100px;" : "max-width: 400px;" }} ">
                                                    <img src="{{asset($article->image_path)}}" alt="">
                                                </div>
                                            @endif

                                            <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                                 aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Parafesor Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="img-container">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <img id="image"
                                                                             src="https://avatars0.githubusercontent.com/u/3456749">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="preview"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <button type="button" class="btn btn-primary" id="crop">Crop
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 hr"></div>

                                <div class="col-12">
                                    <label class="form-text">Link</label>
                                    <input name="originalLink" type="text" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           id="articleTitle"
                                           value="{{isset($article) ? $article->original_link : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>
                            </div>

                            <div class="col-md-3 row align-content-start">

                                <div class="col-md-12 hr d-lg-none"></div>

                                <div class="col-12 hr"></div>
                                <div class="col-12 form-group">
                                    <label class="form-text">Öne çıkan makale mi?</label>
                                    <select name="isShowCase" class="form-control" required="required" id="isShowCase">
                                        @if($channel == 1 || (isset($article) && $article->channel == 1))
                                            <option
                                                value="Channel">Logo
                                            </option>
                                        @endif
                                        @if(isset($article))
                                            <option
                                                value="{{$article->show_case}}">{{$article->show_case ? "Evet" : "Hayır"}}</option>
                                        @endif
                                        @if(($channel == 0) || (isset($article) && !$article->channel))
                                            <option value="Normal">Hayır</option>
                                            <option value="MainSlider">Evet</option>
                                        @endif
                                    </select>
                                </div>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </form>
                    <button class="btn btn-danger float-right" id="previewButton">Önizleme</button>

                </div>
            </section>
        </div>
    </div>

@endsection
@section('extra_scripts')
    @include('admin::partials._postUpdate_javascript')
@endsection
