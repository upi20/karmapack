@extends('templates.admin.master')
@php
$is_edit = isset($edit);
$id = $is_edit ? $model->id : '';
$route = $is_edit ? route('admin.pengurus.periode.update') : route('admin.pengurus.periode.insert');
$nama = $is_edit ? $model->nama : '';
$dari = $is_edit ? $model->dari : '';
$sampai = $is_edit ? $model->sampai : '';
$slogan = $is_edit ? $model->slogan : '';
$slug = $is_edit ? $model->slug : '';
$visi = $is_edit ? $model->visi : '';
$misi = $is_edit ? $model->misi : '';
$foto = $is_edit ? $model->foto : '';
$status = $is_edit ? $model->status : 1;
$status = [$status == 0 ? 'checked' : '', $status == 1 ? 'checked' : ''];
$foto_required = $is_edit ? '' : 'required';
$image_folder = isset($image_folder) ? $image_folder : false;
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
                            <label for="nama">Nama Periode</label>
                            <input type="text" name="nama" id="nama" class="form-control" required
                                placeholder="Nama Periode" value="{{ $nama }}" />
                            <input type="hidden" class="" name="id" id="id" value="{{ $id }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required placeholder="Untuk URL"
                                value="{{ $slug }}" />
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
                            <input type="file" name="foto" id="foto" class="form-control" placeholder="Sampai Tahun"
                                value="{{ $foto }}" {{ $foto_required }} />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea class="form-control mb-4 summernote" placeholder="Visi Periode" id="visi" name="visi" required
                                rows="4">{{ $visi }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea class="form-control mb-4 summernote" placeholder="Misi Periode" id="misi" name="misi" required
                                rows="4">{{ $misi }}</textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label">Status Kepengurusan</div>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio-md" style="display: unset">
                                    <input type="radio" class="custom-control-input" name="status" value="0"
                                        {{ $status[0] }}>
                                    <span class="custom-control-label">Tidak Aktif</span>
                                </label>
                                <label class="custom-control custom-radio-md" style="display: unset">
                                    <input type="radio" class="custom-control-input" name="status" value="1"
                                        {{ $status[1] }}>
                                    <span class="custom-control-label">Aktif</span>
                                </label>
                            </div>
                        </div>
                    </div> --}}
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

    <!-- End Row -->
    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-icon-title">View Icon</h6><button aria-label="Close"
                        class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="icon-view-image" alt="Icon {{ $nama }}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/templates/admin/plugins/summernote/summernote1.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script type="text/javascript">
        const is_edit = '{{ $is_edit }}';
        $(document).ready(function() {
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
                height: 300,
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
                            window.location.reload();
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

        function viewIcon(image) {
            $('#icon-view-image').attr('src', `{{ url($image_folder) }}/${image}`)
        }
    </script>
@endsection
