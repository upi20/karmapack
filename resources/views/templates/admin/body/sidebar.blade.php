<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ url('/') }}">
                {{-- light landscape --}}
                <img src="{{ asset(settings()->get(set_admin('app.foto_light_landscape_mode'))) }}"
                    class="header-brand-img desktop-logo" alt="logo">

                {{-- light --}}
                <img src="{{ asset(settings()->get(set_admin('app.foto_light_mode'))) }}"
                    class="header-brand-img toggle-logo" alt="logo">

                {{-- dark --}}
                <img src="{{ asset(settings()->get(set_admin('app.foto_dark_mode'))) }}"
                    class="header-brand-img light-logo" alt="logo">

                {{-- dark landscape --}}
                <img src="{{ asset(settings()->get(set_admin('app.foto_dark_landscape_mode'))) }}"
                    class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            {!! sidebar_menu_admin($page_attr->navigation) !!}
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
