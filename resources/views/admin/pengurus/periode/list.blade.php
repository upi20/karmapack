@extends('templates.admin.master')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">List Periode</h3>
                    <a class="btn btn-rounded btn-success" href="{{ route('admin.pengurus.periode.add') }}"
                        data-bs-effect="effect-scale">
                        <i class="bi bi-plus-lg"></i> Tambah Periode
                    </a>
                </div>
                <div class="card-body">
                    {{-- <h5 class="h5">Filter Data</h5>
                    <form action="javascript:void(0)" class="form-inline ml-md-3 mb-md-3" id="FilterForm">
                        <div class="form-group me-md-3">
                            <label for="filter_status">Status</label>
                            <select class="form-control" id="filter_status" name="filter_status" style="max-width: 200px">
                                <option value="">All Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-md btn-info" title="Refresh Filter Table">
                            <i class="bi bi-arrow-repeat"></i> Refresh
                        </button>
                    </form> --}}
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Slug</th>
                                    <th>Member</th>
                                    <th>Detail</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Icon</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon Periode">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <div class="modal fade" id="modal-member">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-member-title">View Member</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered border-bottom text-nowrap" id="tbl_member">
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-detail-title">Detail Periode</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="modal-detail-body">

                </div>
                <div class="modal-footer">
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
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}">
    </script>


    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

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
                    url: "{{ route('admin.pengurus.periode') }}",
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
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return data ? `
                            <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-member" onclick="viewMember('${data}')"
                                        data-target="#modal-member"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                            ` : '';
                        },
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return data ? `
                            <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-detail" onclick="viewDetail('${data}')"
                                        data-target="#modal-detail"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                            ` : '';
                        },
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        render(data, type, full, meta) {
                            return data ? `
                            <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-icon" onclick="viewIcon('${data}')"
                                        data-target="#modal-icon"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                            ` : '';
                        },
                    },
                    {
                        data: 'status_str',
                        name: 'status',
                        render(data, type, full, meta) {
                            const class_el = full.status == 1 ? 'badge bg-success' :
                                'badge bg-danger';
                            const btn = full.status == 1 ? '' : `
                                <button type="button" class="btn btn-rounded btn-secondary btn-sm my-1" title="Active Periode" onClick="activeFunc('${full.id}')">
                                <i class="fa fa-check" aria-hidden="true"></i> Aktifkan
                                </button> `;
                            return `<span class="${class_el} p-2">${full.status_str}</span> ${btn}`;
                        },
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render(data, type, full, meta) {
                            return ` <a class="btn btn-rounded btn-primary btn-sm my-1" title="Lihat Periode"
                                href="{{ url('periode') }}/${full.slug}" target="_blank">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Lihat
                                </a>
                                <a class="btn btn-rounded btn-secondary btn-sm my-1" title="Edit Bidang"
                                href="{{ url('admin/pengurus/jabatan') }}/${data}" >
                                <i class="fe fe-git-pull-request" aria-hidden="true"></i> Bidang
                                </a>
                                <a class="btn btn-rounded btn-primary btn-sm my-1" title="Edit Data"
                                href="{{ url('admin/pengurus/periode/edit') }}/${data}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                                <button type="button" class="btn btn-rounded btn-danger btn-sm my-1" title="Delete Data" onClick="deleteFunc('${data}')">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                                `;
                        },
                        orderable: false
                    },
                ],
                order: [
                    [7, 'desc']
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
        });

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
                        url: `{{ url('admin/pengurus/periode') }}/${id}`,
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
                                title: 'Data saved successfully.',
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
                title: 'Are you sure?',
                text: "Are you sure you want to proceed ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: `{{ url('admin/pengurus/periode/active') }}/${id}`,
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
                                title: 'Data deleted successfully',
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

        function viewMember(id) {
            $.ajax({
                method: 'post',
                url: "{{ route('admin.pengurus.periode.member') }}",
                data: {
                    periode_id: id
                }
            }).done((data) => {
                const table_body = $("#tbl_member_body");
                table_body.html('');
                const element_table = $('#tbl_member');
                $(element_table).dataTable().fnDestroy();
                let table_body_html = '';
                let number = 1;
                data.results.forEach(e => {
                    table_body_html += `
                <tr>
                    <td>${number++}</td>
                    <td>${e.angkatan}</td>
                    <td>${e.name}</td>
                    <td>${e.jabatan}</td>
                </tr>
              `;
                });
                table_body.html(table_body_html);
                renderTable(element_table);

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

        function renderTable(element_table) {
            const tableUser = $(element_table).DataTable({
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }],
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                order: [
                    [0, 'asc']
                ]
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

        function tes_datatable(custom_fun = null) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.pengurus.periode.member') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    periode_id: 2
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

        function viewDetail(id) {
            $.ajax({
                method: 'post',
                url: `{{ url('admin/pengurus/periode/detail') }}/${id}`
            }).done((data) => {
                $('#modal-detail-body').html(`
                    <h4 class="h4">Visi:</h4><p>${data.results.visi}</p>
                    <h4 class="h4">Misi:</h4><p>${data.results.misi}</p>
                    <h4 class="h4">Slogan:</h4><p>${data.results.slogan}</p>
                `);
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
    </script>
@endsection
