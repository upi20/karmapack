@extends('layouts.admin.master')

@section('content')
    @php
        $prefix_count = $isEdit ? 2 : 1;
        $can_save = $isEdit ? auth_can(h_prefix('insert', $prefix_count)) : auth_can(h_prefix('update', $prefix_count));
    @endphp

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-md-flex flex-row justify-content-between">
                        <h5 class="mb-4">Form {{ $page_attr['title'] }}</h5>
                        <div>
                            <a class="btn btn-rounded btn-secondary btn-sm" href="{{ route('admin.portfolio') }}">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>

                    <form class="row g-3" method="post" action="" enctype="multipart/form-data" id="MainForm">
                        <input type="hidden" name="id" id="portfolio_id" value="{{ $portfolio->id }}" />
                        <input type="hidden" name="isEdit" id="portfolio_isEdit" value="{{ $isEdit ? 1 : 0 }}" />
                        <div class="col-12">
                            <label for="portfolio_kategori_id">Kategori
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" id="portfolio_kategori_id" name="kategori_id"
                                style="width: 100%" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $k->id == $portfolio->kategori_id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                @if ($portfolio->foto)
                                    <label for="portfolio_foto">Foto</label>
                                    <span class="badge bg-success" id="lihat-foto_foto"
                                        onclick="viewImage('{{ $portfolio->fotoUrl() }}','{{ $portfolio->nama }}')">Lihat</span>
                                @else
                                    <label for="portfolio_foto">Foto <span class="text-danger">*</span></label>
                                @endif
                            </div>
                            <input type="file" name="foto" id="portfolio_foto" class="form-control" placeholder="Foto"
                                {{ $portfolio->foto ? '' : 'required' }} />
                        </div>
                        <div class="col-12">
                            <label for="portfolio_nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="portfolio_nama" class="form-control" placeholder="Nama"
                                value="{{ $portfolio->nama }}" required />
                        </div>
                        <div class="col-12">
                            <label for="portfolio_keterangan">Keterangan: </label>
                            <textarea name="keterangan" id="portfolio_keterangan" class="form-control" rows="3" placeholder="Keterangan">{{ $portfolio->keterangan }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" form="MainForm">
                                <li class="fas fa-save mr-1"></li> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-md-flex flex-row justify-content-between">
                        <h5 class="mb-4">Detail Portfolio</h5>
                        <div>
                            <button type="button" class="btn btn-rounded btn-primary btn-sm" data-bs-effect="effect-scale"
                                data-bs-toggle="modal" href="#modal-item" onclick="item_insert()" data-target="#modal-item">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>

                    <table class="table table-striped table-hover" id="tbl_item">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-default-title"></h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ItemForm" name="ItemForm" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="item_id">
                        <input type="hidden" name="portfolio_id" id="item_portfolio_id" value="{{ $portfolio->id }}">
                        <div class="form-group">
                            <label class="form-label mb-1" for="item_urutan">Urutan</label>
                            <input type="number" class="form-control" id="item_urutan" name="urutan"
                                placeholder="Urutan" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-1" for="item_nama">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="item_nama" name="nama" placeholder="Nama"
                                required="" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mb-1" for="item_keterangan">Keterangan<span
                                    class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="item_keterangan" name="keterangan" placeholder="Keterangan"
                                required=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="ItemForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

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
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset_admin('plugins/datatable/css/dataTables.bootstrap5.min.css') }}"/>
@endsection

@section('javascript')
    <script src="{{ asset_admin('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset_admin('plugins/loading/loadingoverlay.min.js', name: 'sash') }}"></script>
    <script src="{{ asset_admin('plugins/sweet-alert/sweetalert2.all.js', name: 'sash') }}"></script>
    @php
        $resource = resource_loader(
            blade_path: $view,
            params: [
                'isEdit' => $isEdit ? 'true' : 'false',
                'page_title' => $page_attr['title'],
                'prefix_count' => $prefix_count,
                'route_save' => $route_save,
                'portfolio_id' => $portfolio->id,
            ],
        );
    @endphp
    <script src="{{ $resource }}"></script>
@endsection
