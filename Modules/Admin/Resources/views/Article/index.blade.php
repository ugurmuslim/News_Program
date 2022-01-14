@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Haberler</h3>
                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="form" method="get" data-parsley-validate
                                  action={{route('article.index')}} enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="status" type="text" class="form-control"
                                               value="{{ app('request')->input('status') }}"
                                               hidden/>

                                        <input name="database" type="text" class="form-control"
                                               value="{{ app('request')->input('database') }}"
                                               hidden/>

                                        <label class="form-text">Kategori</label>
                                        <select class="form-control" name="ArticleTypeId" required="required"
                                                id="category">
                                            @if(request()->query('SiteName'))
                                                <option
                                                    value="{{request()->query('SiteName')}}">{{request()->query('SiteName')}}</option>
                                            @endif

                                            @foreach($articleTypes as $type)
                                                <option value={{$type->id}}>{{$type->title }}</option>
                                            @endforeach

                                        </select>

                                        {{-- <label class="form-text">Site</label>
                                         <select class="form-control" name="ArticleTypeId" required="required"
                                                 id="category">
                                             @if(request()->query('ArticleTypeId'))
                                                 <option
                                                     value="{{request()->query('ArticleTypeId')}}">{{\Modules\Admin\Entities\ArticleType::find(request()->query('ArticleTypeId'))->title}}</option>
                                             @endif

                                             @foreach($articleTypes as $type)
                                                 <option value={{$type->id}}>{{$type->title }}</option>
                                             @endforeach

                                         </select>--}}
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
                                    <th>Resim</th>
                                    <th>Başlık</th>
                                    <th>Özet</th>
                                    <th>Okunma</th>
                                    <th>Yazar</th>
                                    <th style="width: 15%">Zaman</th>
                                    <th>Aksiyon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newsAll as $news)
                                    {{--<tr style="background-color: {{$news->body ? "" : "pink"}}">--}}
                                    <tr>
                                        <td>{{ $news->articleType->title}}</td>
                                        <td>{{ $news->site_name ? $news->site_name : ""}}</td>
                                        <td style="font-weight: bold">
                                            {{--<img
                                                src="{{ $news->image_path  }}"
                                                style="max-width:100px;" alt="">--}}
                                            <img
                                                src="{{asset($news->image_path)}}" loading="lazy"
                                                style="max-width:100px;" alt=""></td>
                                        <td style="font-weight: bold"><a
                                                href="{{$news->original_link}}"
                                                target="_blank">{{$news->title}}</a></td>
                                        <td>{!! strip_tags($news->summary) !!}</td>
                                        <td>{!! $news->read ?? ""!!}</td>
                                        <td>{{isset($news->editor_id) ? $news->editor->name : null}}</td>
                                        <td>
                                            <div class="col-md-9">

                                                @if(isset($news->pub_date))
                                                    <p>{{$news->pub_date}}</p>
                                                @else
                                                    <p>{{$news->article_date}}</p>
                                                @endif

                                                @if(isset($news->created_at) && isset($news->status) && $news->status == 'ASSIGNED')
                                                    <?php
                                                    $passedMinutes = \Carbon\Carbon::now()->diffInMinutes(new \Carbon\Carbon($news->created_at));
                                                    $passed = $passedMinutes > 20;
                                                    ?>
                                                    <button
                                                        class="btn  {{$passed ? "btn-danger" : "btn-success" }}">{{ $passedMinutes }}
                                                        Dakika
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                        <td>

                                            <div class="col-md-3">
                                                    @can('assign articles')
                                                        <a href="{{route('article.assign',['id' => $news->id])}}"
                                                           class="btn btn-primary">Atama</a>
                                                    @endcan
                                                    {{--@can('assign articles')
                                                        <form method="post"
                                                              action={{route('article.destroy', ['id' => $news->id])}}>
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger">Sil</button>
                                                        </form>
                                                    @endcan--}}
                                                @can('edit articles')
                                                    <a href="{{route('article.postUpdate',['id' => $news->id])}}"
                                                       class="btn btn-primary">Düzenle</a>
                                                @endcan
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
                {{ $newsAll->appends(request()->input())->links() }}

                <!-- /.card -->
                </div>

                {{-- @foreach($newsAll as $news)



                         <div class="col-md-3 d-flex align-items-stretch">
                             <div class="card">
                                 <div class="card-header">
                                     <h5>{{$news->title}}</h5>
                                     <div class="card-body">
                                         <p>{!! Str::limit($news->summary ,100)!!}</p>
                                     </div>
                                 </div>
                                 <div class="card-footer">
                                         <div class="row" style="position:relative; top: 5%; right; 0">
                                             <div class="col-md-9">
                                                 @if(isset($news->pubDate))
                                                     <p>{{$news->pubDate}}</p>
                                                 @else
                                                     <p>{{$news->article_date}}</p>
                                                 @endif
                                                 @if(isset($news->created_at) && isset($news->status) && $news->status == 'ASSIGNED')
                                                     <?php
                                                     $passedMinutes = \Carbon\Carbon::now()->diffInMinutes(new \Carbon\Carbon($news->created_at));
                                                     $passed = $passedMinutes > 20;
                                                     ?>
                                                     <button
                                                         class="btn  {{$passed ? "btn-danger" : "btn-success" }}">{{ $passedMinutes }}
                                                         Dakika
                                                     </button>
                                                 @endif
                                             </div>
                                             <div class="col-md-3">
                                                 @can('assign articles')
                                                     <a href="{{route('article.assign',['id' => $news->id])}}"
                                                        class="btn btn-primary">Atama</a>
                                                 @endcan
                                                 @can('edit articles')
                                                     <a href="{{route('article.postUpdate',['id' => $news->id])}}"
                                                        class="btn btn-primary">Düzenle</a>
                                                 @endcan
                                             </div>
                                         </div>
                                     </div>
                             </div>
                         </div>
                     @endforeach--}}
            </div>
            {{--{{ $newsAll->links() }}--}}
        </div>
    </div>
@endsection
