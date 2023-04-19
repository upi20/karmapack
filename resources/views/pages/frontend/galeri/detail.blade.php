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
                            <a href="{{ route('galeri') }}">Galeri</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="javascript:void(0)">Detail</a>
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
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">{{ settings()->get('setting.home.galeri_kegiatan.title') }}</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">{{ $model->nama }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pb-lg">
        <iframe id="myframe" src="https://drive.google.com/embeddedfolderview?id={{ $model->id_gdrive }}#grid"></iframe>
        <div class="container-xl">
            <ul class="d-flex">

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://www.facebook.com/sharer.php?u={{ route('artikel', $model->slug) }}"
                        title="Share To Facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://api.whatsapp.com/send?text={{ route('artikel', $model->slug) }} {{ $model->nama }}"
                        title="Share To Whatsapp" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://twitter.com/share?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                        title="Share To Twitter" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $model->slug) }}&title={{ $model->nama }}&summary={{ $model->keterangan }}"
                        title="Share To Linkedin" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://pinterest.com/pin/create/button/?url={{ route('artikel', $model->slug) }}&media={{ asset($model->foto) }}&description={{ $model->nama }}"
                        title="Share To Pinterest" target="_blank">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="https://telegram.me/share/url?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                        title="Share To Telegram" target="_blank">
                        <i class="fab fa-telegram-plane"></i>
                    </a>
                </li>

                <li class="list-inline-item list-style-none me-4">
                    <a href="mailto:?subject={{ $model->nama }}&body=Check out this site: {{ route('artikel', $model->slug) }}"
                        title="Share by Email" target="_blank">
                        <i class="far fa-envelope"></i>
                    </a>
                </li>
            </ul>
        </div>
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
