@extends('layouts.frontend.master')
@section('content')
    <!-- page header -->
    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Pendaftaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row">
                <div class="col-lg-6 mt-30">
                    <div class="card mb-3 card-main">
                        <div class="row g-0">
                            <div class="col-md-4 p-0">
                                <a href="{{ route('pendaftaran.sensus') }}">
                                    <img onerror="this.src='{{ asset('assets/pendaftarans/20220502202741.png') }}';this.onerror='';"
                                        src="{{ asset('assets/pendaftarans/20220502202741.png') }}"
                                        class="img-fluid rounded-start" alt="Sensus Anggota"
                                        style="height: 100%; width: 100%; object-fit: cover; object-position: center; border-radius: 18px 0 0 18px">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-3">
                                    <a href="{{ route('pendaftaran.sensus') }}">
                                        <h5 class="card-title mt-1">
                                            Sensus Anggota
                                        </h5>
                                    </a>
                                    <hr class="my-1">
                                    <p>
                                        Sensus anggota bertujuan untuk mendokumentasikan data anggota dan untuk mempermudah
                                        komunikasi pengurus terhadap anggota yang masih menjabat maupun alumni.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($gforms as $gform)
                    <div class="col-lg-6 mt-30">
                        <div class="card mb-3 card-main">
                            <div class="row g-0">
                                <div class="col-md-4 p-0">
                                    <a href="{{ route('frontend.gform.detail', $gform->slug) }}">
                                        <img onerror="this.src='{{ $gform->fotoUrlDefault() }}';this.onerror='';"
                                            src="{{ $gform->fotoUrl() }}" class="img-fluid rounded-start"
                                            alt="{{ $gform->nama }}"
                                            style="height: 100%; width: 100%; object-fit: cover; object-position: center; border-radius: 18px 0 0 18px">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-3">
                                        <a href="{{ route('frontend.gform.detail', $gform->slug) }}">
                                            <h5 class="card-title mt-1">{{ $gform->nama }}</h5>
                                        </a>
                                        <hr class="my-1">
                                        <p>
                                            {{ $gform->deskripsi }}
                                        </p>
                                        <p>
                                            {{ date_format(date_create($gform->dari), 'd M Y') }} s/d
                                            {{ date_format(date_create($gform->sampai), 'd M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
            border-radius: 18px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
@endsection
