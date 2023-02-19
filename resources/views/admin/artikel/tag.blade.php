@extends('templates.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
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
                                                <option value="1">Dipakai</option>
                                                <option value="0">Tidak Dipakai</option>
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
                    <table class="table table-striped" id="tbl_main">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Artikel</th>
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
                            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" style="width: 100%;" required="" id="status"
                                name="status">
                                <option value="1">Dipakai</option>
                                <option value="0">Tidak Dipakai</option>
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
@endsection

@section('javascript')
    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const table_html = $('#tbl_main');
        $(document).ready(function() {
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
                        data: 'nama',
                        name: 'nama',
                        render(data, type, full, meta) {
                            return `${data}<br><small>${full.slug}</small>`;
                        },
                    },
                    {
                        data: 'artikel',
                        name: 'artikel'
                    },
                    {
                        data: 'status_str',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_el = full.status == 1 ? 'text-success' :
                                'text-danger';
                            return `<i class="fas fa-circle me-2 ${class_el}"></i>${full.status_str}`;
                        },
                        className: 'text-nowrap'
                    },
                    ...(can_update || can_delete ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data"
                                data-id="${full.id}"
                                data-nama="${full.nama}"
                                data-status="${full.status}"
                                data-slug="${full.slug}"
                                onClick="editFunc(this)">
                                <i class="fas fa-edit"></i></button>` : '';
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
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
                const route = ($('#id').val() == '') ? "{{ route(h_prefix('insert')) }}" :
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
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Tambah {{ $page_attr['title'] }}");
            $('#modal-default').modal('show');
            $('#id').val('');
            resetErrorAfterInput();
        }


        function editFunc(datas) {
            const data = datas.dataset;
            $('#modal-default-title').html("Ubah {{ $page_attr['title'] }}");
            $('#modal-default').modal('show');
            $('#MainForm').trigger("reset");
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#status').val(data.status);
            $('#slug').val(data.slug);
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
    </script>
@endsection
