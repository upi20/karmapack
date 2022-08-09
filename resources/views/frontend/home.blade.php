@extends('templates.frontend.master')
@section('udnder_header')
    <section class="masthead -type-1 pt-60">
        <div class="masthead__bg">
            <img src="{{ asset('assets/templates/frontend/images/other/hero.png') }}" alt="image">
        </div>
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title text-white ">Visi dan Misi {{ $periode->nama }}</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div data-anim-wrap class="row justify-between items-end">
                    <div class="container-xl">
                        <div class="cta text-center p-0 m-0" style="max-width: none;">
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <h4 class="section-title h6 mb-3 text-light">Visi</h4>
                                    <p>{!! $periode->visi !!} </p>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <h4 class="section-title h6 mb-3 text-light">Misi</h4>
                                    <p> {!! $periode->misi !!}</p>
                                </div>
                            </div>
                            <br>
                            <p class="text-light"><strong>Semboyan KARMAPACK:</strong> Manusia
                                Yang memiliki pribadi yang kokoh ajeg atau seimbang dalam berifikir, merasa dan bertindak.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <svg class="svg-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="svg-waves__parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" />
                    <use xlink:href="#gentle-wave" x="48" y="3" />
                    <use xlink:href="#gentle-wave" x="48" y="5" />
                    <use xlink:href="#gentle-wave" x="48" y="7" />
                </g>
            </svg>
    </section>
    @if ($anggota->count())
        <section class="hero-carousel py-5">
            <div class="container-xl d-lg-flex justify-content-between py-30 pt-60">
                <h4 class="section-title text-center  my-20">
                    <a class="text-dark" href="{{ route('about.kepengurusan.struktur') }}">Kenali Kami Lebih Dekat</a>
                </h4>
                <h6 class="text-center text-primary my-20">
                    <a href="{{ route('about.kepengurusan.struktur') }}">Struktur Kepengurusan</a>
                </h6>
            </div>
            <div class="row post-carousel-featured post-carousel w-100 px-0 mx-0">
                @foreach ($anggota as $a)
                    <div class="post featured-post-md">
                        <div class="details clearfix">
                            <h4 class="post-title my-1"><a
                                    href="{{ $a->username ? url($a->username) : route('anggota.id', $a->id) }}">{{ $a->name }}</a>
                            </h4>
                            <h6 class="text-white fw-bold my-1">{{ $a->jabatan }}</h6>
                        </div>

                        <a href="{{ $a->username ? url($a->username) : route('anggota.id', $a->id) }}">
                            <div class="thumb rounded">
                                @if ($a->utama == 0)
                                    <a href="{{ route('about.kepengurusan.bidang', $a->parent_slug) }}"
                                        class="category-badge position-absolute">
                                        @if ($a->singkatan)
                                            {{ $a->singkatan }}
                                        @else
                                            {{ $a->parent }}
                                        @endif
                                    </a>
                                @endif

                                <div class="inner data-bg-image" data-bg-image="{{ $a->foto }}"
                                    style="background-position: top;"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection

