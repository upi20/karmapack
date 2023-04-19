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
                            <a href="javascript:void(0)">Tentang Kami</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Periode Kepengursan</a>
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
                            <h1 class="page-header__title">Periode Kepengurusan</h1>
                        </div>

                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">Daftar Semua Periode Kepengurusan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-30 justify-center">
                @foreach ($periodes as $i => $periode)
                    <div data-anim="slide-up delay-{{ $i + 1 }}" class="col-lg-10 col-md-11">
                        <div class="blogCard -type-3">
                            <div class="row pb-60 items-center">
                                <div class="col-lg-5">
                                    <div class="blogCard__image">
                                        <img class="rounded-8" src="{{ $periode->fotoUrl() }}"
                                            onerror="this.src='{{ $periode->fotoUrlDefault() }}';this.onerror='';"
                                            alt="{{ $periode->nama }}" style="max-height: 400px; width: auto">
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="blogCard__content pl-60 lg:pl-40 md:pl-0">
                                        <a href="{{ route('tentang.kepengurusan.struktur.periode', $periode->slug) }}"
                                            class="blogCard__category text-14 lh-1 text-purple-1 fw-500">{{ $periode->dari }}-{{ $periode->sampai }}</a>
                                        <h4 class="blogCard__title text-24 lh-15 text-dark-4 fw-500 mt-15">
                                            {{ $periode->nama }}
                                        </h4>
                                        <p class="blogCard__text mt-20">{{ $periode->slogan }}</p>
                                        <div class="blogCard__button d-inline-block mt-20">
                                            <a href="{{ route('tentang.kepengurusan.struktur.periode', $periode->slug) }}"
                                                class="button -sm -purple-3 text-purple-1">
                                                Lihat struktur kepengurusan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {!! $periodes->links() !!}
        </div>
    </section>
@endsection
