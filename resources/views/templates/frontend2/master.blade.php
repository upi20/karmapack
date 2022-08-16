<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'url' => isset($page_attr['url']) ? $page_attr['url'] : url(''),
    'type' => isset($page_attr['type']) ? $page_attr['type'] : 'website',
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : true,
    'description' => isset($page_attr['description']) ? $page_attr['description'] : 'Karmapack - Keluarga Mahasiswa dan Pelajar Cianjur Kidul',
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : 'karmapack,orda,cianjur kidul',
    'author' => isset($page_attr['author']) ? $page_attr['author'] : 'Isep Lutpi Nur',
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset('assets/templates/admin/images/brand/logo-1.png'),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
    'periode_id' => isset($page_attr['periode_id']) ? $page_attr['periode_id'] : false,
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . (env('APP_NAME') ?? '');
$search_master_key = isset($_GET['search']) ? $_GET['search'] : '';
$master_helper = new \App\Helpers\Frontend\Template\Master($page_attr->periode_id);
$getSosmed_val = $master_helper->getSosmed();
$menuBidang_val = $master_helper->menuBidang();
$footerInstagram_val = $master_helper->footerInstagram();
$notifikasi = notif_depan_atas();

$compact = array_merge($compact, compact('page_attr_title', 'search_master_key', 'master_helper', 'getSosmed_val', 'menuBidang_val', 'footerInstagram_val', 'notifikasi', 'page_attr'));
?>

<!DOCTYPE html>
<html lang="en-US">

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
    <meta property="og:url" content="{{ $page_attr->url }}">
    <meta property="og:type" content="{{ $page_attr->type }}">
    <meta property="og:title" content="{{ $page_attr_title }}">
    <meta property="og:description" content="{{ $page_attr->description }}">
    <meta property="og:image" content="{{ $page_attr->image }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page_attr->url }}">
    <meta name="twitter:title" content="{{ $page_attr_title }}">
    <meta name="twitter:description" content="{{ $page_attr->description }}">
    <meta name="twitter:image" content="{{ $page_attr->image }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $page_attr_title }}">
    <meta itemprop="description" content="{{ $page_attr->description }}">
    <meta itemprop="image" content="{{ $page_attr->image }}">


    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('assets/templates/frontend2/assets/font-awesome/5.15.4/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend2/assets/leaflet1.7.1/dist/leaflet.css') }}" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend2/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend2/css/main.css') }}">

    <style>
        #preloader {
            background: #FFF;
            height: 100%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1031;
        }
    </style>
    @yield('stylesheet')
</head>

<body>

    <!-- preloader -->
    @if ($page_attr->loader)
        <div id="preloader">
            <div class="d-flex justify-content-center align-items-center flex-column" style="height: 90vh;">
                <img src="{{ asset('assets/templates/frontend/images/logo/300x300.png') }}" style="max-width: 80px;"
                    alt="logo" />
            </div>
        </div>
    @endif

    <!-- barba container start -->
    <div class="barba-container" data-barba="container">


        <main class="main-content ">

            @include('templates.frontend2.body.header', $compact)


            <div class="content-wrapper  js-content-wrapper">
                @yield('content', '')
                @include('templates.frontend2.body.footer', $compact)
            </div>
        </main>
    </div>
    <!-- barba container end -->


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/templates/frontend2/assets/leaflet1.7.1/dist/leaflet.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend2/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend2/js/main.js') }}"></script>
    <script>
        $(window).on('load', function() {
            "use strict";
            $("#preloader").delay(750).fadeOut('slow');
        });
    </script>
    @yield('javascript')
</body>

</html>
