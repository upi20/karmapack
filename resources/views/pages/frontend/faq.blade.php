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
                            <a href="{{ route('kontak') }}">Kontak</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="#">FAQ</a>
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
                            <h1 class="page-header__title">{{ settings()->get('setting.contact.faq.title') }}</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">{{ settings()->get('setting.contact.faq.sub_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($faqs->count())
        <section class="layout-pt-md layout-pb-lg">
            <div data-anim-wrap class="container">
                <div data-anim="slide-up delay-3" class="row justify-center">

                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                        @foreach ($faqs as $v)
                            @if ($v->type == 2)
                                <a href="{{ $v->link }}">
                            @endif
                            <div class="accordion__item">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        @if ($v->type == 2)
                                            <div class="icon" data-feather="send"></div>
                                            <div class="icon" data-feather="send"></div>
                                        @else
                                            <div class="icon" data-feather="plus"></div>
                                            <div class="icon" data-feather="minus"></div>
                                        @endif
                                    </div>
                                    <span class="text-17 fw-500 text-dark-1">{{ $v->nama }}</span>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__content__inner">
                                        <p>{{ $v->jawaban }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($v->type == 2)
                                </a>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @endif
@endsection
