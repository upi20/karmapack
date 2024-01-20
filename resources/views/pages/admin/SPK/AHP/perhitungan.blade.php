@extends('layouts.admin.master')

@section('content')
    @php
        $can_insert = auth_can(h_prefix('insert'));
        $can_update = auth_can(h_prefix('update'));
        $can_delete = auth_can(h_prefix('delete'));
        $can_setting = auth_can(h_prefix('setting'));
    @endphp
    <div class="card mt-3">
        <div class="card-body">

            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data {{ $page_attr['title'] }}</h6>
                </div>
            </div>

            <hr class="mt-1 mb-0" />
            @if ($can_setting)
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
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="umumkan" id="umumkan" type="checkbox"
                                            {{ $setting->umumkan ? 'checked' : '' }}>
                                        <label class="form-check-label" for="umumkan">
                                            Umumkan
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label mb-1">Jumlah Seleksi</label>
                                        <input type="number" min="1" id="jml_seleksi" name="jml_seleksi"
                                            class="form-control" value="{{ $setting->jml_seleksi }}" />
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

    <h4 class="mt-2">Perhitungan</h4>
    <hr>
    <h6 class="mt-2">Data Kriteria</h6>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class="mt-2 text-uppercase">
                                <a href="{{ route(h_prefix('kriteria', 1)) }}">Data Kriteria Utama</a>
                            </h6>
                        </div>
                    </div>
                    <table class="table table-striped table-hover w-100" id="tbl_alternatif">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $k => $kriteria)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $kriteria->kode }}</td>
                                    <td>{{ $kriteria->nama }}</td>
                                    <td title="{{ $kriteria->prioritas }}">
                                        {{ number_format($kriteria->prioritas, 4) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($kriterias as $i => $kriteria)
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-title d-md-flex flex-row justify-content-between">
                            <div>
                                <h6 class="mt-2 text-uppercase">
                                    <a href="{{ route(h_prefix('kriteria.jenis', 1), $kriteria->slug) }}">
                                        Kriteria {{ $kriteria->nama }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                        <table class="table table-striped table-hover w-100" id="datatable-{{ $i + 1 }}">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria->jenis as $k => $jenis)
                                    <tr>
                                        <td>{{ $k + 1 }}</td>
                                        <td>{{ $jenis->kode }}</td>
                                        <td>{{ $jenis->nama }}</td>
                                        <td title="{{ $jenis->prioritas }}">
                                            {{ number_format($jenis->prioritas, 4) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h6 class="mt-2">Data Alternatif</h6>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">
                        <a href="{{ route(h_prefix('alternatif', 1)) }}">Alternatif</a>
                    </h6>
                </div>
            </div>
            <table class="table table-striped table-hover w-100" id="tbl_alternatif1">
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

    <h6 class="mt-2">Nilai Prioritas</h6>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data Alternatif Nilai Prioritas</h6>
                </div>
            </div>
            <table class="table table-striped table-hover w-100" id="tbl_alternatif2">
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

    <h6 class="mt-2">Hasil akhir</h6>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Data Alternatif Nilai Prioritas * Nilai Prioritas Alternatif Utama</h6>
                </div>
            </div>
            <table class="table table-striped table-hover w-100" id="tbl_alternatif3">
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
                'alternatif_title' => $alternatif_title['title'],
                'jumlah_kriteria' => $kriterias->count(),
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
