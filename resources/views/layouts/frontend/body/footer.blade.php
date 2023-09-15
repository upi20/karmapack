<nav class="navbar-bottom d-xl-none">
    <ul class="d-flex justify-content-sm-around justify-content-between align-items-center text-center p-0 m-0">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link" title="Halaman Utama">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" class="nav-link" title="Pencarian" data-el-toggle=".js-search-toggle">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="{{ request()->routeIs('anggota') ? 'active' : '' }}">
            <a href="{{ route('anggota') }}" class="nav-link" title="Daftar Anggota">
                <i class="fas fa-users"></i>
            </a>
        </li>
        <li class="{{ request()->routeIs('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel') }}" class="nav-link" title="Daftar Artikel">
                <i class="far fa-newspaper"></i>
            </a>
        </li>
        <li class="{{ request()->routeIs('login') ? 'active' : '' }}">
            <a href="{{ route('login') }}" class="nav-link" title="Login">
                <i class="far fa-user"></i>
            </a>
        </li>
    </ul>
</nav>

@php
    $anim = 1;
@endphp
<footer class="footer -type-1 bg-dark-1 -green-links mt-0" data-anim-wrap>
    <div class="container">
        <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="footer-header__logo" data-anim-child="slide-left delay-{{ $anim++ }}">
                        <img class="lazy" alt="logo" style="width: 230px"
                            data-src="{{ asset(settings()->get(set_front('app.foto_light_landscape_mode'))) }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-white"
                            data-anim-child="slide-left delay-{{ $anim++ }}">Follow us on social media</div>
                        <div class="footer-header-socials__list">

                            @foreach ($getSosmed_val as $sosmed)
                                <li class="list-inline-item list-style-none"
                                    data-anim-child="slide-left delay-{{ $anim++ }}"
                                    value="{{ $sosmed['nama'] }}" title="{{ $sosmed['nama'] }}">
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

        <div class="py-30 border-top-light-15" data-anim-child="slide-left delay-{{ $anim++ }}">
            <div class="d-flex flex-column" id="footer-text">
                {!! str_parse(settings()->get(set_front('app.copyright'))) !!}
            </div>
        </div>
    </div>
</footer>
