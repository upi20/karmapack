@extends('templates.admin.master')

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h3 class="card-title text-light">Form {{ $page_attr['title'] }}</h3>
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
                    <textarea class="summernote" name="sejarah">{!! settings()->get('sejarah.html') !!}</textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group">
            <button type="submit" class="btn btn-success" form="MainForm">
                <li class="fas fa-save mr-1"></li> Simpan Perubahan
            </button>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/summernote/summernote1.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
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
                            contents: '<i class="fab fa-youtube"></i>',
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

            $('#MainForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                resetErrorAfterInput();
                setBtnLoading('button[type=submit]', 'Simpan Perubahan');
                $.ajax({
                    type: "POST",
                    url: "{{ route(h_prefix('save')) }}",
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
                            title: 'Data berhasil disimpan',
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
                            '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                            false);
                    }
                });
            });
        })
    </script>
@endsection
