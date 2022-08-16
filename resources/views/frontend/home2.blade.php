@extends('templates.frontend2.master')
@section('content')
    <!-- hero -->
    <section data-anim-wrap class="masthead -type-4 bg-light-6  animated pt-30" style="margin-top: 70px;">
        <div class="container pt-60">
            <div class="row justify-center items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="masthead__content pb-50">
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title">
                            Karmapack<br></span>
                        </h1>
                        <p data-anim-child="slide-up delay-4" class="masthead__text pt-15">
                            Keluarga mahasiswa dan pelajar cianjur kidul.
                            <br class="md:d-none">
                            Merupakan sebuah organisasi kekeluargaan untuk mewadahi semua mahasiswa dan
                            pelajar dari cianjur
                            kidul. terdapat banyak alunmi yang berkontribusi dan memiliki pengaruh tinggi di
                            daerahnya.
                        </p>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6" style="padding-bottom: 0;">
                    <div data-anim-child="slide-up delay-6" class="masthead__image">
                        <img src="{{ asset('assets/templates/frontend2/img/education.svg') }}" alt="image"
                            style="position: relative; top: 1px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- daftar poesaka -->
    <section class="layout-pt-md layout-pb-md " style="background-color: #bfcae6;">
        <div class="container">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-xl-7 col-lg-8">
                    <h2 class="text-30 lh-15 text-white">
                        Bergabung dengan kami <span class="text-dark-1"> lebih dari ratusan alumni
                            mahasiswa dan pelajar
                        </span> dari cianjur kidul
                    </h2>
                </div>

                <div class="col-auto">
                    <a href="#" class="button -md -outline-dark-1 -rounded text-dark-1">Daftar
                        Poesaka</a>
                </div>
            </div>
        </div>
    </section>

    <!-- visi dan misi -->
    <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-lg-6">
                    <img class="w-1/1" src="{{ $periode->fotoUrl() }}" alt="{{ $periode->nama }}"
                        style="max-width: 500px;">
                </div>

                <div class="col-xl-5 col-lg-6 col-md-9">
                    <h3 class="text-24 lh-15">Visi dan Misi</h3>
                    <p class="sectionTitle__text ">Kabinet {{ $periode->nama }} Periode
                        {{ $periode->dari }}-{{ $periode->sampai }}</p>
                    <h3 class="text-20 lh-15">Visi</h3>
                    <p class="sectionTitle__text ">{!! $periode->visi !!}</p>
                    <h3 class="text-20 lh-15">Visi</h3>
                    <div class="sectionTitle__text ">{!! $periode->misi !!}</div>

                    <p class="sectionTitle__text ">Semboyan KARMAPACK: Manusia Yang memiliki pribadi yang
                        kokoh ajeg atau
                        seimbang dalam berifikir, merasa dan bertindak.</p>
                    <div class="d-flex x-gap-15 y-gap-15 pt-30">
                        <div>
                            <a href="{{ route('about.kepengurusan.struktur') }}" class="button -md -purple-1 text-white">
                                Lihat Struktur Kepengurusan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($anggota->count())
        <!-- struktur -->
        <section class="layout-pt-lg layout-pb-lg bg-light-4">
            <div class="container">
                <div class="row y-gap-15 justify-between items-end">
                    <div class="col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">Struktur Anggota Kepengurusan</h2>
                            <p class="sectionTitle__text ">Kabinet Sabilulungan Periode 2022-2023</p>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="col-auto">
                            <a href="{{ route('about.kepengurusan.struktur') }}"
                                class="button -icon -outline-purple-1 text-purple-1 fw-500">
                                Lihat Struktur Kepengurusan
                                <span class="icon-arrow-top-right text-14 ml-10"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30" data-pagination="js-students-slider-pagination"
                    data-nav-prev="js-students-slider-prev" data-nav-next="js-students-slider-next"
                    data-slider-cols="xl-4 lg-3 md-2">
                    <div class="swiper-wrapper">

                        {{-- anggota item --}}
                        @foreach ($anggota as $a)
                            <div class="swiper-slide">
                                <div class="teamCard -type-2 bg-white" style="min-height: 370px">
                                    <div class="teamCard__content">
                                        <img src="{{ $a->foto }}" alt="image"
                                            style="margin: auto;position: relative;margin: auto;width: 150px;height: 150px;max-height: 150px;border-radius: 150px;object-fit: cover; /* cover, contain, fill, scale-down */object-position: center;-webkit-border-radius: 150px;-moz-border-radius: 150px;">
                                        <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12 text-center">
                                            {{ $a->name }}</h4>
                                        <div class="teamCard__subtitle text-14 lh-1 mt-5 text-center">{{ $a->jabatan }}
                                            @if ($a->utama == 0)
                                                <a href="{{ route('about.kepengurusan.bidang', $a->parent_slug) }}"
                                                    style="text-transform: capitalize;" class="text-purple-1">
                                                    @if ($a->singkatan)
                                                        {{ $a->singkatan }}
                                                    @else
                                                        {{ $a->parent }}
                                                    @endif
                                                </a>
                                            @endif
                                        </div>

                                        <div class="teamCard__button mt-20">
                                            <a href="{{ $a->username ? url($a->username) : route('anggota.id', $a->id) }}"
                                                class="button -icon -outline-purple-1 -rounded text-purple-1">
                                                Lihat Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="row pt-60 lg:pt-40">
                    <div class="col-auto">
                        <div class="d-flex x-gap-15 justify-center items-center">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover js-students-slider-prev">
                                    <i class="icon icon-arrow-left"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -arrows js-students-slider-pagination"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover js-students-slider-next">
                                    <i class="icon icon-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- kata alumni -->
    <section class="layout-pt-lg layout-pb-lg bg-dark-5">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title text-white">Kata Alumni</h2>
                        <p class="sectionTitle__text text-white">Banyak alumni yang akhli pada bidangnya
                        </p>
                    </div>

                </div>
            </div>

            <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-2"
                data-anim-wrap>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                            <div class="row y-gap-30 md:text-center md:justify-center">
                                <div class="col-md-auto">
                                    <div class="testimonials__image">
                                        <img src="{{ asset('assets/templates/frontend2/img/home-4/testimonials/1.png') }}"
                                            alt="image">
                                    </div>
                                </div>

                                <div class="col-md">
                                    <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think
                                        Educrat is the best theme I
                                        ever seen this year. Amazing design, easy to customize and a
                                        design.”</p>

                                    <div class="mt-15">
                                        <div class="text-15 lh-1 text-dark-1 fw-500">Joko Widodo</div>
                                        <div class="text-13 lh-1 mt-10">Presiden Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                            <div class="row y-gap-30 md:text-center md:justify-center">
                                <div class="col-md-auto">
                                    <div class="testimonials__image">
                                        <img src="{{ asset('assets/templates/frontend2/img/home-4/testimonials/1.png') }}"
                                            alt="image">
                                    </div>
                                </div>

                                <div class="col-md">
                                    <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think
                                        Educrat is the best theme I
                                        ever seen this year. Amazing design, easy to customize and a
                                        design.”</p>

                                    <div class="mt-15">
                                        <div class="text-15 lh-1 text-dark-1 fw-500">Joko Widodo</div>
                                        <div class="text-13 lh-1 mt-10">Presiden Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                            <div class="row y-gap-30 md:text-center md:justify-center">
                                <div class="col-md-auto">
                                    <div class="testimonials__image">
                                        <img src="{{ asset('assets/templates/frontend2/img/home-4/testimonials/1.png') }}"
                                            alt="image">
                                    </div>
                                </div>

                                <div class="col-md">
                                    <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think
                                        Educrat is the best theme I
                                        ever seen this year. Amazing design, easy to customize and a
                                        design.”</p>

                                    <div class="mt-15">
                                        <div class="text-15 lh-1 text-dark-1 fw-500">Joko Widodo</div>
                                        <div class="text-13 lh-1 mt-10">Presiden Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                            <div class="row y-gap-30 md:text-center md:justify-center">
                                <div class="col-md-auto">
                                    <div class="testimonials__image">
                                        <img src="{{ asset('assets/templates/frontend2/img/home-4/testimonials/1.png') }}"
                                            alt="image">
                                    </div>
                                </div>

                                <div class="col-md">
                                    <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think
                                        Educrat is the best theme I
                                        ever seen this year. Amazing design, easy to customize and a
                                        design.”</p>

                                    <div class="mt-15">
                                        <div class="text-15 lh-1 text-dark-1 fw-500">Joko Widodo</div>
                                        <div class="text-13 lh-1 mt-10">Presiden Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                            <div class="row y-gap-30 md:text-center md:justify-center">
                                <div class="col-md-auto">
                                    <div class="testimonials__image">
                                        <img src="{{ asset('assets/templates/frontend2/img/home-4/testimonials/1.png') }}"
                                            alt="image">
                                    </div>
                                </div>

                                <div class="col-md">
                                    <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think
                                        Educrat is the best theme I
                                        ever seen this year. Amazing design, easy to customize and a
                                        design.”</p>

                                    <div class="mt-15">
                                        <div class="text-15 lh-1 text-dark-1 fw-500">Joko Widodo</div>
                                        <div class="text-13 lh-1 mt-10">Presiden Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                            <i class="icon text-white icon-arrow-left"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <div class="pagination -arrows js-pagination"></div>
                    </div>
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-right-hover js-next">
                            <i class="icon text-white icon-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md bg-beige-1">
        <div class="container">
            <div data-anim-wrap class="row y-gap-30">

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-1" class="counter -type-1">
                        <div class="counter__number text-dark-1">19+</div>
                        <div class="counter__title text-light-1">Tahun Lebih Berdiri</div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-2" class="counter -type-1">
                        <div class="counter__number text-dark-1">1000+</div>
                        <div class="counter__title text-light-1">Anggota</div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-3" class="counter -type-1">
                        <div class="counter__number text-dark-1">900+</div>
                        <div class="counter__title text-light-1">Sekolah</div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-4" class="counter -type-1">
                        <div class="counter__number text-dark-1">700+</div>
                        <div class="counter__title text-light-1">Kecamatan</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- galeri kegiatan -->
    <section class="layout-pt-lg layout-pb-lg bg-light-3">
        <div class="container">
            <div class="row y-gap-15 justify-between items-end">
                <div class="col-lg-6">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Galeri Kegiatan</h2>

                        <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                    </div>

                </div>

                <div class="col-auto">
                    <div class="d-flex justify-center x-gap-15 items-center">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-events-slider-prev">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-events-slider-pagination"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-events-slider-next">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30" data-pagination="js-events-slider-pagination"
                data-nav-prev="js-events-slider-prev" data-nav-next="js-events-slider-next" data-slider-cols="xl-3 lg-2">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-2" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/1.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-3" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/2.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-4" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/3.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-5" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/4.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-6" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/5.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim="slide-left delay-7" class="eventCard -type-1">
                            <div class="eventCard__img">
                                <img src="{{ asset('assets/templates/frontend2/img/home-2/events/6.png') }}"
                                    alt="image">
                            </div>

                            <div class="eventCard__bg bg-white">
                                <div class="eventCard__content y-gap-10">
                                    <div class="eventCard__inner">
                                        <h4 class="eventCard__title text-17 fw-500">
                                            Summer School 2022
                                        </h4>
                                        <div class="d-flex x-gap-15 pt-10">
                                            <div class="d-flex items-center">
                                                <div class="icon-calendar-2 text-16 mr-8"></div>
                                                <div class="text-14">6 April, 2022</div>
                                            </div>
                                            <div class="d-flex items-center">
                                                <div class="icon-location text-16 mr-8"></div>
                                                <div class="text-14">London, UK</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="eventCard__button">
                                        <a href="#" class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row pt-60 lg:pt-40">
                <div class="col-auto">
                    <a href="#" class="button -icon -outline-purple-1 text-purple-1 fw-500">
                        View All Events
                        <span class="icon-arrow-top-right text-14 ml-10"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- blog dan artikel -->
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
                <div class="col-lg-6">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Artikel</h2>

                        <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                    </div>

                </div>

                <div class="col-auto">

                    <a href="#" class="button -icon -purple-3 text-purple-1">
                        Browse Blog
                        <i class="icon-arrow-top-right text-13 ml-10"></i>
                    </a>

                </div>
            </div>

            <div class="row y-gap-30 pt-50">

                <div class="col-lg-4 col-md-6">
                    <div data-anim-child="slide-left delay-2" class="blogCard -type-1">
                        <div class="blogCard__image">
                            <img src="{{ asset('assets/templates/frontend2/img/blog/1.png') }}" alt="image">
                        </div>
                        <div class="blogCard__content">
                            <a href="blog-single.html" class="blogCard__category">EDUCATION</a>
                            <h4 class="blogCard__title">Eco-Education in Our Lives: We Can Change the
                                Future</h4>
                            <div class="blogCard__date">December 16, 2022</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div data-anim-child="slide-left delay-3" class="blogCard -type-1">
                        <div class="blogCard__image">
                            <img src="{{ asset('assets/templates/frontend2/img/blog/2.png') }}" alt="image">
                        </div>
                        <div class="blogCard__content">
                            <a href="blog-single.html" class="blogCard__category">DESIGN</a>
                            <h4 class="blogCard__title">How to design a simple, yet unique and memorable
                                brand identity</h4>
                            <div class="blogCard__date">December 16, 2022</div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="row y-gap-30">

                        <div class="col-lg-12 col-md-6">
                            <a href="#" data-anim-child="slide-left delay-4" class="eventCard -type-4">
                                <div class="eventCard__date bg-light-7 mr-20">
                                    <span class="text-30 lh-1 fw-700">15</span>
                                    <span class="text-18 lh-1 fw-500 uppercase mt-10">JUNE</span>
                                </div>
                                <div class="eventCard__content">
                                    <div class="text-13 lh-1 fw-500 uppercase text-purple-1">Courses</div>
                                    <h4 class="text-17 lh-15 fw-500 mt-10">Medical Chemistry: The Molecular
                                        Basis</h4>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12 col-md-6">
                            <a href="#" data-anim-child="slide-left delay-5" class="eventCard -type-4">
                                <div class="eventCard__date bg-light-7 mr-20">
                                    <span class="text-30 lh-1 fw-700">15</span>
                                    <span class="text-18 lh-1 fw-500 uppercase mt-10">JUNE</span>
                                </div>
                                <div class="eventCard__content">
                                    <div class="text-13 lh-1 fw-500 uppercase text-purple-1">Courses</div>
                                    <h4 class="text-17 lh-15 fw-500 mt-10">Medical Chemistry: The Molecular
                                        Basis</h4>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12 col-md-6">
                            <a href="#" data-anim-child="slide-left delay-6" class="eventCard -type-4">
                                <div class="eventCard__date bg-light-7 mr-20">
                                    <span class="text-30 lh-1 fw-700">15</span>
                                    <span class="text-18 lh-1 fw-500 uppercase mt-10">JUNE</span>
                                </div>
                                <div class="eventCard__content">
                                    <div class="text-13 lh-1 fw-500 uppercase text-purple-1">Courses</div>
                                    <h4 class="text-17 lh-15 fw-500 mt-10">Medical Chemistry: The Molecular
                                        Basis</h4>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-12 col-md-6">
                            <a href="#" data-anim-child="slide-left delay-7" class="eventCard -type-4">
                                <div class="eventCard__date bg-light-7 mr-20">
                                    <span class="text-30 lh-1 fw-700">15</span>
                                    <span class="text-18 lh-1 fw-500 uppercase mt-10">JUNE</span>
                                </div>
                                <div class="eventCard__content">
                                    <div class="text-13 lh-1 fw-500 uppercase text-purple-1">Courses</div>
                                    <h4 class="text-17 lh-15 fw-500 mt-10">Medical Chemistry: The Molecular
                                        Basis</h4>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sensus anggota -->
    <section class="layout-pt-lg layout-pb-lg bg-purple-1 relative">
        <div class="side-image pr-25 lg:d-none">
            <img src="{{ asset('assets/templates/frontend2/img/home-5/cta/img.png') }}" alt="image">
        </div>

        <div data-anim-wrap class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-6">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title text-white">Sensus Anggota</h2>

                        <p class="sectionTitle__text text-white">Dalam rangka digitalisasi database
                            anggota, Bidang Kominfo
                            menyelenggarakan sensus anggota untuk me-rekap semua anggota maupun alumni.</p>

                    </div>


                    <div class="row x-gap-20 y-gap-20 pt-60 lg:pt-40">

                        <div class="col-auto">
                            <a href="{{ route('pendaftaran.sensus') }}" class="button -md -dark-1 text-purple-1">Isi
                                Sensus Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
