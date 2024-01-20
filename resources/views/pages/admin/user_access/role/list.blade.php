@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can('h_prefix().insert');
        $can_update = auth_can('h_prefix().update');
        $can_delete = auth_can('h_prefix().delete');
    @endphp
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
                @if ($can_insert)
                    <div>
                        <a type="button" class="btn btn-rounded btn-primary btn-sm" href="{{ route(h_prefix('create')) }}">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    </div>
                @endif
            </div>
            <hr class="mt-1" />
            <table class="table table-striped table-hover w-100" id="tbl_main">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Guard</th>
                        <th>Updated At</th>
                        {!! $can_delete || $can_update ? '<th>Aksi</th>' : '' !!}
                    </tr>
                </thead>
                <tbody> </tbody>
            </table>
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
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
