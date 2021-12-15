@extends('admin::layouts.master')

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
                                    <th>Site</th>
                                    <th>{{$date}}</th>
                                    <th>Çekilemeyen Sayısı</th>
                                    <th>{{$compareDate}}</th>
                                    <th>Çekilemeyen Sayısı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($report as $site => $counts)
                                    <tr>
                                        <td>{{$site}}</td>
                                        <td>{{$counts['total']}}</td>
                                        <td>{{$counts['failure']}}</a></td>
                                        <td>{{$counts['compareTotal']}}</a></td>
                                        <td>{{$counts['compareFailure']}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>
@endsection
