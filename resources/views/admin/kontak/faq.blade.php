@extends('templates.admin.master')

@section('content')
    @php
    $can_insert = auth_can(h_prefix('insert'));
    $can_update = auth_can(h_prefix('update'));
    $can_delete = auth_can(h_prefix('delete'));
    $can_setting = auth_can(h_prefix('setting'));
    @endphp
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">{{ $page_attr['title'] }} Table List</h3>
                    @if ($can_insert)
                        <button type="button" class="btn btn-rounded btn-success btn-sm" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    @endif
                </div>
                <div class="card-body">
                    @if ($can_setting)
                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default active mb-2">
                                <div class="panel-heading " role="tab" id="headingOne1">
                                    <h4 class="panel-title">
                                        <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion2"
                                            href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                            Setting
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingOne1">
                                    <div class="panel-body">
                                        <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="setting_form">
                                            <div class="form-group float-start me-2">
                                                <label for="setting_title">Judul</label>
                                                <input type="text" class="form-control" id="setting_title" name="title"
                                                    value="{{ $setting->title }}">
                                            </div>
                                            <div class="form-group float-start me-2">
                                                <label for="setting_sub_title">Sub Judul</label>
                                                <input type="text" class="form-control" id="setting_sub_title"
                                                    name="sub_title" value="{{ $setting->sub_title }}">
                                            </div>

                                        </form>
                                        <div style="clear: both"></div>
                                        <button type="submit" form="setting_form" class="btn btn-rounded btn-md btn-info"
                                            data-toggle="tooltip" title="Simpan Setting" id="setting_btn_submit">
                                            <li class="fas fa-save mr-1"></li> Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

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
                                                <option value="1">Digunakan</option>
                                                <option value="0">Tidak Digunakan</option>
                                            </select>
                                        </div>

                                        <div class="form-group float-start me-2">
                                            <label for="filter_type">Type</label>
                                            <select class="form-control" id="filter_type" name="filter_type"
                                                style="max-width: 200px">
                                                <option value="">Semua</option>
                                                <option value="1">Teks</option>
                                                <option value="2">Link</option>
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
                        <table class="table table-bordered text-nowrap border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    @if ($can_update || $can_delete)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Enter Nama" required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="link">Link <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" id="link" name="link"
                                placeholder="Enter Link" required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="jawaban">Jawaban <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="3" id="jawaban" name="jawaban"
                                placeholder="Enter Jawaban"> </textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="type">Type</label>
                            <select class="form-control" style="width: 100%;" required="" id="type"
                                name="type">
                                <option value="1">Teks</option>
                                <option value="2">Link</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" style="width: 100%;" required="" id="status"
                                name="status">
                                <option value="1">Digunakan</option>
                                <option value="0">Tidak Digunakan</option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fas fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-detail-title">Detail</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="modal-detail-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/admin/plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
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
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const table_html = $('#tbl_main');
        let isEdit = true;
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
                        d['filter[type]'] = $('#filter_type').val();
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
                    },
                    {
                        data: 'type_str',
                        name: 'type'
                    },
                    {
                        data: 'status_str',
                        name: 'status'
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
                    ...(can_update || can_delete ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" title="Edit Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i> Edit
                                </button>` : '';
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" title="Delete Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i> Delete
                                </button>` : '';
                            return btn_update + btn_delete;
                        },
                        orderable: false
                    }] : []),
                ],
                order: [
                    [1, 'asc']
                ]
            });

            new_table.on('draw.dt', function() {
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

            // insertForm ===================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Save Changes');
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
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        isEdit = true;
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
                            '<li class="fas fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });

            @if ($can_setting)
                // insertForm ===================================================================================
                $('#setting_form').submit(function(e) {
                    e.preventDefault();
                    resetErrorAfterInput();
                    var formData = new FormData(this);
                    setBtnLoading('#setting_btn_submit', 'Save Changes');
                    $.ajax({
                        type: "POST",
                        url: "{{ route(h_prefix('setting')) }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data saved successfully',
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
                            setBtnLoading('#setting_btn_submit',
                                '<li class="fas fa-save mr-1"></li> Save changes',
                                false);
                        }
                    });
                });
            @endif

            $('#type').change(() => {
                typeSwitch();
            })
        });

        function add() {
            if (!isEdit) return false;
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Add {{ $page_attr['title'] }}");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#lihat-foto').hide();
            resetErrorAfterInput();
            isEdit = false;
            typeSwitch();
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
                    $('#nama').val(data.nama);
                    $('#link').val(data.link);
                    $('#jawaban').val(data.jawaban);
                    $('#type').val(data.type);
                    $('#status').val(data.status);
                    typeSwitch();
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
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
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
                                title: '{{ $page_attr['title'] }} deleted successfully',
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
                    <h4>Jawaban</h4>
                    <p>${data.jawaban}</p>
                    <h4>Link</h4>
                    <a href="${data.link}">${data.link}</a>`);
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

        function typeSwitch() {
            const type = $('#type');
            const link = $('#link');
            const jawaban = $('#jawaban');
            if (type.val() == 1) {
                link.parent().fadeOut();
                link.removeAttr('required')
                jawaban.attr('required', true)
                jawaban.parent().show();
            } else {
                jawaban.parent().fadeOut();
                jawaban.removeAttr('required')
                link.attr('required', true)
                link.parent().show();
            }
        }
    </script>
@endsection
