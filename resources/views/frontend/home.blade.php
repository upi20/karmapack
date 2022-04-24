@extends('templates.frontend.master')
@section('udnder_header')
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
@endsection
@section('content')
    <div class="container-xl">
        <h4 class="section-title text-center mb-3">Daftar artikel terbaru</h4>
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="row gy-4">
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered bg-white shadow-sm">
                            <div class="thumb top-rounded">
                                <a href="category.html" class="category-badge position-absolute">Lifestyle</a>
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
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
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
                                <a href="category.html" class="category-badge position-absolute">Inspiration</a>
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
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
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
                                <a href="category.html" class="category-badge position-absolute">Inspiration</a>
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
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
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
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
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
                                <a href="category.html" class="category-badge position-absolute">Trending</a>
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
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
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
                        <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                            <h3 class="widget-title">Kabinet Masagi</h3>
                            <br>
                            Ngabdi ka nagri bela ka nagara piken ngawujudkeun lemah nu sajati tur ngawangun
                            cianjur pakidulan.
                            </p>
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded bg-white shadow-sm">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Kategori</h3>
                            <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                                alt="wave" />
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
@endsection
