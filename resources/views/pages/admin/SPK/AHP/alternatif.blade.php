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
            <table class="table table-striped table-hover w-100" id="tbl_main">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
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
                            <label for="anggota_id">Pengurus</label>
                            <select class="form-control" id="anggota_id" name="anggota_id"> </select>
                        </div>
                        <div id="myForm"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fas fa-save mr-1"></li> Simpan
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
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
