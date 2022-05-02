<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : 'Karmapack - Keluarga Mahasiswa dan Pelajar Cianjur Kidul',
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : 'karmapack,orda,cianjur kidul',
    'author' => isset($page_attr['author']) ? $page_attr['author'] : 'Isep Lutpi Nur',
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset('assets/templates/admin/images/brand/logo-1.png'),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : true,
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . (env('APP_NAME') ?? '');
?>
<!doctype html>
<html lang="en" dir="ltr">

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
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
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

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/templates/admin/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/templates/admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/templates/admin/css/dark-style.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/templates/admin/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/templates/admin/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/templates/admin/colors/color1.css') }}" />

    <!-- CSS PLUGINS -->
    @yield('stylesheet')

    <style>
        .modal-content {
            border-radius: 16px;
        }

        .swal2-container {
            z-index: 9999999999 !important;
        }

    </style>
</head>

<body class="app sidebar-mini ltr light-mode">

    @if ($page_attr->loader)
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/templates/admin/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->
    @endif

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('templates.admin.body.header')

            @include('templates.admin.body.sidebar', [
                'page_attr_navigation' => $page_attr->navigation,
            ])

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @if ($page_attr->breadcrumbs)
                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">{{ $page_attr->title }}</h1>
                                <div>
                                    <ol class="breadcrumb">
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
                                                    <span class="text-dark">
                                                        {{ $breadcrumb['name'] }}
                                                    </span>
                                                @endif
                                            </li>
                                        @endforeach
                                        <li class="breadcrumb-item active" aria-current="{{ $page_attr->title }}">
                                            {{ $page_attr->title }}</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->
                        @endif
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

        <div class="position-fixed end-0 p-3" style="top: 85px">
            <div class="toast align-items-center" role="alert" id="toast" aria-live="assertive" aria-atomic="true"
                data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body" id="toast-body">
                        Hello, world! This is a toast message.
                    </div>

                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"
                        style="position: absolute;padding: 0.4rem;">x</button>
                </div>
                <div class="progress progress-xs mb-0">
                    <div class="progress-bar bg-blue" style="width: 0%;" id="toast-progresbar"></div>
                </div>
            </div>
        </div>

        @include('templates.admin.body.footer')

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/templates/admin/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/templates/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/templates/admin/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/templates/admin/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('assets/templates/admin/js/circle-progress.min.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/templates/admin/plugins/sidebar/sidebar.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('assets/templates/admin/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/templates/admin/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/templates/admin/js/custom.js') }}"></script>

    {{-- scroll --}}
    <script src="{{ asset('assets/templates/admin/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/p-scroll/pscroll-1.js') }}"></script>
    <script src="{{ url('loader/js/admin.js') }}"></script>
    @yield('javascript')
</body>

</html>
