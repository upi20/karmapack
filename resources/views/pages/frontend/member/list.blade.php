@php
    $angkatan = 0;
    $is_filter = request()->query('search') || request()->query('category') || request()->query('sort') || request()->query('limit');
@endphp
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
                            <a href="javascript:void(0)">Anggota</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="page-header -type-1 bg-light-4">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">Semua Anggota</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">Daftar Semua anggota karmapack</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg bg-light-4">
        <div data-anim-wrap class="container">
            <div class="accordion -block js-accordion mb-45">
                <div class="accordion__item rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div class="accordion__button">
                        <div class="accordion__icon">
                            <div class="icon" data-feather="plus"></div>
                            <div class="icon" data-feather="minus"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">Filter Pencarian</span>
                    </div>
                    <div class="accordion__content">
                        <div class="accordion__content__inner">
                            <form action="" class="search_form">
                                <div class="row x-gap-20 y-gap-20 items-center">
                                    <div class="col-auto">
                                        <input type="search" class="text-light-1 py-15 rounded-8 px-15 input-light"
                                            placeholder="Kata Kunci" name="search" id="search"
                                            value="{{ request()->query('search') }}">
                                    </div>

                                    <div class="col-auto">
                                        <div class="form-select">
                                            <select class="text-light-1 py-15 rounded-8 px-15 input-light" name="category"
                                                id="category">
                                                <option data-display="Select" value="">Cari Berdasarkan</option>
                                                @foreach ([['id' => 'angkatan', 'text' => 'Angkatan'], ['id' => 'alamat', 'text' => 'Alamat'], ['id' => 'pendidikan', 'text' => 'Pendidikan'], ['id' => 'periode', 'text' => 'Periode'], ['id' => 'bidang', 'text' => 'Bidang']] as $item)
                                                    <option value="{{ $item['id'] }}"
                                                        {{ request()->query('category') == $item['id'] ? 'selected' : '' }}>
                                                        {{ $item['text'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-select">
                                            <select class="text-light-1 py-15 rounded-8 px-15 input-light" id="sort"
                                                name="sort">
                                                @foreach ([['id' => 'asc', 'text' => 'A-Z'], ['id' => 'desc', 'text' => 'Z-A']] as $item)
                                                    <option value="{{ $item['id'] }}"
                                                        {{ request()->query('sort') == $item['id'] ? 'selected' : '' }}>
                                                        {{ $item['text'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" min="1" max="999"
                                            class="text-light-1 py-15 rounded-8 px-15 input-light" placeholder="Per Halaman"
                                            name="limit" id="limit" value="{{ request()->query('limit') ?? 12 }}"
                                            style="min-width: 150px">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="button -icon -dark-1 text-white">
                                            <i class="icon icon-search mr-10"></i>
                                            Cari
                                        </button>
                                    </div>
                                    @if ($is_filter)
                                        <div class="col-auto">
                                            <a href="{{ route('anggota') }}" type="submit"
                                                class="button -icon -purple-1 text-white">
                                                <i class="icon icon-close mr-10"></i>
                                                Reset
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-14 lh-12 mb-30">Dari <span class="text-dark-1 fw-500">{{ $attr->from }}</span> Sampai
                <span class="text-dark-1 fw-500">{{ $attr->to }}</span> | Total
                <span class="text-dark-1 fw-500">{{ $attr->total }}</span> Data
            </div>

            <div class="row grid y-gap-30" data-anim-wrap>
                <div class="grid-sizer col-lg-3 col-md-6"></div>
                @foreach ($users as $k => $item)
                    @php
                        $link_profile = $item->username ? url($item->username) : route('anggota.id', $item->id);
                    @endphp
                    <div class="grid-item col-lg-3 col-md-6 p-2" data-anim-child="slide-left delay-{{ $k + 3 }}">
                        <div class="teamCard -type-1 rounded-16 bg-white -dark-bg-dark-1 shadow-4 card-main">
                            <div class="teamCard__image">
                                <a href="{{ $link_profile }}">
                                    <img onerror="this.src='{{ asset($image->default) }}';this.onerror='';"
                                        src="{{ asset("$image->folder/$item->foto") }}" alt="{{ $item->name }}"
                                        style="width: 100%; height: 250px; object-fit: cover; border-radius:16px">
                                </a>
                            </div>
                            <div class="teamCard__content p-3 pt-0">
                                <h4 class="teamCard__title">
                                    <a href="{{ $link_profile }}">{{ $item->angkatan }} | {{ $item->name }}</a>
                                </h4>

                                @if ($item->whatsapp)
                                    <small class="text-muted d-block">
                                        <a class="text-purple-1"
                                            href="https://api.whatsapp.com/send?phone={{ $item->whatsapp }}">
                                            <i class="fab fa-whatsapp"></i> +62{{ $item->whatsapp }}
                                        </a>
                                    </small>
                                @endif
                                @if ($item->telepon)
                                    <small class="text-muted d-block">
                                        <a class="text-purple-1" href="tel:{{ $item->telepon }}">
                                            <i class="fas fa-phone"></i> {{ $item->telepon }}
                                        </a>
                                    </small>
                                @endif

                                <p class="card-text my-1">
                                    <small class="text-muted">
                                        @php
                                            $province = $item->province ? ', <a class="text-purple-1" href="' . url('anggota?category=alamat&search=' . $item->province) . '">' . $item->province . '</a>' : '';
                                            $regencie = $item->regencie ? ', <a class="text-purple-1" href="' . url('anggota?category=alamat&search=' . $item->regencie) . '">' . $item->regencie . '</a>' : '';
                                            $district = $item->district ? ', <a class="text-purple-1" href="' . url('anggota?category=alamat&search=' . $item->district) . '">' . $item->district . '</a>' : '';
                                            $village = $item->village ? ', <a class="text-purple-1" href="' . url('anggota?category=alamat&search=' . $item->village) . '">' . $item->village . '</a>' : '';
                                        @endphp
                                    </small>
                                    <small class="text-muted">{!! $item->alamat_lengkap . $province . $regencie . $district . $village !!}</small>
                                </p>

                                <hr>
                                @if ($item->periode_nama)
                                    <p class="text-muted d-block">
                                        <small class="text-muted text-purple-1">
                                            <a
                                                href="{{ route('tentang.kepengurusan.struktur.periode', $item->periode_slug) }}">
                                                {{ $item->periode_nama }}
                                            </a>
                                        </small>
                                    </p>
                                @endif

                                @if ($item->jabatan_nama)
                                    <p class="text-muted d-block">
                                        <small class="text-muted text-purple-1">
                                            <a href="{{ route('tentang.kepengurusan.bidang', $item->jabatan_slug) }}">
                                                {{ $item->jabatan_nama }}
                                            </a>
                                        </small>
                                    </p>
                                @endif

                                @if ($item->pendidikan)
                                    <p class="card-text">
                                        <small class="text-muted text-purple-1">
                                            <a href="/anggota?category=pendidikan&search={{ $item->pendidikan }}">
                                                {{ $item->pendidikan }}</a>
                                        </small>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {!! $users->links() !!}
        </div>
    </section>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            transition: all .6s cubic-bezier(.25, .8, .25, 1);
        }

        .card-main:hover {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.25), 0 4px 4px rgba(0, 0, 0, 0.22);
        }

        .input-light {
            background-color: #eef2f6 !important;
            border: 0 !important;
        }
    </style>
@endsection
@section('javascript')
    {{-- mansory --}}
    <script src="{{ asset_admin('plugins/mansory.min.js', name: 'sash') }}"></script>
    <script>
        let meta_list_is_edit = true;
        const meta_list = new Map();
        $(document).ready(function() {
            var msnry = new Masonry(document.querySelector('.grid'), {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer'
            });

            @if ($is_filter)
                setTimeout(() => {
                    $('.accordion__button').click();
                }, 2000);
            @endif
        });
    </script>
@endsection
