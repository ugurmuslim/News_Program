@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bursa Tube</h3>
                        </div>
                        <a class="btn btn-success btn-sm float-right"
                           href="{{route('stockTube.postUpdate',['channel' => $channel ]),}}">Yarat</a>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Link</th>
                                    <th>Yer</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{!! $article->title !!}</td>
                                        <td style="font-weight: bold"><a
                                                href="{{isset($article->original_link) ? $article->original_link : $article->link}}"
                                                target="_blank">{{$article->title}}</a></td>
                                        {{--<td>{!! $article->placement !!}</td>--}}
                                        <td>
                                            <div class="col-md-3">
                                                <a href="{{route('stockTube.postUpdate',['id' => $article->id])}}"
                                                   class="btn btn-primary">Düzenle</a>
                                            </div>
                                            <div class="col-md-3">
                                            <form method="post"
                                                  action={{route('stockTube.destroy', ['id' => $article->id])}}>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger">Sil</button>
                                            </form>
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
                {{ $articles->links() }}

                <!-- /.card -->
                </div>
            </div>
            {{--{{ $articleAll->links() }}--}}
        </div>
    </div>
@endsection
