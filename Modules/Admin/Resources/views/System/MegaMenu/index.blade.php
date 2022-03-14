@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">p
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu</h3>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Mega Menü</h3>

                            <div class="card-tools">
                                <a class="btn btn-success btn-sm float-right" href="{{route('system.menu.postUpdate'),}}">Yarat</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
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
                                            <div class="col-md-3">
                                                    <a href="{{route('system.menu.postUpdate',['id' => $m->id])}}"
                                                       class="btn btn-primary">Düzenle</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>


            </div>
        </div>
@endsection
