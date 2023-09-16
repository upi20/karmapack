@php
    $home = request()->routeIs('home');
    $login = request()->routeIs('login');
    $artikel = request()->routeIs('artikel') || request()->routeIs('artikel.detail');
    $galeri = request()->routeIs('galeri') || request()->routeIs('galeri.detail');
    $anggota = request()->routeIs('anggota') || request()->routeIs('anggota.username') || request()->routeIs('anggota.id');
@endphp
<nav class="navbar-bottom d-xl-none">
    <ul class="d-flex justify-content-sm-around justify-content-between align-items-center text-center p-0 m-0">
        <li class="{{ $home ? 'active' : '' }}">
            <a href="{{ $home ? 'javascript:void(0)' : route('home') }}" title="Halaman Utama">
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li>
            <a href="{{ $login ? route('anggota') : 'javascript:void(0)' }}" title="Pencarian"
                data-el-toggle=".js-search-toggle">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="{{ $anggota ? 'active' : '' }}">
            <a href="{{ $anggota ? 'javascript:void(0)' : route('anggota') }}" title="Daftar Anggota">
                <i class="fas fa-users"></i>
            </a>
        </li>
        <li class="{{ $artikel ? 'active' : '' }}">
            <a href="{{ $artikel ? 'javascript:void(0)' : route('artikel') }}" title="Daftar Artikel">
                <i class="far fa-newspaper"></i>
            </a>
        </li>
        {{-- <li class="{{ $galeri ? 'active' : '' }} d-md-block d-none">
            <a href="{{ $galeri ? 'javascript:void(0)' : route('galeri') }}" title="Daftar Galeri">
                <i class="far fa-images"></i>
            </a>
        </li> --}}
        <li class="{{ $login ? 'active' : '' }}">
            <a href="{{ $login ? 'javascript:void(0)' : route('login') }}" title="Login">
                <i class="fas fa-user"></i>
            </a>
        </li>
    </ul>
</nav>

<script>
    window.addEventListener('load', function() {
        $('.navbar-bottom').find('li').each((i, e) => {
            const href = $(e).find('a').attr('href');
            if (href == 'javascript:void(0)') return;
            $(e).attr('style', 'cursor: pointer');
            $(e).click(() => {
                window.location.href = href;
            });
        })
    })
</script>

<style>
    #footer-text a {
        color: #0d6efd;
    }

    .navbar-bottom {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #F5F7FE;
        box-shadow: 0 -10px 20px -5px rgba(115, 115, 115, 0.17);
        z-index: 99;
    }

    .navbar-bottom ul {
        list-style-type: none;
    }

    .navbar-bottom ul li a i {
        margin: 1.1em 1.1em 0.8em 1.1em;
    }

    .navbar-bottom ul li a {
        height: 100%;
        width: 100%;
    }

    .navbar-bottom ul li.active,
    .navbar-bottom ul li:hover {
        background-color: #140342;
    }

    .navbar-bottom ul li>a>i {
        color: #140342;
    }

    .navbar-bottom ul li:hover>a>i {
        color: white;
    }

    .navbar-bottom ul li.active>a>i,
    .navbar-bottom ul li a:hover {
        color: white !important;
    }

    .navbar-bottom i {
        font-size: 22px;
    }

    .navbar-bottom li {
        /* width: 100% */
    }
</style>
