@extends('templates.admin.master')

@section('content')
    <input type="text" id="clipboard" style="position: fixed; top:-50px">
    @php
    $can_insert = auth_can(h_prefix('insert'));
    $can_update = auth_can(h_prefix('update'));
    $can_delete = auth_can(h_prefix('delete'));
    $is_admin = is_admin();
    @endphp
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

                                        @if ($is_admin)
                                            <div class="form-group float-start me-2" style="min-width: 300px">
                                                <label for="filter_user_id">Dibuat Oleh</label>
                                                <br>
                                                <select class="form-control" id="filter_user_id" name="filter_user_id"
                                                    style="width: 100%;">
                                                    <option value="" selected>Semua</option>
                                                </select>
                                            </div>
                                        @endif

                                        <div class="form-group float-start me-2">
                                            <label for="filter_status">Status</label>
                                            <select class="form-control" id="filter_status" name="filter_status"
                                                style="max-width: 200px">
                                                <option value="">Semua</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Ada</option>
                                                <option value="2">Ditutup</option>
                                            </select>
                                        </div>

                                        <div class="form-group float-start me-2">
                                            <label for="filter_tampilkan">Tampilkan</label>
                                            <select class="form-control" id="filter_tampilkan" name="filter_tampilkan"
                                                style="max-width: 200px">
                                                <option value="">Semua</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
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
                                    {!! $is_admin ? '<th>Dibuat Oleh</th>' : '' !!}
                                    <th>No Urut</th>
                                    <th>Nama</th>
                                    <th>Copy Link</th>
                                    <th>Foto</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Detail</th>
                                    <th>Tampilkan</th>
                                    <th>Status</th>
                                    {!! $can_delete || $can_update ? '<th>Action</th>' : '' !!}
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="nama">Nama <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Enter Nama" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="slug">Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter Slug" required="" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="link">Google Form Link
                                        <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" id="link" name="link"
                                        placeholder="Enter Google Form Link" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="foto">Foto <span class="text-danger">*</span>
                                        <span class="badge bg-success" id="lihat-foto">Lihat</span>
                                    </label>
                                    <input type="file" class="form-control" id="foto" name="foto"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="no_urut">Nomor Urut
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="no_urut" name="no_urut"
                                        placeholder="Urutan" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="dari">Dari Tanggal
                                        <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dari" name="dari"
                                        placeholder="Dari Tanggal" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="sampai">Sampai Tanggal
                                        <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="sampai" name="sampai"
                                        placeholder="Sampai Tanggal" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="deskripsi">Deskripsi</label>
                                    <textarea type="text" class="form-control" rows="3" id="deskripsi" name="deskripsi"
                                        placeholder="Enter Deskripsi"> </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="pengumuman">Pengumuman (HTML)</label>
                                    <textarea type="text" class="form-control" rows="3" id="pengumuman" name="pengumuman"
                                        placeholder="Enter Pengumuman"> </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="tampilkan">Tampilkan</label>
                                    <select class="form-control" style="width: 100%;" required="" id="tampilkan"
                                        name="tampilkan">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" required="" id="status"
                                        name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="2">Ditutup</option>
                                    </select>
                                </div>
                            </div>
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


    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon Pendaftaran">
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

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const is_admin = {{ $is_admin ? 'true' : 'false' }};
        const table_html = $('#tbl_main');
        let isEdit = true;
        $(document).ready(function() {
            $('#filter_user_id').select2({
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
                    }
                }
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
                        d['filter[tampilkan]'] = $('#filter_tampilkan').val();
                        d['filter[user_id]'] = $('#filter_user_id').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    ...(is_admin ? [{
                        data: 'user',
                        name: 'user',
                        orderable: false
                    }] : []),
                    {
                        data: 'no_urut',
                        name: 'no_urut'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'slug',
                        name: 'slug',
                        render(data, type, full, meta) {
                            const link = `{{ url('f') }}/${data}`;
                            return data ? `
                            <button class="btn btn-primary btn-sm" title="Copy Link To Clipboard" onclick="copyToClipboard('${link}')">
                                <i class="fas fa-clipboard" aria-hidden="true"></i> 
                                </button>
                            ` : '';
                        },
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render(data, type, full, meta) {
                            return data ? `
                            <button class="btn btn-primary btn-sm" onclick="viewIcon('${data}')"><i class="fas fa-eye" aria-hidden="true"></i> </button>
                            ` : '';
                        },
                    },
                    {
                        data: 'dari',
                        name: 'dari'
                    },
                    {
                        data: 'sampai',
                        name: 'sampai'
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
                        data: 'tampilkan_str',
                        name: 'tampilkan',
                        render(data, type, full, meta) {
                            const class_el = full.tampilkan == 1 ? 'badge bg-success' :
                                (full.tampilkan == 2 ? 'badge bg-warning' : 'badge bg-danger');
                            return `<span class="${class_el} p-2">${full.tampilkan_str}</span>`;
                        },
                    },
                    {
                        data: 'status_str',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_el = full.status == 1 ? 'badge bg-success' :
                                (full.status == 2 ? 'badge bg-warning' : 'badge bg-danger');
                            return `<span class="${class_el} p-2">${full.status_str}</span>`;
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
        });

        function add() {
            if (!isEdit) return false;
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Add {{ $page_attr['title'] }}");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#foto').attr('required', true);
            $('#lihat-foto').hide();
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
                    $('#dari').val(data.dari);
                    $('#deskripsi').val(data.deskripsi);
                    $('#id').val(data.id);
                    $('#link').val(data.link);
                    $('#nama').val(data.nama);
                    $('#no_urut').val(data.no_urut);
                    $('#pengumuman').val(data.pengumuman);
                    $('#sampai').val(data.sampai);
                    $('#slug').val(data.slug);
                    $('#status').val(data.status);
                    $('#tampilkan').val(data.tampilkan);
                    $('#foto').removeAttr('required');
                    $('#lihat-foto').fadeIn();
                    $('#lihat-foto').attr('onclick', `viewIcon('${data.foto}')`);
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
                                title: 'Kategori  deleted successfully',
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

        function viewIcon(image) {
            $('#modal-icon').modal('show');
            $('#icon-view-image').attr('src', `{{ asset($image_folder) }}/${image}`);
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
                    <h4>Deskripsi</h4>
                    <p>${data.deskripsi}</p>
                    
                    <h4>Pengumuman</h4>
                    <p>${data.pengumuman}</p>

                    <h4>Slug</h4>
                    <a href="{{ url('f') }}/${data.slug}">{{ url('f') }}/${data.slug}</a>
                    <br>
                    <br>
                    <h4>Link Google Form</h4>
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

        function copyToClipboard(value) {
            const copyText = document.getElementById('clipboard');
            copyText.value = value;
            copyText.select();
            document.execCommand('copy');
            Swal.fire({
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 1000
            });
        }
    </script>
@endsection
