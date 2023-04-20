@extends('layouts.frontend.master')
@section('content')
    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('pendaftaran') }}">Pendaftaran</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Sensus Anggota</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">Sensus Data Anggota</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">
                                Untuk pemutakhiran databse anggota silahkan masukan data diri di bawah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg pt-0">
        <div data-anim-wrap class="container">
            <form class="contact-form row y-gap-30" action="#" id="MainForm">
                <div class="col-md-6">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                        Nama Lengkap
                    </label>
                    <input type="text" name="nama" placeholder="Nama Lengkap*" required>
                </div>
                <div class="col-md-6">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                        Angkatan
                    </label>
                    <input type="number" name="angkatan" placeholder="Angkatan*" required>
                </div>
                <div class="col-md-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Email*" required>
                    <small>
                        Alamat email ini digunakan untuk masuk kedalam aplikasi Sistem Informasi Anggota (SIA)
                    </small>
                </div>
                <div class="col-md-6">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                        Nomor Telepon
                    </label>
                    <input type="text" name="telepon" placeholder="Nomor Telepon">
                </div>
                <div class="col-md-6">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">
                        Nomor Whatsapp
                    </label>
                    <input type="text" name="whatsapp" placeholder="Nomor Whatsapp*" required>
                </div>
                <p class="mb-0 pb-0">Keterangan:</p>
                <small class="d-block pt-0">
                    <span class="text-danger">*</span>
                    (Terdapat tanda bintang) Wajib di isi.
                </small>


                <div id="sensus_alert" style="display: none">
                    <div class="container bg-dark-1 d-flex justify-content-between text-white p-3"
                        style="border-radius: 18px">
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
                        <span class="fw-bold" style="cursor: pointer; font-size: 2em"
                            onclick="$(this).parent().parent().fadeOut()">
                            x</span>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                        Kirim Data
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    <script>
        $(document).ready(function() {
            $('#MainForm').submit(function(e) {
                const form = this;
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]',
                    `Sending...`);
                $.ajax({
                    type: "POST",
                    url: "{{ route('pendaftaran.sensus.insert') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data send successfully',
                            showConfirmButton: true,
                            timer: 4500
                        })
                        $(form).trigger("reset");
                        $('#sensus_alert').fadeIn();
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit]',
                            `Kirim Data`,
                            false);
                    }
                });
            });
        });

        function setBtnLoading(element, text, status = true) {
            const el = $(element);
            if (status) {
                el.attr("disabled", "");
                el.html(
                    `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true">
                                </span> <span>${text}</span>`
                );
            } else {
                el.removeAttr("disabled");
                el.html(text);
            }
        }
    </script>
@endsection
