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
                                {{ $anggota->anggota->angkatan }} | {{ $anggota->anggota->nama }}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2-custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php
        $resource = resource_loader(blade_path: $view, params: ['jabatan_id' => $jabatan->id, 'jabatan_periode_id' => $jabatan->periode_id]);
    @endphp

    <script src="{{ $resource }}"></script>
@endsection
