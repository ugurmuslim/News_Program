@extends('admin::layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcılar</h3>
                        </div>
                        <a class="btn btn-success btn-sm float-right" href="{{route('system_user.postUpdate'),}}">Yarat</a>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>İsim</th>
                                    <th>Rol</th>
                                    <th>Aksiyon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    {{--<tr style="background-color: {{$news->body ? "" : "pink"}}">--}}
                                    <tr>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->roles()->first() ? $user->roles()->first()->name : ""}}</td>
                                        <td>
                                            <div class="col-md-3">
                                                @can('edit articles')
                                                    <a href="{{route('system_user.postUpdate',['id' => $user->id])}}"
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
