<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : settings()->get(set_admin('meta.description')),
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : settings()->get(set_admin('meta.keyword')),
    'author' => isset($page_attr['author']) ? $page_attr['author'] : settings()->get(set_admin('meta.author')),
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset(settings()->get(set_admin('meta.image'))),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : settings()->get(set_admin('app.preloader')),
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . settings()->get(set_admin('app.title'), env('APP_NAME'));
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

    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.css') }}">
    @foreach (json_decode(settings()->get(set_admin('meta_list'), '{}')) as $meta)
        <!-- custom {{ $meta->name }} -->
        {!! $meta->value !!}
    @endforeach
</head>

<body class="app sidebar-mini ltr dark-mode">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        @if ($page_attr->loader)
            <!-- GLOBAL-LOADER -->
            <div id="global-loader" style="background-color: #1a1a3c">
                <img src="{{ asset(settings()->get(set_admin('app.foto_light_mode'))) }}" class="loader-img"
                    alt="Loader">
            </div>
            <!-- /GLOBAL-LOADER -->
        @endif

        <!-- PAGE -->
        <div class="page" style="position: absolute; width: 100%; height: 100vh;">
            <div class="">
                <div class="container-login100">
                    <div class="wrap-login100 p-6" style="border-radius: 24px; box-shadow: none">
                        <div class="text-center">
                            <img src="{{ asset(settings()->get(set_admin('app.foto_light_landscape_mode'))) }}"
                                class="header-brand-img" alt="Logo Karmapack" id="logo">
                        </div>
                        <p class="text-center mt-5">Sistem Informasi Anggota (SIA)</p>
                        <div class="panel panel-primary">
                            <div class="panel-body tabs-menu-body p-0">
                                <div class="tab-content">
                                    <form action="javascript:void(0)" id="Loginform" name="Loginform" method="POST"
                                        enctype="multipart/form-data" autocomplete="false">
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted"
                                                style="border-radius: 24px 0 0 24px;">
                                                <i class="zmdi zmdi-email text-muted ms-1" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0 bg-white"
                                                type="email" placeholder="Email" id="email" required=""
                                                name="email" style="border-radius: 0 24px 24px 0;">
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted"
                                                style="border-radius: 24px 0 0 24px;">
                                                <i class="zmdi zmdi-eye text-muted ms-1" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0 bg-white"
                                                type="password" placeholder="Password" id="password" required=""
                                                name="password" style="border-radius: 0 24px 24px 0;">
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button type="submit" class="login100-form-btn btn-primary"
                                                style="border: 0; border-radius: 24px">
                                                Masuk
                                            </button>
                                            <div class="text-center pt-4">
                                                <p class="mb-0">
                                                    <a href="{{ url('/') }}" class="text-primary ms-1"> Kembali
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
                <div class="col col-login mx-auto">
                    <div class="text-center d-md-flex  justify-content-center"> {!! str_parse(settings()->get(set_admin('app.copyright'))) !!}</div>
                </div>
            </div>
        </div>

        <div id="particles-js" style="height: 100vh"> </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/templates/admin/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/templates/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/templates/admin/js/show-password.min.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/templates/admin/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/templates/admin/js/custom.js') }}"></script>

    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script src="{{ asset('assets/templates/admin/plugins/particle/particles.js') }}"></script>

    <script>
        {{-- if (localStorage.getItem('lightMode') || localStorage.getItem('darkMode') == null) {
            $('#logo').attr('src', "{{ asset(settings()->get(set_admin('app.foto_light_landscape_mode'))) }}");
        } --}}

        // auto darkmode
        $(window).on("load", function(e) {
            if (!(document.querySelector('body').classList.contains('dark-mode'))) {
                $('body').addClass('dark-mode');
            }
        })
    </script>

    <script src="{{ url('loader/js/auth/login.js') }}"></script>

</body>

</html>
