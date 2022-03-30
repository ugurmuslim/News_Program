@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">p
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Botlar</h3>
                        </div>
                        <a class="btn btn-success btn-sm float-right" href="{{route('bot.postUpdate'),}}">Yarat</a>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="form" method="get" data-parsley-validate
                                  action={{route('bot.index')}} enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-text">Kategori</label>
                                        <select class="form-control" name="ArticleTypeId" required="required" id="category">
                                            @if(request()->query('ArticleTypeId'))
                                                <option
                                                    value="{{request()->query('ArticleTypeId')}}">{{\App\Models\ArticleType::find(request()->query('ArticleTypeId'))->title}}</option>
                                            @endif
                                            @foreach($articleTypes as $type)
                                                <option value={{$type->id}}>{{$type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success block">Ara</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Site</th>
                                    <th>Link</th>
                                    <th>Statu</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bots as $bot)
                                    <tr>
                                        <td>{{$bot->articleType->title}}</td>
                                        <td>{{$bot->site_name}}</td>
                                        <td><a href="{{$bot->title}}" target="_blank">{{$bot->title}}</a></td>
                                        <td>{{$bot->status ? "Calışıyor" : "Calışmıyor"}}</td>
                                        <th><a href="{{route('bot.attribute', [$bot->id, $bot->site_name])}}" class="btn btn-primary">Detay</a></th>
                                        <th><a href="{{route('bot.postUpdate', [$bot->id])}}" class="btn btn-warning">Değiştir</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                {{ $bots->appends(request()->input())->links() }}

                    <!-- /.card -->
                </div>


            </div>
        </div>
@endsection
