@extends('templates.admin.master')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Sensus Anggota</h3>
                    <div>
                        <button class="btn btn-success" onclick="exportExcel()">
                            <i class="fa fa-file-excel-o"></i> Excel
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="h5">Filter Data</h5>
                    <form action="javascript:void(0)" class="form-inline ml-md-3 mb-md-3" id="FilterForm">
                        <div class="form-group me-md-3">
                            <label for="filter_status">Status</label>
                            <select class="form-control" id="filter_status" name="filter_status" style="max-width: 200px">
                                <option value="">Semua Status</option>
                                <option value="0">Diterima</option>
                                <option value="1">Diproses</option>
                                <option value="2">Selesai</option>
                                <option value="3">Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-md btn-info" title="Refresh Filter Table">
                            <i class="bi bi-arrow-repeat"></i> Refresh
                        </button>
                    </form>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-nowrap border-bottom" id="tbl_main">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Angkatan</th>
                                    <th>Email</th>
                                    <th>Whatsapp</th>
                                    <th>Telepon</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
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
                    <h6 class="modal-title" id="modal-default-title">Konfirmasi Ditolak</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label" for="keterangan">
                                Keterangan Ditolak
                                <span class="text-danger">*</span>
                            </label>
                            <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Enter Keterangan Ditolak"
                                required=""></textarea>
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="status" name="status">
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
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        const table_html = $('#tbl_main');
        let table_html_global = () => {};
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
                    url: "{{ route('admin.pendaftaran.sensus') }}",
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
                        data: 'angkatan',
                        name: 'angkatan'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'whatsapp',
                        name: 'whatsapp'
                    },
                    {
                        data: 'telepon',
                        name: 'telepon'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render(data, type, full, meta) {
                            let class_bg = '';
                            switch (Number(data)) {
                                case 0:
                                    class_bg = 'primary'
                                    break;
                                case 1:
                                    class_bg = 'secondary'
                                    break;
                                case 2:
                                    class_bg = 'success'
                                    break;
                                case 3:
                                    class_bg = 'danger'
                                    break;
                                default:
                                    class_bg = 'warning'
                                    break;
                            }

                            const diterima = data == 0 ? '' :
                                `<li><button class="btn btn-primary m-1" onclick="setStatus(${full.id},0)" value="0">Diterima</button></li>`;
                            const diproses = data == 1 ? '' :
                                `<li><button class="btn btn-secondary m-1" onclick="setStatus(${full.id},1)" value="1">Diproses</button></li>`;
                            const selesai = data == 2 ? '' :
                                `<li><button class="btn btn-success m-1" onclick="setStatus(${full.id},2)" value="2">Selesai</button></li>`;
                            const ditolak = data == 3 ? '' :
                                `<li><button class="btn btn-danger m-1" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modal-default" onclick="statusTolak('${full.id}', 3)" data-target="#modal-default">Ditolak</button></li>`;

                            return `
                            <div class="dropstart btn-group mt-2 mb-2">
                                <button class="btn btn-sm btn-${class_bg} dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">${full.status_str}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    ${diterima}
                                    ${diproses}
                                    ${selesai}
                                    ${ditolak}
                                </ul>
                            </div>
                            `;
                        }
                    },
                ],
                order: [
                    [7, 'asc']
                ]
            });
            table_html_global = table_html;

            new_table.on('draw.dt', function() {
                var PageInfo = table_html.DataTable().page.info();
                new_table.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });

            // filter
            $('#FilterForm').submit(function(e) {
                e.preventDefault();
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
            });

            $('#MainForm').submit(function(e) {
                e.preventDefault();
                setStatus($('#id').val(), $('#status').val(), $('#keterangan').val());
            });
        });

        function exportExcel() {
            const base = "{{ route('admin.pendaftaran.sensus.excel') }}";
            const status = $('#filter_status').val();
            const search = $('[type=search]').val();
            let arg = status ? `?status=${status}` : '';
            arg += (status ? `&` : '?') + (search ? `search=${search}` : '');
            window.location.href = base + arg;
        }

        function setStatus(id, status, keterangan = '') {
            $.LoadingOverlay('show');
            $.ajax({
                type: "POST",
                url: `{{ route('admin.pendaftaran.sensus.status') }}?id=${id}&status=${status}&keterangan=${keterangan}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    status: status,
                    keterangan: keterangan,
                },
                success: (data) => {
                    var oTable = table_html_global.dataTable();
                    oTable.fnDraw(false);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data saved successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#modal-default').modal('hide');
                },
                error: function(data) {
                    const res = data.responseJSON ?? {};
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: (res.errors ? res.errors.new_password : res
                                .message) ??
                            'Something went wrong',
                        showConfirmButton: false,
                        timer: 4000
                    })
                },
                complete: function() {
                    $.LoadingOverlay('hide');
                }
            });
        }

        function statusTolak(id, status) {
            $('#keterangan').val('');
            $('#id').val(id);
            $('#status').val(status);
        }
    </script>
@endsection
