@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Sensus Anggota</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pendaftaran') }}">Pendaftaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sensus</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="spacer" data-height="50"></div>
            <!-- section header -->
            <div class="section-header">
                <h3 class="section-title">Masukan data diri</h3>
                <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave" alt="wave" />
            </div>

            <!-- Contact Form -->
            <form id="MainForm" class="MainForm" method="post">

                <div class="messages"></div>

                <div class="row">
                    <div class="column col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap*"
                                required="required">
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <div class="form-group">
                            <input type="number" min="2000" max="{{ date('Y') }}" class="form-control" id="angkatan"
                                name="angkatan" placeholder="Angkatan (Tahun masuk)*" required="required">
                        </div>
                    </div>

                    <div class="column col-md-12">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email*"
                                required="required">
                            <small>
                                Alamat email ini digunakan untuk masuk kedalam aplikasi Sistem Informasi Anggota (SIA)
                            </small>
                        </div>
                    </div>

                    <div class="column col-md-6 ">
                        <div class="form-group">
                            <input type="text" class="form-control" name="telepon" id="telepon"
                                placeholder="Nomor Telepon">
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <div class="form-group ">
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                placeholder="Nomor Whatsapp*" required="required">
                        </div>
                    </div>
                </div>
                <p class="mb-0">Keterangan:</p>
                <small class="d-block">
                    <span class="text-danger">*</span>
                    (Terdapat tanda bintang) Wajib di isi.
                </small>

                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default mt-3">
                    Kirim Data
                </button>

                <div id="sensus_alert">
                    <div class="alert alert-success alert-dismissible fade show rounded mt-3" role="alert">
                        <div class="container d-flex justify-content-between align-items-center">
                            <p>
                                <strong>
                                    Suksess.
                                </strong>
                                Data sensus berhasil dikirim, silahkan tunggu konfirmasi dari administrator untuk tahap
                                selajutnya.
                                <br>Administrator akan memberikan informasi akun untuk login <strong>Sistem Informasi
                                    Anggota (SIA)</strong> yang akan di kirimkan ke <strong>Nomor Telepon</strong> atau
                                <strong>Nomor Whatsapp</strong> yang
                                sebelumnya sudah di kirim. <br>Terima Kasih
                            </p>
                            <button type="button" class="btn text-dark" data-bs-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                    <path fill-rule="evenodd"
                                        d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ url('loader/js/admin.js') }}"></script>
    <script src="{{ url('loader/js/frontend/pendaftaran/sensus.js') }}"></script>
@endsection
