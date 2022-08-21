<footer class="footer -type-1 bg-dark-1 -green-links mt-0">
    <div class="container">
        <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="footer-header__logo">
                        <img src="{{ asset(settings()->get(set_front('app.foto_light_landscape_mode'))) }}" alt="logo"
                            style="width: 230px">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-white">Follow us on social media</div>
                        <div class="footer-header-socials__list">

                            @foreach ($getSosmed_val as $sosmed)
                                <li class="list-inline-item list-style-none">
                                    <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                        <i class="{{ $sosmed['icon'] }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-columns">
            <div class="row y-gap-30">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">Tentang</div>
                    <div class="row justify-between y-gap-20">
                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="">Sejarah</a>
                                <a href="{{ route('about.kepengurusan.struktur') }}">Struktur Kepengurusan</a>
                                <a href="">Perode Kepengurusan</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="">AD/ART</a>
                                <a href="{{ route('kontak') }}">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">Dukungan</div>
                    <div class="row justify-between y-gap-20">
                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="">Buku Panduan</a>
                                <a href="{{ route('kontak.faq') }}">FAQS</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="{{ route('login') }}">Login Anggota</a>
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="text-17 fw-500 text-white uppercase mb-25">Lainnya</div>
                    <div class="row justify-between y-gap-20">
                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="{{ route('anggota') }}">List Anggota</a>
                                <a href="{{ route('galeri') }}">Galeri</a>
                                <a href="{{ route('pendaftaran') }}">Pendaftaran</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="{{ route('login') }}">Login</a>
                                <a href="">Blog Artikel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-30 border-top-light-15">
            <div class="d-md-flex items-center h-100 text-white">
                {!! str_parse(settings()->get(set_front('app.copyright'))) !!}
            </div>
        </div>
    </div>
</footer>
