@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
    @endphp
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
                @if ($can_insert)
                    <div>
                        <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="addFunc()" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                @endif
            </div>

            <hr class="mt-1 mb-0" />
            <div class="accordion accordion-flush" id="accordionOption">
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterData" aria-expanded="false" aria-controls="filterData">
                            Filter Data
                        </button>
                    </h6>
                    <div id="filterData" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#accordionOption">
                        <div class="accordion-body">
                            <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="FilterForm">
                                <div class="form-group float-start me-2">
                                    <label for="filter_type">Tipe tanggal</label>
                                    <select class="form-control" id="filter_type" name="filter_type"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        <option value="1">Tetap</option>
                                        <option value="0">Tidak Tetap</option>
                                    </select>
                                </div>
                            </form>
                            <div style="clear: both"></div>
                            <button type="submit" form="FilterForm" class="btn btn-rounded btn-sm btn-secondary mt-2"
                                data-toggle="tooltip" title="Refresh Filter Table">
                                <i class="fas fa-sync-alt me-1"></i> Terapkan filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @if ($can_update)
                <hr class="mt-1 mb-0" />
                <div class="accordion accordion-flush" id="error_list_container">
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="error_list">
                            <button class="accordion-button collapsed text-danger" type="button" data-bs-toggle="collapse"
                                data-bs-target="#errorList" aria-expanded="false" aria-controls="errorList">
                                Error (Tanggal untuk tahun ini belum di tentukan)
                            </button>
                        </h6>
                        <div id="errorList" class="accordion-collapse collapse" aria-labelledby="error_list"
                            data-bs-parent="#error_list_container">
                            <div class="accordion-body">
                                <div class="list-group list-group-flush" id="error_list_body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <table class="table table-striped table-hover w-100" id="tbl_main">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Countdown</th>
                        <th>Type</th>
                        <th>Keterangan</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
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
                    <h6 class="modal-title" id="modal-default-title"></h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label class="form-label" for="type">Tipe Tanggal</label>
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
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
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
    <link rel="stylesheet" href="{{ asset_admin('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
