@extends('layouts.admin.master')

@section('content')
    @php
        $jml_table = 0;
        $column = 'col-6 col-md-4 col-lg-3 col-xl-2 px-md-2 px-2 px-md-0 py-2';
    @endphp

    <div class="grid mb-3">
        <div class="grid-sizer {{ $column }}"></div>

        {{-- Edit Biodata --}}
        <div class="grid-item {{ $column }}">
            <a href="{{ route('member.profile') }}">
                <div class="card radius-10 card-main">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <p class="mb-0 text-secondary">Edit Biodata</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Kata Alumni --}}
        @if (auth_has_role(9))
            <div class="grid-item {{ $column }}">
                <a href="{{ route('member.kata_alumni') }}">
                    <div class="card radius-10 card-main">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <p class="mb-0 text-secondary">Input Kata Alumni</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <div class="grid-item {{ $column }}">
            <a href="{{ route('admin.anggota') }}">
                <div class="card radius-10 card-main">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3">
                                <i class="fas fa-book"></i>
                            </div>
                            <p class="mb-0 text-secondary">Daftar Anggota</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="grid-item {{ $column }}">
            <a href="{{ route('admin.kepengurusan.periode') }}">
                <div class="card radius-10 card-main">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-secondary text-secondary mb-3">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <p class="mb-0 text-secondary">Daftar Periode Kepengurusan</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- ganti password --}}
        <div class="grid-item {{ $column }}">
            <a href="{{ route('member.password') }}">
                <div class="card radius-10 card-main">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-danger text-danger mb-3">
                                <i class="bx bxs-key"></i>
                            </div>
                            <p class="mb-0 text-secondary">Ganti Password</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>
    <h5 class="page-title">Statistik Anggota (Total: {{ $total_anggota }} Anggota)</h5>
    <div class="row">
        {{-- Angkatan --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h6 class="card-title mb-1">Angkatan</h6>
                        <small>Jumlah anggota berdasarkan tahun angkatan</small>
                    </div>
                    {{-- <div>
                        <select id="chart-angkatan-filter" class="form-control form-select form-select-sm select2">
                            <option value="">Semua</option>
                        </select>
                    </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100 table-hover datatable" id="table{{ ++$jml_table }}">
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
                </div>
            </div>
        </div>

        {{-- Kecamatan --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h6 class="card-title mb-1">Kecamatan</h6>
                        <small>Jumlah anggota berdasarkan alamat</small>
                    </div>
                    {{-- <div>
                        <select id="chart-kecamatan-filter" class="form-control form-select form-select-sm select2">
                            <option value="">Semua</option>
                        </select>
                    </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100 table-hove datatable" id="table{{ ++$jml_table }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota_by_address->kecamatan as $k => $v)
                                <tr>
                                    <td></td>
                                    <td>{{ $v->title }}</td>
                                    <td>{{ $v->value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Desa --}}
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <div>
                        <h6 class="card-title mb-1">Desa</h6>
                        <small>Jumlah anggota berdasarkan alamat</small>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100 table-hover datatable" id="table{{ ++$jml_table }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>KEC.</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota_by_address->desa as $k => $v)
                                <tr>
                                    <td></td>
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
                            <h6 class="card-title mb-1">{{ $p['nama'] }}</h6>
                            <small>Statistik Anggota Berdasarkan Riwayat Pendidikan</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped w-100 table-hover datatable" id="table{{ ++$jml_table }}">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($p['data'] as $k => $v)
                                    <tr>
                                        <td></td>
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

    <hr>
    <h5 class="page-title">List Fitur Aplikasi</h5>

    <div class="row">
        <div class="col-lg-6">
            <div class="card  m-lg-0">
                <div class="card-body">
                    <h6 class="card-title">Aplikasi Sistem Informasi Anggota (Khusus Anggota)</h6>
                    <hr>
                    <h6 class="mb-0 mt-4">Profile</h6>
                    <ul class="list-style5">
                        <li>Management mendokumentasikan data anggota dan untuk mempermudah komunikasi pengurus
                            terhadap anggota yang masih
                            menjabat maupun alumni. [selesai] <a href="{{ route('member.profile') }}">Kunjungi</a>
                        </li>
                    </ul>

                    <h6 class="mb-0 mt-4">Dokumen</h6>
                    <ul class="list-style5">
                        <li>Arsip dokumen-dokumen penting dari semua acara/event yang pernah dilaksanakan</li>
                    </ul>

                    <h6 class="mb-0 mt-4">Lapor</h6>
                    <ul class="list-style5">
                        <li>Menu untuk melaporkan bug/crash/error untuk evaluasi perbaikan aplikasi kedepannya.
                        </li>
                    </ul>

                    <h6 class="mb-0 mt-4">Aspirasi</h6>
                    <ul class="list-style5">
                        <li>Menu untuk memberikan masukan atau usulan terkait aplikasi. seperti fitur apa yang ingin
                            ditambahkan.</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card m-lg-0">
                <div class="card-body">
                    <h6 class="card-title">Publik | Umum (Halaman yang bisa di akses semua orang)</h6>
                    <hr>
                    <h6 class="mb-0 mt-4">Home</h6>
                    <ul class="list-style5">
                        <li>Ringkasan Periode Kepengurusan Saat Ini. [selesai] <a href="{{ url('') }}">Kunjungi</a>
                        </li>
                        <li>Daftar Artikel. [selesai] <a href="{{ url('') }}">Kunjungi</a></li>
                    </ul>

                    <h6 class="mb-0 mt-4">Tentang Kami</h6>
                    <ul class="list-style5">
                        <li>Sejarah</li>
                        <li>Struktur Kepengurusan (Detail Kepengurusan Saat Ini). [selesai] <a
                                href="{{ route('tentang.kepengurusan.struktur') }}">Kunjungi</a></li>
                        <li>Periode Kepengurusan (List Semua Periode Kepengurusan Karmapack)</li>
                        <li>Anggaran Dasar Anggaran Rumah Tangga</li>
                    </ul>

                    <h6 class="mb-0 mt-4">Bidang</h6>
                    <ul class="list-style5">
                        <li>Semua Profile Bidang. [selesai]</li>
                    </ul>


                    <h6 class="mb-0 mt-4">Anggota</h6>
                    <ul class="list-style5">
                        <li>List Semua Anggota Karmapack. [selesai] <a href="{{ route('anggota') }}">Kunjungi</a>
                        </li>
                    </ul>

                    <h6 class="mb-0 mt-4">Galeri</h6>
                    <ul class="list-style5">
                        <li>List Galeri Kegiatan. [selesai] <a href="{{ route('galeri') }}">Kunjungi</a></li>
                    </ul>

                    <h6 class="mb-0 mt-4">Pendaftaran (List Semua Pendaftaran)</h6>
                    <ul class="list-style5">
                        <li>Sensus Anggota. [selesai] <a href="{{ route('pendaftaran.sensus') }}">Kunjungi</a>
                        </li>
                        <li>Poesaka</li>
                        <li>Dan acara lain lain</li>
                    </ul>



                    <h6 class="mb-0 mt-4">kontak</h6>
                    <ul class="list-style5">
                        <li>Halaman Untuk menghubungi admin karmapack lewat website</li>
                    </ul>
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
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/2.1.1/jquery.dataTables.min.js" integrity="sha512-CKwcR6t3iAghHw93W7LcmVlSRCoGXiYyjITGKrFyDFqWHt6LIJ3j5f1dSjvL+OJbvG0KvPgP/zBEOikHUIu+3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(() => {
            const umumkan = "{{ $setting->umumkan ? 'true' : 'false' }}" === "true";
            var msnry = new Masonry(document.querySelector('.grid'), {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer'
            });
            if (umumkan) {
                renderTable('#tbl_seleksi', 3);
            }

            @for ($i = 1; $i <= $jml_table; $i++)
                renderTable('#table{{ $i }}', 2, 'desc');
            @endfor
        })

        function renderTable(element_table, order = 1, orderdir = 'asc') {
            var table_html = $(element_table);
            var tableUser = table_html.DataTable({
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }],
                scrollX: true,
                aAutoWidth: true,
                bAutoWidth: true,
                order: [
                    [order, orderdir]
                ],
                language: {
                    url: datatable_indonesia_language_url
                }
            });

            tableUser.on('draw.dt', function() {
                var PageInfo = table_html.DataTable().page.info();
                tableUser.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });
        }
    </script>
@endsection
