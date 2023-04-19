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
                            <a href="{{ route('pendaftaran') }}">Pendaftaran</a>
                        </div>

                        {{-- <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">{{ $model->nama }}</a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pb-lg">
        <div id="element"></div>
        @if ($model->status == 1)
            <iframe id="myframe" src="{{ $link }}">
                Memuat…
            </iframe>
        @else
            <div class="d-flex justify-content-center align-items-center">
                <h6>Form Sudah Ditutup</h6>
            </div>
        @endif
    </section>
@endsection

@section('stylesheet')
    <style>
        #myframe {
            height: 100vh;
            width: 100%;
        }
    </style>
@endsection

@section('javascript')
    @if ($model->status == 1)
        <script>
            $('#element').parent().parent().removeClass('mb-5');
            $('#element').parent().parent().removeClass('py-5');
        </script>
    @endif
@endsection
