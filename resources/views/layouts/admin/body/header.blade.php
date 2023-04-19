<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dark-mode d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:void(0);"><i class='bx bx-moon'></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->fotoUrl() }}" class="user-img" alt="{{ auth()->user()->name }}">

                    <div class="user-info">
                        <p class="user-name mb-0"> {{ ucfirst(auth()->user()->name) }}</p>
                        <p class="designattion mb-0">
                            {{ ucfirst(
                                implode(
                                    ', ',
                                    auth()->user()->roles->map(function ($v) {
                                            return $v->name;
                                        })->toArray(),
                                ),
                            ) }}
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('member.profile') }}">
                            <i class="bx bx-user fs-5"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.password') }}">
                            <i class="bx bx-key fs-5"></i><span>Ganti Password</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('login.logout') }}">
                            <i class="bx bx-log-out-circle"></i><span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
