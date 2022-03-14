@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mega Menü</h3>
                            <a class="btn btn-outline-dark  float-right" href="{{route('system.mega-menu.create')}}"><i
                                        class="fa fa-plus"></i> &nbsp; Yeni Kayıt Ekle</a>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Link</th>
                                    <th>Sıra</th>
                                    <th>Aksiyon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $m)
                                    <tr>
                                        <td>{{$m->title}}</td>
                                        <td>{{$m->url}}</td>
                                        <td>{{$m->sort}}</td>
                                        <td>
                                            <a href="{{route('system.mega-menu.delete',$m->id)}}"
                                               class="btn btn-danger btn-xs">Kaldır</a>
                                            <a href="{{route('system.mega-menu.edit',$m->id)}}"
                                               class="btn btn-primary btn-xs">Düzenle</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
