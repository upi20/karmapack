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
    <section class="main-content mt-3">
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
                                        <a href="{{ url("?tag=$tag->slug") }}"
                                            class="tag">#{{ $tag->nama }}</a>
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

                    {{-- <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Comments (3)</h3>
                        <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                            alt="wave" />
                    </div>
                    <!-- post comments -->
                    <div class="comments bordered padding-30 rounded">

                        <ul class="comments">
                            <!-- comment item -->
                            <li class="comment rounded">
                                <div class="thumb">
                                    <img src="{{ asset('assets/templates/frontend/images/other/comment-1.png') }}"
                                        alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">John Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae odio ut tortor
                                        fringilla
                                        cursus sed quis odio.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                            <!-- comment item -->
                            <li class="comment child rounded">
                                <div class="thumb">
                                    <img src="{{ asset('assets/templates/frontend/images/other/comment-2.png') }}"
                                        alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">Helen Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                        adipiscing sem
                                        neque sed ipsum.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                            <!-- comment item -->
                            <li class="comment rounded">
                                <div class="thumb">
                                    <img src="{{ asset('assets/templates/frontend/images/other/comment-3.png') }}"
                                        alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">Anna Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci
                                        luctus et ultrices posuere cubilia.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Leave Comment</h3>
                        <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}" class="wave"
                            alt="wave" />
                    </div>
                    <!-- comment form -->
                    <div class="comment-form rounded bordered padding-30">

                        <form id="comment-form" class="comment-form" method="post">

                            <div class="messages"></div>

                            <div class="row">

                                <div class="column col-md-12">
                                    <!-- Comment textarea -->
                                    <div class="form-group">
                                        <textarea name="InputComment" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..."
                                            required="required"></textarea>
                                    </div>
                                </div>

                                <div class="column col-md-6">
                                    <!-- Email input -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                            placeholder="Email address" required="required">
                                    </div>
                                </div>

                                <div class="column col-md-6">
                                    <!-- Name input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="InputWeb" id="InputWeb"
                                            placeholder="Website" required="required">
                                    </div>
                                </div>

                                <div class="column col-md-12">
                                    <!-- Email input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="InputName" name="InputName"
                                            placeholder="Your name" required="required">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" name="submit" id="submit" value="Submit"
                                class="btn btn-default">Submit</button>
                            <!-- Submit Button -->

                        </form>
                    </div> --}}
                </div>

                <div class="col-lg-4">

                    {{-- sidebar --}}
                    <div class="sidebar">

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Explore Topics</h3>
                                <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}"
                                    class="wave" alt="wave" />
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
                                <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}"
                                    class="wave" alt="wave" />
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
                                <img src="{{ asset('assets/templates/frontend/images/wave.svg') }}"
                                    class="wave" alt="wave" />
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
