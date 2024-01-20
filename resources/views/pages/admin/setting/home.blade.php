@extends('layouts.admin.master')

@section('content')
    <div class="grid">
        <div class="grid-sizer col-md-6 col-lg-4"></div>

        {{-- hero --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'hero';
                $title = 'Hero';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">
                                Sub Judul <span class="text-danger">*</span>
                            </label>
                            <textarea id="{{ $s("$name.sub_title") }}" name="sub_title" class="form-control" required rows="3"
                                placeholder="Sub Judul">{!! settings()->get($s("$name.sub_title")) !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Image
                                <span class="badge bg-primary" id="preview_hero_image"
                                    onclick='viewImage(`{{ settings()->get($s("$name.image")) }}`, `{{ $title }} Image View`)'>
                                    view
                                </span>
                            </label>
                            <input type="file" accept="image/*" id="{{ $s('hero.image') }}" name="image"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.video_title") }}">Tombol video teks
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.video_title") }}" name="video_title"
                                class="form-control" placeholder="Tombol video teks"
                                value="{{ settings()->get($s("$name.video_title")) }}" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.video_link") }}">Tombol video link youtube
                                <span class="text-danger">*</span></label>
                            <input type="url" id="{{ $s("$name.video_link") }}" name="video_link" class="form-control"
                                placeholder="Tombol video link youtube"
                                value="{{ settings()->get($s("$name.video_link")) }}" />
                        </div>

                    </form>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- poesaka --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'poesaka';
                $title = 'Poesaka';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">
                                Judul <span class="text-danger">*</span>
                            </label>

                            <textarea id="{{ $s("$name.title") }}" name="title" class="form-control" required rows="3" placeholder="Judul">{!! settings()->get($s("$name.title")) !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_link") }}">Link Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_link") }}" name="button_link"
                                class="form-control" placeholder="Link Tombol"
                                value="{{ settings()->get($s("$name.button_link")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- visi_misi --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'visi_misi';
                $title = 'Visi Misi';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="{{ $s("$name.visi") }}">Visi
                                        <span class="text-danger">*</span></label>
                                    <input type="text" id="{{ $s("$name.visi") }}" name="visi"
                                        class="form-control" placeholder="Visi"
                                        value="{{ settings()->get($s("$name.visi")) }}" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="{{ $s("$name.misi") }}">Misi
                                        <span class="text-danger">*</span></label>
                                    <input type="text" id="{{ $s("$name.misi") }}" name="misi"
                                        class="form-control" placeholder="Visi"
                                        value="{{ settings()->get($s("$name.misi")) }}" required />
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.semboyan") }}">
                                Semboyan <span class="text-danger">*</span>
                            </label>
                            <textarea id="{{ $s("$name.semboyan") }}" name="semboyan" class="form-control" required rows="3"
                                placeholder="Semboyan">{!! settings()->get($s("$name.semboyan")) !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- struktur_anggota --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'struktur_anggota';
                $title = 'Struktur Anggota';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- kata_alumni --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'kata_alumni';
                $title = 'Kata Alumni';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.limit") }}">Jumlah Data Yang Ditampilkan
                                <span class="text-danger">*</span></label>
                            <input type="number" min="3" id="{{ $s("$name.limit") }}" name="limit"
                                class="form-control" placeholder="Jumlah Data Yang Ditampilkan"
                                value="{{ settings()->get($s("$name.limit")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- galeri_kegiatan --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'galeri_kegiatan';
                $title = 'Galeri Kegiatan';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.limit") }}">Jumlah Data Yang Ditampilkan
                                <span class="text-danger">*</span></label>
                            <input type="number" min="3" id="{{ $s("$name.limit") }}" name="limit"
                                class="form-control" placeholder="Jumlah Data Yang Ditampilkan"
                                value="{{ settings()->get($s("$name.limit")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- artikel --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'artikel';
                $title = 'Artikel';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- artikel --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'instagram';
                $title = 'Instagram';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">Sub Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.sub_title") }}" name="sub_title"
                                class="form-control" placeholder="Sub Judul"
                                value="{{ settings()->get($s("$name.sub_title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.jml_konten") }}">Jumlah Konten
                                <span class="text-danger">*</span></label>
                            <input type="number" id="{{ $s("$name.jml_konten") }}" name="jml_konten"
                                class="form-control" placeholder="Jumlah Konten"
                                value="{{ settings()->get($s("$name.jml_konten")) }}" required />
                        </div>
                    </form>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- sensus --}}
        <div class="grid-item col-md-6 col-lg-4">
            @php
                $name = 'sensus';
                $title = 'Sensus';
            @endphp
            <div class="card m-2">
                <div class="card-body">
                    <div class="card-title d-md-flex flex-row justify-content-between">
                        <div>
                            <h6 class=" text-uppercase">{{ $title }} Setting</h6>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="visible" type="checkbox"
                                id="{{ $name }}-settingPreloader"form="{{ $name }}-form"
                                {{ settings()->get($s("$name.visible")) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $name }}-settingPreloader">
                                Tampilkan
                            </label>
                        </div>
                    </div>
                    <hr class="mt-1" />
                    <form class="form-horizontal" id="{{ $name }}-form">
                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.title") }}">Judul
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.title") }}" name="title" class="form-control"
                                placeholder="Judul" value="{{ settings()->get($s("$name.title")) }}" required />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.sub_title") }}">
                                Sub Judul <span class="text-danger">*</span>
                            </label>
                            <textarea id="{{ $s("$name.sub_title") }}" name="sub_title" class="form-control" required rows="3"
                                placeholder="Sub Judul">{!! settings()->get($s("$name.sub_title")) !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Image
                                <span class="badge bg-primary" id="preview_hero_image"
                                    onclick='viewImage(`{{ settings()->get($s("$name.image")) }}`, `{{ $title }} Image View`)'>
                                    view
                                </span>
                            </label>
                            <input type="file" accept="image/*" id="{{ $s('hero.image') }}" name="image"
                                class="form-control" />
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="{{ $s("$name.button_text") }}">Teks Tombol
                                <span class="text-danger">*</span></label>
                            <input type="text" id="{{ $s("$name.button_text") }}" name="button_text"
                                class="form-control" placeholder="Teks Tombol"
                                value="{{ settings()->get($s("$name.button_text")) }}" required />
                        </div>
                    </form>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary" form="{{ $name }}-form">
                            <li class="fas fa-save mr-1"></li> Simpan Perubahan
                        </button>
                    </div>
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
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" integrity="sha512-1RuT3Xs+fbL5f+4MCot2I8PpBFRu4flycFf5s2x4PoBMTKbPgHBEEwQ1LovEIhrMaR3S8bJfnlBTbWJbKdj8Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.full.min.js" integrity="sha512-PZUUFofP00wI366Au6XSNyN4Zg8M8Kma4JKIG7ywt8FEY1+Ur0H+FAlH6o0fKoCrdmM4+ZzMyW30msp8Z2zDaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @php $resource = resource_loader(blade_path: $view); @endphp
    <script src="{{ $resource }}"></script>
@endsection
