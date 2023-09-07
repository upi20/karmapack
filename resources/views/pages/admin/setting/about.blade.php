@extends('layouts.admin.master')

@section('content')
    <div class="card border-primary">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase">Form {{ $page_attr['title'] }}</h6>
                </div>
            </div>

            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <div class="form-group">
                    <label class="form-label mb-1" for="judul">Judul
                        <span class="text-danger">*</span></label>
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul"
                        value="{{ setting_get('about.judul') }}" required />
                </div>
                <div class="form-group">
                    <label><strong>Deskripsi :</strong></label>
                    <textarea class="tinymce" name="about">{!! setting_get('about.html') !!}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3" id="btn-save" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection

@section('stylesheet')
    <script src="https://cdn.tiny.cloud/1/hdswucb0j2g4wl27cod7yrirjqdc9en0d6apd19en6cp8inr/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    @php $resource = resource_loader(blade_path: $view); @endphp
    <script src="{{ $resource }}"></script>
@endsection
