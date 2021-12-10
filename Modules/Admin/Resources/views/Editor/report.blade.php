@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Editor Raporu</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>İsim</th>
                                    <th>Zamanında</th>
                                    <th>Zaman Aşımı</th>
                                    <th>Bekleyen</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($editors as $editorName => $stats)
                                    <tr>
                                        <td>{{$editorName}}</td>
                                        <td style="font-weight: bold; color: blue;">{{$stats['passed'] ?? 0}}</td>
                                        <td style="font-weight: bold; color: red;">{{$stats['onTime'] ?? 0}}</td>
                                        <td style="font-weight: bold; color: green;">{{$stats['assigned'] ?? 0}}</td>
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
