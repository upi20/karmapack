@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('save', 1));
    @endphp
    <div class="card">
        <div class="card-header bg-info d-md-flex flex-row justify-content-between">
            <div>
                <h6 class="mt-2 text-uppercase text-light">Form {{ $page_attr['title'] }}</h6>
            </div>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                    <i class='bx bx-arrow-back me-1'></i>Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form id="MainForm">
                <div class="form-group">
                    <label for="anggotas">Bidang Anggota</label>
                    <select class="form-control select2" id="anggotas" multiple name="anggotas[]" style="width: 100%">
                        @foreach ($anggotas as $anggota)
                            <option value="{{ $anggota->anggota->id }}" selected>
                                {{ $anggota->anggota->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
            @if ($can_insert)
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary" form="MainForm" id="btn-save">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2-custom.js') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'jabatan_id' => $jabatan->id,
                'jabatan_periode_id' => $jabatan->periode_id,
            ],
        );
    @endphp

    <script src="{{ $resource }}"></script>
@endsection
