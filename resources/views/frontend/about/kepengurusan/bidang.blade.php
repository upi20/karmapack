@extends('templates.frontend2.master')

@section('content')
    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Home</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('about.kepengurusan.struktur') }}">Struktur Kepengursan</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Detail</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-header -type-1" data-anim-wrap>
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1 " class="mb-30">
                            <img src="{{ $model->fotoUrl() }}" alt="{{ $periode->nama }}"
                                onerror="this.src='{{ asset(settings()->get(set_front('app.foto_light_mode'))) }}';this.onerror='';"
                                style="max-width: 500px; width:100%">
                        </div>
                        <div data-anim="slide-up delay-2 ">
                            <h1 class="page-header__title uppercase text-24"> BIDANG {{ $model->nama }}
                                @if ($model->singkatan)
                                    ({{ $model->singkatan }})
                                @endif
                            </h1>
                        </div>
                        <div data-anim="slide-up delay-3">
                            <p class="text-20 fw-500 mt-15">KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL</p>
                        </div>
                        <div data-anim="slide-up delay-4">
                            <p class="text-20 fw-500 mt-15">
                                <a href="{{ route('about.kepengurusan.struktur.periode', $periode->slug) }}"
                                    class=" text-dark uppercase">
                                    PERIODE {{ $periode->dari }} - {{ $periode->sampai }}
                                    {{ $periode->nama }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container layout-pb-lg" data-anim-wrap>
        @php
            $anim_sequence = 2;
        @endphp
        <div class="d-flex justify-content-centers sm:pl-0 md:pl-20 xl:pl-40 pb-60">
            <table class="table" style="width:100%">
                @foreach ($member_list as $body)
                    @if ($body->list)
                        <tr data-anim="slide-up delay-{{ $anim_sequence++ }}">
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                @if (isset($body->pejabat[0]))
                                    @php
                                        $pejabat = $body->pejabat[0];
                                        $url = $pejabat->username ? url($pejabat->username) : route('anggota.id', $pejabat->id);
                                    @endphp
                                    <a href="{{ $url }}">{{ $pejabat->name }}</a>
                                @endif
                            </td>
                        </tr>
                        @foreach ($body->pejabat as $key => $pejabat)
                            @if ($key != 0)
                                <tr data-anim="slide-up delay-{{ $anim_sequence++ }}">
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                        @php
                                            $url = $pejabat->username ? url($pejabat->username) : route('anggota.id', $pejabat->id);
                                        @endphp
                                        <a href="{{ $url }}">{{ $pejabat->name }}</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr data-anim="slide-up delay-{{ $anim_sequence++ }}">
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                @php
                                    $pejabat = $body->pejabat;
                                    $url = $pejabat->username ? url($pejabat->username) : route('anggota.id', $pejabat->id);
                                @endphp
                                <a href="{{ $url }}">{{ $pejabat->name }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row justify-center text-center">
            <div class="col-auto">
                @if ($model->visi)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Visi</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15"> {!! $model->visi !!}</p>
                    </div>
                @endif

                @if ($model->misi)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Visi</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15"> {!! $model->misi !!}</p>
                    </div>
                @endif

                @if ($model->slogan)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Slogan</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15">{!! $model->slogan !!}</p>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
