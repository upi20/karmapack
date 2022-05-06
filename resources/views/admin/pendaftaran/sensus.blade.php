@extends('templates.admin.master')

@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Sensus Anggota</h3>
                    <div>
                        <a href="{{ route('admin.pendaftaran.sensus.excel') }}" class="btn btn-success"><i
                                class="fa fa-file-excel-o"></i>
                            Excel</a>
                    </div>
                </div>
                <div class="card-body">
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
                            switch (data) {
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
                            return `<span class="badge bg-${class_bg}">${full.status_str}</span>`;
                        }
                    },
                ],
                order: [
                    [7, 'asc']
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

        });
    </script>
@endsection
