@extends('templates.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header d-md-flex flex-row justify-content-between">
                    <h4 class="card-title">Form {{ $page_attr['title'] }}</h4>
                    <div id="status_form">
                        Status: <span class="badge bg-{{ $data->status_bg }}">{{ $data->status_str }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="javascript:void(0)" id="MainForm" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="sebagai">Sebagai
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sebagai" name="sebagai"
                                        placeholder="Contoh: Pendiri Karmapack" required=""
                                        value="{{ $data->sebagai }}" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="profesi">Profesi
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="profesi" name="profesi"
                                        placeholder="Contoh: Bupati Cianjur 2019-2024" required=""
                                        value="{{ $data->profesi }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="deskripsi">Deskripsi
                                <span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="6" id="deskripsi" name="deskripsi"
                                placeholder="Enter Deskripsi" required>{{ $data->deskripsi }}</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex-row justify-content-between">
                    <button type="submit" class="btn btn-primary" id="btn-save" form="MainForm">
                        <li class="fas fa-save mr-1"></li> Simpan
                    </button>
                    <button class="btn btn-danger" id="btn-reset"
                        style="{{ is_null($data->status) ? 'display:none' : '' }}">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- loading --}}
    <script src="{{ asset('assets/templates/admin/plugins/loading/loadingoverlay.min.js') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(e => {
            function setStatus(status, bg) {
                $('#status_form').html(`Status: <span class="badge bg-${ bg }">${ status }</span>`);
            }

            function setBtnReset(view) {
                const btn = $('#btn-reset');
                if (view == 0 || view == 1) {
                    btn.fadeIn();
                } else {
                    btn.fadeOut();
                }
            }

            $('#MainForm').submit(function(e) {
                e.preventDefault();
                resetErrorAfterInput();
                var formData = new FormData(this);
                setBtnLoading('#btn-save', 'Simpan');
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
                        console.log(data);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setStatus(data.status_str, data.status_bg);
                        setBtnReset(data.status);
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};
                        errorAfterInput = [];
                        for (const property in res.errors) {
                            errorAfterInput.push(property);
                            setErrorAfterInput(res.errors[property], `#${property}`);
                        }
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.message ?? 'Something went wrong',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    complete: function() {
                        setBtnLoading('#btn-save',
                            '<li class="fas fa-save mr-1"></li> Simpan',
                            false);
                    }
                });
            });

            $('#btn-reset').click(() => {
                swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to proceed ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: `{{ route(h_prefix('reset')) }}`,
                            type: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            beforeSend: function() {
                                swal.fire({
                                    title: 'Please Wait..!',
                                    text: 'Is working..',
                                    onOpen: function() {
                                        Swal.showLoading()
                                    }
                                })
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: '{{ $page_attr['title'] }} deleted successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('#sebagai').val('');
                                $('#profesi').val('');
                                $('#deskripsi').val('');
                                setStatus(data.status_str, data.status_bg)
                                setBtnReset(data.status);
                            },
                            complete: function() {
                                swal.hideLoading();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                swal.hideLoading();
                                swal.fire("!Opps ",
                                    "Something went wrong, try again later",
                                    "error");
                            }
                        });
                    }
                });
            })
        })
    </script>
@endsection
