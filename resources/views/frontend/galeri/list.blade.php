@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Galeri Kegiatan</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > Galeri
                </div>
            </div>
        </div>
    </section>
    <section class="main-content mt-4">
        <div class="container-xl">
            <form class="d-flex search-form pt-3">
                <input class="form-control me-2" type="search" name="search"
                    placeholder="Masukan kata Kunci dan tekan enter ..." aria-label="Search"
                    value="{{ $filters->search }}">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </section>
    <section class="main-conten mt-2">
        <div class="container-xl">
            <div class="row">
                @foreach ($galeries as $galery)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('galeri.detail', $galery->slug) }}">
                            <div class="card m-2 card-main">
                                <img src="{{ "https://drive.google.com/uc?export=view&id={$galery->foto_id_gdrive}" }}"
                                    class="card-img-top" alt="{{ $galery->nama }}"
                                    style="max-width: 100%; height: auto; max-height: 200px; object-fit: cover; object-position: center;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $galery->nama }}</h5>
                                    <p class="card-text text-dark">{{ $galery->keterangan }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @if (!$galeries)
                <div class="d-flex justify-content-center align-items-center">
                    <h6>Data Tidak Tersedia</h6>
                </div>
            @endif
        </div>
    </section>
    @if ($pagination)
        <nav>
            <ul class="pagination justify-content-center">
                {!! $pagination !!}
            </ul>
        </nav>
    @endif
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
