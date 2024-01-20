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
    <script src="https://cdn.tiny.cloud/1/{{ config('app.tiny_mce_api_key') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php $resource = resource_loader(blade_path: $view); @endphp
    <script src="{{ $resource }}"></script>
@endsection
