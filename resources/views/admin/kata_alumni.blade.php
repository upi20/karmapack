@extends('templates.admin.master')

@section('content')
    <input type="text" id="clipboard" style="position: fixed; top:-50px">
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $is_admin = is_admin();
        $can_list = $can_insert || $can_update || $can_delete || $is_admin;
    @endphp
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
                    @if ($can_insert)
                        <button type="button" class="btn btn-rounded btn-success btn-sm" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default active mb-2">
                            <div class="panel-heading " role="tab" id="headingOne1">
                                <h4 class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion"
                                        href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Filter Data
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingOne1">
                                <div class="panel-body">
                                    <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="FilterForm">
                                        <div class="form-group float-start me-2">
                                            <label for="filter_status">Status</label>
                                            <select class="form-control" id="filter_status" name="filter_status"
                                                style="max-width: 200px">
                                                <option value="">Semua</option>
                                                <option value="0">Disimpan</option>
                                                <option value="1">Di Publish</option>
                                            </select>
                                        </div>
                                    </form>
                                    <div style="clear: both"></div>
                                    <button type="submit" form="FilterForm" class="btn btn-rounded btn-md btn-info"
                                        data-toggle="tooltip" title="Refresh Filter Table">
                                        <i class="bi bi-arrow-repeat"></i> Terapkan filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered  border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Sebagai</th>
                                    <th>Profesi</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                    {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($can_list)
        <div class="row">
            <div class="col-lg-6">
                <div class="card" id="card-lists">
                    <div id="nestable-lists" class="card-header d-md-flex flex-row justify-content-between">
                        <h3 class="card-title">{{ $page_attr['title'] }} Sequence List</h3>
                        <div>
                            <div class="btn-group">
                                <button class="btn me-1 btn-primary btn-sm save" data-action="save" title="Save"
                                    onclick="save()" style="border: 0; border-radius: 4px">
                                    <i class="fas fa-save"></i><span class="hidden-xs">&nbsp;Save</span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button class="btn me-1 btn-warning btn-sm refresh" data-action="refresh" title="Refresh"
                                    style="border: 0; border-radius: 4px" onclick="lists()">
                                    <i class="fe fe-refresh-cw"></i><span class="hidden-xs">&nbsp;Refresh</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dd" style="width: 100%" id="lists"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- End Row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Tutup" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label class="form-label" for="user_id">Anggota
                                <span class="text-danger">*</span></label>
                            <select class="form-control" style="width: 100%;" required="" id="user_id"
                                name="user_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sebagai">Sebagai
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sebagai" name="sebagai"
                                placeholder="Pendiri Karmapack" required="" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="profesi">Profesi
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="profesi" name="profesi"
                                placeholder="Bupati Cianjur 2019-2024" required="" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="deskripsi">Deskripsi
                                <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="3" id="deskripsi" name="deskripsi"
                                placeholder="Deskripsi" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" style="width: 100%;" required="" id="status"
                                name="status">
                                <option value="0">Disimpan</option>
                                <option value="1">Di Publish</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-detail-title">Detail</h6><button aria-label="Tutup"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="modal-detail-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- nestable --}}
    <script src="{{ asset('assets/templates/admin/plugins/nestable2v1.6.0/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/nestable2v1.6.0/jquery.nestable.min.js') }}"></script>

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_list = {{ $can_list ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const is_admin = {{ $is_admin ? 'true' : 'false' }};
        const table_html = $('#tbl_main');
        let isEdit = true;
        $(document).ready(function() {
            $('#user_id').select2({
                ajax: {
                    url: "{{ route(h_prefix('member')) }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                    },
                },
                dropdownParent: $('#modal-default')
            });

            // datatable ====================================================================================
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const new_table = table_html.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                // responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix()) }}",
                    data: function(d) {
                        d['filter[status]'] = $('#filter_status').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'sebagai',
                        name: 'sebagai'
                    },
                    {
                        data: 'profesi',
                        name: 'profesi'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return `
                                <button type="button" class="btn btn-rounded btn-info btn-sm" title="Detail Data" onClick="detail('${data}')">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                                </button>
                                `;
                        },
                    },
                    {
                        data: 'status_str',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_el = full.status == 0 ? 'badge bg-warning' :
                                (full.status == 1 ? 'badge bg-success' : 'badge bg-danger');
                            return `<span class="${class_el} p-2">${full.status_str}</span>`;
                        },
                    },
                    ...(can_update || can_delete ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" title="Ubah Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i> Edit
                                </button>` : '';
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i> Delete
                                </button>` : '';
                            return btn_update + btn_delete;
                        },
                        orderable: false
                    }] : []),
                ],
                order: [
                    [1, 'asc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            new_table.on('draw.dt', function() {
                tooltip_refresh();
                var PageInfo = table_html.DataTable().page.info();
                new_table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            $('#FilterForm').submit(function(e) {
                e.preventDefault();
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
            });

            $("#nama").keyup(function() {
                var Text = $(this).val();
                $("#slug").val(Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-'));
            });

            // insertForm ===================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Simpan Perubahan');
                const route = ($('#id').val() == '') ?
                    "{{ route(h_prefix('insert')) }}" :
                    "{{ route(h_prefix('update')) }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-default").modal('hide');
                        var oTable = table_html.dataTable();
                        oTable.fnDraw(false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        lists();
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('#btn-save',
                            '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });
        });

        function add() {
            if (!isEdit) return false;
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Add {{ $page_attr['title'] }}");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#user_id')
                .append((new Option('', '', true, true)))
                .trigger('change');
            resetErrorAfterInput();
            isEdit = false;
            return true;
        }


        function editFunc(id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('find')) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                },
                success: (data) => {
                    isEdit = true;
                    $('#modal-default-title').html("Edit {{ $page_attr['title'] }}");
                    $('#modal-default').modal('show');
                    $('#id').val(data.id);
                    $('#deskripsi').val(data.deskripsi);
                    $('#sebagai').val(data.sebagai);
                    $('#profesi').val(data.profesi);
                    $('#status').val(data.status);
                    $('#user_id')
                        .append((new Option(data.user, data.user_id, true, true)))
                        .trigger('change');
                },
                error: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                }
            });

        }

        function deleteFunc(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Apakah anda yakin akan menghapus data ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri()) }}/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            swal.fire({
                                title: 'Please Wait..!',
                                text: 'Is working..',
                                onOpen: function() {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Berhasil Menghapus Data',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            var oTable = table_html.dataTable();
                            oTable.fnDraw(false);
                            lists();
                        },
                        complete: function() {
                            swal.hideLoading();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.hideLoading();
                            swal.fire("!Opps ", "Something went wrong, try again later", "error");
                        }
                    });
                }
            });
        }

        function detail(id) {
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('find')) }}`,
                data: {
                    id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $("#modal-detail").modal('show');
                    $("#modal-detail-body").html(`
                    <h4>Nama</h4>
                    <p>${data.user}</p>
                    <h4>Sebagai</h4>
                    <p>${data.sebagai}</p>
                    <h4>Deskripsi</h4>
                    <p>${data.deskripsi}</p>
                    <h4>Profesi</h4>
                    <p>${data.profesi}</p>
                    `);
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res.message ?? 'Something went wrong',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
            });
        }

        function lists() {
            if (!can_list) retun;
            $('#card-lists').LoadingOverlay("show");
            $.ajax({
                url: `{{ route(h_prefix('list')) }}`,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if ($('#lists').html() != '') $('.dd').nestable('destroy');
                    $('.dd').nestable({
                        maxDepth: 2,
                        json: response.data,
                        contentCallback: (item) => {
                            // return `<strong>${item.user} | ${item.sebagai} | ${item.profesi}</strong>`;
                            return `<strong>${item.user}</strong>`;
                        }
                    });
                },
                complete: function() {
                    $('#card-lists').LoadingOverlay("hide");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }

        lists();

        function save() {
            $.LoadingOverlay("hide");
            var serialize = $('#lists').nestable('toArray');
            $.ajax({
                url: `{{ route(h_prefix('list_save')) }}`,
                type: 'POST',
                data: {
                    data: serialize
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data berhasil disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    </script>
@endsection

@section('stylesheet')
    <style>
        .dd {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            max-width: 600px;
            list-style: none;
            font-size: 13px;
            line-height: 20px
        }

        .dd-list {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none
        }

        .dd-list .dd-list {
            padding-left: 30px
        }

        .dd-empty,
        .dd-item,
        .dd-placeholder {
            display: block;
            position: relative;
            margin: 0;
            padding: 0;
            min-height: 20px;
            font-size: 13px;
            line-height: 20px
        }

        .dd-handle {
            display: block;
            height: 35px;
            margin: 5px 0;
            padding: 5px 10px;
            color: #333;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 3px;
            box-sizing: border-box
        }

        .dd-handle:hover {
            color: #2ea8e5;
            background: #fff
        }

        .dd-item>button {
            position: relative;
            cursor: pointer;
            float: left;
            width: 25px;
            height: 20px;
            margin: 5px 0;
            padding: 0;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 0;
            background: 0 0;
            font-size: 12px;
            line-height: 1;
            text-align: center;
            font-weight: 700
        }

        .dd-item>button:before {
            display: block;
            position: absolute;
            width: 100%;
            text-align: center;
            text-indent: 0
        }

        .dd-item>button.dd-expand:before {
            content: '+'
        }

        .dd-item>button.dd-collapse:before {
            content: '-'
        }

        .dd-expand {
            display: none
        }

        .dd-collapsed .dd-collapse,
        .dd-collapsed .dd-list {
            display: none
        }

        .dd-collapsed .dd-expand {
            display: block
        }

        .dd-empty,
        .dd-placeholder {
            margin: 5px 0;
            padding: 0;
            min-height: 30px;
            background: #f2fbff;
            border: 1px dashed #b6bcbf;
            box-sizing: border-box;
            -moz-box-sizing: border-box
        }

        .dd-empty {
            border: 1px dashed #bbb;
            min-height: 100px;
            background-color: #e5e5e5;
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px
        }

        .dd-dragel {
            position: absolute;
            pointer-events: none;
            z-index: 9999
        }

        .dd-dragel>.dd-item .dd-handle {
            margin-top: 0
        }

        .dd-dragel .dd-handle {
            box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, .1)
        }

        .dd-nochildren .dd-placeholder {
            display: none
        }
    </style>
@endsection
