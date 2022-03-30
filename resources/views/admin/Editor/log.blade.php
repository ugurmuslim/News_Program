@extends('admin.layouts.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Editor log</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="form" method="get" data-parsley-validate
                                  action={{route('editor.log')}} enctype="multipart/form-data">
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
                                        <select class="form-control" name="editorID" required="required" id="editor">
                                            @if(request()->query('editorID'))
                                                <option
                                                    value="{{request()->query('editorID')}}">{{\App\Models\User::find(request()->query('editorID'))->name}}</option>
                                            @endif
                                            <option value="">Hepsi</option>
                                            @foreach($editors as $editor)
                                                <option value={{$editor->id}}>{{$editor->name }}</option>
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
                                    <th>İsim</th>
                                    <th>Durum</th>
                                    <th>Haber Başlık</th>
                                    <th>Atanma Tarihi</th>
                                    <th>Yayınlanma Tarihi</th>
                                    <th>Zaman Aşımı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->editor->name}}</td>
                                        <td style="font-weight: bold; color: blue;">{{$article->status}}</td>
                                        <td><a href="#">{{$article->title}}</a></td>
                                        <td>{{$article->created_at}}</td>
                                        <td>
                                            <div class="col-md-9">
                                                <p>{{$article->article_date}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $date = \Carbon\Carbon::now();
                                            @endphp
                                            @if($article->article_date)
                                                @php
                                                    $date = new \Carbon\Carbon($article->article_date);
                                                @endphp
                                            @endif
                                            @php
                                                $passedMinutes = $date->diffInMinutes(new \Carbon\Carbon($article->created_at));
                                                $passed = $passedMinutes > 20;
                                            @endphp

                                            <button
                                                class="btn  {{$passed ? "btn-danger" : "btn-success" }}">{{ $passedMinutes }}
                                                Dakika
                                            </button>
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
