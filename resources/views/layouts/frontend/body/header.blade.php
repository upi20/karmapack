<header data-anim="fade" data-add-bg="" class="header -type-4 -shadow bg-white js-header"
    style="box-shadow: 0px 0px 20px 0px #404f680d">
    @if ($notifikasi)
        @foreach ($notifikasi as $v)
            <div class="bg-dark-1 py-10 notification_top">
                <div class="container  d-flex justify-content-between">
                    <p class="text-white">{{ $v->deskripsi }}
                        @if ($v->link)
                            <a href="{{ $v->link }}" class="text-purple-1 fw-bold">{{ $v->link_nama }}</a>
                        @endif
                    </p>
                    <span class="text-white fw-bold" style="cursor: pointer"
                        onclick="$(this).parent().parent().fadeOut()"> x</span>
                </div>
            </div>
        @endforeach
    @endif

    <div class="header__container py-10">
        <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="header-left d-flex items-center">

                    {{-- logo white --}}
                    <div class="header__logo pr-30 xl:pr-20 md:pr-0">
                        <a href="{{ url('') }}">
                            <img data-src="{{ asset(settings()->get(set_front('app.foto_dark_landscape_mode'))) }}"
                                class="lazy" alt="logo" style="max-height: 50px;">
                        </a>
                    </div>

                    <div class="header-menu js-mobile-menu-toggle pl-30 xl:pl-20">
                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>

                            @if (auth()->user())
                                <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                    <a href="{{ route('dashboard') }}" class="text-dark-1 ml-30">Halaman Utama</a>
                                </div>
                            @else
                                <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                    <a href="{{ route('login') }}" class="text-dark-1 ml-30">Masuk</a>
                                </div>
                            @endif
                            <div class="menu js-navList">
                                <ul class="list-style-none menu__nav text-dark-1 -is-active">
                                    {!! navbar_menu_front($page_attr->navigation) !!}
                                </ul>
                            </div>

                            {{-- footer mobile --}}
                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                                <div class="mobile-footer__number">
                                    <div class="text-17 fw-500 text-dark-1">Hubungi Kami</div>
                                    <div class="text-17 fw-500 text-purple-1">
                                        <a href="tel:+6285798132505">+6285798132505</a>
                                    </div>
                                </div>

                                <div class="lh-2 mt-10">
                                    <div>Cianjur Selatan,
                                        <br> Jawa barat 43272, Indonesia.
                                    </div>
                                    <div>
                                        <a href="mailto:help@karmapack.id">help@karmapack.id</a>
                                    </div>
                                </div>

                                <div class="mobile-socials mt-10">
                                    @foreach ($getSosmed_val as $sosmed)
                                        <a href="{{ $sosmed['url'] }}"
                                            class="d-flex items-center justify-center rounded-full size-40"
                                            target="_blank">
                                            <i class="{{ $sosmed['icon'] }}"></i>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                            <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                                <div class="icon-close text-dark-1 text-16"></div>
                            </div>
                        </div>

                        <div class="header-menu-bg"></div>
                    </div>

                </div>
            </div>


            <div class="col-auto">
                <div class="header-right d-flex items-center">
                    <div class="header-right__icons text-white d-flex items-center">
                        {{-- search --}}
                        <div class="relative -after-border pl-20 sm:pl-15">
                            <div class="pr-20 sm:pr-15">
                                <button class="d-flex items-center text-dark-1" data-el-toggle=".js-search-toggle">
                                    <i class="text-20 icon icon-search"></i>
                                </button>

                                <div class="toggle-element js-search-toggle">
                                    <div class="header-search pt-90 bg-white shadow-4" style="height: 300px">
                                        <div class="container">
                                            <div class="header-search__field">
                                                <form action="{{ route('anggota') }}" id="search-form">
                                                    <div class="icon icon-search text-dark-1"
                                                        onclick="document.getElementById('search-form').submit()"
                                                        style="cursor: pointer"></div>
                                                    <input type="search"
                                                        class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                        placeholder="Kata kunci pencarian anggota." name="search"
                                                        value="{{ request()->query('search') }}">

                                                    <button
                                                        class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                        data-el-toggle=".js-search-toggle" type="button">
                                                        <div class="icon-close text-dark-1 text-16"></div>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header-search__bg" data-el-toggle=".js-search-toggle">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="d-none xl:d-block pl-20 sm:pl-15">
                            <button class="text-dark-1 items-center" data-el-toggle=".js-mobile-menu-toggle">
                                <i class="text-11 icon icon-mobile-menu"></i>
                            </button>
                        </div>
                    </div>

                    @if (auth()->user())
                        <div class="header-right__buttons d-flex items-center lg:d-none">
                            <a href="{{ route('dashboard') }}"
                                class="button h-50 px-30 -dark-1 -rounded text-white ml-20">Halaman Utama</a>
                        </div>
                    @else
                        <div class="header-right__buttons d-flex items-center lg:d-none">
                            <a href="{{ route('login') }}"
                                class="button h-50 px-30 -dark-1 -rounded text-white ml-20">Masuk</a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</header>
