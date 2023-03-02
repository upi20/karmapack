@extends('templates.frontend2.master')
@section('content')
    @php
        $anim = 1;
    @endphp
    <section data-anim="fade" class="breadcrumbs " data-anim-wrap>
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">
                        <div class="breadcrumbs__item " data-anim-child="slide-right delay-{{ $anim++ }}">
                            <a href="{{ route('home') }}">Utama</a>
                        </div>
                        <div class="breadcrumbs__item " data-anim-child="slide-right delay-{{ $anim++ }}">
                            <a href="javascript:void(0)">Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $anim = 1;
    @endphp
    <section class="page-header -type-1" data-anim-wrap>
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1" data-anim-child="slide-left delay-{{ $anim++ }}">
                            <h1 class="page-header__title">Artikel</h1>
                        </div>
                        <div data-anim="slide-up delay-2" data-anim-child="slide-left delay-{{ $anim++ }}">
                            <p class="page-header__text">Daftar artikel dan informasi lainnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $anim = 1;
    @endphp
    <section class="layout-pt-md layout-pb-lg" data-anim-wrap>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row y-gap-30">
                        @foreach ($articles as $a)
                            @php
                                $get_id_yt = check_image_youtube($a->detail);
                                $youtube = $get_id_yt ? true : false;
                                $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';
                            @endphp
                            <div class="col-lg-4 col-md-6" data-anim-child="slide-left delay-{{ $anim++ }}">
                                <a href="blog-single.html" class="blogCard -type-1">
                                    <div class="blogCard__image">
                                        <img class="w-1/1 rounded-8" src="{{ $foto }}" alt="{{ $a->nama }}"
                                            style="width: 100%; height: 250px; object-fit: cover; border-radius:16px">
                                    </div>
                                    <div class="blogCard__content mt-20">
                                        <div class="blogCard__category">
                                            @if ($a->kategori)
                                                <a href="{{ url("artikel?kategori=$a->kategori_slug") }}"
                                                    class="blogCard__category" title="Kategori {{ $a->kategori }}">
                                                    {{ $a->kategori }}
                                                </a>
                                            @elseif ($a->tag)
                                                <a href="{{ url("artikel?tag=$a->tag_slug") }}" class="blogCard__category"
                                                    title="tag {{ $a->tag }}">
                                                    {{ $a->tag }}
                                                </a>
                                            @endif
                                        </div>
                                        <h4 class="blogCard__title text-18 lh-15 fw-500 mt-5">
                                            <a href="{{ route('artikel.detail', $a->slug) }}">{{ $a->nama }}</a>
                                        </h4>
                                        <div class="blogCard__date mt-5">{{ $a->date_full }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    {!! $articles->links() !!}
                </div>

                <div class="col-lg-3">

                    <div data-anim="slide-up delay-3" class="sidebar -blog">
                        <div class="sidebar__item">
                            <h5 class="sidebar__title">Categories</h5>

                            <div class="sidebar-content -list">
                                @foreach ($categories as $kategori)
                                    <a class="{{ $kategori_selected ? ($kategori_selected->slug == $kategori->slug ? 'text-purple-1' : 'text-dark-1') : 'text-dark-1' }}"
                                        href="{{ $kategori_selected ? ($kategori_selected->slug == $kategori->slug ? route('artikel') : url("artikel?kategori=$kategori->slug")) : url("artikel?kategori=$kategori->slug") }}">
                                        {{ $kategori->nama }} <span class="fw-800">({{ $kategori->artikel }})</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="sidebar__title">Tags</h5>

                            <div class="sidebar-content -tags">
                                @foreach ($tags as $tag)
                                    <div class="sidebar-tag">
                                        <a class="text-11 fw-500 {{ $tag_selected ? ($tag_selected->slug == $tag->slug ? 'text-purple-1' : 'text-dark-1') : 'text-dark-1' }}"
                                            href="{{ $tag_selected ? ($tag_selected->slug == $tag->slug ? route('artikel') : url("artikel?tag=$tag->slug")) : url("artikel?tag=$tag->slug") }}">
                                            {{ $tag->nama }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
