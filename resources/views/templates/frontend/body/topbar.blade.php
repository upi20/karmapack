<nav class="navbar navbar-expand-lg">
    <div class="container-xl">
        <div class="collapse navbar-collapse justify-content-center centered-nav">
            <!-- menus -->
            {!! (new \App\Helpers\Frontend\Template\TopbarMenu(app('config')->get('menu_list')['frontend'], $page_attr_navigation, $menu_bidang))->generate() !!}
        </div>
    </div>
</nav>
