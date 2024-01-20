@extends('layouts.admin.master')

@section('content')
    @php
        $can_setting = auth_can(h_prefix('setting'));
    @endphp
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
                <div>
                    <button class="btn btn-success btn-sm" onclick="exportExcel()">
                        <i class="fas fa-file-excel"></i> Excel
                    </button>
                </div>
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
                                        <option value="">Semua Status</option>
                                        <option value="0">Diterima</option>
                                        <option value="1">Diproses</option>
                                        <option value="2">Selesai</option>
                                        <option value="3">Ditolak</option>
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
            @if ($can_setting)
                <hr class="mt-1 mb-0" />
                <div class="accordion accordion-flush" id="setting_list_container">
                    <div class="accordion-item">
                        <h6 class="accordion-header" id="setting_list">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#settingList" aria-expanded="false" aria-controls="settingList">
                                Pengaturan
                            </button>
                        </h6>
                        <div id="settingList" class="accordion-collapse collapse" aria-labelledby="setting_list"
                            data-bs-parent="#setting_list_container">
                            <div class="accordion-body">
                                <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="setting_form">

                                    <div class="form-group float-start me-2">
                                        <label for="setting_jadikan_pengguna">Langsung Jadikan Pengguna</label>
                                        <select class="form-control" id="setting_jadikan_pengguna" name="jadikan_pengguna">
                                            <option value="1"{{ $setting->jadikan_pengguna ? 'selected' : '' }}>
                                                Ya
                                            </option>
                                            <option value="0"{{ $setting->jadikan_pengguna ? '' : 'selected' }}>
                                                Tidak
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group float-start me-2">
                                        <label for="setting_sebagai">Sebagai</label>
                                        <select class="form-control" id="setting_sebagai" name="sebagai">
                                            @foreach ($user_role as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $setting->sebagai == $role->name ? 'selected' : '' }}>
                                                    {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                                <div style="clear: both"></div>
                                <button type="submit" form="setting_form" class="btn btn-rounded btn-sm btn-secondary mt-2"
                                    data-toggle="tooltip" title="Simpan perubahan">
                                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                                </button>
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
                        <th>Angkatan</th>
                        <th>Kontak</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title">Konfirmasi Ditolak</h6><button aria-label="Tutup"
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
                            <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Ditolak"
                                required=""></textarea>
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="status" name="status">
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
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/2.1.1/jquery.dataTables.min.js" integrity="sha512-CKwcR6t3iAghHw93W7LcmVlSRCoGXiYyjITGKrFyDFqWHt6LIJ3j5f1dSjvL+OJbvG0KvPgP/zBEOikHUIu+3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
