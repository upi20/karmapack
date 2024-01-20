@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h5 class="card-title text-light">Form {{ $page_attr['title'] }}</h5>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="judul">Judul di Halaman Sejarah
                                <span class="text-danger">*</span></label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Sejarah"
                                value="{{ settings()->get('sejarah.judul') }}" required />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="sub_judul">Sub Judul di Halaman Sejarah
                                <span class="text-danger">*</span></label>
                            <input type="text" id="sub_judul" name="sub_judul" class="form-control"
                                placeholder="Sejarah berdirinya karmapack"
                                value="{{ settings()->get('sejarah.sub_judul') }}" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label><strong>Deskripsi :</strong></label>
                    <textarea class="tinymce" name="sejarah">{!! settings()->get('sejarah.html') !!}</textarea>
                </div>
            </form>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                </button>
            </div>
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