@section('content')
    <div class="container-xl">
        <h4 class="section-title text-center py-30">Daftar artikel terbaru</h4>
        @if ($tag_selected)
            <a href="{{ url('') }}" type="button" class="btn btn-default my-3">
                Tag: {{ $tag_selected->nama }} <span><i class="fas fa-times ms-2"></i></span>
            </a>
        @endif
        @if ($kategori_selected)
            <a href="{{ url('') }}" type="button" class="btn btn-default my-3">
                Kategori: {{ $kategori_selected->nama }} <span><i class="fas fa-times ms-2"></i></span>
            </a>
        @endif
        <div class="row pb-90">
            <div class="col-lg-8">
                <div class="row gy-4">
                    @foreach ($articles as $a)
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered bg-white shadow-sm">
                                <div class="thumb top-rounded">
                                    @if ($a->kategori)
                                        <a href="{{ url("?kategori=$a->kategori_slug") }}"
                                            class="category-badge position-absolute" title="Kategori {{ $a->kategori }}">
                                            {{ $a->kategori }}
                                        </a>
                                    @elseif ($a->tag)
                                        <a href="{{ url("?tag=$a->tag_slug") }}" class="category-badge position-absolute"
                                            title="Tag {{ $a->tag }}">
                                            {{ $a->tag }}
                                        </a>
                                    @endif

                                    @php
                                        $get_id_yt = \App\Helpers\Frontend\Template\Master::checkImageYoutube($a->detail);
                                        $youtube = $get_id_yt ? true : false;
                                        $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . $get_id_yt . '/sddefault.jpg';
                                    @endphp
                                    @if ($youtube)
                                        <span class="post-format">
                                            <i class="fab fa-youtube"></i>
                                        </span>
                                    @endif
                                    <a href="{{ route('artikel', $a->slug) }}">
                                        <div class="inner">

                                            <img src="{{ $foto }}" alt="{{ $a->nama }}"
                                                style="width: 100%; height: 300px; object-fit: cover;" />

                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a
                                                href="{{ $a->user_username ? url($a->user_username) : route('anggota.id', $a->user_id) }}">
                                                <img src="{{ asset("$image_folder_user/$a->user_foto") }}"
                                                    onerror="this.src='{{ asset($image_default_user) }}';this.onerror='';"
                                                    class="author"
                                                    style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                                    alt="{{ $a->user }}" />
                                                {{ $a->user }}
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            {{ date_format(date_create($a->date), 'd M Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3">
                                        <a href="{{ route('artikel', $a->slug) }}">
                                            {{ $a->nama }}
                                        </a>
                                    </h5>
                                    <p class="excerpt mb-0">{{ $a->excerpt }}</p>
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://www.facebook.com/sharer.php?u={{ route('artikel', $a->slug) }}"
                                                    title="Share To Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?text={{ route('artikel', $a->slug) }} {{ $a->nama }}"
                                                    title="Share To Whatsapp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://twitter.com/share?url={{ route('artikel', $a->slug) }}&text={{ $a->nama }}"
                                                    title="Share To Twitter">
                                                    <i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $a->slug) }}&title={{ $a->nama }}&summary={{ $a->excerpt }}"
                                                    title="Share To Linkedin">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://pinterest.com/pin/create/button/?url={{ route('artikel', $a->slug) }}&media={{ asset($a->foto) }}&description={{ $a->nama }}"
                                                    title="Share To Pinterest">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="https://telegram.me/share/url?url={{ route('artikel', $a->slug) }}&text={{ $a->nama }}"
                                                    title="Share To Telegram">
                                                    <i class="fab fa-telegram-plane"></i>
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a target="_blank"
                                                    href="mailto:?subject={{ $a->nama }}&body=Check out this site: {{ route('artikel', $a->slug) }}"
                                                    title="Share by Email';" title="Share Via Email">
                                                    <i class="far fa-envelope"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($pagination)
                    <nav class="py-30">
                        <ul class="pagination justify-content-center">
                            {!! $pagination !!}
                        </ul>
                    </nav>
                @endif

            </div>
            <div class="col-lg-4 pb-50">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->
                    <div class="widget rounded bg-white shadow-sm">
                        <div class="widget-about data-bg-image text-center"
                            data-bg-image="{{ asset('assets/templates/frontend/images/map-bg.png') }}">
                            <h3 class="widget-title">{{ $periode->nama }}</h3>
                            <br>{{ $periode->slogan }}</p>
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                @foreach ($list_sosmed as $sosmed)
                                    <li class="list-inline-item">
                                        <a href="{{ $sosmed['url'] }}" title="{{ $sosmed['nama'] }}" target="_blank">
                                            <i class="{{ $sosmed['icon'] }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Popular Posts</h3>
                            <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                                alt="wave" />
                        </div>
                        <div class="widget-content">
                            @foreach ($top_article as $k => $a)
                                <!-- post -->
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $k + 1 }}</span>
                                        <a href="{{ route('artikel', $a->slug) }}">
                                            <div class="inner">
                                                @php
                                                    $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . \App\Helpers\Frontend\Template\Master::checkImageYoutube($a->detail) . '/sddefault.jpg';
                                                @endphp
                                                <img src="{{ $foto }}" alt="{{ $a->nama }}"
                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a
                                                href="{{ route('artikel', $a->slug) }}">{{ $a->nama }}</a>
                                        </h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">
                                                {{ date_format(date_create($a->date), 'd M Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Explore Topics</h3>
                            <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                                alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                @foreach ($categories as $kategori)
                                    <li><a href="{{ url("?kategori=$kategori->slug") }}"
                                            class="{{ $kategori_selected ? ($kategori_selected->slug == $kategori->slug ? 'text-primary' : '') : '' }}">
                                            {{ $kategori->nama }}
                                        </a>
                                        <span>({{ $kategori->artikel }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Tag Clouds</h3>
                            <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                                alt="wave" />
                        </div>
                        <div class="widget-content">
                            @foreach ($tags as $tag)
                                <a href="{{ url("?tag=$tag->slug") }}"
                                    class="tag {{ $tag_selected ? ($tag_selected->slug == $tag->slug ? 'text-primary' : '') : '' }}">
                                    {{ $tag->nama }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
