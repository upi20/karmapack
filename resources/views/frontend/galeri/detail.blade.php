@extends('templates.frontend.master')
@section('content')
    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{ $model->nama }}</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('') }}" class="me-1">Home</a> > <a href="{{ route('galeri') }}"
                        class="mx-1">Galeri</a> > Detail
                </div>
            </div>
        </div>
    </section>
    <div class="spacer" data-height="50"></div>
    <section class="main-conten mt-2">
        <div class="container-xl">
            <iframe src="https://drive.google.com/embeddedfolderview?id={{ $model->id_gdrive }}#grid"
                style="width:100%; height:600px; border:0;"></iframe>
            <!-- social icons -->
            <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">

                <li class="list-inline-item">
                    <a target="_blank" href="https://www.facebook.com/sharer.php?u={{ route('artikel', $model->slug) }}"
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
                        href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('artikel', $model->slug) }}&title={{ $model->nama }}&summary={{ $model->keterangan }}"
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
                        title="Share by Email">
                        <i class="far fa-envelope"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
