@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $is_admin = is_admin();
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

                                @if ($is_admin)
                                    <div class="form-group float-start me-2" style="min-width: 300px">
                                        <label for="filter_user_id">Dibuat Oleh</label>
                                        <br>
                                        <select class="form-control" id="filter_user_id" name="filter_user_id"
                                            style="width: 100%;">
                                            <option value="" selected>Semua</option>
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group float-start me-2">
                                    <label for="filter_status">Status</label>
                                    <select class="form-control" id="filter_status" name="filter_status"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="2">Ditutup</option>
                                    </select>
                                </div>

                                <div class="form-group float-start me-2">
                                    <label for="filter_tampilkan">Tampilkan</label>
                                    <select class="form-control" id="filter_tampilkan" name="filter_tampilkan"
                                        style="max-width: 200px">
                                        <option value="">Semua</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
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
                        <th>No Urut</th>
                        {!! $is_admin ? '<th>Dibuat Oleh</th>' : '' !!}
                        <th>Nama</th>
                        <th>Copy Link</th>
                        <th>Foto</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Detail</th>
                        <th>Tampilkan</th>
                        <th>Status</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="nama">Nama <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Enter Nama" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="slug">Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter Slug" required="" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="link">Google Form Link
                                        <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" id="link" name="link"
                                        placeholder="Enter Google Form Link" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="foto">Foto
                                        <span class="badge bg-success" id="lihat-foto">Lihat</span>
                                    </label>
                                    <input type="file" class="form-control" id="foto" name="foto" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="no_urut">Nomor Urut
                                        <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="no_urut" name="no_urut"
                                        placeholder="Urutan" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="dari">Dari Tanggal
                                        <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dari" name="dari"
                                        placeholder="Dari Tanggal" required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="sampai">Sampai Tanggal
                                        <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="sampai" name="sampai"
                                        placeholder="Sampai Tanggal" required="" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="deskripsi">Deskripsi</label>
                                    <textarea type="text" class="form-control" rows="3" id="deskripsi" name="deskripsi"
                                        placeholder="Enter Deskripsi"> </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="tampilkan">Tampilkan Di List Pendaftaran </label>
                                    <select class="form-control" style="width: 100%;" required="" id="tampilkan"
                                        name="tampilkan">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" required="" id="status"
                                        name="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="2">Ditutup</option>
                                    </select>
                                </div>
                            </div>
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

    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon Pendaftaran">
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
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/2.1.1/jquery.dataTables.min.js" integrity="sha512-CKwcR6t3iAghHw93W7LcmVlSRCoGXiYyjITGKrFyDFqWHt6LIJ3j5f1dSjvL+OJbvG0KvPgP/zBEOikHUIu+3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2-custom.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'is_admin' => $is_admin ? 'true' : 'false',
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'image_folder' => $image_folder,
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
