@extends('templates.frontend.master')

@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">
                    {{ $model->nama }}
                    @if ($model->singkatan)
                        ({{ $model->singkatan }})
                    @endif
                </h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > Bidang
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <img src="{{ $model->fotoUrl() }}" alt="{{ $periode->nama }}"
            onerror="this.src='{{ asset('assets/templates/frontend/images/logo/300x300.png') }}';this.onerror='';"
            class="rounded mx-auto d-block">
        <h1 class="h5 text-center text-uppercase text-dark">
            BIDANG {{ $model->nama }}
            @if ($model->singkatan)
                ({{ $model->singkatan }})
            @endif
            <br>
            KELUARGA MAHASISWA DAN PELAJAR CIANJUR KIDUL<br>
            <a href="{{ route('about.kepengurusan.struktur.periode', $periode->slug) }}" class=" text-dark">
                PERIODE {{ $periode->dari }} - {{ $periode->sampai }}
                {{ $periode->nama }}
            </a>
        </h1>

        <table class="table mt-3">
            @foreach ($member_list as $body)
                @if ($body->list)
                    <tr>
                        <td style="border: 0;"></td>
                        <td style="border: 0;">{{ $body->jabatan->nama }}</td>
                        <td style="border: 0;">:</td>
                        <td style="border: 0;">
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
                            <tr>
                                <td style="border: 0;"></td>
                                <td style="border: 0;"></td>
                                <td style="border: 0;">:</td>
                                <td style="border: 0;">
                                    @php
                                        $url = $pejabat->username ? url($pejabat->username) : route('anggota.id', $pejabat->id);
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
                                $url = $pejabat->username ? url($pejabat->username) : route('anggota.id', $pejabat->id);
                            @endphp
                            <a href="{{ $url }}">{{ $pejabat->name }}</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        @if ($model->visi)
            <h3 class="h5 text-center text-uppercase text-dark">Visi</h3>
            {!! $model->visi !!}
        @endif

        @if ($model->misi)
            <h3 class="h5 text-center text-uppercase text-dark">Visi</h3>
            {!! $model->misi !!}
        @endif

        @if ($model->slogan)
            <h3 class="h5 text-center text-uppercase text-dark">Slogan</h3>
            <p class="text-center">
                {!! $model->slogan !!}
            </p>
        @endif
    </div>
@endsection
