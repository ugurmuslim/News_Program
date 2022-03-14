@extends('admin::layouts.master')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mega Menü</h3>
                        </div>
                        <form id="form" method="post" data-parsley-validate
                              action={{route('system.mega-menu.update',$megaMenu->id)}} >
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Başlık</label>
                                            <input type="text" class="form-control" name="title" required id="title"
                                                   value="{{$megaMenu->title}}"
                                                   placeholder="Başık">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="url" class="col-form-label">Tam Link</label>
                                            <input type="url" class="form-control" name="url" required id="url"
                                                   value="{{$megaMenu->url}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sort" class="col-form-label">Sıralama</label>
                                            <input type="number" class="form-control" name="sort" required id="sort"
                                                   value="{{$megaMenu->sort}}"
                                                   placeholder="Sıralama örnek:10">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label for="">Özellikler</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="bold" value="1" {{$megaMenu->bold ? 'checked' : ''}}
                                                       id="bold">
                                                <label class="form-check-label" for="bold">Bold/Kalın</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="uppercase" value="1" {{$megaMenu->uppercase ? 'checked' : ''}}
                                                       name="uppercase">
                                                <label class="form-check-label" for="uppercase">Büyük Harf</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="external" value="1" {{$megaMenu->external ? 'checked' : ''}}
                                                       name="external">
                                                <label class="form-check-label" for="external">Yeni Sayfada
                                                    Açılsın</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="active" value="1" {{$megaMenu->active ? 'checked' : ''}}
                                                       name="active">
                                                <label class="form-check-label" for="active">Aktif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success  float-right"><i class="fa fa-save"></i>
                                    Kaydet
                                </button>
                                <a href="{{route('system.mega-menu.index')}}" type="submit" class="btn btn-default float-right mr-3"><i
                                            class="fa fa-chevron-left"></i> &nbsp; Geri Dön
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra_scripts')
@endsection
