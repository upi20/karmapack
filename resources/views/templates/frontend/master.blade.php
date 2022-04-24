<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'loader' => isset($page_attr['loader']) ? $page_attr['loader'] : true,
    'description' => isset($page_attr['description']) ? $page_attr['description'] : 'Karmapack - Keluarga Mahasiswa dan Pelajar Cianjur Kidul',
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : 'karmapack,orda,cianjur kidul',
    'author' => isset($page_attr['author']) ? $page_attr['author'] : 'Isep Lutpi Nur',
    'image' => isset($page_attr['image']) ? $page_attr['image'] : asset('assets/templates/admin/images/brand/logo-1.png'),
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . (env('APP_NAME') ?? '');

// sosmed
function getSosmed()
{
    $get = \App\Models\SocialMedia::where('status', '=', 1)
        ->orderBy('order')
        ->get();
    return $get ? $get->toArray() : [];
}

// menu bidang
function menuBidang()
{
    function menu_bidang_get()
    {
        // get periode aktif
        $periode = \App\Models\Pengurus\Periode::where('status', '=', '1')
            ->select(['id'])
            ->first();
        if ($periode) {
            // get menu where sum menu count > 0
            $a = \App\Models\Pengurus\Jabatan::tableName;
            $where = " (
                ((select count(*) from $a as z where z.parent_id = $a.id) > 0) and
                (`status` = 1)
            )";

            $periode_jabatan = \App\Models\Pengurus\Jabatan::select(['id', 'nama', 'slug'])
                ->whereRaw($where)
                ->orderBy('no_urut')
                ->get();
            return $periode_jabatan->toArray();
        } else {
            return [];
        }
    }

    $menus_temp = [];
    foreach (menu_bidang_get() as $m) {
        $menus_temp[] = [
            'title' => $m['nama'],
            'route' => 'bidang/' . $m['slug'],
            'route_type' => 'url',
        ];
    }

    return [['name' => 'bidang', 'title' => 'Bidang', 'children' => $menus_temp]];
}

$getSosmed_val = getSosmed();
$menuBidang_val = menuBidang();
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

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/bootstrap.min.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/all.min.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/simple-line-icons.css') }}" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('assets/templates/frontend/css/style.css') }}" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-ellipsis div {
            position: absolute;
            top: 33px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #0092DF;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(24px, 0);
            }
        }

    </style>
</head>

