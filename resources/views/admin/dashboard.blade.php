@extends('templates.admin.master')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
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
                        <div class="ms-auto"> <i class="fa fa-user-o text-white fs-30 me-2 mt-2"></i> </div>
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
                                <h3 class="mb-0 number-font">Edit Profile</h3>
                            </div>
                            <div class="ms-auto"> <i class="fe fe-user text-white fs-30 me-2 mt-2"></i> </div>
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
                            <div class="ms-auto"> <i class="fe fe-lock text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <hr>

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
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                        class="fe fe-chevron-up"></i></a>
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
                                        href="{{ route('about.kepengurusan.struktur') }}">Kunjungi</a></li>
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
