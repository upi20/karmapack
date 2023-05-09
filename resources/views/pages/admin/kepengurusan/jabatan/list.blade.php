@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert', 1));
        $can_update = auth_can(h_prefix('update', 1));
        $can_delete = auth_can(h_prefix('delete', 1));
        $can_member = auth_can(h_prefix('member', 1));
    @endphp
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
                @if ($can_insert)
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                            <i class='bx bx-arrow-back me-1'></i>Kembali</a>
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
                                <div class="form-group float-start me-2" style="width: 250px">
                                    <label for="filter_role">Sebagai</label>
                                    <br>
                                    <select class="form-control" id="filter_role" name="filter_role" style="width: 250px">
                                        <option value="">Semua</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group float-start me-2" style="width: 250px">
                                    <label for="filter_status">Status</label>
                                    <br>
                                    <select class="form-control" id="filter_status" name="filter_status"
                                        style="width: 250px">
                                        <option value="">Semua</option>
                                        <option value="1">Dipakai</option>
                                        <option value="0">Tidak Dipakai</option>
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
                        <th>Urutan</th>
                        <th>Bidang</th>
                        <th>Akun Sebagai</th>
                        <th>Status</th>
                        {!! $can_member || $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6><button aria-label="Tutup" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MainForm" name="MainForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="temp_foto" name="temp_foto">
                        <input type="hidden" id="periode_id" name="periode_id" value="{{ $periode->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="parent_id">Utama</label>
                                    <select class="form-control" id="parent_id" name="parent_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Alamat url untuk akses Bidang" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="no_urut">No Urut</label>
                                            <input type="number" class="form-control" id="no_urut" name="no_urut"
                                                placeholder="No Uurut" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="role_id">Akun Sebagai</label>
                                            <select class="form-control" id="role_id" name="role_id" required>
                                                @foreach ($roles as $role)
                                                    @if ($role->name != config('app.super_admin_role'))
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="slogan">Slogan</label>
                                    <input type="text" class="form-control" id="slogan" name="slogan"
                                        placeholder="Slogan" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="singkatan">Singkatan</label>
                                    <input type="text" class="form-control" id="singkatan" name="singkatan"
                                        placeholder="Singkatan" />
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="foto">Icon</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto"
                                        accept="image/png, image/jpeg, image/JPG, image/PNG, image/JPEG">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea cols="3" rows="4" class="form-control summernote" id="visi" name="visi"
                                placeholder="Visi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea cols="3" rows="4" class="form-control summernote" id="misi" name="misi"
                                placeholder="Misi"></textarea>
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
    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Icon</h6><button aria-label="Tutup"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon Bidang">
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
    @vite(['resources/css/_summernote.scss'])
    <link rel="stylesheet" href="{{ asset_admin('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/summernote/summernote1.js', name: 'sash') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'can_member' => $can_member ? 'true' : 'false',
                'periode_id' => $periode->id,
                'periode_dari' => $periode->dari,
                'periode_sampai' => $periode->sampai,
            ],
        );
    @endphp

    <script src="{{ $resource }}"></script>
@endsection
