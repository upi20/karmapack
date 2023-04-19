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
                            <a href="{{ route('tentang.kepengurusan.struktur') }}">Struktur Kepengursan</a>
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
                            <img src="{{ $jabatan->fotoUrl() }}" alt="{{ $jabatan->periode->nama }}"
                                onerror="this.src='{{ asset('assets/image/logo_default.png') }}';this.onerror='';"
                                style="max-width: 500px; width:100%">
                        </div>
                        <div data-anim="slide-up delay-2 ">
                            <h1 class="page-header__title uppercase text-24"> BIDANG {{ strtoupper($jabatan->nama) }}
                                @if ($jabatan->singkatan)
                                    ({{ $jabatan->singkatan }})
                                @endif
                            </h1>
                        </div>
                        <div data-anim="slide-up delay-3">
                            <p class="text-20 fw-500 mt-15">KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL</p>
                        </div>
                        <div data-anim="slide-up delay-4">
                            <p class="text-20 fw-500 mt-15">
                                <a href="{{ route('tentang.kepengurusan.struktur.periode', $jabatan->periode->slug) }}"
                                    class=" text-dark uppercase">
                                    PERIODE {{ $jabatan->periode->dari }} - {{ $jabatan->periode->sampai }}
                                    {{ strtoupper($jabatan->periode->nama) }}
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
                @foreach ($jabatan->pengurus() as $body)
                    @if ($body->list)
                        <tr>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">
                                {{ ucwords(strtolower($body->jabatan->nama)) }}
                            </td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                @if (isset($body->pejabat[0]))
                                    @php
                                        $pejabat = $body->pejabat[0];
                                        $url = $pejabat->anggota->user->username ? url($pejabat->anggota->user->username) : route('anggota.id', $pejabat->anggota->id);
                                    @endphp
                                    <a href="{{ $url }}">
                                        {{ ucwords(strtolower($pejabat->anggota->nama)) }}
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @foreach ($body->pejabat as $key => $pejabat)
                            @if ($key != 0)
                                <tr>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                                    <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                        @php
                                            $url = $pejabat->anggota->user->username ? url($pejabat->anggota->user->username) : route('anggota.id', $pejabat->anggota->id);
                                        @endphp
                                        <a href="{{ $url }}">
                                            {{ ucwords(strtolower($pejabat->anggota->nama)) }}
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500"></td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">
                                {{ ucwords(strtolower($body->jabatan->nama)) }}
                            </td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500">:</td>
                            <td style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                                @php
                                    $pejabat = $body->pejabat;
                                    $url = $pejabat->anggota->user->username ? url($pejabat->anggota->user->username) : route('anggota.id', $pejabat->anggota->id);
                                @endphp
                                <a href="{{ $url }}">{{ ucwords(strtolower($pejabat->anggota->nama)) }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row justify-center text-center">
            <div class="col-auto">
                @if ($jabatan->visi)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Visi</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15"> {!! $jabatan->visi !!}</p>
                    </div>
                @endif

                @if ($jabatan->misi)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Visi</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15"> {!! $jabatan->misi !!}</p>
                    </div>
                @endif

                @if ($jabatan->slogan)
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}" class=" pt-40">
                        <h1 class="page-header__title uppercase text-20">Slogan</h1>
                    </div>
                    <div data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <p class="text-17 fw-500 mt-15">{!! $jabatan->slogan !!}</p>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