<body>
    @if ($page_attr->loader)
        <!-- preloader -->
        <div id="preloader">
            <div class="d-flex justify-content-center align-items-center flex-column" style="height: 90vh;">
                <img src="{{ asset('assets/templates/frontend/images/logo/300x300.png') }}" style="max-width: 80px;"
                    alt="logo" />
                <div class="ms-2 lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    @endif

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <div class="container d-flex justify-content-between align-items-center">
                <strong>
                    Situs ini masih dalam masa pengembangan.
                </strong>

                <button type="button" class="btn text-dark" data-bs-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                        <path fill-rule="evenodd"
                            d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- header template --}}
        @include('templates.frontend.body.header', [
            'list_sosmed' => $getSosmed_val,
            'page_attr_navigation' => $page_attr->navigation,
            'menu_bidang' => $menuBidang_val,
        ])

        <section class="hero data-bg-image d-flex align-items-center py-5 my-0"
            data-bg-image="{{ asset('assets/templates/frontend/images/other/hero.jpg') }}" style="height: auto;">
            <div class="container-xl">
                <div class="cta text-center p-0 m-0" style="max-width: none;">
                    <h6 class="section-title h6 mb-3 w-100 text-light">Visi dan Misi Kabinet Masagi</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="section-title h6 mb-3 text-light">Visi</h4>
                            <p>"Terwujudnya KARMAPACK dan masyarakat Cianjur Kidul yang menjungjung tinggi nilai, dan
                                norma agama,
                                sosial
                                serta budaya lokal."</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="section-title h6 mb-3 text-light">Misi</h4>
                            <p>
                                1. Meningkatkan pemahaman dan pengalaman keagamaan bagi anggota KARMAPACK dan masyarakat
                                Cianjru Kidul
                                <br>
                                2. Melakukan pengabdian kepada masyarakat<br>
                                3. Menumbuhkan rasa cinta terhadap seni dan budaya kedaerahan
                            </p>
                        </div>
                    </div>
                    <br>
                    <p><strong>Semboyan KARMAPACK:</strong> Manusia
                        Yang memiliki pribadi yang kokoh ajeg atau seimbang dalam berifikir, merasa dan bertindak.</p>
                </div>
            </div>
        </section>

        <section class="hero-carousel py-5 bg-light">
            <div class="container-xl">
                <h4 class="section-title text-center mb-3">Kenali Kami Lebih Dekat</h4>
            </div>
            <div class="row post-carousel-featured post-carousel w-100 px-0 mx-0">
                <!-- start -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <!-- <h4 class="post-title my-1"><a href="blog-single.html">Andi Taufik Permadi</a></h4> -->
                        <!-- <h6 class="text-white fw-bold my-1">Ketua Bidang</h6> -->
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <!-- <a href="category.html" class="category-badge position-absolute">Kominfo</a> -->
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Andi Taufik Permadi.jpg') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>
                <!-- end -->


                <!-- start -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <!-- <h4 class="post-title my-1"><a href="blog-single.html">Ahmad Kamil</a></h4> -->
                        <!-- <h6 class="text-white fw-bold my-1">Ketua Bidang</h6> -->
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <!-- <a href="category.html" class="category-badge position-absolute">Kominfo</a> -->
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Ahmad Kamil.jpg') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>
                <!-- end -->


                <!-- start -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <!-- <h4 class="post-title my-1"><a href="blog-single.html">Lina Herlina</a></h4> -->
                        <!-- <h6 class="text-white fw-bold my-1">Ketua Bidang</h6> -->
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <!-- <a href="category.html" class="category-badge position-absolute">Kominfo</a> -->
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Lina Herlina.jpg') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>
                <!-- end -->



                <!-- start -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Hilal Muhaman F</a></h4>
                        <h6 class="text-white fw-bold my-1">Ketua Bidang</h6>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Hilal Muhaman F.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>
                <!-- end -->

                <!-- post -->

                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Abdul Muhlis</a></h4>
                        <h6 class="text-white fw-bold my-1">Sekertaris Bidang</h6>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Abdul Muhlis.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Isep Lutpi Nur</a></h4>
                        <h6 class="text-white fw-bold my-1">Staff Ahli</h6>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Indra Kurnia</a></h4>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Indra Kurnia.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Nita H.S</a></h4>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Nita H.S.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post featured-post-md">
                    <div class="details clearfix">
                        <h4 class="post-title my-1"><a href="blog-single.html">Sukriman M</a></h4>
                    </div>

                    <a href="blog-single.html">
                        <div class="thumb rounded">
                            <a href="category.html" class="category-badge position-absolute">Kominfo</a>
                            <div class="inner data-bg-image"
                                data-bg-image="{{ asset('assets/templates/frontend/images/member/Sukriman M.png') }}"
                                style="background-position: top;"></div>
                        </div>
                    </a>
                </div>


            </div>
        </section>

        <!-- section main content -->
        <div class="w-100 py-5 mb-5 mt-0">
            <section class="main-content mt-0">
                <div class="container-xl">
                    <h4 class="section-title text-center mb-3">Daftar artikel terbaru</h4>
                    <div class="row gy-4">

                        <div class="col-lg-8">

                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered bg-white shadow-sm">
                                        <div class="thumb top-rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Lifestyle</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('assets/templates/frontend/images/insta/insta-1.jpg') }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                                            class="author"
                                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                            alt="author" />Isep
                                                        Lutpi Nur</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">hari Ayah
                                                    Nasional</a></h5>
                                            <p class="excerpt mb-0">Tangan yang selalu sigap menggenggam, bahu yang
                                                siap sedia menopang, dan
                                                mata yang selalu menyorotkan kasih sayang, "Ayah".
                                                Terimakasih selalu menjadi tameng bagi putra putri-Mu.

                                                Selamat Hari Ayah Nasional</p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered bg-white shadow-sm">
                                        <div class="thumb top-rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Inspiration</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('assets/templates/frontend/images/insta/insta-2.jpg') }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                                            class="author"
                                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                            alt="author" />Isep
                                                        Lutpi Nur</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">HARI GERAKAN
                                                    NASIONAL MEMBACA</a></h5>
                                            <p class="excerpt mb-0">Makin aku banyak membaca, makin aku banyak
                                                berfikir, makin banyak aku
                                                belajar, makin aku sadar bahwa aku tak mengetahui apapun.
                                                -Voltaire-

                                                Selamat Hari Gerakan Nasional Membaca✨</p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered bg-white shadow-sm">
                                        <div class="thumb top-rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Inspiration</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('assets/templates/frontend/images/insta/insta-3.jpg') }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                                            class="author"
                                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                            alt="author" />Isep
                                                        Lutpi Nur</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Menuntut
                                                    Ilmu</a></h5>
                                            <p class="excerpt mb-0">Artinya : _“Siapa yang menempuh jalan untuk
                                                mencari ilmu, maka Allah akan
                                                mudahkan baginya jalan menuju surga.”_ (HR. Muslim, no. 2699)</p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered bg-white shadow-sm">
                                        <div class="thumb top-rounded">
                                            <a href="category.html" class="category-badge position-absolute">HBN</a>
                                            <span class="post-format">
                                                <i class="icon-camrecorder"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('assets/templates/frontend/images/insta/insta-5.jpg') }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                                            class="author"
                                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                            alt="author" />Isep
                                                        Lutpi Nur</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Hari Pahlawan
                                                    Nasional</a></h5>
                                            <p class="excerpt mb-0">"Bangsa yang besar adalah bangsa yang menghormati
                                                jasa pahlawannya." (Ir.
                                                Soekarno)
                                                Sudah saatnya kita mengingat, menghargai, dan belajar dari tokoh bangsa
                                                dimasa lalu, untuk
                                                membangun generasi muda indonesia yang lebih baik.</p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered bg-white shadow-sm">
                                        <div class="thumb top-rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Trending</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="{{ asset('assets/templates/frontend/images/insta/insta-6.jpg') }}"
                                                        alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="{{ asset('assets/templates/frontend/images/member/Isep Lutpi Nur.png') }}"
                                                            class="author"
                                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                            alt="author" />Isep
                                                        Lutpi Nur</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Membaca adalah
                                                    senjata</a></h5>
                                            <p class="excerpt mb-0">Buku yang dibaca adalah senjata bagi perempuan
                                                dari pembodohan, penindasan
                                                dan perlakuan tidak adil.
                                                Buka bukumu sekarang juga, niscaya dunia akan terlihat jelas!</p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="blog-single.html"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>

                        </div>
                        <div class="col-lg-4">

                            <!-- sidebar -->
                            <div class="sidebar">
                                <!-- widget about -->

                                <div class="widget rounded bg-white shadow-sm">
                                    <div class="widget-about data-bg-image text-center"
                                        data-bg-image="images/map-bg.png">
                                        <h3 class="widget-title">Kabinet Masagi</h3>
                                        <br>
                                        Ngabdi ka nagri bela ka nagara piken ngawujudkeun lemah nu sajati tur ngawangun
                                        cianjur pakidulan.
                                        </p>
                                        <ul class="social-icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-medium"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i
                                                        class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- widget categories -->
                                <div class="widget rounded bg-white shadow-sm">
                                    <div class="widget-header text-center">
                                        <h3 class="widget-title">Kategori</h3>
                                        <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}"
                                            class="wave" alt="wave" />
                                    </div>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="#">Hari Besar Nasional</a><span>(5)</span></li>
                                            <li><a href="#">Akhlakul Kharimah</a><span>(2)</span></li>
                                            <li><a href="#">Berita Dan Informasi</a><span>(4)</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- instagram feed -->
        <div class="instagram  mt-5 mb-0 py-5 bg-light">
            <div class="container-xl">
                <!-- button -->
                <a href="https://instagram.com/orda_karmapack" class="btn btn-default btn-instagram">Karmapack on
                    Instagram</a>
                <!-- images -->
                <div class="instagram-feed d-flex flex-wrap">
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-1.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-2.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-3.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-4.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-5.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('assets/templates/frontend/images/insta/insta-6.jpg') }}"
                                alt="insta-title" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @include('templates.frontend.body.footer', [
            'list_sosmed' => $getSosmed_val,
        ])

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input class="form-control me-2" type="search" placeholder="Search and press enter ..."
                    aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    {{-- menu sidebar --}}
    @include('templates.frontend.body.sidebar', [
        'list_sosmed' => $getSosmed_val,
        'page_attr_navigation' => $page_attr->navigation,
        'menu_bidang' => $menuBidang_val,
    ])

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('assets/templates/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/templates/frontend/js/custom.js') }}"></script>

</body>

</html>
