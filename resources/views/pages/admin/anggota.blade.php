@extends('layouts.admin.master')

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
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
                <div>
                    @if ($can_excel)
                        <button class="btn btn-success btn-sm" onclick="exportExcel()">
                            <i class="fas fa-file-excel"></i> Ekspor
                        </button>
                    @endif
                    @if ($can_insert)
                        <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="addFunc()" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    @endif
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
                                @if ($is_admin)
                                    <div class="form-group float-start me-2" style="width: 250px">
                                        <label for="filter_role">Sebagai</label>
                                        <br>
                                        <select class="form-control" id="filter_role" name="filter_role"
                                            style="width: 250px">
                                            <option value="">Semua</option>
                                            @foreach ($user_role as $role)
                                                <option value="{{ $role->name }}">
                                                    {{ ucfirst(implode(' ', explode('_', $role->name))) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
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
                        <th>Foto</th>
                        <th>Nama</th>
                        {!! $is_admin ? '<th>Kontak</th>' : '' !!}
                        <th>Tgl. Lahir</th>
                        {!! $can_delete || $can_update || $can_save_another ? '<th>Aksi</th>' : '' !!}
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

    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-image-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modal-image-element" alt="" style="width: 100%">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.8/dataTables.bootstrap5.min.js" integrity="sha512-zw34c1fnMeY29qzodeC+GGKfyQQ7hN+a9yjGnIAZbkPPn/Xeh8Z46uea/fjq5Mwsp4bxvGKfJrTNnh/GdIZJ1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2-custom.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'can_save_another' => $can_save_another ? 'true' : 'false',
                'is_admin' => $is_admin ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
