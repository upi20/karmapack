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
                            <a href="javascript:void(0)">Struktur Kepengursan</a>
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
                        <div data-anim="slide-up delay-1 " class="mb-30">
                            <img src="{{ $periode->fotoUrl() }}" alt="{{ $periode->nama }}" class="rounded mx-auto d-block"
                                style="max-width: 500px;">
                        </div>
                        <div data-anim="slide-up delay-2">
                            <h1 class="page-header__title">STRUKTUR KEPENGURUSAN<br>KELUARGA MAHASISWA DAN PELAJAR CIANJUR
                                KIDUL</h1>
                        </div>
                        <div data-anim="slide-up delay-3">
                            <p class="text-24 fw-500 mt-15">PERIODE {{ $periode->dari }} - {{ $periode->sampai }}
                                {{ $periode->nama }}</p>
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
        <div class="d-flex justify-content-centers sm:pl-0 md:pl-20 xl:pl-40">
            <table class="table" style="width:100%">
                @foreach ($member->utama as $utama)
                    <tr data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <td style="border: 0;  " class="py-10 px-3 text-18 fw-500" colspan="2">
                            {{ $utama->jabatan->nama }}</td>
                        <td style="border: 0; max-width: 5px; " class="py-10 px-3 text-18 fw-500">:</td>
                        <td style="border: 0; " class="py-10 px-3 text-18 fw-500 text-purple-1">
                            @php
                                $url = $utama->pejabat->username ? url($utama->pejabat->username) : route('anggota.id', $utama->pejabat->id);
                            @endphp
                            <a href="{{ $url }}">{{ $utama->pejabat->name }}</a>
                        </td>
                    </tr>
                @endforeach

                @foreach ($member->bidang as $bidang)
                    <tr data-anim="slide-up delay-{{ $anim_sequence++ }}">
                        <td colspan="4" style="border: 0;" class="py-10 px-3 text-18 fw-500 text-purple-1">
                            <a href="{{ route('about.kepengurusan.bidang', $bidang->header->slug) }}">
                                {{ $bidang->header->nama }}
                            </a>
                        </td>
                    </tr>

                    @foreach ($bidang->body as $body)
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
                @endforeach
            </table>
        </div>
    </section>
@endsection
