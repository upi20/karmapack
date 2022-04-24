<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex flex-row  justify-content-between">
            <!-- sidebar-toggle-->
            <div>
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                    href="javascript:void(0)">
                </a>

            </div>
            <div>

                <a class="logo-horizontal " href="{{ url('/') }}">
                    <img src="{{ asset('assets/templates/admin/images/brand/logo.png') }}"
                        class="header-brand-img desktop-logo" alt="logo">
                    <img src="{{ asset('assets/templates/admin/images/brand/logo-3.png') }}"
                        class="header-brand-img light-logo1" alt="logo">
                </a>
            </div>

            <div class="d-flex order-lg-2 header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <!-- COUNTRY -->
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
                                            <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
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
        </div>
    </div>
</div>
<!-- /app-Header -->
