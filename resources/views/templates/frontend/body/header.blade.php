<!-- header -->
<header class="header-personal">
    <div class="container-xl header-top">
        <div class="row align-items-center">

            <div class="col-4 d-none d-md-block d-lg-block">
                <!-- social icons -->
                <ul class="social-icons list-unstyled list-inline mb-0">
                    @foreach ($list_sosmed as $sosmed)
                        <li class="list-inline-item">
                            <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                <i class="{{ $sosmed['icon'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                <!-- site logo -->
                <a class="navbar-brand" href="{{ url('') }}"><img
                        src="{{ asset('assets/templates/frontend/images/logo/300x300.png') }}"
                        style="max-width: 80px;" alt="logo" /></a>
                <a href="./" class="d-block text-logo">KARMAPACK</a>
                <span class="slogan d-block">Keluarga Mahasiswa dan Pelajar Cianjur Kidul</span>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <!-- header buttons -->
                <div class="header-buttons float-md-end mt-4 mt-md-0">
                    <button class="search icon-button">
                        <i class="icon-magnifier"></i>
                    </button>
                    <button class="burger-menu icon-button ms-2 float-end float-md-none">
                        <span class="burger-icon"></span>
                    </button>
                </div>
            </div>

        </div>
    </div>

    @include('templates.frontend.body.topbar', [
        'page_attr_navigation' => $page_attr_navigation,
        'menu_bidang' => $menu_bidang,
    ])
</header>
