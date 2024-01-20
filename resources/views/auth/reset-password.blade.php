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
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . setting_get(set_admin('app.title'), env('APP_NAME'));
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.1.0/simplebar.min.css" integrity="sha512-dIhy/DDDYfWvU/sLgcz/+ZunLzmYXbdDZoGhBfeHx+lUr5dL/ixGDaxZDGUNn/B+O8a33/klJ2Nj1aYX/pNMTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.css" integrity="sha512-5EboFlZ4o5HKH5QVJUVf2omItNG8U5dLh23IVvCfs/QAEsNjoUYay+EsL+XlD14RpqD6300DKWuaIBjb3nHzDQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @if ($page_attr->loader)
        <!-- loader-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js" integrity="sha512-2cbsQGdowNDPcKuoBd2bCcsJky87Mv0LEtD/nunJUgk6MOYTgVMGihS/xCEghNf04DPhNiJ4DZw5BxDd1uyOdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace-theme-default.min.css" integrity="sha512-Ai6m3x6GYjuLAcJXEGBxHPLNOj6eIxh+/21wGpXT9B2dmcdvaFqEZr+/H/aaup+Rrkw4t3FzifGIuYhVPuBsrg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" integrity="sha512-72OVeAaPeV8n3BdZj7hOkaPSEk/uwpDkaGyP4W2jSzAC8tfiO4LMEDWoL3uFp5mcZu+8Eehb4GhZWFwvrss69Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/templates/admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/templates/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/templates/admin/css/icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/header-colors.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @foreach (json_decode(setting_get(set_admin('meta_list'), '{}')) as $meta)
        <!-- custom {{ $meta->name }} -->
        {!! $meta->value !!}
    @endforeach
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-3">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset(setting_get(set_admin('app.foto_dark_landscape_mode'))) }}"
                                            style="max-height: 65px;" alt="Logo" />
                                    </div>
                                    <h6 class="mt-5 font-weight-bold">Ganti Password</h6>

                                    @if (session('status'))
                                        <p class="text-success">
                                            {{ session('status') }}
                                        </p>
                                    @endif

                                    @if ($errors->any())
                                        <div class="mt-1">
                                            <div class="fw-bold text-danger">{{ __('Whoops! Something went wrong.') }}
                                            </div>
                                            <ul class="text-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form id="Loginform" name="Loginform" method="POST"
                                        action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="form-group d-none">
                                            <input type="email" placeholder="Email" name="email"id="email"
                                                value="{{ old('email', $request->email) }}">
                                        </div>
                                        <div class="mb-4 mt-1">
                                            <input type="password" placeholder="Password"
                                                name="password"id="password" class="form-control">
                                        </div>
                                        <div class="mb-4 mt-1">
                                            <input type="password" placeholder="Konfirmasi Password"
                                                name="password_confirmation"id="password_confirmation"
                                                class="form-control">
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                                            <a href="{{ route('login') }}" class="btn btn-light">
                                                <i class='bx bx-arrow-back me-1'></i>Kembali Ke login</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js" integrity="sha512-Sct/LCTfkoqr7upmX9VZKEzXuRk5YulFoDTunGapYJdlCwA+Rl4RhgcPCLf7awTNLmIVrszTPNUFu4MSesep5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
