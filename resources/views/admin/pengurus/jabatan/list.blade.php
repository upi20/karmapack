@extends('templates.admin.master')

@section('content')
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">List Bidang Periode <span class="fw-bold">{{ $periode->nama }}</span>
                    </h3>
                    <button type="button" class="btn btn-rounded btn-success" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                        <i class="bi bi-plus-lg"></i> Add
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="h5">Filter Data</h5>
                    <form action="javascript:void(0)" class="form-inline ml-md-3 mb-md-3" id="FilterForm">
                        <div class="form-group me-md-3">
                            <label for="filter_status">Bidang Status</label>
                            <select class="form-control" id="filter_status" name="filter_status" style="max-width: 200px">
                                <option value="">Semua Bidang</option>
                                <option value="1">Dipakai</option>
                                <option value="0">Tidak Dipakai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-md btn-info" title="Refresh Filter Table">
                            <i class="bi bi-arrow-repeat"></i> Refresh
                        </button>
                    </form>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Urutan</th>
                                    <th>Bidang</th>
                                    <th>Sub Bidang</th>
                                    <th style="min-width: 150px;">Slug</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="temp_foto" name="temp_foto">
                        <input type="hidden" id="pengurus_periode_id" name="pengurus_periode_id" value="2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="parrent_id">Utama</label>
                                    <select class="form-control" id="parrent_id" name="parrent_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Alamat url untuk akses jabatan" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_urut">No Urut</label>
                                    <input type="number" class="form-control" id="no_urut" name="no_urut"
                                        placeholder="No Uurut" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slogan">Slogan</label>
                                    <input type="text" class="form-control" id="slogan" name="slogan"
                                        placeholder="Slogan" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="foto">Icon</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto"
                                        accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea cols="3" rows="4" class="form-control summernote" id="visi" name="visi" placeholder="Visi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea cols="3" rows="4" class="form-control summernote" id="misi" name="misi" placeholder="Misi"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
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


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    <script>
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
                    url: "{{ route('admin.pengurus.jabatan', $periode->id) }}",
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
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'parrent',
                        name: 'parrent'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'status_str',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_el = full.status == 1 ? 'badge bg-success' :
                                'badge bg-danger';
                            return `<span class="${class_el} p-2">${full.status_str}</span>`;
                        },
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return ` <button type="button" class="btn btn-rounded btn-primary btn-sm my-1" title="Edit Data"
                data-id="${full.id}"
                data-nama="${full.nama}"
                data-status="${full.status}"
                data-slug="${full.slug}"
                onClick="editFunc(this)">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                </button>
                <button type="button" class="btn btn-rounded btn-danger btn-sm  my-1" title="Delete Data" onClick="deleteFunc('${data}')">
                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                </button>
                `;
                        },
                        orderable: false
                    },
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
                const route = ($('#id').val() == '') ? "{{ route('admin.artikel.tag.insert') }}" :
                    "{{ route('admin.artikel.tag.update') }}";
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
                            position: 'top-end',
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
                            '<li class="fa fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });
        });

        function add() {
            $('#MainForm').trigger("reset");
            $('#modal-default-title').html("Add Bidang");
            $('#modal-default').modal('show');
            $('#id').val('');
            resetErrorAfterInput();
            refresh_parrent('{{ $periode->id }}', '', '#parrent_id');
        }


        function editFunc(datas) {
            const data = datas.dataset;
            $('#modal-default-title').html("Edit Bidang");
            $('#modal-default').modal('show');
            $('#MainForm').trigger("reset");
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#status').val(data.status);
            $('#slug').val(data.slug);
            refresh_parrent('{{ $periode->id }}', data.periode_id, '#parrent_id');
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
                        url: `{{ url('admin/artikel/tag') }}/${id}`,
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
                                title: 'Bidang  deleted successfully',
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

        function refresh_parrent(periode_id, selected_id = '', option_id = '', custom_fun = null) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "{{ route('admin.pengurus.jabatan.parrent') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    periode_id: periode_id
                },
                success: (data) => {
                    if (custom_fun) {
                        custom_fun(data);
                        return;
                    }

                    if (data.results) {
                        const selected_element = $(`${option_id}`);
                        selected_element.html('');
                        let options = '';
                        data.results.forEach(e => {
                            const selected = e.id == selected_id;
                            options += `<option ${selected}>${e.text}</option>`;
                        });
                        selected_element.html(options);

                    }
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
                    $.LoadingOverlay("hide");
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                }
            });
        }

        function tes_datatable(custom_fun = null) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.pengurus.jabatan', $periode->id) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    if (custom_fun) {
                        custom_fun(data);
                    }
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                },
            });
        }
    </script>
@endsection
