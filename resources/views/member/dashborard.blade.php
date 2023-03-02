@extends('templates.admin.master')

@section('content')
    @php
        $jml_table = 0;
        $using_chart = 0;
    @endphp
    <div class="page-header">
        <h1 class="page-title">Halaman Utama</h1>
    </div>

    <!-- ROW OPEN -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow card-main">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $total_anggota }}</h2>
                            <p class="text-white mb-0">Total Anggota </p>
                        </div>
                        <div class="ms-auto"> <i class="fas fa-users text-white fs-30 me-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('member.profile') }}">
                <div class="card bg-secondary img-card box-secondary-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h3 class="mb-0 number-font">Ubah Profile</h3>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-user text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <a href="{{ route('member.password') }}">
                <div class="card  bg-success img-card box-success-shadow card-main">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h3 class="mb-0 number-font">Ganti Password</h3>
                            </div>
                            <div class="ms-auto"> <i class="fas fa-key text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <hr>

    <h1 class="page-title">Statistik Anggota</h1>

    <br>
    <div class="row">
        {{-- Angkatan --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h3 class="card-title mb-1">Angkatan</h3>
                        <small>Jumlah anggota berdasarkan tahun angkatan</small>
                    </div>
                    {{-- <div>
                        <select id="chart-angkatan-filter" class="form-control form-select form-select-sm select2">
                            <option value="">Semua</option>
                        </select>
                    </div> --}}
                </div>
                <div class="card-body">
                    @if (count($anggota_by_angkatan) < 13)
                        @php $using_chart++; @endphp
                        <div id="chart-angkatan" class="chartsh"></div>
                    @else
                        <table class="table table-striped" id="table{{ ++$jml_table }}">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota_by_angkatan as $k => $v)
                                    <tr>
                                        <td>{{ $k + 1 }}</td>
                                        <td>{{ $v->title }}</td>
                                        <td>{{ $v->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        {{-- Kecamatan --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h3 class="card-title mb-1">Kecamatan</h3>
                        <small>Jumlah anggota berdasarkan alamat</small>
                    </div>
                    {{-- <div>
                        <select id="chart-kecamatan-filter" class="form-control form-select form-select-sm select2">
                            <option value="">Semua</option>
                        </select>
                    </div> --}}
                </div>
                <div class="card-body">
                    @if (count($anggota_by_address->kecamatan) < 13)
                        @php $using_chart++; @endphp
                        <div id="chart-kecamatan" class="chartsh"></div>
                    @else
                        <table class="table table-striped" id="table{{ ++$jml_table }}">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota_by_address->kecamatan as $k => $v)
                                    <tr>
                                        <td>{{ $v->title }}</td>
                                        <td>{{ $v->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        {{-- Desa --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h3 class="card-title mb-1">Desa</h3>
                        <small>Jumlah anggota berdasarkan alamat</small>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table{{ ++$jml_table }}">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>KEC.</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota_by_address->desa as $k => $v)
                                <tr>
                                    <td>
                                        {{ $v->title }}
                                    </td>
                                    <td>
                                        @if (isset($v->sub_title) ? $v->sub_title : false)
                                            {{ $v->sub_title }}
                                        @endif
                                    </td>
                                    <td>{{ $v->value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Statistik Anggota Berdasarkan Riwayat Pendidikan --}}
        @foreach ($anggota_by_riwayat_pendidikan as $p)
            @if (count($p['data']) == 0)
                @continue
            @endif

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header d-md-flex flex-row justify-content-between">
                        <div>
                            <h3 class="card-title mb-1">{{ $p['nama'] }}</h3>
                            <small>Statistik Anggota Berdasarkan Riwayat Pendidikan</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table{{ ++$jml_table }}">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p['data'] as $k => $v)
                                    <tr>
                                        <td>{{ $v->title }}</td>
                                        <td>{{ $v->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <!-- ROW CLOSED -->
    <div class="card p-1">
        <div class="card-header">
            <h3 class="card-title">List Fitur Aplikasi</h3>
        </div>
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card  m-lg-0">
                        <div class="card-status bg-blue br-te-7 br-ts-7"></div>
                        <div class="card-header">
                            <h3 class="card-title">Aplikasi Sistem Informasi Anggota (Khusus Anggota)</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
                                <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="mb-0 mt-4">Profile</h4>
                            <ul class="list-style5">
                                <li>Management mendokumentasikan data anggota dan untuk mempermudah komunikasi pengurus
                                    terhadap anggota yang masih
                                    menjabat maupun alumni. [selesai] <a href="{{ route('member.profile') }}">Kunjungi</a>
                                </li>
                            </ul>

                            <h4 class="mb-0 mt-4">Dokumen</h4>
                            <ul class="list-style5">
                                <li>Arsip dokumen-dokumen penting dari semua acara/event yang pernah dilaksanakan</li>
                            </ul>

                            <h4 class="mb-0 mt-4">Lapor</h4>
                            <ul class="list-style5">
                                <li>Menu untuk melaporkan bug/crash/error untuk evaluasi perbaikan aplikasi kedepannya.
                                </li>
                            </ul>

                            <h4 class="mb-0 mt-4">Aspirasi</h4>
                            <ul class="list-style5">
                                <li>Menu untuk memberikan masukan atau usulan terkait aplikasi. seperti fitur apa yang ingin
                                    ditambahkan.</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card m-lg-0">
                        <div class="card-status bg-blue br-te-7 br-ts-7"></div>
                        <div class="card-header">
                            <h3 class="card-title">Publik | Umum (Halaman yang bisa di akses semua orang)</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="mb-0 mt-4">Home</h4>
                            <ul class="list-style5">
                                <li>Ringkasan Periode Kepengurusan Saat Ini. [selesai] <a
                                        href="{{ url('') }}">Kunjungi</a></li>
                                <li>Daftar Artikel. [selesai] <a href="{{ url('') }}">Kunjungi</a></li>
                            </ul>

                            <h4 class="mb-0 mt-4">Tentang Kami</h4>
                            <ul class="list-style5">
                                <li>Sejarah</li>
                                <li>Struktur Kepengurusan (Detail Kepengurusan Saat Ini). [selesai] <a
                                        href="{{ route('tentang.kepengurusan.struktur') }}">Kunjungi</a></li>
                                <li>Periode Kepengurusan (List Semua Periode Kepengurusan Karmapack)</li>
                                <li>Anggaran Dasar Anggaran Rumah Tangga</li>
                            </ul>

                            <h4 class="mb-0 mt-4">Bidang</h4>
                            <ul class="list-style5">
                                <li>Semua Profile Bidang. [selesai]</li>
                            </ul>


                            <h4 class="mb-0 mt-4">Anggota</h4>
                            <ul class="list-style5">
                                <li>List Semua Anggota Karmapack. [selesai] <a href="{{ route('anggota') }}">Kunjungi</a>
                                </li>
                            </ul>

                            <h4 class="mb-0 mt-4">Galeri</h4>
                            <ul class="list-style5">
                                <li>List Galeri Kegiatan. [selesai] <a href="{{ route('galeri') }}">Kunjungi</a></li>
                            </ul>

                            <h4 class="mb-0 mt-4">Pendaftaran (List Semua Pendaftaran)</h4>
                            <ul class="list-style5">
                                <li>Sensus Anggota. [selesai] <a href="{{ route('pendaftaran.sensus') }}">Kunjungi</a>
                                </li>
                                <li>Poesaka</li>
                                <li>Dan acara lain lain</li>
                            </ul>



                            <h4 class="mb-0 mt-4">kontak</h4>
                            <ul class="list-style5">
                                <li>Halaman Untuk menghubungi admin karmapack lewat website</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
@endsection

@section('javascript')
    @if ($using_chart > 0)
        <script src="{{ asset('assets/templates/admin/js/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/js/circle-progress.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/charts-c3/d3.v5.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/charts-c3/c3-chart.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/input-mask/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
        <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    @endif
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            @for ($i = 1; $i <= $jml_table; $i++)
                const table_html_{{ $i }} = $('#table{{ $i }}');
                const table_{{ $i }} = table_html_{{ $i }}.DataTable({
                    // processing: true,
                    // serverSide: false,
                    // scrollX: true,
                    // aAutoWidth: true,
                    // bAutoWidth: true,

                    language: {
                        url: datatable_indonesia_language_url
                    },
                });
            @endfor


        })
    </script>
    @if ($using_chart > 0)
        <script>
            const data_angkatan = JSON.parse(`{!! json_encode($anggota_by_angkatan ?? []) !!}`);
            const data_kecamatan = JSON.parse(`{!! json_encode($anggota_by_address->kecamatan ?? []) !!}`);

            function renderChartAngkatan() {
                const columns = ['data1'];
                const categories = [];

                data_angkatan.forEach(e => {
                    columns.push(e.value);
                    categories.push(e.title);
                })
                var chart = c3.generate({
                    bindto: '#chart-angkatan', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            columns
                        ],
                        type: 'bar', // default type of chart
                        colors: {
                            data1: '#6c5ffc'
                        },
                        names: {
                            // name of each serie
                            'data1': 'Anggota'
                        },
                        labels: true,
                    },
                    axis: {
                        x: {
                            type: 'category',
                            // name of each category
                            categories: categories
                        },
                    },
                    // bar: {
                    //     width: 16
                    // },
                    legend: {
                        show: false, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            }

            function renderChartKecamatan() {
                const columns = ['data1'];
                const categories = [];

                data_kecamatan.forEach(e => {
                    columns.push(e.value);
                    categories.push(e.title);
                })
                var chart = c3.generate({
                    bindto: '#chart-kecamatan', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            columns
                        ],
                        type: 'bar', // default type of chart
                        colors: {
                            data1: '#6c5ffc'
                        },
                        names: {
                            // name of each serie
                            'data1': 'Anggota'
                        },
                        labels: true,
                    },
                    axis: {
                        x: {
                            type: 'category',
                            // name of each category
                            categories: categories
                        },
                        rotated: true
                    },
                    // bar: {
                    //     width: 16
                    // },
                    legend: {
                        show: false, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            }
            renderChartAngkatan();
            renderChartKecamatan();
        </script>
    @endif
@endsection
