@extends('layouts.frontend.master')
@section('content')
    @php
        $anim = 1;
    @endphp
    <section data-anim-wrap class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item " data-anim-child="slide-left delay-{{ $anim++ }}">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>

                        <div class="breadcrumbs__item " data-anim-child="slide-left delay-{{ $anim++ }}">
                            <a href="{{ route('anggota') }}">Anggota</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)" data-anim-child="slide-left delay-{{ $anim++ }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        $anim = 1;
    @endphp
    <section data-anim-wrap class="page-header -type-3 ">
        <div class="page-header__bg bg-purple-1 "></div>
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-8 col-lg-9 col-md-11">
                    <div class="page-header__content">
                        <div class="page-header__img" data-anim-child="slide-left delay-{{ $anim++ }}">
                            <img onerror="this.src='{{ asset('assets/templates/admin/profile.png') }}';this.onerror='';"
                                src="{{ asset('assets/pengurus/profile/' . $model->foto) }}" alt="{{ $model->name }}"
                                style="margin: auto;position: relative;margin: auto;width: 150px;height: 150px;max-height: 150px;border-radius: 150px;object-fit: cover; /* cover, contain, fill, scale-down */object-position: center;-webkit-border-radius: 150px;-moz-border-radius: 150px;">
                        </div>

                        <div class="page-header__info pt-20" data-anim-child="slide-right delay-{{ $anim++ }}">
                            <h1 class="text-30 lh-14 fw-700 text-white">{{ $model->name }}</h1>
                            @if ($model->username)
                                <div class="text-white">{{ '@' . $model->username }}</div>
                            @endif
                            @if ($model->bio)
                                <div class="d-flex x-gap-20 pt-15">
                                    <div class="d-flex items-center text-white">
                                        <i class="fas fa-user-edit mr-10"></i>
                                        <div class="text-13 lh-1">{{ $model->bio }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="d-md-flex items-center mt-30">
                            @if ($model->whatsapp)
                                <a href="https://wa.me/+62{{ $model->whatsapp }}" class="button -md -green-1 text-dark-1"
                                    data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-whatsapp mr-10"></i>Whatsapp
                                </a>
                            @elseif ($model->telepon)
                                <a href="tel:{{ $model->whatsapp }}" class="button -md -green-1 text-dark-1"
                                    data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fas fa-phone mr-10"></i>Telepon
                                </a>
                            @else
                                <p class=" text-white" data-anim-child="slide-left delay-{{ $anim++ }}">Share
                                    Profile: </p>
                            @endif

                            <div class="d-flex items-center x-gap-15 text-white ml-25 social-media-container">
                                @php
                                    $user_link = $model->username ? url($model->username) : route('anggota.id', $model->id);
                                @endphp
                                <a target="_blank" href="https://www.facebook.com/sharer.php?u={{ $user_link }}"
                                    title="Share To Facebook" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank"
                                    href="https://api.whatsapp.com/send?text={{ $user_link }} {{ $model->name }}"
                                    title="Share To Whatsapp" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a target="_blank"
                                    href="https://twitter.com/share?url={{ $user_link }}&text={{ $model->name }}"
                                    title="Share To Twitter" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-twitter"></i></a>
                                <a target="_blank"
                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ $user_link }}&title={{ $model->name }}&summary={{ $model->bio }}"
                                    title="Share To Linkedin" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a target="_blank"
                                    href="https://telegram.me/share/url?url={{ $user_link }}&text={{ $model->name }}"
                                    title="Share To Telegram" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="fab fa-telegram-plane"></i>
                                </a>
                                <a target="_blank"
                                    href="mailto:?subject={{ $model->name }}&body=Check out this site: {{ $user_link }}"
                                    title="Share Via Email" data-anim-child="slide-left delay-{{ $anim++ }}">
                                    <i class="far fa-envelope"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $anim = 1;
    @endphp
    <section data-anim-wrap class="layout-pt-md layout-pb-lg">
        <div class="container bg-light-4 p-2 rounded-16">
            <div class="grid">

                <div class="grid-sizer col-xl-4 col-md-6 col-12"></div>

                <div class="grid-item col-xl-4 col-md-6 col-12 " data-anim-child="slide-left delay-{{ $anim++ }}">
                    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                        <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                            <h2 class="text-17 fw-500">Tentang</h2>
                        </div>
                        <div class="py-30 px-30">
                            <div class="y-gap-40">

                                @if ($model->angkatan)
                                    <div class="ml-10 w-1/1" data-anim-child="slide-left delay-{{ $anim++ }}">
                                        <h4 class="text-15 lh-1 fw-500">Angkatan (Masuk Tahun)</h4>
                                        <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                            <div class="d-flex items-center">
                                                <div class="text-13 lh-1">
                                                    <a href="{{ url('anggota?search=' . $model->angkatan) }}"
                                                        class="text-purple-1">
                                                        {{ $model->angkatan }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($model->profesi)
                                    <div class="ml-10 w-1/1 border-top-light"
                                        data-anim-child="slide-left delay-{{ $anim++ }}">
                                        <h4 class="text-15 lh-1 fw-500">Profesi Sekarang</h4>
                                        <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                            <div class="d-flex items-center">
                                                <div class="text-13 lh-1">
                                                    <a href="{{ url('anggota?search=' . $model->profesi) }}"
                                                        class="text-purple-1">
                                                        {{ $model->profesi }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($model->profesi)
                                    <div class="ml-10 w-1/1 border-top-light"
                                        data-anim-child="slide-left delay-{{ $anim++ }}">
                                        <h4 class="text-15 lh-1 fw-500">Jenis Kelamin</h4>
                                        <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                            <div class="d-flex items-center">
                                                <div class="text-13 lh-1">
                                                    <a href="{{ url('anggota?search=' . $model->gender) }}"
                                                        class="text-purple-1">
                                                        {{ $model->gender }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($model->alamat_lengkap || $model->province_id || $model->regency_id || $model->district_id || $model->village_id)
                                    <div class="ml-10 w-1/1 border-top-light"
                                        data-anim-child="slide-left delay-{{ $anim++ }}">
                                        <h4 class="text-15 lh-1 fw-500">Alamat</h4>
                                        <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                            <div class="d-flex items-center">
                                                <div class="text-13">
                                                    {{ $model->alamat_lengkap }}
                                                    @if ($village)
                                                        , <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $village->name) }}"
                                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                                            {{ $village->name }}
                                                        </a>
                                                    @endif
                                                    @if ($district)
                                                        , <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $district->name) }}"
                                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                                            {{ $district->name }}
                                                        </a>
                                                    @endif
                                                    @if ($regencie)
                                                        , <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $regencie->name) }}"
                                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                                            {{ $regencie->name }}
                                                        </a>
                                                    @endif
                                                    @if ($province)
                                                        , <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $province->name) }}"
                                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                                            {{ $province->name }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                @if ($model->whatsapp || $model->telepon || $contacts->count() > 0)
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Kontak</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @if ($model->telepon)
                                        <div class="ml-10 w-1/1" data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <h4 class="text-15 lh-1 fw-500"><i class="fas fa-phone me-2"></i> Telepon</h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="d-flex items-center">
                                                    <div class="text-13 lh-1">
                                                        <a class="text-purple-1" href="tel:{{ $model->telepon }}"
                                                            target="_blank">
                                                            {{ $model->telepon }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($model->whatsapp)
                                        <div class="ml-10 w-1/1 border-top-light"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <h4 class="text-15 lh-1 fw-500"><i class="fab fa-whatsapp me-2"></i> Whatsapp
                                            </h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="d-flex items-center">
                                                    <div class="text-13 lh-1">
                                                        <a class="text-purple-1"
                                                            href="https://wa.me/+62{{ $model->whatsapp }}"
                                                            target="_blank">
                                                            +62{{ $model->whatsapp }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @foreach ($contacts as $item)
                                        <div class="ml-10 w-1/1 border-top-light"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <h4 class="text-15 lh-1 fw-500">
                                                <i class="{{ $item->icon }} me-2"></i>
                                                {{ $item->kontak }}
                                            </h4>
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="d-flex items-center">
                                                    <div class="text-13 lh-1">
                                                        <a class="text-purple-1" href="{{ $item->value }}"
                                                            target="_blank">
                                                            {{ $item->value }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($kepengurusan->count())
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Riwayat Kepengurusan</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @foreach ($kepengurusan as $k => $item)
                                        <div class="ml-10 w-1/1 {{ $k > 0 ? 'border-top-light' : '' }}"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap">
                                                <div class="d-flex items-center">
                                                    <div class="text-13">
                                                        <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $item->sampai) }}">
                                                            {{ $item->sampai }}
                                                        </a>
                                                        -
                                                        <a class="text-purple-1"
                                                            href="{{ url('anggota?search=' . $item->dari) }}">
                                                            {{ $item->dari }}
                                                        </a>
                                                        |
                                                        @if ($item->bidang)
                                                            <a class="text-purple-1"
                                                                href="{{ route('tentang.kepengurusan.bidang', $item->slug_bidang) }}">
                                                                {{ $item->jabatan }}
                                                                {{ $item->bidang ? '->' . ' ' . $item->bidang : '' }}
                                                            </a>
                                                        @else
                                                            {{ $item->jabatan }}
                                                        @endif
                                                        |
                                                        <a class="text-purple-1"
                                                            href="{{ route('tentang.kepengurusan.struktur.periode', $item->periode_slug) }}">
                                                            {{ $item->periode }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($pendidikan->count())
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Riwayat Pendidikan</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @foreach ($pendidikan as $k => $item)
                                        <div class="ml-10 w-1/1 {{ $k > 0 ? 'border-top-light' : '' }}"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <h4 class="text-15 lh-1 fw-500">
                                                <a class="text-purple-1"
                                                    href="{{ url('anggota?search=') . $item->instansi }}">
                                                    {{ $item->instansi }}
                                                </a>
                                            </h4>
                                            <div class="d-flex flex-column x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="text-13">
                                                    {{ $item->dari }} -
                                                    {{ $item->sampai ? $item->sampai : 'sekarang' }}
                                                </div>
                                                @if ($item->jurusan)
                                                    <div class="text-13">{{ $item->jurusan }}</div>
                                                @endif
                                                @if ($item->keterangan)
                                                    <div class="text-13">{{ $item->keterangan }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($pengalaman_organisasi->count())
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Pengalaman Organisasi</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @foreach ($pengalaman_organisasi as $k => $item)
                                        <div class="ml-10 w-1/1 {{ $k > 0 ? 'border-top-light' : '' }}"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <h4 class="text-15 lh-1 fw-500">
                                                {{ $item->nama }}
                                            </h4>
                                            <div class="d-flex flex-column x-gap-20 y-gap-10 flex-wrap pt-10">
                                                <div class="text-13">
                                                    {{ $item->dari }} -
                                                    {{ $item->sampai ? $item->sampai : 'sekarang' }}
                                                </div>
                                                @if ($item->jabatan)
                                                    <div class="text-13">{{ $item->jabatan }}</div>
                                                @endif
                                                @if ($item->keterangan)
                                                    <div class="text-13">{{ $item->keterangan }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($pengalaman_lain->count())
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Pengalaman Lain</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @foreach ($pengalaman_lain as $k => $item)
                                        <div class="ml-10 w-1/1 {{ $k > 0 ? 'border-top-light' : '' }}"
                                            data-anim-child="slide-left delay-{{ $anim++ }}">
                                            <div class="text-13">{{ $item->pengalaman }}</div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($hobbies->count())
                    <div class="grid-item col-xl-4 col-md-6 col-12"
                        data-anim-child="slide-left delay-{{ $anim++ }}">
                        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100 m-2">
                            <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                                <h2 class="text-17 fw-500">Hobi</h2>
                            </div>
                            <div class="py-30 px-30">
                                <div class="y-gap-40">

                                    @foreach ($hobbies as $k => $item)
                                        <a class="button -dark-1 -rounded text-white"
                                            href="{{ url('anggota?search=' . $item->name) }}"
                                            style="
                                            border-radius: 16px;
                                            padding: 8px;
                                            position: relative;
                                            display: inline-block;
                                            margin-left: 8px !important;
                                            margin-bottom: 8px;
                                            font-size: 0.8em;
                                        "
                                            data-anim-child="slide-left delay-{{ $anim++ }}">{{ $item->name }}
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

@endsection
@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.15), 0 10px 10px rgba(0, 0, 0, 0.20);
        }

        @media only screen and (max-width: 767px) {
            .social-media-container {
                margin-top: 16px;
                margin-left: 0 !important;
            }
        }
    </style>
@endsection

@section('javascript')
    {{-- mansory --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var msnry = new Masonry(document.querySelector('.grid'), {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer'
            });
        });
    </script>
@endsection
