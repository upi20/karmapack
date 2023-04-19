@extends('layouts.frontend.master')
@section('content')
    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Galeri</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">{{ settings()->get('setting.home.galeri_kegiatan.title') }}</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">{{ settings()->get('setting.home.galeri_kegiatan.sub_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class=" pb-30" data-anim="slide-up delay-4">
                <form class="search-field h-50" action="">
                    <input class="bg-light-3 pr-50" type="search" placeholder="Poesaka..." value="{{ $filters->search }}"
                        name="search" id="search">
                    <button class="" type="submit">
                        <i class="icon-search text-20"></i>
                    </button>
                </form>
            </div>

            <div class="row y-gap-30 pt-30">
                @foreach ($galeries as $k => $galery)
                    <div class="col-lg-4 col-md-6">
                        <div class="eventCard -type-1" data-anim="slide-left delay-{{ $k + 5 }}">
                            <div class="eventCard__img">
                                <img src="{{ "https://drive.google.com/uc?export=view&id={$galery->foto_id_gdrive}" }}"
                                    alt="{{ $galery->nama }}" style="width: 100%; height: 250px; object-fit: cover;">
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
                @if (!$galeries)
                    <div class="d-flex justify-content-center align-items-center">
                        <h6>Data Tidak Tersedia</h6>
                    </div>
                @endif
                {!! $galeries->links() !!}
            </div>
        </div>
    </section>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
@endsection
