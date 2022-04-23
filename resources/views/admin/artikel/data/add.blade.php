@extends('templates.admin.master')
@php
$is_edit = isset($edit);
$id = $is_edit ? $artikel->id : '';
$route = $is_edit ? route('admin.artikel.data.update') : route('admin.artikel.data.insert');
$nama = $is_edit ? $artikel->nama : '';
$date = $is_edit ? explode(' ', $artikel->date)[0] : '';
$slug = $is_edit ? $artikel->slug : '';
$excerpt = $is_edit ? $artikel->excerpt : '';
$detail = $is_edit ? $artikel->detail : '';
$detail = $is_edit ? $artikel->detail : '';
$status = $is_edit ? $artikel->status : 1;
$status = [$status == 0 ? 'checked' : '', $status == 1 ? 'checked' : ''];

$kategori = isset($kategori) ? $kategori : [];
$tag = isset($tag) ? $tag : [];
// dd($date);
@endphp
@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h3 class="card-title text-light">Form {{ $page_attr['title'] }}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data" id="MainForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Artikel</label>
                            <input type="text" name="nama" id="nama" class="form-control" required
                                placeholder="Nama Artikel" value="{{ $nama }}" />
                            <input type="hidden" class="" name="id" id="id" value="{{ $id }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required placeholder="Untuk URL"
                                value="{{ $slug }}" />
                            <small>Slug digunakan untuk akses artikel lewat url atau alamt web, slug diatas tidak boleh sama
                                dengan slug dari artikel yang lain</small>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="excerpt">Kilasan/Cuplikan</label>
                            <textarea class="form-control mb-4" placeholder="Kilasan/Cuplikan artikel" id="excerpt" name="excerpt" required
                                rows="4">{{ $excerpt }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label><strong>Description :</strong></label>
                            <textarea class="summernote" name="detail">{{ $detail }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tag">Tag Artikel</label>
                            <select class="form-control select2" id="tag" multiple name="tag[]" style="width: 100%">
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
                            <input type="date" name="date" id="date" class="form-control" required
                                placeholder="Tanggal Artikel" value="{{ $date }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label">Publikasikan Artikel:</div>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio-md" style="display: unset">
                                    <input type="radio" class="custom-control-input" name="status" value="0"
                                        {{ $status[0] }}>
                                    <span class="custom-control-label">Simpan</span>
                                </label>
                                <label class="custom-control custom-radio-md" style="display: unset">
                                    <input type="radio" class="custom-control-input" name="status" value="1"
                                        {{ $status[1] }}>
                                    <span class="custom-control-label">Publish</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-success" form="MainForm">
                    <li class="fa fa-save mr-1"></li> Save
                </button>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/summernote/summernote1.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        const is_edit = '{{ $is_edit }}';
        $(document).ready(function() {
            $('#kategori').select2({
                ajax: {
                    url: "{{ route('admin.artikel.kategori.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            with_empty: 1,
                        }
                        return query;
                    }
                }
            });

            $('#tag').select2({
                ajax: {
                    url: "{{ route('admin.artikel.tag.select2') }}",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(params) {
                        var query = {
                            search: params.term,
                            with_empty: 1,
                        }
                        return query;
                    }
                }
            });
            // init summernote
            $('.summernote').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['style',
                        ['bold',
                            'italic',
                            'underline',
                            'strikethrough',
                            'superscript',
                            'subscript',
                            'clear'
                        ]
                    ],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['color', ['color']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']],
                    ['table', ['table']],
                    ['insert', ['link', 'unlink', 'audio', 'hr', 'picture']],
                    ['mybutton', ['myVideo']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']],
                ],
                buttons: {
                    myVideo: function(context) {
                        var ui = $.summernote.ui;
                        var button = ui.button({
                            contents: '<i class="fa fa-video-camera"/>',
                            tooltip: 'video',
                            click: function() {
                                var div = document.createElement('div');
                                div.classList.add('embed-container');
                                var iframe = document.createElement('iframe');
                                var src = prompt('Enter video url:');
                                src = youtube_parser(src);
                                iframe.src =
                                    `https://www.youtube.com/embed/${src}?autoplay=1&fs=1&iv_load_policy=&showinfo=1&rel=0&cc_load_policy=1&start=0&modestbranding&end=0&controls=1`;
                                iframe.setAttribute('frameborder', 0);
                                iframe.setAttribute('width', '100%');
                                iframe.setAttribute('height', '500px');
                                iframe.setAttribute('type', 'text/html');
                                iframe.setAttribute('allowfullscreen', true);
                                div.appendChild(iframe);
                                context.invoke('editor.insertNode', div);
                            }
                        });
                        return button.render();
                    }
                },
                height: 600,
            });

            $("#nama").keyup(function() {
                var Text = $(this).val();
                $("#slug").val(Text.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-'));
            });

            // insertForm ===================================================================================
            $('#MainForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                resetErrorAfterInput();
                setBtnLoading('button[type=submit]', 'Save');
                const route = "{{ $route }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'You will be reload in 2 Seconds',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.reload()
                        });

                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit]',
                            '<li class="fa fa-save mr-1"></li> Save',
                            false);
                    }
                });
            });
        });

        function youtube_parser(url) {
            var regExp =
                /^https?\:\/\/(?:www\.youtube(?:\-nocookie)?\.com\/|m\.youtube\.com\/|youtube\.com\/)?(?:ytscreeningroom\?vi?=|youtu\.be\/|vi?\/|user\/.+\/u\/\w{1,2}\/|embed\/|watch\?(?:.*\&)?vi?=|\&vi?=|\?(?:.*\&)?vi?=)([^#\&\?\n\/<>"']*)/i;
            var match = url.match(regExp);
            return (match && match[1].length == 11) ? match[1] : false;
        }
    </script>
@endsection
