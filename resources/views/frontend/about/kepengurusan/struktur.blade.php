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
                    <td style="border: 0;">{{ $utama->pejabat->name }}</td>
                </tr>
            @endforeach

            @foreach ($member->bidang as $bidang)
                <tr>
                    <td colspan="4" style="border: 0;">{{ $bidang->header->nama }}</td>
                </tr>

                @foreach ($bidang->body as $body)
                    @if ($body->list)
                        <tr>
                            <td style="border: 0;"></td>
                            <td style="border: 0;">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;">:</td>
                            <td style="border: 0;">
                                @php
                                    echo isset($body->pejabat[0]->name) ? $body->pejabat[0]->name : '';
                                @endphp
                            </td>
                        </tr>
                        @foreach ($body->pejabat as $key => $pejabat)
                            @if ($key != 0)
                                <tr>
                                    <td style="border: 0;"></td>
                                    <td style="border: 0;"></td>
                                    <td style="border: 0;">:</td>
                                    <td style="border: 0;"> {{ $pejabat->name }} </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td style="border: 0;"></td>
                            <td style="border: 0;">{{ $body->jabatan->nama }}</td>
                            <td style="border: 0;">:</td>
                            <td style="border: 0;">{{ $body->pejabat->name }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
