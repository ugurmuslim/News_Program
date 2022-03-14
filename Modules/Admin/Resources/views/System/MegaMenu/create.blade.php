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
                              action={{route('system.mega-menu.store')}} >
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Başlık</label>
                                            <input type="text" class="form-control" name="title" required id="title"
                                                   value="{{old('title')}}"
                                                   placeholder="Başlık">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="url" class="col-form-label">Tam Link</label>
                                            <input type="url" class="form-control" name="url" required id="url"
                                                   value="{{old('url')}}"
                                                   placeholder="Link">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sort" class="col-form-label">Sıralama</label>
                                            <input type="number" class="form-control" name="sort" required id="sort"
                                                   value="{{old('sort',$last+5)}}"
                                                   placeholder="Sıralama örnek:10">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label for="">Özellikler</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="bold" value="1"
                                                       id="bold">
                                                <label class="form-check-label" for="bold">Bold/Kalın</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="uppercase" value="1"
                                                       name="uppercase">
                                                <label class="form-check-label" for="uppercase">Büyük Harf</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="external" value="1"
                                                       name="external">
                                                <label class="form-check-label" for="external">Yeni Sayfada
                                                    Açılsın</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="active" value="1"
                                                       name="active" checked>
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
                                <a href="{{route('system.mega-menu.index')}}" class="btn btn-default float-right mr-3"><i
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
