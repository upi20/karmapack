@extends('templates.frontend.master')

@section('content')
    <div class="container">
        <img src="{{ $periode->fotoUrl() }}" alt="{{ $periode->nama }}" class="rounded mx-auto d-block">
        <h1 class="h5 text-center text-uppercase">STRUKTUR KEPENGURUSAN<br>KELUARGA MAHASISWA DAN PELAJAR CIANJUR
            KIDUL<br>PERIODE {{ $periode->dari }} - {{ $periode->sampai }}<br> {{ $periode->nama }}</h1>

        <table class="table mt-3">
            @foreach ($member->utama as $utama)
                <tr>
                    <td style="border: 0;" colspan="2">{{ $utama->jabatan->nama }}</td>
                    <td style="border: 0; max-width: 5px;">:</td>
                    <td style="border: 0;">
                        @php
                            $url = $utama->pejabat->username ? url($utama->pejabat->username) : url('profile') . '/' . $utama->pejabat->id;
                        @endphp
                        <a href="{{ $url }}">{{ $utama->pejabat->name }}</a>
                    </td>
                </tr>
            @endforeach

            @foreach ($member->bidang as $bidang)
                <tr>
                    <td colspan="4" style="border: 0;"><a href="{{ route('bidang', $bidang->header->slug) }}">
                            {{ $bidang->header->nama }}
                        </a>
                    </td>
                </tr>

                @foreach ($bidang->body as $body)
                    @if ($body->list)
                        <tr>
                            <td style="border: 0;"></td>
                            <td style="border: 0;">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;">:</td>
                            <td style="border: 0;">
                                @if (isset($body->pejabat[0]))
                                    @php
                                        $pejabat = $body->pejabat[0];
                                        $url = $pejabat->username ? url($pejabat->username) : url('profile') . '/' . $pejabat->id;
                                    @endphp
                                    <a href="{{ $url }}">{{ $pejabat->name }}</a>
                                @endif
                            </td>
                        </tr>
                        @foreach ($body->pejabat as $key => $pejabat)
                            @if ($key != 0)
                                <tr>
                                    <td style="border: 0;"></td>
                                    <td style="border: 0;"></td>
                                    <td style="border: 0;">:</td>
                                    <td style="border: 0;">
                                        @php
                                            $url = $pejabat->username ? url($pejabat->username) : url('profile') . '/' . $pejabat->id;
                                        @endphp
                                        <a href="{{ $url }}">{{ $pejabat->name }}</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td style="border: 0;"></td>
                            <td style="border: 0;">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;">:</td>
                            <td style="border: 0;">
                                @php
                                    $pejabat = $body->pejabat;
                                    $url = $pejabat->username ? url($pejabat->username) : url('profile') . '/' . $pejabat->id;
                                @endphp
                                <a href="{{ $url }}">{{ $pejabat->name }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
