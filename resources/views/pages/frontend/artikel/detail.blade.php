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
                            <a href="{{ route('artikel') }}">Artikel</a>
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
                <div class="col-auto">
                    <div data-anim="slide-up delay-1">
                        <h1 class="page-header__title lh-14">{{ $model->nama }}</h1>
                        @php
                            $user = $model->user;
                        @endphp
                        <div class="row">
                            <div class="col-auto">
                                <a class="d-flex page-header__text"
                                    href="{{ $user->username ? url($user->username) : route('anggota.id', $user->id) }}">
                                    <img src="{{ $user->anggota->fotoUrl() }}"
                                        onerror="this.src='{{ $user->anggota->fotoUrlDefault() }}';this.onerror='';"
                                        class="author"
                                        style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                        alt="{{ $user->name }}" />

                                    <span style="margin-left: 8px" class="text-purple-1">
                                        {{ $user->name }}
                                    </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <p class="page-header__text">{{ $model->dateFormat() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="blogSection">
                <div class="blogCard">
                    <div class="row justify-center">
                        <div class="col-xl-8 col-lg-9 col-md-11">
                            <div class="blogCard__content">
                                {!! $model->detail !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-center pt-30">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="row y-gap-20 justify-between items-center">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="lh-1 text-dark-1 fw-500 mr-20">Share</div>
                                    <div class="d-flex x-gap-15">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer.php?u={{ route('artikel', $model->slug) }}"
                                            title="Share To Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a target="_blank"
                                            href="https://api.whatsapp.com/send?text={{ route('artikel', $model->slug) }} {{ $model->nama }}"
                                            title="Share To Whatsapp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <a target="_blank"
                                            href="https://twitter.com/share?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                            title="Share To Twitter">
                                            <i class="fab fa-twitter"></i></a>
                                        <a target="_blank"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $model->slug) }}&title={{ $model->nama }}&summary={{ $model->excerpt }}"
                                            title="Share To Linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a target="_blank"
                                            href="https://pinterest.com/pin/create/button/?url={{ route('artikel', $model->slug) }}&media={{ asset($model->foto) }}&description={{ $model->nama }}"
                                            title="Share To Pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                        <a target="_blank"
                                            href="https://telegram.me/share/url?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                            title="Share To Telegram">
                                            <i class="fab fa-telegram-plane"></i>
                                        </a>
                                        <a target="_blank"
                                            href="mailto:?subject={{ $model->nama }}&body=Check out this site: {{ route('artikel', $model->slug) }}"
                                            title="Share by Email';" title="Share Via Email">
                                            <i class="far fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="row x-gap-10 y-gap-10">
                                    @foreach ($model->tags as $tag)
                                        <div class="col-auto">
                                            <a href="{{ url("artikel?tag=$tag->slug") }}"
                                                class="badge -sm -light-3 text-11 text-dark-1">
                                                {{ $tag->nama }}
                                            </a>
                                        </div>
                                    @endforeach
                                    @foreach ($model->categories as $kategori)
                                        <div class="col-auto">
                                            <a href="{{ url("artikel?kategori=$kategori->slug") }}"
                                                class="badge -sm -light-3 text-11 text-dark-1">
                                                {{ $kategori->nama }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-center pt-30">
                    <div class="col-xl-8 col-lg-9 col-md-11 border-top-light pt-30">
                        <!-- post comments -->
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                            var disqus_config = function() {
                                this.page.url = '{{ Request::url() }}'; // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier =
                                    '{{ $model->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document,
                                    s = d.createElement('script');
                                s.src = 'https://karmapack.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the
                            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                        </noscript>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-light-4">
        <div data-anim-wrap class="container">

            <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">Related Posts</h2>
                        <p class="sectionTitle__text ">List more related posts</p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 pt-60">

                @foreach ($top_article as $k => $a)
                    <div class="col-lg-3 col-md-6">
                        <div data-anim-child="slide-up delay-{{ $k + 2 }}" class="blogCard -type-1">
                            <div class="blogCard__image">
                                @php
                                    $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . check_image_youtube($a->detail) . '/sddefault.jpg';
                                @endphp
                                <img src="{{ $foto }}" alt="{{ $a->nama }}"
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius:16px">
                            </div>
                            <div class="blogCard__content mt-20">
                                <a href="{{ route('artikel', $a->slug) }}">
                                    <h4 class="blogCard__title text-17 lh-15 mt-5" style="color: var(--color-purple-1);">
                                        {{ $a->nama }}
                                    </h4>
                                </a>
                                <div class="blogCard__date text-14 mt-5">
                                    {{ date_format(date_create($a->date), 'd F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
