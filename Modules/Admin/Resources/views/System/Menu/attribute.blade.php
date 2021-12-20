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
                          action={{route('bot.updateAttributes',[$bot->id,$bot->site_name])}} enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-md-9 row align-content-start">
                                <div class="col-12">
                                    <select class="form-control" name="ArticleTypeId" required="required"
                                            id="category">
                                            <option
                                                value="{{$bot->articleType->id}}">{{$bot->articleType->title}}</option>

                                        @foreach($articleTypes as $type)
                                            <option value={{$type->id}}>{{$type->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-text">Görsel</label>
                                    <input name="imageAttr" type="text" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           id="siteImage"
                                           value="{{isset($botAttributes) ? $botAttributes->where('type', 'image')->first()->value : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>

                                <div class="col-12 hr"></div>
                                <div class="col-12">
                                    <label class="form-text">İçerik</label>
                                    <input name="bodyAttr" type="text" class="form-control"
                                           placeholder="Lorem ipsum dolor"
                                           id="siteContent"
                                           value="{{isset($botAttributes) ? $botAttributes->where('type', 'body')->first()->value : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked"
                                               {{$bot->status ? "checked" : ""}} name="runnable">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Bot Çalışsın mı?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-5">Kaydet</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
