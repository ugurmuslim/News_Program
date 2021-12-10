@extends('admin::layouts.master')
@section('extra_plugins')
    <script src="https://cdn.tiny.cloud/1/m0ee96ow3fu0fkmv687ilbm1ktuhlc0ogehbycr9qvqmjy89/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
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
                    <form id="form" method="post" data-parsley-validate
                          action={{route('article.assignStore', ['id'=> $news->id])}}>
                        @csrf
                        <div class="row row-sm">
                            <div class="col-md-9 row align-content-start">
                                <div class="col-12">
                                    <label class="form-text">Başlık</label>
                                    <input name="Title" type="text" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           required="required" maxlength="200" autocomplete="off"
                                           value="{{$news->title}}" disabled/>
                                </div>
                                <div class="col-12">
                                    <label class="form-text">Kategori</label>
                                    <select class="form-control" name="ArticleTypeId" required="required" id="category">
                                            <option
                                                value="{{$news->articleType->id}}">{{$news->articleType->title}}</option>
                                        @foreach($articleTypes as $type)
                                            <option value={{$type->id}}>{{$type->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 hr"></div>
                                <div class="col-12">
                                    <label class="form-text">Açıklama</label>
                                    <textarea name="Description" class="form-control" rows="5" autocomplete="off"
                                              maxlength="500"
                                              required="required" disabled>{!!  \Illuminate\Support\Str::limit($news->summary, 795, $end='...') !!}</textarea>
                                </div>

                                <div class="col-12 hr"></div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                    </div>
                                    <textarea name=Body id="textarea">
                     {!! strip_tags($news->body, '<p><img><script>') !!}
            </textarea>
                                </div>


                            </div>

                            <div class="col-md-3 row align-content-start">
                                <div class="col-12 hr"></div>
                                <div class="col-12">
                                    <label class="form-text">Resim</label>
                                </div>
                                <div class="col-12 hr">
                                    <img src="{{$news->image_path}}" style="max-width: 300px;">
                                </div>
                                <div class="col-12 hr"></div>
                                <div class="col-12">
                                    <label class="form-text">Atama Yap</label>
                                    <select class="form-control" name="editorId" required="required">
                                        <option value="">Lütfen Seçiniz</option>
                                        @foreach($editors as $editor)
                                            <option value={{$editor->id}}>{{$editor->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success mt-5">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra_scripts')
    <script>
        tinymce.init({
            selector: '#textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: "480",
            readonly: "true",
        });

    </script>
@endsection
