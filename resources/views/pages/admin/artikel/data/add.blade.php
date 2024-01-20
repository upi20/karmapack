@extends('layouts.admin.master')
@php
    $is_edit = isset($edit);
    $min = $is_edit ? 2 : 1;
    $id = $is_edit ? $artikel->id : '';
    $route = $is_edit ? route(h_prefix('update', $min)) : route(h_prefix('insert', $min));
    $nama = $is_edit ? $artikel->nama : '';
    $date = $is_edit ? explode(' ', $artikel->date)[0] : '';
    $slug = $is_edit ? $artikel->slug : '';
    $excerpt = $is_edit ? $artikel->excerpt : '';
    $detail = $is_edit ? $artikel->detail : '';
    $detail = $is_edit ? $artikel->detail : '';
    $status = $is_edit ? $artikel->status : 1;
    $status = [$status == 0 ? 'checked' : '', $status == 1 ? 'checked' : ''];
    $user_id = $is_edit ? $artikel->user_id : auth()->user()->id;

    $kategori = isset($kategori) ? $kategori : [];
    $tag = isset($tag) ? $tag : [];
@endphp
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-md-flex flex-row justify-content-between">
                <div>
                    <h6 class="mt-2 text-uppercase"id="menu-title">Form {{ $page_attr['title'] }}</h6>
                </div>
            </div>
            <hr class="mt-0" />
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <textarea name="detail" id="detail">{!! $detail !!}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama Artikel</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required
                                        placeholder="Nama Artikel" value="{{ $nama }}" />
                                    <input type="hidden" class="" name="id" id="id"
                                        value="{{ $id }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required
                                        placeholder="Untuk URL" value="{{ $slug }}" />
                                    <small>Slug digunakan untuk akses artikel lewat url atau alamt web, slug diatas tidak
                                        boleh sama
                                        dengan slug dari artikel yang lain</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="excerpt">Kilasan/Cuplikan Artikel</label>
                                    <textarea class="form-control mb-4" placeholder="Kilasan/Cuplikan artikel" id="excerpt" name="excerpt" required
                                        rows="4">{{ $excerpt }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="kategori">Kategori Artikel</label>
                                    <select class="form-control select2" id="kategori" multiple name="kategori[]"
                                        style="width: 100%">
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}" selected>
                                                {{ $k->text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tag">Tag Artikel</label>
                                    <select class="form-control select2" id="tag" multiple name="tag[]"
                                        style="width: 100%">
                                        @foreach ($tag as $t)
                                            <option value="{{ $t->id }}" selected>
                                                {{ $t->text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Tanggal Artikel</label>
                                    <input type="date" name="date" id="date" class="form-control date-input-str"
                                        required placeholder="Tanggal Artikel" value="{{ $date }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label">Publikasikan Artikel:</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            {{ $status[0] }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Simpan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            {{ $status[1] }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Publish
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" {!! config('app.artikel_tampilkan_penulis') ? '' : 'style="display: none"' !!}>
                                <div class="form-group">
                                    <label for="user_id">Penulis</label>
                                    <select class="form-control select2" id="user_id" name="user_id" style="width: 100%">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $user_id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-end">
                <button type="submit" class="btn btn-success" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan
                </button>
            </div>
        </div>
    </div>
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/select2/css/select2-bootstrap-5-theme.min.css') }}" />
    <script src="https://cdn.tiny.cloud/1/{{ config('app.tiny_mce_api_key') }}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2-custom.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'min' => $min,
                'route' => $route,
                'is_edit' => $is_edit,
                'page_title' => $page_attr['title'],
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
