@extends('templates.frontend.master')
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
                @if (!$pendaftaran->isEmpty())
                    @foreach ($pendaftaran as $item)
                        <div class="col-lg-6 mt-30">
                            <div class="card mb-3 card-main">
                                <div class="row g-0">
                                    @php
                                        $route = '#';
                                        switch ($item->data_type) {
                                            case 1:
                                                $route = Route::has($item->route) ? route($item->route) : url('');
                                                break;

                                            case 2:
                                                $route = route('frontend.gform.detail', $item->slug);
                                                break;

                                            default:
                                                $route = 'javascript:void(0)';
                                                break;
                                        }
                                    @endphp
                                    <div class="col-md-4 p-0">
                                        <a href="{{ $route }}">
                                            <img onerror="this.src='{{ asset($image_default) }}';this.onerror='';"
                                                src="{{ $item->foto }}" class="img-fluid rounded-start"
                                                alt="{{ $item->nama }}"
                                                style="height: 100%; width: 100%; object-fit: cover; object-position: center; border-radius: 18px 0 0 18px">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-3">
                                            <a href="{{ $route }}">
                                                <h5 class="card-title mt-1">{{ $item->nama }}</h5>
                                            </a>
                                            <hr class="my-1">
                                            <p>
                                                {{ $item->deskripsi }}
                                            </p>
                                            <p>
                                                {{ date_format(date_create($item->dari), 'd M Y') }} s/d
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
            border-radius: 18px;
        }

        .card-main:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
@endsection
