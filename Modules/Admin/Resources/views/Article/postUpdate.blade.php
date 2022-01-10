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
                    @if(!isset($article) || $article->status == \App\Parafesor\Constants\ArticleStatus::PUBLISHED)
                        <form id="form" method="post" data-parsley-validate
                              action={{route('article.store')}} enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">

                                <input name="ArticleId" type="number" class="form-control"
                                       placeholder="Lorem ipsum dolor"
                                       value="{{isset($article) ? $article->id : null}}"
                                       maxlength="200" autocomplete="off" hidden/>

                                <div class="col-md-9 row align-content-start">
                                    <div class="col-12">
                                        <label class="form-text">Başlık</label>
                                        <input name="Title" type="text" class="form-control"
                                               placeholder="Başlık Girin"
                                               id="articleTitle"
                                               value="{{isset($article) ? $article->title : ""}}"
                                               required="required"
                                               {{isset($article) && $article->assigner_id && !$user->can('assign articles') ? "readonly" : ""}} maxlength="200"
                                               autocomplete="off"/>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Kategori</label>
                                        <select class="form-control" name="ArticleTypeId" required="required"
                                                id="category" {{isset($article) && $article->assigner_id && !$user->can('assign articles') ? "readonly" : ""}}>
                                            @if(isset($article))
                                                <option
                                                    value="{{$article->article_type_id}}">{{$article->articleType->title}}</option>
                                            @endif
                                            @foreach($articleTypes as $type)
                                                <option value={{$type->id}}>{{$type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12" id="companySelect"
                                         style="{{isset($article) && $article->articleType->id == \App\Parafesor\Constants\ArticleTypes::SirketHaberleri ? "" : "display:none"}}">
                                        <label class="form-text">Şirket</label>
                                        <select class="form-control" name="CompanyId"
                                                id="company" {{isset($article) && $article->assigner_id  && !$user->can('assign articles') ? "readonly" : ""}}>
                                            @if(isset($article) && $article->company_id)
                                                <option
                                                    value="{{$article->company_id}}">{{$article->company->title}}</option>
                                            @endif
                                            @foreach($companies as $company)
                                                <option value={{$company->id}}>{{$company->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div
                                        class="col-12 form-group" {{isset($article) && $article->assigner_id && !$user->can('assign articles')  ? "hidden" : ""}}>
                                        <div class="col-6 mt-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark"
                                                            id="headerDrawing"
                                                            value="HeaderSlider">Header Slider
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="SecondSlider" id="SecondSlider"
                                                            style="{{isset($article) ? ($article->articleType->title == "Gündem" ? "" : "display:none") : ""}}">
                                                        Gündem Birinci
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="MainSlider">Kategori Slider
                                                    </button>
                                                </div>

                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="Normal" style="background-color: red">Normal
                                                    </button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="col-md-3">
                                                            <button type="button"
                                                                    class="btn btn-default text-bold border-dark "
                                                                    id="persistentDrawing"
                                                                    value="0">Kalıcı
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text"
                                           value="{{isset($article) && $article->show_case ? $article->show_case : "Normal"}}"
                                           name="PlacementSection" id="PlacementSection"
                                           hidden>

                                    <input type="number"
                                           value="{{isset($article) && $article->persistent ? $article->persistent : 0}}"
                                           name="PersistentSection" id="PersistentSection"
                                           hidden>

                                    <input type="number"
                                           value="{{isset($article) && $article->header_slider ? $article->header_slider : 0}}"
                                           name="HeaderSection" id="HeaderSection" hidden>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Özet</label>
                                        <textarea name="Description" class="form-control" rows="5"
                                                  autocomplete="off"
                                                  id="articleSummary"
                                                  maxlength="500"
                                                  required="required">{!! isset($article) ? $article->summary : "" !!}</textarea>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="col-12">
                                                <label style="color: black;">Resim</label>
                                                <br>
                                                {{--<input type="file" name="image" />
            --}}                                    {{--<input type="file" name="select_file" id="articleImage">--}}
                                                <input type="file" name="image"
                                                       class="image" {{isset($article) && $article->image_path ? "" : ""}}>
                                                <input type="text" name="image1" class="image" id="croppedImage"
                                                       value="{{old('image1')}}" hidden>
                                                <div class="col-12">
                                                    <label style="color: black;">Resim</label>
                                                    <br>
                                                    @if(isset($article) && $article->article_type_id == \App\Parafesor\Constants\ArticleTypes::Youtube)
                                                        <iframe width="560" height="315" loading="lazy"
                                                                src="https://www.youtube.com/embed/{{$article->external_site_id}}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                    @endif
                                                    @if((isset($article) && $article->article_type_id != \App\Parafesor\Constants\ArticleTypes::Youtube) && $article->image_path)
                                                        <div class="mt-5" style="max-width: 400px ">
                                                            <img src="{{asset($article->image_path)}}" alt=""
                                                                 id="savedImage">
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Parafesor
                                                                    Image</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
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
                                                                <button type="button" class="btn btn-primary"
                                                                        id="crop">
                                                                    Crop
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 hr"></div>
                                    <div style="display: none;">
                                <textarea name="BodyCheck" id="textareaHidden" hidden>
    {{isset($article) ? $article->old_body : ""}}
  </textarea>
                                    </div>

                                    <div class="col-md-12 hr"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-text">Seo Başlık</label>
                                        <input name="SeoTitle" type="text" class="form-control"
                                               placeholder="Seo Başlık Girin" maxlength="200"
                                               value="{{isset($article) ? $article->seo_title : ""}}"
                                               autocomplete="off" required/>
                                    </div>
                                </div>

                                <div class="col-md-3 row align-content-start">

                                    <div class="col-md-12 hr d-lg-none"></div>


                                    <div class="col-md-12 hr"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-text">Seo Açıklama</label>
                                        <textarea name="SeoDescription" type="text" rows="4" class="form-control"
                                                  placeholder="Seo için Açıklama Girin"
                                                  maxlength="1000"
                                                  required="required"
                                                  autocomplete="off">{{isset($article) ? $article->seo_description : old('SeoDescription')}}</textarea>
                                    </div>

                                    <div class="col-md-12 hr"></div>
                                    {{--<div class="col-md-12 form-group">
                                        <label class="form-text">Seo Anahtar Kelimeler</label>
                                        <input name="SeoKeywords" type="text" class="form-control"
                                               placeholder="Virgül ile ayrarak anahtar keline girin"
                                               maxlength="1000"
                                               autocomplete="off"
                                               required="required"
                                               value="{{isset($article) ? $article->seo_keywords :  old('SeoKeywords') }}"
                                        />
                                    </div>--}}

                                    <div class="col-12 hr"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-text">Tarih</label>
                                        <input name="ArticleDate" asp-format="{0:yyyy-MM-dd}" type="text"
                                               class="form-control date"
                                               value="{{\Carbon\Carbon::now()}}"
                                               placeholder="yyyy-mm-dd" autocomplete="off" required="required"/>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-text">Başlangıç Tarihi</label>
                                        <input asp-for="StartedOn" asp-format="{0:yyyy-MM-dd}" type="text"
                                               class="form-control date" name="StartedOn"
                                               value="{{\Carbon\Carbon::now()}}"
                                               placeholder="yyyy-mm-dd" autocomplete="off"/>
                                    </div>

                                    {{--<div class="col-12 hr"></div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-text">Bitiş Tarihi</label>
                                        <input asp-for="EndOn" asp-format="{0:yyyy-MM-dd}" type="text"
                                               class="form-control date" name="EndOn"
                                               value="{{\Carbon\Carbon::now()->add(2,"days")}}"
                                               placeholder="yyyy-mm-dd" autocomplete="off"/>
                                    </div>--}}


                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 hr"></div>
                                {{--<div class="col-6">
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                    </div>
                                    <textarea id="textarea2" style="width: 100%; height: 80%" disabled>
    {{isset($article) ? $article->old_body : ""}}
  </textarea>
                                </div>--}}
                                <div class="col-6">
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                    </div>
                                    <textarea name=Body id="textarea">
    {{isset($article) ? $article->body : ""}}

  </textarea>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </form>
                    @else
                        <form id="form" method="post" data-parsley-validate
                              action={{route('article.store')}} enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">

                                <input name="ArticleId" type="number" class="form-control"
                                       placeholder="Lorem ipsum dolor"
                                       value="{{isset($article) ? $article->id : null}}"
                                       maxlength="200" autocomplete="off" hidden/>

                                <div class="col-md-6 row align-content-start">
                                    <div class="col-12">
                                        <label class="form-text">Başlık</label>
                                        <input type="text" class="form-control"
                                               placeholder="Başlık Girin"
                                               id="articleTitle"
                                               value="{{isset($article) ? $article->title : ""}}"
                                               disabled/>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Kategori</label>
                                        <select class="form-control" required="required"
                                                id="category" disabled>
                                            @if(isset($article))
                                                <option
                                                    value="{{$article->article_type_id}}">{{$article->articleType->title}}</option>
                                            @endif
                                            @foreach($articleTypes as $type)
                                                <option value={{$type->id}}>{{$type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12 hr" style="margin-top: 150px;"></div>
                                    <div class="col-12">
                                        <label class="form-text">Özet</label>
                                        <textarea class="form-control" rows="5" autocomplete="off"
                                                  id="articleSummary"
                                                  maxlength="500"
                                                  disabled>{!! isset($article) ? $article->summary : "" !!}</textarea>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="col-12">
                                                <label style="color: black;">Resim</label>
                                                <br>
                                                @if(in_array('www.youtube.com',explode('/',$article->original_link)))
                                                    <iframe width="560" height="315"
                                                            src="https://www.youtube.com/embed/{{$article->external_site_id}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                @endif
                                                @if(($article->article_type_id != \App\Parafesor\Constants\ArticleTypes::Youtube) && isset($article) && $article->image_path)
                                                    <div class="mt-5" style="max-width: 400px ">
                                                        <img src="{{asset($article->image_path)}}" alt=""
                                                             id="savedImage">
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <input type="text"
                                               value="{{isset($article) ? $article->seo_title : ""}}"
                                               hidden>
                                    </div>
                                </div>

                                <div class="col-md-6 row align-content-start">
                                    <div class="col-12">
                                        <label class="form-text">Başlık</label>
                                        <input name="Title" type="text" class="form-control"
                                               value="{{isset($article) ? $article->title : ""}}"
                                               id="articleTitle"
                                               required="required" readonly maxlength="200" autocomplete="off"/>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Kategori</label>
                                        <select class="form-control" name="ArticleTypeId" required="required"
                                                id="category" readonly>
                                            @if(isset($article))
                                                <option
                                                    value="{{$article->article_type_id}}">{{$article->articleType->title}}</option>
                                            @endif
                                            @foreach($articleTypes as $type)
                                                <option value={{$type->id}} disabled>{{$type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12" id="companySelect"
                                         style="{{isset($article) ? ($article->articleType->id == \App\Parafesor\Constants\ArticleTypes::SirketHaberleri ? "" : "display:none") : ""}}">
                                        <label class="form-text">Şirket</label>
                                        <select class="form-control" name="CompanyId"
                                                id="company" readonly>
                                            @if(isset($article) && $article->company_id)
                                                <option
                                                    value="{{$article->company_id}}">{{$article->company->title}}</option>
                                            @endif
                                            @foreach($companies as $company)
                                                <option value={{$company->id}} disabled>{{$company->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="number" name="CompanyId"
                                           value="{{isset($article) && $article->company_id ? $article->company->id : ""}}"
                                           hidden>

                                    {{--<div class="col-12 form-group">
                                        <div class="col-6 mt-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-default text-bold border-dark"
                                                            id="headerDrawing"
                                                            value="HeaderSlider">Header Slider
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="MainSlider">Ana Slider
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="SecondSlider" id="SecondSlider"
                                                            style="{{isset($article) ? ($article->articleType->title == "Gündem" ? "" : "display:none") : ""}}">
                                                        İkinci Slider
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button"
                                                            class="btn btn-default text-bold border-dark placementDrawing"
                                                            value="Normal" style="background-color: red">Normal
                                                    </button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="col-md-3">
                                                            <button type="button"
                                                                    class="btn btn-default text-bold border-dark "
                                                                    id="persistentDrawing"
                                                                    value="0">Kalıcı
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}

                                    <input type="text"
                                           value="{{isset($article) && $article->show_case ? $article->show_case : "Normal"}}"
                                           name="PlacementSection" id="PlacementSection"
                                           hidden>

                                    <input type="number"
                                           value="{{isset($article) && $article->persistent ? $article->persistent : 0}}"
                                           name="PersistentSection" id="PersistentSection"
                                           hidden>

                                    <input type="number"
                                           value="{{isset($article) && $article->header_slider ? $article->header_slider : 0}}"
                                           name="HeaderSection" id="HeaderSection" hidden>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Özet</label>
                                        <textarea name="Description" class="form-control" rows="5" autocomplete="off"
                                                  id="articleSummary"
                                                  maxlength="500"
                                                  required="required"></textarea>
                                    </div>

                                    <div class="col-12 hr"></div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="col-12">
                                                <label style="color: black;">Resim</label>
                                                <br>
                                                {{--<input type="file" name="image" />
            --}}                                    {{--<input type="file" name="select_file" id="articleImage">--}}
                                                <input type="file" name="image"
                                                       class="image" {{isset($article) && $article->image_path ? "" : "required"}}>
                                                <input type="text" name="image1" class="image" id="croppedImage"
                                                       value="{{old('image1')}}" hidden>
                                                <input type="checkbox" name="sameImage"> Aynı Resim Kullanılsın mı?


                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Parafesor
                                                                    Image</h5>
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
                                                                <button type="button" class="btn btn-primary" id="crop">
                                                                    Crop
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 hr"></div>
                                    <div style="display: none;">
                                <textarea name="BodyCheck" id="textareaHidden" hidden>
    {{isset($article) ? $article->old_body : ""}}
  </textarea>
                                    </div>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 hr"></div>
                                <div class="col-6">
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                    </div>
                                    @if(isset($article) && $article->body)
                                        <textarea id="textarea2" style="width: 100%; height: 80%" disabled>
    {{isset($article) ? $article->old_body : ""}}
  </textarea>
                                    @else
                                        <div class="iframeDiv">
                                       {{--     <iframe src="{{$article->original_link}}" style="width: 100%;  height:90%;"
                                                    title="news" loading="lazy"></iframe>--}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                    </div>
                                    <textarea name=Body id="textarea">
    {{isset($article) ? $article->body : ""}}

  </textarea>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-text">Seo Başlık</label>
                                    <input name="SeoTitle" type="text" class="form-control"
                                           placeholder="Seo Başlık Girin" maxlength="200"
                                           value="{{isset($article) ? $article->seo_title : ""}}"
                                           autocomplete="off" required/>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-text">Seo Açıklama</label>
                                    <textarea name="SeoDescription" type="text" rows="4" class="form-control"
                                              placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum enim mi, laoreet sed ultrices vitae, dapibus vitae arcu. Praesent non massa lobortis, pharetra tortor ut, fermentum magna."
                                              maxlength="1000"
                                              required="required"
                                              autocomplete="off">{{old('SeoDescription') ? (isset($article) ? $article->seo_description : "") : ""}}</textarea>
                                </div>

                                {{-- <div class="col-md-3 form-group">
                                     <label class="form-text">Seo Anahtar Kelimeler</label>
                                     <input name="SeoKeywords" type="text" class="form-control"
                                            placeholder="Lorem,ipsum,dolor,sit,amet" maxlength="1000"
                                            autocomplete="off"
                                            required="required"
                                            value="{{isset($article) ? $article->seo_keywords :  old('SeoKeywords') }}"
                                     />
                                 </div>--}}

                                <div class="col-md-3 form-group">
                                    <label class="form-text">Tarih</label>
                                    <input name="ArticleDate" asp-format="{0:yyyy-MM-dd}" type="text"
                                           class="form-control date"
                                           value="{{isset($article) && $article->status == \App\Parafesor\Constants\ArticleStatus::PUBLISHED ? $article->article_date : \Carbon\Carbon::now()}}"
                                           placeholder="yyyy-mm-dd" autocomplete="off" required="required"/>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label class="form-text">Başlangıç Tarihi</label>
                                    <input asp-for="StartedOn" asp-format="{0:yyyy-MM-dd}" type="text"
                                           class="form-control date" name="StartedOn"
                                           value="{{isset($article) && $article->status == \App\Parafesor\Constants\ArticleStatus::PUBLISHED ? $article->start_date : \Carbon\Carbon::now()}}"
                                           placeholder="yyyy-mm-dd" autocomplete="off"/>
                                </div>

                                {{--     <div class="col-md-3 form-group">
                                         <label class="form-text">Bitiş Tarihi</label>
                                         <input asp-for="EndOn" asp-format="{0:yyyy-MM-dd}" type="text"
                                                class="form-control date" name="EndOn"
                                                value="{{isset($article) && $article->status == \App\Parafesor\Constants\ArticleStatus::PUBLISHED ? $article->end_date : \Carbon\Carbon::now()->add(2,"days")}}"
                                                placeholder="yyyy-mm-dd" autocomplete="off"/>
                                     </div>--}}

                            </div>
                            <div class="row mt-3">
                                <button type="submit" class="btn btn-success mt-5">Kaydet</button>
                            </div>
                            @endif
                            <div class="row mt-3">
                                <button class="btn btn-danger" id="previewButton" type="button">Önizleme</button>
                            </div>

                        </form>


                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra_scripts')
    @include('admin::partials._postUpdate_javascript')
    <script>
        $(".placementDrawing").on("click", function () {
            $('.placementDrawing').each(function () {
                $(this).removeClass("activated");
                $(this).css("background-color", "");
            })
            $(this).addClass("activated");
            $("#PlacementSection").attr("value", $(this).attr("value"));
            $(this).css("background-color", "red");

        });


    </script>

    <script type="text/javascript">
        $(window).load(function () {
            var f = document.createElement('iframe');
            f.src = {{$article->original_link}};
            f.width = 100%;
            f.height = 90%;
            $('.iframeDiv').append(f);
        });
    </script>
@endsection
