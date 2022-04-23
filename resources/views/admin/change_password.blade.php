@extends('templates.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ganti Password</h4>
                </div>
                <div class="card-body">
                    <form id="form_password">
                        <label for="current_password">Password Lama</label>
                        <div class="wrap-input100 validate-input input-group password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="password" id="current_password"
                                required="" name="current_password">
                        </div>
                        <label for="new_password">Password Baru</label>
                        <div class="wrap-input100 validate-input input-group password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="password" id="new_password"
                                required="" name="new_password">
                        </div>
                        <label for="repeat_password">Ulangi Password Baru</label>
                        <div class="wrap-input100 validate-input input-group password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted toggle">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="password" id="repeat_password"
                                required="" name="repeat_password">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" form="form_password" class="btn btn-primary mt-4 mb-0">
                        <li class="fa fa-save mr-1"></li> Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- sweetalert --}}
    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(e => {
            $(".password-toggle>.toggle").on('click', function(event) {
                const toogle = $(this).find('i');
                const pass_element = $(this).next();
                if (pass_element.attr("type") == "text") {
                    pass_element.attr('type', 'password');
                    toogle.addClass("zmdi-eye");
                    toogle.removeClass("zmdi-eye-off");
                } else if (pass_element.attr("type") == "password") {
                    pass_element.attr('type', 'text');
                    toogle.removeClass("zmdi-eye");
                    toogle.addClass("zmdi-eye-off");
                }
            });

            $('#form_password').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                if (formData.get('new_password') != formData.get('repeat_password')) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Ulangi Password Baru harus sama dengan Password Baru.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return;
                }
                setBtnLoading('button[type=submit][form=form_password]', 'Save Changes');
                $.ajax({
                    type: "POST",
                    url: "{{ route('member.password.save') }}",
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
                            title: 'Data saved successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(data) {
                        const res = data.responseJSON ?? {};

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: (res.errors ? res.errors.new_password : res
                                    .message) ??
                                'Something went wrong',
                            showConfirmButton: false,
                            timer: 4000
                        })
                    },
                    complete: function() {
                        setBtnLoading('button[type=submit][form=form_password]',
                            '<li class="fa fa-save mr-1"></li> Save changes',
                            false);
                    }
                });
            });
        })
    </script>
@endsection
