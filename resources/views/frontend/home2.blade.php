@extends('templates.frontend2.master')
@section('content')
    @php
    $p = 'setting.home';
    $k = "$p.hero";
    $filter = [['search' => '__periode_nama__', 'replace' => $periode->nama], ['search' => '__periode_dari__', 'replace' => $periode->dari], ['search' => '__periode_sampai__', 'replace' => $periode->sampai]];
    @endphp
    @if (settings()->get("$k.visible"))
        <section data-anim-wrap class="masthead -type-4 bg-light-6  animated pt-30" style="margin-top: 70px;">
            <div class="container pt-60">
                <div class="row justify-center items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="masthead__content pb-50">
                            <h1 data-anim-child="slide-up delay-3" class="masthead__title">
                                {{ settings()->get("$k.title") }}<br>
                                </span>
                            </h1>
                            <p data-anim-child="slide-right delay-3" class="masthead__text pt-15">
                                {!! settings()->get("$k.sub_title") !!}
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6" style="padding-bottom: 0;">
                        <div data-anim-child="slide-left delay-3" class="masthead__image">
                            <img src="{{ asset(settings()->get("$k.image")) }}" alt="image"
                                style="position: relative; top: 1px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- daftar poesaka -->
    @php
    $k = "$p.poesaka";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-md layout-pb-md " style="background-color: #bfcae6;" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-xl-7 col-lg-8">
                        <h2 class="text-30 lh-15 text-white" data-anim-child="slide-right delay-3">
                            {!! settings()->get("$k.title") !!}
                        </h2>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-3">
                        <a href="{{ settings()->get("$k.button_link") }}"
                            class="button -md -outline-dark-1 -rounded text-dark-1">
                            {{ settings()->get("$k.button_text") }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- visi dan misi -->
    @php
    $k = "$p.visi_misi";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-30 justify-between items-center">
                    <div class="col-lg-6" data-anim-child="slide-right delay-3">
                        <img class="w-1/1" src="{{ $periode->fotoUrl() }}" alt="{{ $periode->nama }}"
                            style="max-width: 500px;">
                    </div>

                    <div class="col-xl-5 col-lg-6 col-md-9" data-anim-child="slide-left delay-3">
                        <h3 class="text-24 lh-15">{{ settings()->get("$k.title") }}</h3>
                        <p class="sectionTitle__text ">
                            {!! str_parse(settings()->get("$k.sub_title"), $filter) !!}
                        </p>
                        <h3 class="text-20 lh-15">{{ settings()->get("$k.visi") }}</h3>
                        <p class="sectionTitle__text ">{!! $periode->visi !!}</p>
                        <h3 class="text-20 lh-15">{{ settings()->get("$k.misi") }}</h3>
                        <div class="sectionTitle__text ">{!! $periode->misi !!}</div>

                        <p class="sectionTitle__text ">{{ settings()->get("$k.semboyan") }}</p>
                        <div class="d-flex x-gap-15 y-gap-15 pt-30">
                            <div>
                                <a href="{{ route('about.kepengurusan.struktur') }}"
                                    class="button -md -purple-1 text-white">
                                    {{ settings()->get("$k.button_text") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- struktur -->
    @php
    $k = "$p.struktur_anggota";
    @endphp
    @if ($anggota->count() && settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-light-4" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end" data-anim-child="slide-up delay-3">
                    <div class="col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{!! str_parse(settings()->get("$k.sub_title"), $filter) !!}</p>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="col-auto">
                            <a href="{{ route('about.kepengurusan.struktur') }}"
                                class="button -icon -outline-purple-1 text-purple-1 fw-500">
                                {{ settings()->get("$k.button_text") }}
                                <span class="icon-arrow-top-right text-14 ml-10"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30" data-pagination="js-students-slider-pagination"
                    data-nav-prev="js-students-slider-prev" data-nav-next="js-students-slider-next"
                    data-slider-cols="xl-4 lg-3 md-2" data-anim-child="slide-left delay-3">
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
                                        <div class="teamCard__subtitle text-14 lh-1 mt-5 text-center">
                                            {{ $a->jabatan }}
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
    @php
    $k = "$p.kata_alumni";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-dark-5" data-anim-wrap>
            <div class="container">
                <div class="row justify-center text-center" data-anim-child="slide-up delay-3">
                    <div class="col-auto">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title text-white">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text text-white">{{ settings()->get("$k.sub_title") }}</p>
                        </div>

                    </div>
                </div>

                {{-- items --}}
                <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-2">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div data-anim-child="slide-left delay-3"
                                class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
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
                            <div data-anim-child="slide-left delay-3"
                                class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
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
                            <div data-anim-child="slide-left delay-3"
                                class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
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
                            <div data-anim-child="slide-left delay-3"
                                class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
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
                            <div data-anim-child="slide-left delay-3"
                                class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
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

                    <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40" data-anim="slide-up delay-3">
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
    @endif

    {{-- <section class="layout-pt-md layout-pb-md bg-beige-1" data-anim-wrap>
        <div class="container">
            <div class="row y-gap-30">

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-3" class="counter -type-1">
                        <div class="counter__number text-dark-1">19+</div>
                        <div class="counter__title text-light-1">Tahun Lebih Berdiri</div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div data-anim-child="slide-left delay-3" class="counter -type-1">
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
                    <div data-anim-child="slide-left delay-3" class="counter -type-1">
                        <div class="counter__number text-dark-1">700+</div>
                        <div class="counter__title text-light-1">Kecamatan</div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <!-- galeri kegiatan -->
    @php
    $k = "$p.galeri_kegiatan";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-light-3" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end">
                    <div class="col-lg-6" data-anim="slide-right delay-3">

                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>

                    </div>

                    <div class="col-auto" data-anim="slide-left delay-3">
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

                <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30"
                    data-pagination="js-events-slider-pagination" data-nav-prev="js-events-slider-prev"
                    data-nav-next="js-events-slider-next" data-slider-cols="xl-3 lg-2">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div data-anim="slide-left delay-3" class="eventCard -type-1">
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-anim="slide-left delay-3" class="eventCard -type-1">
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-anim="slide-left delay-3" class="eventCard -type-1">
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-anim="slide-left delay-3" class="eventCard -type-1">
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-anim="slide-left delay-3" class="eventCard -type-1">
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
                                            <a href="#"
                                                class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row pt-60 lg:pt-40" data-anim="slide-right delay-3">
                    <div class="col-auto">
                        <a href="#" class="button -icon -outline-purple-1 text-purple-1 fw-500">
                            {{ settings()->get("$k.button_text") }}
                            <span class="icon-arrow-top-right text-14 ml-10"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- blog dan artikel -->
    @php
    $k = "$p.artikel";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-md layout-pb-lg">
            <div data-anim-wrap class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-lg-6"data-anim-child="slide-right delay-3">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-3">
                        <a href="#" class="button -icon -purple-3 text-purple-1">
                            {{ settings()->get("$k.button_text") }}
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>
                    </div>
                </div>

                <div class="row y-gap-30 pt-50">

                    <div class="col-lg-4 col-md-6">
                        <div data-anim-child="slide-left delay-3" class="blogCard -type-1">
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
                                <a href="#" data-anim-child="slide-left delay-3" class="eventCard -type-4">
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
                                <a href="#" data-anim-child="slide-left delay-3" class="eventCard -type-4">
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
                                <a href="#" data-anim-child="slide-left delay-3" class="eventCard -type-4">
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
                                <a href="#" data-anim-child="slide-left delay-3" class="eventCard -type-4">
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
    @endif

    <!-- Sensus anggota -->
    @php
    $k = "$p.sensus";
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-purple-1 relative" data-anim-wrap>
            <div class="side-image pr-25 lg:d-none" data-anim-child="slide-left delay-3">
                <img src="{{ asset(settings()->get("$k.image")) }}" alt="image">
            </div>

            <div data-anim-wrap class="container" data-anim-child="slide-up delay-3">
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title text-white">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text text-white">{{ settings()->get("$k.sub_title") }}</p>
                        </div>


                        <div class="row x-gap-20 y-gap-20 pt-60 lg:pt-40">

                            <div class="col-auto">
                                <a href="{{ route('pendaftaran.sensus') }}" class="button -md -dark-1 text-purple-1">Isi
                                    {{ settings()->get("$k.button_text") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
