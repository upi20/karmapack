{{-- <!-- app-Header -->
<div class="header sticky hor-header">
    <div class="main-container container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{ url('/') }}">
                <img src="{{ asset('assets/templates/admin/images/brand/logo.png') }}"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/templates/admin/images/brand/logo-3.png') }}"
                    class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="main-header-center ms-3 d-none d-lg-block">
                <input class="form-control" placeholder="Search for results..." type="search">
                <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
            </div>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="dropdown d-none">
                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <div class="d-flex country">
                    <a class="nav-link icon theme-layout layout-setting" title="Dark Mode or Light Mode">
                        <span class="dark-layout"><i class="fe fe-moon"></i></span>
                        <span class="light-layout"><i class="fe fe-sun"></i></span>
                    </a>
                </div>
                <div class="dropdown d-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg" title="Full Screen">
                        <i class="fe fe-minimize fullscreen-button"></i>
                    </a>
                </div>
                <!-- SIDE-MENU -->
                <div class="dropdown d-flex profile-1">
                    <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                        <img onerror="this.src='{{ asset('assets/templates/admin/images/profile.png') }}';this.onerror='';"
                            src="{{ asset('assets/pengurus/profile/' . '') }}" alt="profile-user"
                            class="avatar  profile-user brround cover-image" id="header_foto_profile">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                    {{ ucfirst('') }}
                                </h5>
                                <small class="text-muted">{{ ucfirst('') }}</small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="{{ route('member.profile') }}">
                            <i class="dropdown-icon fe fe-user"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('member.password') }}">
                            <i class="dropdown-icon fe fe-lock"></i> Ganti Password
                        </a>
                        <a class="dropdown-item" href="{{ route('login.logout') }}">
                            <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header --> --}}

<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{ url('/') }}">
                <img src="{{ asset('assets/templates/admin/images/brand/logo.png') }}"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/templates/admin/images/brand/logo-3.png') }}"
                    class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="main-header-center ms-3 d-none d-lg-block mt-1">
                    <input class="form-control" placeholder="Search for results..." type="search">
                    <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                </div>
                <div class="dropdown d-none">
                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown d-lg-none d-flex">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Layout -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout layout-setting" title="Dark Mode or Light Mode">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div>

                            <!-- Fullscreen -->
                            <div class="d-flex country">
                                <a class="nav-link icon full-screen-link nav-link-bg" title="Full Screen">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>

                            @if (auth()->user())
                                <div class="dropdown d-flex profile-1">
                                    <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                        class="nav-link leading-none d-flex">
                                        <img onerror="this.src='{{ asset('assets/templates/admin/images/profile.png') }}';this.onerror='';"
                                            src="{{ asset('assets/pengurus/profile/' . auth()->user()->foto) }}"
                                            alt="profile-user" class="avatar  profile-user brround cover-image"
                                            id="header_foto_profile">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="drop-heading">
                                            <div class="text-center">
                                                <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                                    {{ ucfirst(auth()->user()->name) }}
                                                </h5>
                                                <small
                                                    class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="dropdown-icon fe fe-home"></i> Dashboard
                                        </a>
                                        <a class="dropdown-item" href="{{ route('member.profile') }}">
                                            <i class="dropdown-icon fe fe-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('member.password') }}">
                                            <i class="dropdown-icon fe fe-lock"></i> Ganti Password
                                        </a>
                                        <a class="dropdown-item" href="{{ route('login.logout') }}">
                                            <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="dropdown d-flex profile-1">
                                    <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                        class="nav-link leading-none d-flex">
                                        <img onerror="this.src='{{ asset('assets/templates/admin/images/profile.png') }}';this.onerror='';"
                                            src="{{ asset('assets/templates/admin/images/profile.png') }}"
                                            alt="profile-user" class="avatar  profile-user brround cover-image"
                                            id="header_foto_profile">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            <i class="dropdown-icon fe fe-user"></i> Log In
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->
