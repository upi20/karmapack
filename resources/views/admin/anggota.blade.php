@extends('templates.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_save_another = auth_can('admin.profile.save_another');
        $can_excel = auth_can(h_prefix('excel'));
        $is_admin = auth()
            ->user()
            ->hasRole(config('app.super_admin_role'));
    @endphp
    <!-- Row -->
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Data {{ $page_attr['title'] }}</h3>
            <div>
                @if ($can_excel)
                    <button class="btn btn-success btn-sm" onclick="exportExcel()">
                        <i class="fas fa-file-excel"></i> Ekspor
                    </button>
                @endif
                @if ($can_insert)
                    <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-default" onclick="add()" data-target="#modal-default">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default active mb-2">
                    <div class="panel-heading " role="tab" id="headingOne1">
                        <h4 class="panel-title">
                            <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">
                                Filter Data
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                        <div class="panel-body">
                            <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="FilterForm">
                                <div class="form-group float-start me-2" style="width: 250px">
                                    <label for="filter_angkatan">Angkatan</label>
                                    <br>
                                    <select class="form-control" id="filter_angkatan" name="filter_angkatan"
                                        style="width: 250px">
                                        <option value="">Semua</option>
                                        @foreach ($angkatans as $angkatan)
                                            <option value="{{ $angkatan->angkatan }}">
                                                {{ $angkatan->angkatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group float-start me-2" style="width: 250px">
                                    <label for="filter_role">Sebagai</label>
                                    <br>
                                    <select class="form-control" id="filter_role" name="filter_role" style="width: 250px">
                                        <option value="">Semua</option>
                                        @foreach ($user_role as $role)
                                            <option value="{{ $role->name }}">
                                                {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group float-start me-2" style="width: 250px">
                                    <label for="filter_active">Status Akun</label>
                                    <br>
                                    <select class="form-control" id="filter_active" name="filter_active"
                                        style="width: 250px">
                                        <option value="">Semua</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
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
                        {!! $is_admin ? '<th>Email</th>' : '' !!}
                        <th>Tgl. Lahir</th>
                        {!! $can_delete || $can_update || $can_save_another ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
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
                    <form action="javascript:void(0)" id="UserForm" name="UserForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="angkatan">Angkatan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="angkatan" name="angkatan"
                                placeholder="Angkatan" required="" min="2003" max="2999" />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama Anggota <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Anggota" required="" />

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Alamat email" required="" />
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir <span
                                    class="text-danger">*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="form-control date-input-str" placeholder="Tanggal Lahir" required="" />
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group ">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="role">Akun Sebagai</label>
                            <select class="form-control select2" multiple style="width: 100%;" required=""
                                id="roles" name="roles[]">
                                @foreach ($user_role as $role)
                                    <option value="{{ $role->name }}">
                                        {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="active">Status Akun</label>
                            <select class="form-control" style="width: 100%;" required="" id="active"
                                name="active">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="UserForm">
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
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>

    <script>
        const table_html = $('#tbl_main');
        const can_update = {{ $can_update ? 'true' : 'false' }};
        const can_delete = {{ $can_delete ? 'true' : 'false' }};
        const can_save_another = {{ $can_save_another ? 'true' : 'false' }};
        const is_admin = {{ $is_admin ? 'true' : 'false' }};
        $(document).ready(function() {
            $('#filter_role').select2();
            $('#filter_active').select2();
            $('#filter_angkatan').select2();

            $('#roles').select2({
                dropdownParent: $('#modal-default'),
                placeholder: 'Select role'
            });

            // datatable ====================================================================================
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const column = [];
            if (can_update || can_delete || can_save_another) {
                column.push({
                    data: 'id',
                    name: 'id',
                    render(data, type, full, meta) {
                        const btn_profile = can_save_another ? `<a class="btn btn-rounded btn-info btn-sm me-1" data-toggle="tooltip" title="Ubah Profil"
                                href="{{ route('member.profile') }}?id=${data}" >
                                <i class="fas fa-user"></i></a>` : '';
                        const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data"
                                onClick="editFunc('${full.id}')">
                                <i class="fas fa-edit"></i></button>` : '';
                        const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                        return btn_profile + btn_update + btn_delete;
                    },
                    orderable: false
                });
            }
            let order_column = 3;
            if (!is_admin) order_column--;
            const new_table = table_html.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                aAutoWidth: false,
                bAutoWidth: false,
                type: 'GET',
                ajax: {
                    url: "{{ route(h_prefix()) }}",
                    data: function(d) {
                        d['filter[active]'] = $('#filter_active').val();
                        d['filter[role]'] = $('#filter_role').val();
                        d['filter[angkatan]'] = $('#filter_angkatan').val();
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
                            const anggatan = full.angkatan != null ?
                                `<small>${full.angkatan}</small> | ` : '';
                            const sebagai = String(full.roles).split(', ').reduce((r, v) => {
                                return r + `<span class="badge bg-primary me-2">${v}</span>`;
                            }, "");
                            return `<a class="text-dark" target="_blank" href="{{ url('anggota') }}/${full.id}">${full.nama}</a>
                            <br>${anggatan} ${sebagai}`;
                        },
                    },
                    ...(is_admin ? [{
                        data: 'email',
                        name: 'email',
                        render(data, type, full, meta) {
                            const class_ = full.active == 1 ? 'success' : 'danger';
                            const text = full.active == 1 ? 'Aktif' : 'Tidak Aktif';
                            return `${data}<br><small>
                                <i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}</small>`;
                        },
                    }] : []),
                    {
                        data: 'ulang_tahun',
                        name: 'ulang_tahun',
                        render(data, type, full, meta) {
                            const ulang_tahun = full.ulang_tahun == 0 ? 'Hari ini' :
                                `${full.ulang_tahun} Hari Lagi`;;
                            return `${(full.tanggal_lahir == null) ? '' : `${full.tanggal_lahir} <br>`}
                            <small>${ulang_tahun}</small>`;
                        },
                    },
                    ...column
                ],
                order: [
                    [order_column, 'asc']
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

            // insertForm ===================================================================================
            $('#UserForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Simpan Perubahan');
                resetErrorAfterInput();
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
            $('#UserForm').trigger("reset");
            $('#modal-default-title').html("Tambah Data Anggota");
            $('#modal-default').modal('show');
            $('#id').val('');
            $('#roles').val(['Anggota']).trigger('change');
            resetErrorAfterInput();
            $('#password').val('12345678');
            $('#password').attr('required', true);
            render_tanggal('#tanggal_lahir');
        }

        function editFunc(anggota_id) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: `{{ route(h_prefix('find')) }}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    anggota_id
                },
                success: (anggota) => {
                    $('#modal-default-title').html("Ubah Data Anggota");
                    $('#modal-default').modal('show');
                    $('#UserForm').trigger("reset");
                    $('#id').val(anggota.id);
                    $('#nama').val(anggota.nama);
                    $('#tanggal_lahir').val(anggota.tanggal_lahir);
                    $('#angkatan').val(anggota.angkatan);

                    $('#email').val(anggota.user.email);
                    $('#roles').val(anggota.user.roles.map(e => e.name)).trigger('change');
                    $('#active').val(anggota.user.active);
                    $('#password').val('');
                    $('#password').removeAttr('required');
                    render_tanggal('#tanggal_lahir');
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
                                position: 'top-end',
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
        @if ($can_excel)
            function exportExcel() {
                const base = "{{ route(h_prefix('excel')) }}";
                const active = $('#filter_active').val();
                const role = $('#filter_role').val();
                const search = $('[type=search]').val();
                let arg = `?active=${active}&role=${role}&search=${search}`;
                window.location.href = base + arg;
            }
        @endif
    </script>
@endsection
