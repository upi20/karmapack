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
                    <h6 class="mt-2">Tabel {{ $page_attr['title'] }}</h6>
                </div>
                <div>
                    @if ($can_delete)
                        <button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip"
                            title="Hapus Data Yang Dipilih" id="btnCheckboxDelete" style="display: none"
                            onclick="checkBoxActionDelete()">
                            <i class="fas fa-trash"></i> Hapus Data</button>
                    @endif
                    @if ($can_insert)
                        <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                            data-bs-toggle="modal" href="#modal-default" onclick="addFunc()" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    @endif
                </div>
            </div>

            <table class="table table-striped table-hover" id="tbl_main">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="checkboxAll" onclick="checkBoxSetAll(this)"
                                class="form-check-input position-relative ms-1">
                        </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Waktu</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="nama">Nama Versi<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama" required="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="waktu">Waktu<span
                                            class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" id="waktu" name="waktu"
                                        placeholder="Waktu" required="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="major">Major<span class="text-danger">*</span>
                                    </label>
                                    <input type="number"class="form-control" id="major" name="major"
                                        placeholder="Major" required="" min="0" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="minor">Minor<span class="text-danger">*</span>
                                    </label>
                                    <input type="number"class="form-control" id="minor" name="minor"
                                        placeholder="Minor" required="" min="0" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label mb-1" for="patch">Patch<span class="text-danger">*</span>
                                    </label>
                                    <input type="number"class="form-control" id="patch" name="patch"
                                        placeholder="Patch" required="" min="0" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-1" for="oprional">Version Optional</label>
                            <input type="text"class="form-control" id="oprional" name="oprional"
                                placeholder="Version Optional" />
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea cols="3" rows="4" class="form-control tinymce" id="deskripsi" name="deskripsi"
                                placeholder="Deskripsi"></textarea>
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
    <script src="https://cdn.tiny.cloud/1/{{ config('app.tiny_mce_api_key') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
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
