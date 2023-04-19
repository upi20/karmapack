<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="icon-container">
            <img style="height: 45px" src="{{ asset(setting_get(set_admin('app.foto_dark_mode'))) }}" class="logo-icon"
                alt="logo icon">
        </div>
        <div>
            <img style="height: 45px" src="{{ asset(setting_get(set_admin('app.foto_dark_landscape_mode'))) }}"
                class="logo-landscape" alt="logo icon">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    {!! sidebar_menu_admin($page_attr->navigation) !!}
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
