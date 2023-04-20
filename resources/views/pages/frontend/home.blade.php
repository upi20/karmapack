@extends('layouts.frontend.master')
@section('content')
    @php
        $p = 'setting.home';
        $k = "$p.hero";
        $filter = [['search' => '__periode_nama__', 'replace' => $periode->nama], ['search' => '__periode_dari__', 'replace' => $periode->dari], ['search' => '__periode_sampai__', 'replace' => $periode->sampai]];
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section data-anim-wrap class="masthead -type-4 bg-light-6  animated pt-30" style="margin-top: 0">
            <div class="container pt-60">
                <div class="row justify-center items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="masthead__content pb-50">
                            <h1 data-anim-child="slide-up delay-{{ $anim++ }}" class="masthead__title">
                                {{ settings()->get("$k.title") }}<br>
                                </span>
                            </h1>
                            <p data-anim-child="slide-right delay-{{ $anim++ }}" class="masthead__text pt-15">
                                {!! settings()->get("$k.sub_title") !!}
                            <div class="col-auto mt-20" data-anim-child="slide-right delay-{{ $anim++ }}">
                                <a href="{!! settings()->get("$k.video_link") !!}" class="d-flex items-center js-gallery"
                                    data-gallery="gallery1">
                                    <div class="d-flex justify-center items-center size-60 rounded-full border-dark-1-lg">
                                        <div class="icon-play text-20 text-dark-1 pl-5"></div>
                                    </div>
                                    <div class="ml-10">{!! settings()->get("$k.video_title") !!}</div>
                                </a>
                            </div>
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6" style="padding-bottom: 0;">
                        <div data-anim-child="slide-left delay-{{ $anim++ }}" class="masthead__image">
                            <img src="{{ asset(settings()->get("$k.image")) }}" alt="image"
                                style="position: relative; max-width: 600px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- daftar poesaka -->
    @php
        $k = "$p.poesaka";
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-md layout-pb-md " style="background-color: #bfcae6;" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-xl-7 col-lg-8">
                        <h2 class="text-30 lh-15 text-white" data-anim-child="slide-right delay-{{ $anim++ }}">
                            {!! settings()->get("$k.title") !!}
                        </h2>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-{{ $anim++ }}">
                        <a href="{{ str_parse(settings()->get("$k.button_link")) }}"
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
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-30 justify-between items-center">
                    <div class="col-lg-6" data-anim-child="slide-right delay-{{ $anim++ }}">
                        <img class="w-1/1" src="{{ $periode->fotoUrl() }}" alt="{{ $periode->nama }}"
                            style="max-width: 500px;">
                    </div>

                    <div class="col-xl-5 col-lg-6 col-md-9" data-anim-child="slide-left delay-{{ $anim++ }}">
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
                                <a href="{{ route('tentang.kepengurusan.struktur') }}"
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
        $anim = 1;
    @endphp
    @if ($pengurus->count() && settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-light-4" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end" data-anim-child="slide-up delay-{{ $anim++ }}">
                    <div class="col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{!! str_parse(settings()->get("$k.sub_title"), $filter) !!}</p>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="col-auto">
                            <a href="{{ route('tentang.kepengurusan.struktur') }}"
                                class="button -icon -outline-purple-1 text-purple-1 fw-500">
                                {{ settings()->get("$k.button_text") }}
                                <span class="icon-arrow-top-right text-14 ml-10"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="pt-60 lg:pt-40 js-section-slider" data-gap="30" data-pagination="js-students-slider-pagination"
                    data-nav-prev="js-students-slider-prev" data-nav-next="js-students-slider-next"
                    data-slider-cols="xl-4 lg-3 md-2" data-anim-child="slide-left delay-{{ $anim++ }}">
                    <div class="swiper-wrapper">

                        {{-- pengurus item --}}
                        @foreach ($pengurus as $a)
                            <div class="swiper-slide" data-anim-child="slide-left delay-{{ $anim++ }}">
                                <div class="teamCard -type-2 bg-white shadow-4" style="min-height: 370px; border: 0">
                                    <div class="teamCard__content">
                                        <img class="lazy" data-src="{{ $a->anggota->fotoUrl() }}" alt="image"
                                            style="margin: auto;position: relative;margin: auto;width: 150px;height: 150px;max-height: 150px;border-radius: 150px;object-fit: cover; /* cover, contain, fill, scale-down */object-position: center;-webkit-border-radius: 150px;-moz-border-radius: 150px;">
                                        <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12 text-center">
                                            {{ $a->anggota->nama }}</h4>
                                        <div class="teamCard__subtitle text-14 lh-1 mt-5 text-center">
                                            {{ $a->jabatan->nama }}
                                            @if ($a->jabatan->parent)
                                                <a href="{{ route('tentang.kepengurusan.bidang', $a->jabatan->parent->slug) }}"
                                                    style="text-transform: capitalize;" class="text-purple-1">
                                                    @if ($a->jabatan->parent->singkatan)
                                                        {{ $a->jabatan->parent->singkatan }}
                                                    @else
                                                        {{ $a->jabatan->parent->nama }}
                                                    @endif
                                                </a>
                                            @endif
                                        </div>

                                        <div class="teamCard__button mt-20">
                                            <a href="{{ $a->anggota->user->username ? url($a->anggota->user->username) : route('anggota.id', $a->anggota->id) }}"
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
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-dark-5" data-anim-wrap>
            <div class="container">
                <div class="row justify-center text-center" data-anim-child="slide-up delay-{{ $anim++ }}">
                    <div class="col-auto">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title text-white">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text text-white">{{ settings()->get("$k.sub_title") }}</p>
                        </div>

                    </div>
                </div>

                <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-1">
                    <div class="swiper-wrapper">
                        {{-- items --}}
                        @foreach ($kata_alumni_list as $item)
                            <div class="swiper-slide">
                                <div data-anim-child="slide-left delay-{{ $anim++ }}"
                                    class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                                    <div class="row y-gap-30 md:text-center md:justify-center">
                                        <div class="col-md-auto">
                                            <div class="testimonials__image" style="height: 170px; object-fit: cover;">
                                                <img class="lazy" data-src="{{ $item->user_foto }}"
                                                    alt="{{ $item->user }}" style="height: 170px; width: 170px">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <p class="testimonials__text text-16 lh-17 fw-500 mt-15">
                                                {{ $item->deskripsi }}</p>
                                            <div class="mt-15">
                                                <div class="text-15 lh-1 text-purple-1 fw-500">
                                                    <a
                                                        href="{{ $item->user_username ? url($item->user_username) : route('anggota.id', $item->user_id) }}">
                                                        {{ $item->user }}</a>
                                                </div>
                                                <div class="text-13 lh-1 mt-10">{{ $item->profesi }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

    <!-- galeri kegiatan -->
    @php
        $k = "$p.galeri_kegiatan";
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-light-3" data-anim-wrap>
            <div class="container">
                <div class="row y-gap-15 justify-between items-end">
                    <div class="col-lg-6" data-anim="slide-right delay-{{ $anim++ }}">

                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>

                    </div>

                    <div class="col-auto" data-anim="slide-left delay-{{ $anim++ }}">
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
                        @foreach ($galeri_list as $galery)
                            <div class="swiper-slide">
                                <div data-anim="slide-left delay-{{ $anim++ }}" class="eventCard -type-1">
                                    <div class="eventCard__img" style="height: 250px;">
                                        <img class="lazy"
                                            data-src="{{ "https://drive.google.com/uc?export=view&id={$galery->foto_id_gdrive}" }}"
                                            alt="{{ $galery->nama }}"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>

                                    <div class="eventCard__bg bg-white">
                                        <div class="eventCard__content y-gap-10">
                                            <div class="eventCard__inner">
                                                <h4 class="eventCard__title text-17 fw-500">
                                                    {{ $galery->nama }}
                                                </h4>
                                                <div class="d-flex x-gap-15 pt-10">
                                                    <div class="d-flex items-center">
                                                        <div class="icon-calendar-2 text-16 mr-8"></div>
                                                        <div class="text-14">{{ $galery->tanggal_str }}</div>
                                                    </div>
                                                    <div class="d-flex items-center">
                                                        <div class="icon-location text-16 mr-8"></div>
                                                        <div class="text-14">{{ $galery->lokasi }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="eventCard__button">
                                                <a href="{{ route('galeri.detail', $galery->slug) }}"
                                                    class="button -sm -rounded -purple-1 text-white px-25">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row pt-60 lg:pt-40" data-anim="slide-right delay-{{ $anim++ }}">
                    <div class="col-auto">
                        <a href="{{ route('galeri') }}" class="button -icon -outline-purple-1 text-purple-1 fw-500">
                            {{ settings()->get("$k.button_text") }}
                            <span class="icon-arrow-top-right text-14 ml-10"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $k = "$p.instagram";
        $instagram_visible = settings()->get("$k.visible");
        $anim = 1;
    @endphp
    @if ($instagram_visible)
        <section class="layout-pt-md layout-pb-lg bg-dark-5">
            <div data-anim-wrap class="container">
                <div class="page-header__content">
                    <div class="row justify-center text-center">
                        <div class="col-auto" data-anim="slide-left delay-{{ $anim++ }}">
                            <div data-anim="slide-up delay-{{ $anim++ }}" class="is-in-view">
                                <h1 class="sectionTitle__title text-white">{{ settings()->get("$k.title") }}</h1>
                            </div>

                            <div data-anim="slide-up delay-{{ $anim++ }}" class="is-in-view">
                                <p class="sectionTitle__text text-white">
                                    {{ settings()->get("$k.sub_title") }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid y-gap-30 pt-50">
                    <div class="grid-sizer col-lg-4 col-md-6"></div>
                    @foreach ($instagrams as $item)
                        <div class="grid-item col-lg-4 col-md-6 px-8 py-8 col-12"
                            data-anim="slide-left delay-{{ $anim++ }}">
                            {!! str_replace('<script async src="//www.instagram.com/embed.js"></script>', '', $item->keterangan) !!}
                        </div>
                    @endforeach
                </div>
                @if ($instagrams->count() > 0)
                    <script async src="//www.instagram.com/embed.js"></script>
                @endif
            </div>
        </section>
    @endif

    <!-- blog dan artikel -->
    @php
        $k = "$p.artikel";
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-md layout-pb-lg">
            <div data-anim-wrap class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-lg-6"data-anim-child="slide-right delay-{{ $anim++ }}">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title ">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text ">{{ settings()->get("$k.sub_title") }}</p>
                        </div>
                    </div>

                    <div class="col-auto" data-anim-child="slide-left delay-{{ $anim++ }}">
                        <a href="{{ route('artikel') }}" class="button -icon -purple-3 text-purple-1">
                            {{ settings()->get("$k.button_text") }}
                            <i class="icon-arrow-top-right text-13 ml-10"></i>
                        </a>
                    </div>
                </div>

                <div class="row y-gap-30 pt-50">
                    @foreach ($articles as $k => $a)
                        @if ($k > 1)
                            @continue
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <div data-anim-child="slide-left delay-{{ $anim++ }}" class="blogCard -type-1">
                                <div class="blogCard__image">
                                    <img class="lazy" data-src="{{ $a->fotoUrl() }}" alt="{{ $a->nama }}"
                                        style="width: 100%; height: 300px; object-fit: cover; border-radius:16px">
                                </div>
                                <div class="blogCard__content">
                                    @if ($a->categories->count() > 0)
                                        <a href="{{ url("artikel?kategori={$a->categories[0]->slug}") }}"
                                            class="blogCard__category" title="Kategori {{ $a->categories[0]->nama }}">
                                            {{ $a->categories[0]->nama }}
                                        </a>
                                    @elseif ($a->tags->count() > 0)
                                        <a href="{{ url("artikel?tag={$a->tags[0]->slug}") }}" class="blogCard__category"
                                            title="tag {{ $a->tags[0]->nama }}">
                                            {{ $a->tags[0]->nama }}
                                        </a>
                                    @endif
                                    <h4 class="blogCard__title">
                                        <a href="{{ route('artikel.detail', $a->slug) }}">{{ $a->nama }}</a>
                                    </h4>
                                    <div class="blogCard__date">{{ $a->dateFormat() }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-4">
                        <div class="row y-gap-30">

                            @foreach ($articles as $k => $a)
                                @if ($k < 2)
                                    @continue
                                @endif
                                <div class="col-lg-12 col-md-6">
                                    <a href="{{ route('artikel.detail', $a->slug) }}"
                                        data-anim-child="slide-left delay-{{ $anim++ }}" class="eventCard -type-4">
                                        <div class="eventCard__date bg-light-7 mr-20"
                                            style="min-width: 100px; min-height: 100px">
                                            <span class="text-30 lh-1 fw-700">{{ $a->dateFormat('d') }}</span>
                                            <span
                                                class="text-18 lh-1 fw-500 uppercase mt-10">{{ $a->dateFormat('M') }}</span>
                                        </div>

                                        <div class="eventCard__content">
                                            @if ($a->categories->count() > 0)
                                                <div class="text-13 lh-1 fw-500 uppercase text-purple-1">
                                                    {{ $a->categories[0]->nama }}
                                                </div>
                                            @elseif ($a->tags->count() > 0)
                                                <div class="text-13 lh-1 fw-500 uppercase text-purple-1">
                                                    {{ $a->tags[0]->nama }}
                                                </div>
                                            @endif
                                            <h4 class="text-17 lh-15 fw-500 mt-10"> {{ $a->nama }}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Sensus anggota -->
    @php
        $k = "$p.sensus";
        $anim = 1;
    @endphp
    @if (settings()->get("$k.visible"))
        <section class="layout-pt-lg layout-pb-lg bg-purple-1 relative" data-anim-wrap>
            <div class="side-image pr-25 lg:d-none" data-anim-child="slide-left delay-{{ $anim++ }}">
                <img class="lazy" data-src="{{ asset(settings()->get("$k.image")) }}" alt="image">
            </div>

            <div class="container" data-anim-child="slide-left delay-{{ $anim++ }}">
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <div class="sectionTitle ">
                            <h2 class="sectionTitle__title text-white">{{ settings()->get("$k.title") }}</h2>
                            <p class="sectionTitle__text text-white">{{ settings()->get("$k.sub_title") }}</p>
                        </div>


                        <div class="row x-gap-20 y-gap-20 pt-60 lg:pt-40">

                            <div class="col-auto">
                                <a href="{{ route('pendaftaran.sensus') }}" class="button -md -dark-1 text-purple-1">
                                    {{ settings()->get("$k.button_text") }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('stylesheet')
    @if ($instagram_visible)
        <style>
            .instagram-media {
                border-radius: 16px !important;
                box-shadow: 0px 1px 4px 0px #14034212 !important;
            }
        </style>
    @endif
@endsection

@section('javascript')
    @if ($instagram_visible)
        <script src="{{ asset_admin('plugins/mansory.min.js', name: 'sash') }}"></script>
        <script>
            $(window).on('load', function() {
                setTimeout(() => {
                    var msnry = new Masonry(document.querySelector('.grid'), {
                        itemSelector: '.grid-item',
                        columnWidth: '.grid-sizer'
                    });
                }, 2000);
            });
        </script>
    @endif
@endsection
