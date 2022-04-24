@extends('admin.layouts.master')
@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: left;
        }

        .dataTables_wrapper .dataTables_length {
            float: right;
        }

        .dataTables_filter input {
            max-width: 600px !important;
        }
    </style>
@endsection
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <form id="form" method="get" data-parsley-validate
                                      action={{route('article.index')}} enctype="multipart/form-data">

                                    <div class="form-row">
                                        @csrf
                                        <div class="col">
                                            <input name="status" type="text" class="form-control"
                                                   value="{{ app('request')->input('status') }}"
                                                   hidden/>

                                            <input name="database" type="text" class="form-control"
                                                   value="{{ app('request')->input('database') }}"
                                                   hidden/>
                                            <select class="form-control" name="ArticleTypeId" required="required"
                                                    id="category">
                                                @if(request()->query('ArticleTypeId'))
                                                    <option
                                                            value="{{request()->query('ArticleTypeId')}}">
                                                        Filtre: {{\App\Models\ArticleType::find(request()->query('ArticleTypeId'))->title}}</option>
                                                @endif

                                                @foreach($articleTypes as $type)
                                                    <option value={{$type->id}}>{{$type->title }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col">
                                            <button type="submit" class="btn btn-success block">Kategoriye göre
                                                filtrele
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-condensed table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Site</th>
                                            <th>Resim</th>
                                            <th>Başlık</th>
                                            <th>Özet</th>
                                            {{--                                    <th>Okunma</th>--}}
                                            <th>Yazar</th>
                                            <th>Atayan</th>
                                            <th style="width: 15%">Zaman</th>
                                            <th>Aksiyon</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Site</th>
                                            <th>Resim</th>
                                            <th>Başlık</th>
                                            <th>Özet</th>
                                            <th>Yazar</th>
                                            <th>Atayan</th>
                                            <th style="width: 15%">Zaman</th>
                                            <th>Aksiyon</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
    {{--
        Datatable javascript object
    order: [[7, "asc"]],
    --}}
@endsection
@section('extra_scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/jquery.blockUI.js')}}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function block() {
                $.blockUI({
                    css: {
                        border: 'none',
                        backgroundColor: 'none',
                        color: 'darkred'
                    },
                    baseZ: 2000,
                    message: '<div class="page-loader-logo">' +
                        '    <img alt="Logo" class="img-fluid" style="max-height: 150px !important;" src="/assets/home/sample/img/logo-icon.svg">' +
                        '   <h6 style="color: #fff !important;"> Lütfen bekleyiniz..</h6>' +
                        '</div>'
                });
            }

            function unblock() {
                $.unblockUI();
            }

            $('table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
                },
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: '{!! url()->full() !!}',
                "dom": "<'row'<'col-lg-10 col-md-10 col-xs-12'f><'col-lg-2 col-md-2 col-xs-12'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                columns: [
                    {data: 'article_type.title', name: 'title'},
                    {data: 'site_name', name: 'site_name'},
                    {data: 'image_path', name: 'image_path', orderable: false, searchable: false},
                    {data: 'title', name: 'title', orderable: false},
                    {data: 'summary', name: 'summary', orderable: false,},
                    // {data: 'read', name: 'read'},
                    {data: 'editor_id', name: 'editor_id', searchable: true},
                    {data: 'assigner_id', name: 'assigner_id'},
                    {data: 'article_date', name: 'article_date', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ],
            });

            $("body").on('click', '.rows-delete', function (e) {
                e.preventDefault();
                let $this = $(this),
                    url = $this.data("link"),
                    title = $this.data('title') ? "<b>" + $this.data('title') + "</b> - silinecek. " : '';
                swal.fire({
                    title: "Emin misiniz?",
                    html: title + "Eğer bu işlemi yaparsanız geri alamazsınız.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet, eminim sil!',
                    cancelButtonText: 'Vazgeç'
                }).then(function (result) {
                    block();
                    if (result.value) {
                        $.ajax({
                            url: url,
                            data: {},
                            method: "DELETE",
                            success: function (msg) {
                                unblock();
                                if (msg.redirect) {
                                    window.redirectTo(msg.redirect, 200);
                                } else {
                                    if (msg.table) {
                                        $this.closest('tr').remove();
                                    } else {
                                        $("table").dataTable().api().ajax.reload(function () {
                                            window.notify('Başarıyla Silindi', "success");
                                        }, false);
                                    }
                                    swal.fire(
                                        'Bilgilendirme',
                                        'Başarıyla Silindi',
                                        'success'
                                    )
                                }
                            }, error: function (errors) {
                                unblock();
                                swal.fire(
                                    'Uyarı',
                                    errors.responseJSON.message,
                                    'error'
                                )
                            }
                        });
                    }
                    unblock();
                });
            });

        });
    </script>
@endsection
