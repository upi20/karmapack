@php
$angkatan = 0;
@endphp
@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Semua Anggota</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > Anggota
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container-xl">
            <form class="d-flex search-form pt-3" method="GET" action="">
                <input class="form-control me-2" type="search" name="search"
                    placeholder="Kata kunci, nama daerah, anggota, email dan lain-lain." aria-label="Search"
                    value="{{ $filters->search }}">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
            <div class="row mt-3">
                @if ($users->total > 0)
                    <h5 class="h5 mb-0">Dari <span class="fw-bold text-primary">{{ $users->from }}</span> Sampai
                        <span class="fw-bold text-primary">{{ $users->to }}</span> | Total
                        <span class="fw-bold text-primary">{{ $users->total }}</span> Data
                    </h5>
                    {{-- list --}}
                    @foreach ($users->data as $item)
                        @if ($item->angkatan != $angkatan)
                            <div class="col-12 mt-5">
                                <h5 class="h5"><a class="text-dark"
                                        href="{{ url('anggota?search=' . $item->angkatan) }}">Angkatan
                                        <span class="fw-bold text-primary">{{ $item->angkatan }}</span></a></h5>
                            </div>
                        @endif
                        <div class="col-sm-6">
                            <div class="card mb-3 card-main">
                                <div class="row g-0">
                                    <div class="col-md-4 p-0 p-0">
                                        <a
                                            href="{{ $item->username ? url($item->username) : route('anggota.id', $item->id) }}">
                                            <img onerror="this.src='{{ asset($image->default) }}';this.onerror='';"
                                                src="{{ asset("$image->folder/$item->foto") }}"
                                                class="img-fluid rounded-start" alt="{{ $item->name }}"
                                                style="height: 100%; width: 100%; object-fit: cover; object-position: center;">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a
                                                href="{{ $item->username ? url($item->username) : route('anggota.id', $item->id) }}">
                                                <h5 class="card-title mt-1 mb-0">{{ $item->name }}</h5>
                                            </a>

                                            @if ($item->whatsapp)
                                                <small class="text-muted d-block">
                                                    <a href="https://api.whatsapp.com/send?phone={{ $item->whatsapp }}">
                                                        <i class="fab fa-whatsapp"></i> +62{{ $item->whatsapp }}
                                                    </a>
                                                </small>
                                            @endif
                                            @if ($item->telepon)
                                                <small class="text-muted d-block">
                                                    <a href="tel:{{ $item->telepon }}">
                                                        <i class="fas fa-phone"></i> {{ $item->telepon }}
                                                    </a>
                                                </small>
                                            @endif

                                            <p class="card-text my-1">
                                                @php
                                                    $province = $item->province ? ', <a href="' . url('anggota?prov=' . $item->province) . '">' . $item->province . '</a>' : '';
                                                    $regencie = $item->regencie ? ', <a href="' . url('anggota?kab=' . $item->regencie) . '">' . $item->regencie . '</a>' : '';
                                                    $district = $item->district ? ', <a href="' . url('anggota?kec=' . $item->district) . '">' . $item->district . '</a>' : '';
                                                    $village = $item->village ? ', <a href="' . url('anggota?desa=' . $item->village) . '">' . $item->village . '</a>' : '';
                                                @endphp
                                                <small class="text-muted">{!! $item->alamat_lengkap . $province . $regencie . $district . $village !!}</small>
                                            </p>

                                            @if ($item->periode_nama)
                                                <hr class="my-1">
                                                <small class="text-muted d-block">
                                                    <a
                                                        href="{{ route('about.kepengurusan.struktur.periode', $item->periode_slug) }}">
                                                        {{ $item->periode_nama }}
                                                    </a>
                                                </small>
                                            @endif

                                            @if ($item->jabatan_nama)
                                                <small class="text-muted d-block">
                                                    <a href="{{ route('about.kepengurusan.bidang', $item->jabatan_slug) }}">
                                                        {{ $item->jabatan_nama }}
                                                    </a>
                                                </small>
                                            @endif
                                            @if ($item->pendidikan)
                                                <p class="card-text">
                                                    <small class="text-muted"><a
                                                            href="/anggota?pendidikan={{ $item->pendidikan }}">{{ $item->pendidikan }}</a></small>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $angkatan = $item->angkatan;
                        @endphp
                    @endforeach
                @endif
            </div>
    </section>


    @if ($pagination)
        <nav>
            <ul class="pagination justify-content-center">
                {!! $pagination !!}
            </ul>
        </nav>
    @else
        <div class="d-flex justify-content-center align-items-center">
            <h6>Data Tidak Tersedia</h6>
        </div>
    @endif
    </div>
@endsection

@section('stylesheet')
    <style>
        .card-main {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            margin: 3px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

    </style>
@endsection
