@extends('templates.frontend.master')
@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">Artikel</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $model->nama }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="main-content mt-60">
        <div class="container-xl">
            <div class="row gy-4">
                {{-- artikel --}}
                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3">{{ $model->nama }}</h1>
                            <ul class="meta list-inline mb-0">

                                <li class="list-inline-item"> <a
                                        href="{{ $user->username ? url($user->username) : route('anggota.id', $user->id) }}">
                                        <img src="{{ asset("$image_folder_user/$user->foto") }}"
                                            onerror="this.src='{{ asset($image_default_user) }}';this.onerror='';"
                                            class="author"
                                            style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;"
                                            alt="{{ $user->name }}" />
                                        {{ $user->name }}
                                    </a></li>
                                <li class="list-inline-item">
                                    {{ date_format(date_create($model->date), 'd M Y') }}
                                </li>
                            </ul>
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                            {!! $model->detail !!}
                        </div>
                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    @foreach ($artikel_tag as $tag)
                                        <a href="{{ url("?tag=$tag->slug") }}" class="tag">#{{ $tag->nama }}</a>
                                    @endforeach
                                    @foreach ($artikel_kategori as $kategori)
                                        <a href="{{ url("?kategori=$kategori->slug") }}"
                                            class="tag">{{ $kategori->nama }}</a>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-12">

                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://www.facebook.com/sharer.php?u={{ route('artikel', $model->slug) }}"
                                                title="Share To Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://api.whatsapp.com/send?text={{ route('artikel', $model->slug) }} {{ $model->nama }}"
                                                title="Share To Whatsapp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://twitter.com/share?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                                title="Share To Twitter">
                                                <i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $model->slug) }}&title={{ $model->nama }}&summary={{ $model->excerpt }}"
                                                title="Share To Linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://pinterest.com/pin/create/button/?url={{ route('artikel', $model->slug) }}&media={{ asset($model->foto) }}&description={{ $model->nama }}"
                                                title="Share To Pinterest">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="https://telegram.me/share/url?url={{ route('artikel', $model->slug) }}&text={{ $model->nama }}"
                                                title="Share To Telegram">
                                                <i class="fab fa-telegram-plane"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a target="_blank"
                                                href="mailto:?subject={{ $model->nama }}&body=Check out this site: {{ route('artikel', $model->slug) }}"
                                                title="Share by Email';" title="Share Via Email">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>


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

                <div class="col-lg-4">

                    {{-- sidebar --}}
                    <div class="sidebar">

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Explore Topics</h3>
                                <img src="{{ asset('assets/templates/frontend/wave.svg') }}" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach ($categories as $kategori)
                                        <li><a href="{{ url("?kategori=$kategori->slug") }}"
                                                class="{{ \App\Repository\Frontend\HomeRepository::checkActiveArtikelOrTag($artikel_kategori, $kategori->slug) ? 'text-primary' : '' }}">
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
                                <img src="{{ asset('assets/templates/frontend/wave.svg') }}" class="wave"
                                    alt="wave" />
                            </div>
                            <div class="widget-content">
                                @foreach ($tags as $tag)
                                    <a href="{{ url("?tag=$tag->slug") }}"
                                        class="tag {{ \App\Repository\Frontend\HomeRepository::checkActiveArtikelOrTag($artikel_tag, $tag->slug) ? 'text-primary' : '' }}">
                                        {{ $tag->nama }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Popular Posts</h3>
                                <img src="{{ asset('assets/templates/frontend/wave.svg') }}" class="wave"
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
                                                        $foto = $a->foto ? asset($a->foto) : 'https://i.ytimg.com/vi/' . check_image_youtube($a->detail) . '/sddefault.jpg';
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
