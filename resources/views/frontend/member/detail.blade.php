@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{ $model->name }}</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > <a href="{{ route('anggota') }}"
                        class="mx-1">Anggota</a> > Detail
                </div>
            </div>
        </div>
    </section>
    <section class="main-content mt-3">
        <div class="container-xl">
            <form class="d-flex search-form pt-3" method="GET" action="{{ route('anggota') }}">
                <input class="form-control me-2" type="search" name="search"
                    placeholder="Kata kunci, nama daerah, anggota, email dan lain-lain." aria-label="Search"
                    value="{{ $model->name }}">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>

            <div class="spacer" data-height="45"></div>
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    {{-- basic profile --}}

                    <!-- widget categories -->
                    <div class="widget rounded card-main">
                        <div class="widget-content">
                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                <div class="text-center">
                                    <img alt="avatar"
                                        onerror="this.src='{{ asset('assets/templates/admin/images/profile.png') }}';this.onerror='';"
                                        src="{{ asset('assets/pengurus/profile/' . $model->foto) }}"
                                        class="brround" id="img_profile"
                                        style="height: 120px; width: 120px; object-fit: cover; object-position: center; border-radius: 50%;">
                                    <h5 class="mb-1 h6 mt-2 mb-0 fw-bold">{{ $model->name }}</h5>
                                    @if ($model->username)
                                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ '@' . $model->username }}</p>
                                    @endif
                                </div>
                                <hr>
                                @if ($model->bio)
                                    <span class="fw-bold d-block mt-3">Tentang Saya</span>
                                    <p>{{ $model->bio }}</p>
                                @endif

                                @if ($model->angkatan)
                                    <span class="fw-bold d-block mt-3">Angkatan</span>
                                    <a href="{{ url('anggota?search=' . $model->angkatan) }}">{{ $model->angkatan }}
                                    </a>
                                @endif


                                @if ($model->profesi)
                                    <span class="fw-bold d-block mt-3">Profesi Sekarang</span>
                                    <a href="{{ url('anggota?search=' . $model->profesi) }}">{{ $model->profesi }}
                                    </a>
                                @endif

                                @if ($model->gender)
                                    <span class="fw-bold d-block mt-3">Jenis Kelamin</span>
                                    <a href="{{ url('anggota?search=' . $model->gender) }}">{{ $model->gender }}
                                    </a>
                                @endif

                                @if ($model->alamat_lengkap || $model->province_id || $model->regency_id || $model->district_id || $model->village_id)
                                    <span class="fw-bold d-block mt-3">Alamat</span>
                                    <p class="small">{{ $model->alamat_lengkap }}
                                        @if ($village)
                                            , <a href="{{ url('anggota?search=' . $village->name) }}">{{ $village->name }}
                                            </a>
                                        @endif
                                        @if ($district)
                                            , <a href="{{ url('anggota?search=' . $district->name) }}">{{ $district->name }}
                                            </a>
                                        @endif
                                        @if ($regencie)
                                            , <a href="{{ url('anggota?search=' . $regencie->name) }}">{{ $regencie->name }}
                                            </a>
                                        @endif
                                        @if ($province)
                                            , <a href="{{ url('anggota?search=' . $province->name) }}">{{ $province->name }}
                                            </a>
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="widget-footer">
                            <hr>
                            <label>Share Profile:</label>
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                @php
                                    $user_link = $model->username ? url($model->username) : route('anggota.id', $model->id);
                                @endphp
                                <li class="list-inline-item">
                                    <a target="_blank" href="https://www.facebook.com/sharer.php?u={{ $user_link }}"
                                        title="Share To Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send?text={{ $user_link }} {{ $model->name }}"
                                        title="Share To Whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a target="_blank"
                                        href="https://twitter.com/share?url={{ $user_link }}&text={{ $model->name }}"
                                        title="Share To Twitter">
                                        <i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank"
                                        href="https://www.linkedin.com/shareArticle?mini=true&url={{ $user_link }}&title={{ $model->name }}&summary={{ $model->bio }}"
                                        title="Share To Linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a target="_blank"
                                        href="https://telegram.me/share/url?url={{ $user_link }}&text={{ $model->name }}"
                                        title="Share To Telegram">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a target="_blank"
                                        href="mailto:?subject={{ $model->name }}&body=Check out this site: {{ $user_link }}"
                                        title="Share by Email';" title="Share Via Email">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-6 col-sm-6">
                    <div class="widget rounded card-main">
                        <div class="widget-header">
                            <h3 class="widget-title">Kontak</h3>
                        </div>
                        <div class="widget-content">
                            Kontak
                        </div>
                    </div>


                    <div class="widget rounded card-main">
                        <div class="widget-header">
                            <h3 class="widget-title">Riwayat Kepengurusan</h3>
                        </div>
                        <div class="widget-content">
                            Riwayat Kepengurusan
                        </div>
                    </div>

                    <div class="widget rounded card-main">
                        <div class="widget-header">
                            <h3 class="widget-title">Riwayat Pendidikan</h3>
                        </div>
                        <div class="widget-content">
                            Riwayat Pendidikan
                        </div>
                    </div>

                    <div class="widget rounded card-main">
                        <div class="widget-header">
                            <h3 class="widget-title">Pengalaman Organisasi</h3>
                        </div>
                        <div class="widget-content">
                            Pengalaman Organisasi
                        </div>
                    </div>

                    <div class="widget rounded card-main">
                        <div class="widget-header">
                            <h3 class="widget-title">Pengalaman Lain</h3>
                        </div>
                        <div class="widget-content">
                            Pengalaman Lain
                        </div>
                    </div>

                </div>
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

    </style>
@endsection
