<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : setting_get(set_admin('meta.description')),
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : setting_get(set_admin('meta.keyword')),
    'author' => isset($page_attr['author']) ? $page_attr['author'] : setting_get(set_admin('meta.author')),
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset(setting_get(set_admin('meta.image'))),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : setting_get(set_admin('app.preloader')),
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
    'url' => isset($page_attr['url']) ? $page_attr['url'] : url(''),
    'type' => isset($page_attr['type']) ? $page_attr['type'] : 'website',
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . setting_get(set_admin('app.title'), env('APP_NAME'));
$notifikasi = beTopNotification();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="theme-color" content="#0191D7">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/icon-144x144.png') }}">

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <!-- Primary Meta Tags -->
    <title>{{ $page_attr_title }}</title>
    <meta name="description" content="{{ $page_attr->description }}">
    <meta name="author" content="{{ $page_attr->author }}">
    <meta name="keywords" content="{{ $page_attr->keywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page_attr_title }}">
    <meta property="og:description" content="{{ $page_attr->description }}">
    <meta property="og:image" content="{{ $page_attr->image }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('') }}">
    <meta name="twitter:title" content="{{ $page_attr_title }}">
    <meta name="twitter:description" content="{{ $page_attr->description }}">
    <meta name="twitter:image" content="{{ $page_attr->image }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $page_attr_title }}">
    <meta itemprop="description" content="{{ $page_attr->description }}">
    <meta itemprop="image" content="{{ $page_attr->image }}">

    <!--plugins-->
    <link href="{{ asset_admin('plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset_admin('plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    @if ($page_attr->loader)
        <!-- loader-->
        <link href="{{ asset_admin('css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset_admin('js/pace.min.js') }}"></script>
    @endif

    <!-- Bootstrap CSS -->
    <link href="{{ asset_admin('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset_admin('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset_admin('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset_admin('css/icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset_admin('css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset_admin('css/header-colors.css') }}" />
    <link rel="stylesheet"
        href="{{ asset_admin('plugins/fontawesome-free-5.15.4-web/css/all.min.css', name: 'sash') }}">

    <!-- CSS PLUGINS -->
    @yield('stylesheet')

    <!-- Dark mode-->
    <script>
        const templateHasDarkMode = localStorage.getItem('dark-mode') == 'true';
        const templateTheme = localStorage.getItem('theme');
        if (localStorage.getItem('dark-mode') !== null) {
            if (templateHasDarkMode) {
                document.querySelector('html').setAttribute('class', 'dark-theme');
            } else {
                document.querySelector('html').classList.remove("dark-theme");
                if (templateTheme) {
                    document.querySelector('html').classList.add(templateTheme);
                }
            }
        }
    </script>

    @foreach (json_decode(setting_get(set_admin('meta_list'), '{}')) as $meta)
        <!-- custom {{ $meta->name }} -->
        {!! $meta->value !!}
    @endforeach
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <input type="text" id="clipboard" style="position: fixed; top:-50px">
    <div class="wrapper">
        @include('layouts.admin.body.sidebar', [
            'page_attr' => $page_attr,
            'page_attr_navigation' => $page_attr->navigation,
        ])

        @include('layouts.admin.body.header')

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @if ($notifikasi->count() > 0)
                    @foreach ($notifikasi as $v)
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-inner--text">
                                {{ $v->deskripsi }}
                                @if ($v->link)
                                    <a href="{{ $v->link }}" class="fw-bold">{{ $v->link_nama }}</a>
                                @endif
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                @if ($page_attr->breadcrumbs)
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">{{ $page_attr->title }}</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    @foreach ($page_attr->breadcrumbs as $breadcrumb)
                                        <li class="breadcrumb-item">
                                            @if (isset($breadcrumb['url']))
                                                @php
                                                    $url = is_array($breadcrumb['url']) ? route($breadcrumb['url'][0], $breadcrumb['url'][1]) : route($breadcrumb['url']);
                                                @endphp
                                                <a href="{{ $url }}"
                                                    title="Page To {{ $breadcrumb['name'] }}">
                                                    {{ $breadcrumb['name'] }}
                                                </a>
                                            @else
                                                <span>
                                                    {{ $breadcrumb['name'] }}
                                                </span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
                @endif

                @yield('content')

            </div>
        </div>
        <!--end page wrapper -->
        @include('layouts.admin.body.footer')
    </div>
    <!--end wrapper-->

    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" theme="light-theme" type="radio" name="flexRadioDefault"
                        id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" theme="dark-theme" type="radio" name="flexRadioDefault"
                        id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" theme="semi-dark" type="radio" name="flexRadioDefault"
                        id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" theme="minimal-theme" type="radio" id="minimaltheme"
                    name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator bg-white border headercolorbtn" data-number="0"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor1 headercolorbtn" data-number="1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2 headercolorbtn" data-number="2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3 headercolorbtn" data-number="3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4 headercolorbtn" data-number="4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5 headercolorbtn" data-number="5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6 headercolorbtn" data-number="6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7 headercolorbtn" data-number="7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8 headercolorbtn" data-number="8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator bg-white border sidebarcolorbtn" data-number="0"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor1 sidebarcolorbtn" data-number="1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2 sidebarcolorbtn" data-number="2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3 sidebarcolorbtn" data-number="3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4 sidebarcolorbtn" data-number="4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5 sidebarcolorbtn" data-number="5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6 sidebarcolorbtn" data-number="6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7 sidebarcolorbtn" data-number="7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8 sidebarcolorbtn" data-number="8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->

    <!-- Bootstrap JS -->
    <script src="{{ asset_admin('js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset_admin('js/jquery.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ resource_loader('app.js') }}"></script>
    <script src="{{ resource_loader('pages/admin/admin.js') }}"></script>
    @yield('javascript')
</body>

</html>
