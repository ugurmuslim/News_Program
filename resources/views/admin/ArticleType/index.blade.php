@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Botlar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Detay</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articleTypes as $articleType)
                                    <tr>
                                        <td>{{$articleType->title}}</td>
                                        <th><a href="{{route('articleType.postUpdate', [$articleType->id])}}" class="btn btn-primary">Detay</a></th>
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
