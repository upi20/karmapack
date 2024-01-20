@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class="mt-2 text-uppercase">Application</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" form="app-form" type="checkbox"
                                id="app-settingPreloader" {{ setting_get(set_admin('app.preloader')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="app-settingPreloader">
                                Preloader
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />

                    <form class="form-horizontal" id="app-form">
                        <div class="form-group">
                            <label class="form-label mb-1" for="{{ set_admin('app.title') }}">Title
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ set_admin('app.title') }}" name="title" class="form-control"
                                placeholder="Application Title" value="{{ setting_get(set_admin('app.title')) }}"
                                required />
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-label mb-1">Logo Light
                                        <span class="badge bg-primary" id="preview_foto_light_mode"
                                            onclick="viewImage('{{ setting_get(set_admin('app.foto_light_mode')) }}', 'Logo Light View')">
                                            view</span>
                                    </label>
                                    <input type="file" id="{{ set_admin('app.foto_light_mode') }}" name="foto_light_mode"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-label mb-1">Logo Dark
                                        <span class="badge bg-primary" id="preview_foto_dark_mode"
                                            onclick="viewImage('{{ setting_get(set_admin('app.foto_dark_mode')) }}', 'Logo Dark View')">
                                            view</span>
                                    </label>
                                    <input type="file" id="{{ set_admin('app.foto_dark_mode') }}" name="foto_dark_mode"
                                        class="form-control" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label mb-1">Logo Landscape Light
                                        <span class="badge bg-primary" id="preview_foto_light_landscape_mode"
                                            onclick="viewImage('{{ setting_get(set_admin('app.foto_light_landscape_mode')) }}', 'Logo Light View')">
                                            view</span>
                                    </label>
                                    <input type="file" id="{{ set_admin('app.foto_light_landscape_mode') }}"
                                        name="foto_light_landscape_mode" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-label mb-1">Logo Landscape Dark
                                        <span class="badge bg-primary" id="preview_foto_dark_landscape_mode"
                                            onclick="viewImage('{{ setting_get(set_admin('app.foto_dark_landscape_mode')) }}', 'Logo Dark View')">
                                            view</span>
                                    </label>
                                    <input type="file" id="{{ set_admin('app.foto_dark_landscape_mode') }}"
                                        name="foto_dark_landscape_mode" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label mb-1" for="{{ set_admin('app.copyright') }}">Copyright
                                <span class="text-danger">*</span></label>
                            <textarea id="{{ set_admin('app.copyright') }}" name="copyright" class="form-control" required rows="3"
                                placeholder="Application Copyright">{!! setting_get(set_admin('app.copyright')) !!}</textarea>
                        </div>
                    </form>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="app-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class="mt-2 text-uppercase">Meta Data</h6>
                        </div>
                    </div>
                    <hr class="mt-1" />

                    <form class="form-horizontal" id="meta-form">
                        <div class="form-group">
                            <label class="form-label mb-1" for="{{ set_admin('meta.author') }}">Author
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ set_admin('meta.author') }}" name="author" class="form-control"
                                placeholder="Meta Author" value="{{ setting_get(set_admin('meta.author')) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label mb-1" for="{{ set_admin('meta.keyword') }}">Keyword
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ set_admin('meta.keyword') }}" name="keyword"
                                class="form-control" placeholder="Meta Keyword"
                                value="{{ setting_get(set_admin('meta.keyword')) }}" required />
                        </div>


                        <div class="form-group">
                            <label class="form-label mb-1">Image
                                <span class="badge bg-primary" id="preview_meta_image"
                                    onclick="viewImage('{{ setting_get(set_admin('meta.image')) }}', 'Meta Image View')">
                                    view</span>
                            </label>
                            <input type="file" id="{{ set_admin('meta.image') }}" name="image"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="form-label mb-1" for="{{ set_admin('meta.description') }}">Description
                                <span class="text-danger">*</span></label>
                            <textarea id="{{ set_admin('meta.description') }}" name="description" class="form-control" required rows="3"
                                placeholder="Meta Description Default">{!! setting_get(set_admin('meta.description')) !!}</textarea>
                        </div>
                    </form>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="meta-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <div class="card-title">Meta Header List</div>
                    <button class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                        href="#modal-meta_list" onclick="meta_list_addFunc()" data-target="#modal-meta_list"><i
                            class="fa fa-plus me-2"></i>Tambah</button>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="meta_list-body"> </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal --}}
    <div class="modal fade" id="modal-image">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-image-title">View Foto</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modal-image-element" alt="Icon Pendaftaran">
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

    <div class="modal fade" id="modal-meta_list">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-meta_list-title"></h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true"></span></button>
                </div>

                <div class="modal-body">

                    <form action="javascript:void(0)" id="meta_list_form" method="POST">
                        <input type="hidden" name="id" id="meta_list_id">

                        <div class="form-group">
                            <label class="form-label mb-1" for="meta_list_name">Name
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="meta_list_name" name="name"
                                placeholder="Name" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label mb-1" for="meta_list_value">Value
                                <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="6" name="value" id="meta_list_value" placeholder="Value" required></textarea>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="meta_list_form">
                        <li class="fas fa-save mr-1"></li> Simpan Perubahan
                    </button>
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php $resource = resource_loader(blade_path: $view); @endphp
    <script src="{{ $resource }}"></script>
@endsection
