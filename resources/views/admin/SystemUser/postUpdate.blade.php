@extends('admin.layouts.master')
@section('extra_plugins')
    <script src="https://cdn.tiny.cloud/1/m0ee96ow3fu0fkmv687ilbm1ktuhlc0ogehbycr9qvqmjy89/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
          integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
            integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
@endsection
@section('style')
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
@endsection


@section('content')

    <div class="wrapper">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Makaleler</h1>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kullanıcılar</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form id="form" method="post" data-parsley-validate
                          action={{route('system_user.store')}} enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <input name="UserId" type="number" class="form-control"
                                   value="{{isset($user) ? $user->id : null}}"
                                   maxlength="200" autocomplete="off" hidden/>


                            <div class="col-md-9 row align-content-start">
                                <div class="col-10">
                                    <label class="form-text">İsim</label>
                                    <input name="Name" type="text" class="form-control"
                                           placeholder="Kullanıcı İsmi"
                                           id="name"
                                           value="{{isset($user) ? $user->name : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>

                                <div class="col-12 hr"></div>

                                <div class="col-12 hr"></div>
                                <div class="col-10">
                                    <label class="form-text">E-mail</label>
                                    <input name="Email" type="text" class="form-control"
                                           placeholder="Kullanıcı E-mail"
                                           id="email"
                                           value="{{isset($user) ? $user->email : ""}}"
                                           required="required" maxlength="200" autocomplete="off"/>
                                </div>

                                <div class="col-12 hr"></div>
                                <div class="col-10">
                                    <label class="form-text">Şifre</label>
                                    <input name="Password" type="text" class="form-control"
                                           placeholder="Şifre Belirleyin"
                                           id="email"
                                           value=""
                                           maxlength="200" autocomplete="off"/>
                                </div>
                            </div>

                            <div class="col-md-3 row align-content-start">

                                <label class="form-text">Rol</label>
                                <select class="form-control" name="Role" required="required"
                                        id="category">
                                    @if(isset($user))
                                        <option
                                            value="{{$user->roles[0]->name}}">{{$user->roles[0]->name}}</option>
                                    @endif
                                    @foreach($roles as $role)
                                        <option value={{$role->name}}>{{$role->name}}</option>
                                    @endforeach

                                </select>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection
@section('extra_scripts')
    @include('admin.partials._postUpdate_javascript')
@endsection
