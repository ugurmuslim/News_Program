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
                    <h1>{{$bot->site_name}}</h1>
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
                                @if($bot->crawl_type)
                                    <div class="col-12">
                                        <label class="form-text">Başlık</label>
                                        <input name="titleAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteImage"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'title')->first() ? $botAttributes->where('type', 'title')->first()->value : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Görsel</label>
                                        <input name="imageAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteImage"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'image')->first() ? $botAttributes->where('type', 'image')->first()->value : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Görsel Attribute</label>
                                        <input name="imageAttrContentPlace" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteImage"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'image')->first() ? $botAttributes->where('type', 'image')->first()->content_place : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Özet</label>
                                        <input name="summaryAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'summary')->first() ? $botAttributes->where('type', 'summary')->first()->value : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    {{--<div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">İçerik</label>
                                        <input name="bodyAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? $botAttributes->where('type', 'body')->first()->value : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>--}}
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Tarih</label>
                                        <input name="dateAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'date')->first() ? $botAttributes->where('type', 'date')->first()->value : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Tarih Attribute</label>
                                        <input name="dateAttrContentPlace" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'date')->first() ? $botAttributes->where('type', 'date')->first()->content_place : "") : ""}}"
                                               required="required" maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Kaynak</label>
                                        <input name="sourceAttr" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'source')->first() ? $botAttributes->where('type', 'source')->first()->value : "") : ""}}"
                                               maxlength="200" autocomplete="off"/>
                                    </div>
                                    <div class="col-12 hr"></div>
                                    <div class="col-12">
                                        <label class="form-text">Kaynak Attribute</label>
                                        <input name="sourceAttrContentPlace" type="text" class="form-control"
                                               placeholder="Lorem ipsum dolor"
                                               id="siteContent"
                                               value="{{$botAttributes->count() > 0 ? ($botAttributes->where('type', 'source')->first() ? $botAttributes->where('type', 'source')->first()->content_place : "") : ""}}"
                                                maxlength="200" autocomplete="off"/>
                                    </div>
                                @endif
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
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{route('bot.test', [$bot->id])}}" class="btn btn-warning">Test</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            @if(count($crawledArticles))
                <div class="row">
                    <table class="table table-bordered mt-5">
                        <thead>
                        <tr>
                            <th>Link</th>
                            <th>Hata</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Özet</th>
                            <th>Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($crawledArticles as $news)
                            <tr>
                                <td>{{$news->original_link}}</td>
                                <td>{{$news->message}}</td>
                                <td style="font-weight: bold">
                                    {{--<img
                                        src="{{ $news->image_path  }}"
                                        style="max-width:100px;" alt="">--}}
                                    <img
                                        src="{{asset($news->image_path)}}" loading="lazy"
                                        style="max-width:100px;" alt=""></td>
                                <td>{{$news->title}}</td>
                                <td>{{$news->summary}}</td>
                                <td>{{$news->pub_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            @endif

            @if(count($crawledErrors))
                <h1>Hatalar</h1>
                <div class="row">
                    <table class="table table-bordered mt-5">
                        <thead>
                        <tr>
                            <th>Link</th>
                            <th>Hata</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Özet</th>
                            <th>Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($crawledErrors as $news)
                            <tr>
                                <td>{{$news->original_link}}</td>
                                <td>{{$news->message}}</td>
                                <td style="font-weight: bold">
                                    {{--<img
                                        src="{{ $news->image_path  }}"
                                        style="max-width:100px;" alt="">--}}
                                    <img
                                        src="{{asset($news->image_path)}}" loading="lazy"
                                        style="max-width:100px;" alt=""></td>
                                <td>{{$news->title}}</td>
                                <td>{{$news->summary}}</td>
                                <td>{{$news->pub_date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>
    </div>
@endsection
