@extends('templates.admin.master')

@section('content')
    <input type="text" id="clipboard" style="position: fixed; top:-50px">
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
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
                                        <div class="form-group float-start me-2">
                                            <label for="filter_type">Type tanggal</label>
                                            <select class="form-control" id="filter_type" name="filter_type"
                                                style="max-width: 200px">
                                                <option value="">Semua</option>
                                                <option value="1">Tetap</option>
                                                <option value="0">Tidak Tetap</option>
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
                                    <th>Angkatan</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Whatsap</th>
                                    <th>No Telepon</th>
                                    <th>Kepengurusan Terakhir</th>
                                    <th>Pendidikan Terakhir</th>
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
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Tutup" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label class="form-label" for="type">Type Tanggal</label>
                            <select class="form-control" style="width: 100%;" required="" id="type" name="type">
                                <option value="1">Tetap</option>
                                <option value="0">Tidak Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="hari">Tanggal
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="1" max="31" class="form-control"
                                        id="hari" name="hari" placeholder="Tanggal" required />
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="bulan">Bulan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" min="1" max="12" class="form-control"
                                        id="bulan" name="bulan" placeholder="Bulan" required />
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="tahun">Tahun </label>
                                    <input type="number" min="2020" max="9999" class="form-control"
                                        id="tahun" name="tahun" placeholder="Tahun" />
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" rows="3" id="keterangan" name="keterangan"
                                placeholder="Deskripsi"> </textarea>
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
                        d['filter[type]'] = $('#filter_type').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'id',
                        orderable: false,
                    },
                    {
                        data: 'angkatan',
                        name: 'angkatan'
                    },
                    {
                        data: 'id',
                        name: 'name',
                        render(data, type, full, meta) {
                            return `<a class="text-dark" target="_blank" href="{{ url('anggota') }}/${data}">${full.name}</a>`;
                        },
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'province',
                        name: 'province',
                        render(data, type, full, meta) {
                            return `${full.province ?? ''} ${full.regencie ?? ''} ${full.district ?? ''} ${full.village?? ''}  ${full.alamat_lengkap ?? ''}`;
                        },
                    },
                    {
                        data: 'whatsapp',
                        name: 'whatsapp',
                    },
                    {
                        data: 'telepon',
                        name: 'telepon',
                    },
                    {
                        data: 'periode_nama',
                        name: 'periode_nama',
                        render(data, type, full, meta) {
                            return `${ full.jabatan_nama } ${data}`;
                        },
                    },
                    {
                        data: 'pendidikan_nama',
                        name: 'pendidikan_nama',
                    },
                ],
                order: [
                    [1, 'desc']
                ]
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
        });
    </script>
@endsection
