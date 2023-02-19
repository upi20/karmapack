@extends('templates.admin.master')
@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_active = auth_can(h_prefix('active'));
        $can_set_role = auth_can(h_prefix('set_role'));
        $can_bidang = auth_can(h_prefix('jabatan', 1));
    @endphp
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
                    @if ($can_insert)
                        <a class="btn btn-rounded btn-success btn-sm" href="{{ route(h_prefix('add')) }}"
                            data-bs-effect="effect-scale">
                            <i class="fas fa-plus"></i> Tambah Periode
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="tbl_main">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Dari</th>
                                <th>Sampai</th>
                                {!! $can_set_role ? '<th>Set Sebagai</th>' : '' !!}
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


    <div class="modal fade" id="modal-role">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-role-title">Set Role Pengurus Periode</h6><button aria-label="Tutup"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="" id="roleForm">
                        <div class="form-group">
                            <input type="hidden" name="periode_id" id="periode_id">
                            <label for="role_name">Role Bidang</label>
                            <select class="form-control" id="role_name" name="role_name">
                                <option value="">Sesuai Dengan Jabatan Masing-Masing</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="roleForm">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-detail-title">Detail Periode</h6><button aria-label="Tutup"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="modal-detail-body"></div>
                    <table class="table table-striped text-nowrap" id="tbl_member">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Angkatan</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_member_body"> </tbody>
                    </table>
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


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const can_active = {{ $can_active ? 'true' : 'false' }};
        const can_bidang = {{ $can_bidang ? 'true' : 'false' }};
        const can_set_role = {{ $can_set_role ? 'true' : 'false' }};

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
                        name: 'nama'
                    },
                    {
                        data: 'dari',
                        name: 'dari'
                    },
                    {
                        data: 'sampai',
                        name: 'sampai'
                    },
                    ...(can_set_role ? [{
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return data ? `
                            <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-role" onclick="setRole('${data}')"
                                        data-target="#modal-role"  data-toggle="tooltip" title="Set Sebagai Peran">
                                        <i class="fas fa-user-check" aria-hidden="true"></i> </a>
                            ` : '';
                        },
                    }] : []),
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return data ? `
                            <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-detail" onclick="viewDetail('${data}')"
                                        data-target="#modal-detail"  data-toggle="tooltip" title="Lihat Detail">
                                        <i class="fas fa-eye" aria-hidden="true"></i> </a>
                            ` : '';
                        },
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_ = data == 1 ? 'success' : 'danger';
                            const text = data == 1 ? 'Aktif' : 'Tidak Aktif';

                            const btn = can_active ? (full.status == 1 ? '' : `
                                <br><button type="button" class="btn btn-rounded btn-secondary btn-sm my-1" data-toggle="tooltip" title="Aktifkan Periode" onClick="activeFunc('${full.id}')">
                                <i class="fa fa-check" aria-hidden="true"></i> Aktifkan
                                </button> `) : '';
                            return `<i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}${btn}`;
                        },
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            const btn_update = can_update ? `<a class="btn btn-rounded btn-primary btn-sm my-1" data-toggle="tooltip" title="Ubah Periode"
                                href="{{ url(h_prefix_uri('edit')) }}/${data}" >
                                <i class="fas fa-edit"></i></a>` : '';
                            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm my-1" data-toggle="tooltip" title="Hapus Periode" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                            const btn_bidang = can_bidang ? `<a class="btn btn-rounded btn-secondary btn-sm my-1" data-toggle="tooltip" title="Ubah Bidang"
                                href="{{ url(h_prefix_uri('jabatan', 1)) }}/${data}" >
                                <i class="fe fe-git-pull-request" aria-hidden="true"></i></a>` : '';
                            return ` <a class="btn btn-rounded btn-primary btn-sm my-1"  data-toggle="tooltip" title="Lihat Periode"
                                href="{{ url('periode') }}/${full.slug}" target="_blank">
                                <i class="fas fa-paper-plane"></i></a>
                                ${btn_bidang}
                                ${btn_update}
                                ${btn_delete}
                                `;
                        },
                        orderable: false
                    },
                ],
                order: [
                    [6, 'desc']
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

            $('#roleForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Simpan Perubahan');
                $.ajax({
                    type: "POST",
                    url: "{{ route(h_prefix('set_role')) }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#modal-role").modal('hide');
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
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil disimpan.',
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

        function activeFunc(id) {
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Apakah anda yakin akan menghapus data ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url(h_prefix_uri('active')) }}/${id}`,
                        type: 'GET',
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

        function viewIcon(image) {
            $('#icon-view-image').attr('src', `{{ url($image_folder) }}/${image}`)
        }

        let init = 0;

        function prosesTabelPengurus(pengurus) {
            const table_body = $("#tbl_member_body");
            table_body.html('');
            const element_table = $('#tbl_member');
            $(element_table).dataTable().fnDestroy();
            let table_body_html = '';
            let number = 1;
            pengurus.forEach(e => {
                table_body_html += `
                <tr>
                    <td>${number++}</td>
                    <td>${e.angkatan}</td>
                    <td><a href="{{ route('member.profile') }}?id=${e.id}" target="_blank">${e.nama}</a></td>
                    <td>${e.jabatan}</td>
                </tr>
              `;
            });
            table_body.html(table_body_html);
            renderTable(element_table);
        }

        function renderTable(element_table) {
            const tableUser = $(element_table).DataTable({
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }],
                // "responsive": true,
                // "lengthChange": true,
                // "autoWidth": false,
                order: [
                    [0, 'asc']
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });
            tableUser.on('draw.dt', function() {
                var PageInfo = $(element_table).DataTable().page.info();
                tableUser.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });
        }


        function viewDetail(id) {
            $.ajax({
                method: 'get',
                url: `{{ url(h_prefix_uri('detail')) }}/${id}`
            }).done((data) => {
                const class_ = data.detail.status == 1 ? 'success' : 'danger';
                const text = data.detail.status == 1 ? 'Aktif' : 'Tidak Aktif';
                $('#modal-detail-body').html(`
                    <h4 class="h4">Nama:</h4><p>${data.detail.nama}</p>
                    <h4 class="h4">Periode:</h4><p>${data.detail.dari} - ${data.detail.sampai}</p>
                    <h4 class="h4">Slogan:</h4><p>${data.detail.slogan}</p>
                    <h4 class="h4">Visi:</h4><p>${data.detail.visi}</p>
                    <h4 class="h4">Misi:</h4><p>${data.detail.misi}</p>
                    <h4 class="h4">Slogan:</h4><p>${data.detail.slogan}</p>
                    <h4 class="h4">Filosofi Logo:</h4><p>${data.detail.filosofi_logo ?? ''}</p>
                    <h4 class="h4">Status:</h4><p><i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}</p>
                    <h4 class="h4">Foto:</h4><p><img src="${data.detail.foto}" alt="${data.detail.nama}"/></p>
                    <h4 class="h4">Pengurus:</h4>
                `);

                // render table
                prosesTabelPengurus(data.pengurus);


            }).fail(($xhr) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something went wrong, try again later',
                    showConfirmButton: false,
                    timer: 3500
                })
            })
        }

        function setRole(periode_id) {
            $('#periode_id').val(periode_id);
            $('#role_name').val('');
        }
    </script>
@endsection