@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header d-md-flex flex-row justify-content-between">
            <h3 class="card-title">{{ $page_attr['title'] }}</h3>
            <div>
                <label class="custom-switch form-switch">
                    <input type="checkbox" name="visible" class="custom-switch-input" form="setting_form"
                        {{ $setting->visible ? 'checked' : '' }}>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Tampilkan</span>
                </label>
            </div>
        </div>
        <div class="card-body">
            <form action="javascript:void(0)" class="ml-md-3 mb-md-3" id="setting_form">

                <div class="form-group">
                    <label class="form-label mb-1" for="title">Judul<span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Judul"
                        value="{{ $setting->title }}" required />
                </div>

                <div class="form-group">
                    <label class="form-label mb-1" for="sub_title">Sub Judul<span class="text-danger">*</span></label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Sub Judul"
                        value="{{ $setting->sub_title }}" required />
                </div>

                <h3>Visi</h3>
                <div class="form-group">
                    <label class="form-label mb-1" for="visi_title">Visi Judul<span class="text-danger">*</span></label>
                    <input type="text" id="visi_title" name="visi_title" class="form-control" placeholder="Visi Judul"
                        value="{{ $setting->visi_title }}" required />
                </div>

                <div class="form-group">
                    <label class="form-label mb-1" for="visi">Visi<span class="text-danger">*</span></label>
                    <textarea id="visi" name="visi" class="form-control" placeholder="Visi" rows="5" required>{!! $setting->visi !!}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label mb-1">Visi Foto
                        <span class="badge bg-primary" id="visi_foto_preview"
                            onclick='viewImage(`{{ $setting->visi_image }}`, `Visi Foto`)'>
                            Lihat
                        </span>
                    </label>
                    <input type="file" accept="image/*" id="visi_image" name="visi_image" class="form-control" />
                </div>

                <h3>Misi</h3>
                <div class="form-group">
                    <label class="form-label mb-1" for="misi_title">Misi Judul<span class="text-danger">*</span></label>
                    <input type="text" id="misi_title" name="misi_title" class="form-control" placeholder="Misi Judul"
                        value="{{ $setting->misi_title }}" required />
                </div>

                <div class="form-group">
                    <label class="form-label mb-1" for="misi">Misi<span class="text-danger">*</span></label>
                    <textarea id="misi" name="misi" class="form-control" placeholder="Misi" rows="5" required>{!! $setting->misi !!}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label mb-1">Misi Foto
                        <span class="badge bg-primary" id="misi_foto_preview"
                            onclick='viewImage(`{{ $setting->misi_image }}`, `Misi Foto`)'>
                            Lihat
                        </span>
                    </label>
                    <input type="file" accept="image/*" id="misi_image" name="misi_image" class="form-control" />
                </div>

            </form>
        </div>
        <div class="card-footer">
            <button type="submit" form="setting_form" class="btn btn-rounded btn-md btn-info" data-toggle="tooltip"
                title="Simpan Setting" id="setting_btn_submit">
                <li class="fas fa-save mr-1"></li> Simpan
            </button>
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
@endsection


@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php $resource = resource_loader(blade_path: $view); @endphp
    <script src="{{ $resource }}"></script>
@endsection
