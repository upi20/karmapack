@extends('layouts.admin.master')

@section('content')
    @if ($anggota->anggota->whatsapp != null)
        <div class="grid">
            <div class="grid-sizer col-md-4 col-lg-3 px-2"></div>
            @foreach ($templates as $template)
                <div class="grid-item col-md-4 col-lg-3 px-2">
                    <a href="{!! $template->templateLink($anggota) !!}">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mt-2">{{ $template->nama }}</h6>
                                <span>
                                    {!! $template->templateTemplateText($anggota, true) !!}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">
            Nomor Whatsapp Akun <b>{{ $anggota->name }}</b> Belum diatur.
        </div>
    @endif
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var msnry = new Masonry(document.querySelector('.grid'), {
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer'
            });
        })
    </script>
@endsection
