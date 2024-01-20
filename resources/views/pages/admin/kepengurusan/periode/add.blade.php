@extends('layouts.admin.master')
@php
    $is_edit = isset($edit);
    $id = $is_edit ? $model->id : '';
    $route = $is_edit ? route(h_prefix('update', 2)) : route(h_prefix('insert', 1));
    $back_route = $is_edit ? route(h_prefix(null, 2)) : route(h_prefix(null, 1));
    $nama = $is_edit ? $model->nama : '';
    $dari = $is_edit ? $model->dari : '';
    $sampai = $is_edit ? $model->sampai : '';
    $slogan = $is_edit ? $model->slogan : '';
    $slug = $is_edit ? $model->slug : '';
    $visi = $is_edit ? $model->visi : '';
    $misi = $is_edit ? $model->misi : '';
    $filosofi_logo = $is_edit ? $model->filosofi_logo : '';
    $foto = $is_edit ? $model->foto : '';
    $status = $is_edit ? $model->status : 1;
    $status = [$status == 0 ? 'checked' : '', $status == 1 ? 'checked' : ''];
    $foto_required = $is_edit ? '' : 'required';
    $image_folder = isset($image_folder) ? $image_folder : false;
@endphp

@section('content')
    <div class="card">
        <div class="card-header bg-info d-md-flex flex-row justify-content-between">
            <div>
                <h6 class="text-light mt-2">Form {{ $page_attr['title'] }}</h6>
            </div>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                    <i class='bx bx-arrow-back me-1'></i>Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Periode</label>
                            <input type="text" name="nama" id="nama" class="form-control" required
                                placeholder="Nama Periode" value="{{ $nama }}" />
                            <input type="hidden" class="" name="id" id="id"
                                value="{{ $id }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required
                                placeholder="Untuk URL" value="{{ $slug }}" />
                            <small>Slug digunakan untuk akses periode lewat url atau alamt web, slug diatas tidak boleh sama
                                dengan slug dari periode yang lain</small>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dari">Dari Tahun</label>
                            <input type="number" name="dari" id="dari" class="form-control" required
                                placeholder="Dari Tahun" value="{{ $dari }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sampai">Sampai Tahun</label>
                            <input type="number" name="sampai" id="sampai" class="form-control" required
                                placeholder="Sampai Tahun" value="{{ $sampai }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slogan">Slogan Periode</label>
                            <input type="text" name="slogan" id="slogan" class="form-control" required
                                placeholder="Slogan Periode" value="{{ $slogan }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Icon Periode
                                @if ($image_folder)
                                    <a class="btn-link" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                        href="#modal-icon" onclick="viewIcon('{{ $foto }}')"
                                        data-target="#modal-icon">View Icon</a>
                                @endif
                            </label>
                            <input type="file" name="foto" id="foto" class="form-control"
                                placeholder="Sampai Tahun" value="{{ $foto }}" {{ $foto_required }} />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea class="form-control mb-4 tinymce" placeholder="Visi Periode" id="visi" name="visi" rows="4">{{ $visi }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea class="form-control mb-4 tinymce" placeholder="Misi Periode" id="misi" name="misi" rows="4">{{ $misi }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="filosofi_logo">Filosofi Logo</label>
                            <textarea class="form-control mb-4 tinymce" placeholder="Filosofi Logo" id="filosofi_logo" name="filosofi_logo"
                                rows="4">{{ $filosofi_logo }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- End Row -->
    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Icon</h6><button aria-label="Tutup"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon {{ $nama }}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Tutup
                    </button>
                </div>
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
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'is_edit' => $is_edit ? 1 : 0,
                'image_folder' => $image_folder,
                'back_route' => $back_route,
                'route' => $route,
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
