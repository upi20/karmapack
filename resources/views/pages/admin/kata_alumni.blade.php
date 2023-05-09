@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $is_admin = is_admin();
        $can_list = $can_insert || $can_update || $can_delete || $is_admin;
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
                                    <label for="filter_status">Status</label>
                                    <select class="form-control" id="filter_status" name="filter_status"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        <option value="0">Disimpan</option>
                                        <option value="1">Di Publish</option>
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

            <table class="table table-striped table-hover w-100" id="tbl_main">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Profesi</th>
                        <th>Detail</th>
                        <th>Status</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    @if ($can_list)
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div id="nestable-lists" class="d-md-flex flex-row justify-content-between">
                            <h6 class="card-title">{{ $page_attr['title'] }} Sequence List</h6>
                            <div>
                                <div class="btn-group">
                                    <button class="btn me-1 btn-primary btn-sm save" data-action="save" title="Save"
                                        onclick="save()" style="border: 0; border-radius: 4px">
                                        <i class="fas fa-save"></i><span class="hidden-xs">&nbsp;Save</span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button class="btn me-1 btn-warning btn-sm refresh" data-action="refresh"
                                        title="Refresh" style="border: 0; border-radius: 4px" onclick="lists()">
                                        <i class="fe fe-refresh-cw"></i><span class="hidden-xs">&nbsp;Refresh</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="dd" style="width: 100%" id="lists"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                            <label class="form-label" for="user_id">Anggota
                                <span class="text-danger">*</span></label>
                            <select class="form-control" style="width: 100%;" required="" id="user_id"
                                name="user_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sebagai">Sebagai
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="sebagai" name="sebagai"
                                placeholder="Pendiri Karmapack" required="" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="profesi">Profesi
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="profesi" name="profesi"
                                placeholder="Bupati Cianjur 2019-2024" required="" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="deskripsi">Deskripsi
                                <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="3" id="deskripsi" name="deskripsi"
                                placeholder="Deskripsi" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" style="width: 100%;" required="" id="status"
                                name="status">
                                <option value="0">Disimpan</option>
                                <option value="1">Di Publish</option>
                            </select>
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

@section('stylesheet')
    @php $resource = resource_loader(blade_path: 'pages.admin.menu', type: 'css'); @endphp
    <link rel="stylesheet" href="{{ $resource }}">
    <link rel="stylesheet" href="{{ asset_admin('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/nestable2v1.6.0/jquery.nestable.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2-custom.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'can_list' => $can_list ? 'true' : 'false',
                'is_admin' => $is_admin ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
