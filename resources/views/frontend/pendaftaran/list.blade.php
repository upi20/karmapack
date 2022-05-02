@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">List Pendaftaran</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > Pendaftaran
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container-xl">
            <div class="row mt-3">
                @if (!$pendaftaran->isEmpty())
                    @foreach ($pendaftaran as $item)
                        <div class="col-lg-6">
                            <div class="card mb-3 card-main">
                                <div class="row g-0">
                                    <div class="col-md-4 p-0 p-0">
                                        <a href="{{ Route::has($item->route) ? route($item->route) : url('') }}">
                                            <img onerror="this.src='{{ asset($image->default) }}';this.onerror='';"
                                                src="{{ asset("$image->folder/$item->foto") }}"
                                                class="img-fluid rounded-start" alt="{{ $item->nama }}"
                                                style="height: 100%; width: 100%; object-fit: cover; object-position: center;">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="{{ Route::has($item->route) ? route($item->route) : url('') }}">
                                                <h5 class="card-title mt-1 mb-0">{{ $item->nama }}</h5>
                                            </a>
                                            <hr class="my-1">
                                            <p>
                                                {{ $item->deskripsi }}
                                            </p>
                                            <p>
                                                {{ date_format(date_create($item->dari), 'd M Y') }} -
                                                {{ date_format(date_create($item->sampai), 'd M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center align-items-center">
                        <h6>Data Tidak Tersedia</h6>
                    </div>
                @endif
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
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

    </style>
@endsection
