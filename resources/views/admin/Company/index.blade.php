@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">p
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menu</h3>
                        </div>
                        <a class="btn btn-success btn-sm float-right" href="{{route('system.company.postUpdate'),}}">Yarat</a>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Resim</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->title}}</td>
                                        <td><img style="width:300px; height:100px;" src="{{asset($company->image_path)}}" alt=""></td>
                                        <td>
                                            <div class="col-md-3">
                                                <a href="{{route('system.company.postUpdate',['id' => $company->id])}}"
                                                   class="btn btn-primary">Düzenle</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{ $companies->appends(request()->input())->links() }}

                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>


            </div>
        </div>
@endsection
