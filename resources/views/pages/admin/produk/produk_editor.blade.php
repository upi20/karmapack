@extends('layouts.admin.master')

@section('content')
    @php
        $prefix_count = $isEdit ? 2 : 1;
        $can_save = $isEdit ? auth_can(h_prefix('insert', $prefix_count)) : auth_can(h_prefix('update', $prefix_count));
    @endphp
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">Form {{ $page_attr['title'] }}</h3>
            <a class="btn btn-rounded btn-secondary btn-sm" href="{{ route('admin.produk') }}">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <input type="hidden" name="id" id="produk_id" value="{{ $produk->id }}" />
                <input type="hidden" name="isEdit" id="produk_isEdit" value="{{ $isEdit ? 1 : 0 }}" />
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="produk_nama">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="produk_nama" class="form-control"
                                placeholder="Nama Produk" value="{{ $produk->nama }}" required />
                        </div>
                        <div class="form-group">
                            <label for="produk_kilasan">Kilasan Produk:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="kilasan" id="produk_kilasan" class="form-control" placeholder="Kilasan Produk" required>{{ $produk->kilasan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="produk_informasi_lain">Informasi Lain:
                                <span class="text-danger">*</span>
                            </label>
                            <textarea class="summernote" name="informasi_lain" id="produk_informasi_lain" required>{{ $produk->informasi_lain }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group d-none">
                            <label for="produk_sku">Produk SKU</label>
                            <input type="text" name="sku" id="produk_sku" class="form-control"
                                placeholder="Produk SKU" value="{{ $produk->sku }}" />
                        </div>
                        <div class="form-group">
                            <label for="produk_kategori_id">Kategori Produk
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" id="produk_kategori_id" name="kategori_id"
                                style="width: 100%" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $k->id == $produk->kategori_id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produk_tampilkan_harga">Tampilkan Harga
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="produk_tampilkan_harga" name="tampilkan_harga" required>
                                <option value="1" {{ $produk->tampilkan_harga ? 'selected' : '' }}>
                                    Tampilkan
                                </option>
                                <option value="0" {{ $produk->tampilkan_harga ? '' : 'selected' }}>
                                    Sembunyikan
                                </option>
                            </select>
                        </div>
                        <div id="row-harga" {!! $produk->tampilkan_harga ? '' : 'style="display:none"' !!}>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="produk_harga">Harga Normal
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" min="0" name="harga" id="produk_harga"
                                            class="form-control" placeholder="Harga Normal" value="{{ $produk->harga }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="produk_harga_diskon">Harga Diskon</label>
                                        <input type="number" name="harga_diskon" id="produk_harga_diskon"
                                            class="form-control" placeholder="Harga Diskon"
                                            value="{{ $produk->harga_diskon }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <label for="produk_status_stok">Stok Produk
                            </label>
                            <select class="form-control select2" id="produk_status_stok" name="status_stok"
                                style="width: 100%" required>
                                <option value="1" {{ $produk->status_stok ? 'selected' : '' }}>Ada</option>
                                <option value="0" {{ $produk->status_stok ? '' : 'selected' }}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="produk_rating">Rating</label>
                                    <input type="number" min="1" max="5" name="rating"
                                        id="produk_rating" class="form-control" placeholder="Rating"
                                        value="{{ $produk->rating == 0 ? '' : $produk->rating }}" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="produk_rating_nama">Nama Rating</label>
                                    <input type="text" name="rating_nama" id="produk_rating_nama"
                                        class="form-control" placeholder="Nama Rating"
                                        value="{{ $produk->rating_nama }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="produk_tampilkan_di_halaman_utama">Tampilkan di halaman utama
                            </label>
                            <select class="form-control select2" id="produk_tampilkan_di_halaman_utama"
                                name="tampilkan_di_halaman_utama" style="width: 100%" required>
                                <option value="0" {{ $produk->tampilkan_di_halaman_utama ? '' : 'selected' }}>
                                    Tidak
                                </option>
                                <option value="1" {{ $produk->tampilkan_di_halaman_utama ? 'selected' : '' }}>
                                    Ya
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" form="MainForm">
                    <li class="fas fa-save mr-1"></li> Simpan
                </button>
            </div>
        </div>
    </div>

    {{-- data tambahan --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data Foto Produk</h3>
                    <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-foto" onclick="foto_insert()" data-target="#modal-foto">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="tbl_foto">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h3 class="card-title">Data Marketplace Produk</h3>
                    <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                        data-bs-toggle="modal" href="#modal-marketplace" onclick="marketplace_insert()"
                        data-target="#modal-marketplace">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="tbl_marketplace">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Marketplace</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal foto crud --}}
    <div class="modal fade" id="modal-foto">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-foto-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="FotoForm" name="FotoForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="foto_id">
                        <input type="hidden" name="produk_id" id="foto_produk_id" value="{{ $produk->id }}">
                        <div class="form-group">
                            <label class="form-label mb-1" for="foto_urutan">Urutan</label>
                            <input type="number" class="form-control" id="foto_urutan" name="urutan"
                                placeholder="Urutan" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-1" for="foto_nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="foto_nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <div class="mb-2">
                                <label class="form-label d-inline" for="foto_foto">Foto</label>
                                <span class="badge bg-success" id="lihat-foto_foto">Lihat</span>
                            </div>
                            <input type="file" class="form-control" id="foto_foto" name="foto" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="FotoForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal view foto --}}
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-image-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modal-image-element" alt="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal marketplace crud --}}
    <div class="modal fade" id="modal-marketplace">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-marketplace-title"></h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="MarketplaceForm" name="MarketplaceForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="marketplace_id">
                        <input type="hidden" name="produk_id" id="marketplace_produk_id" value="{{ $produk->id }}">
                        <div class="form-group">
                            <label for="marketplace_jenis_id">Marketplace
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="marketplace_jenis_id" name="jenis_id" style="width: 100%"
                                required>
                                <option value="">Pilih Marketplace</option>
                                @foreach ($marketplaceJenis as $marketplace)
                                    <option value="{{ $marketplace->id }}"> {{ $marketplace->nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label mb-1" for="marketplace_link">Link Produk</label>
                            <input type="text" class="form-control" id="marketplace_link" name="link"
                                placeholder="Link Produk" />
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MarketplaceForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset_admin('plugins/datatable/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/select2/js/select2.full.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/summernote/summernote1.js') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'can_update' => $can_update ? 'true' : 'false',
                'can_delete' => $can_delete ? 'true' : 'false',
                'isEdit' => $isEdit ? 'true' : 'false',
                'page_title' => $page_attr['title'],
                'prefix_count' => $prefix_count,
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
