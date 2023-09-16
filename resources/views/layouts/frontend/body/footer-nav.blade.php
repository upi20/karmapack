@php
    $login = request()->routeIs('login');
    $artikel = request()->routeIs('artikel') || request()->routeIs('artikel.detail');
    $anggota = request()->routeIs('anggota') || request()->routeIs('anggota.username') || request()->routeIs('anggota.id');
@endphp
<nav class="navbar-bottom d-xl-none">
    <ul class="d-flex justify-content-sm-around justify-content-between align-items-center text-center p-0 m-0">
        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" title="Halaman Utama">
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
            <a href="{{ route('anggota') }}" title="Daftar Anggota">
                <i class="fas fa-users"></i>
            </a>
        </li>
        <li class="{{ $artikel ? 'active' : '' }}">
            <a href="{{ route('artikel') }}" title="Daftar Artikel">
                <i class="far fa-newspaper"></i>
            </a>
        </li>
        <li class="{{ $login ? 'active' : '' }}">
            <a href="{{ route('login') }}" title="Login">
                <i class="far fa-user"></i>
            </a>
        </li>
    </ul>
</nav>

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
