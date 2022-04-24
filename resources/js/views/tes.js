
function showPreview(event, image_id) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById(image_id);
        preview.src = src;
    }
}

$(document).ready(() => {
    // select 2 =====================================================================================
    $('#profesi').select2({
        ajax: {
            url: "{{ route('member.profile.profesi_select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            }
        }
    });

    $('#province_id').select2();

    // initial
    $('#regency_id').select2({
        ajax: {
            url: "{{ route('admin.address.regencie.select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    province_id: $('#province_id').val()
                }
                return query;
            }
        }
    });

    $('#district_id').select2({
        ajax: {
            url: "{{ route('admin.address.district.select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    regency_id: $('#regency_id').val()
                }
                return query;
            }
        }
    });

    $('#village_id').select2({
        ajax: {
            url: "{{ route('admin.address.village.select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    district_id: $('#district_id').val()
                }
                return query;
            }
        }
    });


    // clear child
    $('#province_id').on('select2:select', function (e) {
        clearRegency();
        clearDistrict();
        clearVillage();
    });

    $('#regency_id').on('select2:select', function (e) {
        clearDistrict();
        clearVillage();
    });

    $('#district_id').on('select2:select', function (e) {
        clearVillage();
    });

    // Crud
    $('#kontak_tipe').select2({
        dropdownParent: $('#modal-kontak')
    });

    $('#pendidikan_jenis').select2({
        dropdownParent: $('#modal-pendidikan')
    });

    $('#pendidikan').select2({
        ajax: {
            url: "{{ route('member.profile.pendidikan_select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    pendidikan_jenis_id: $('#pendidikan_jenis').val()
                }
                return query;
            }
        },
        dropdownParent: $('#modal-pendidikan')
    });

    $('#pengalaman_organisasi_nama').select2({
        ajax: {
            url: "{{ route('member.profile.pengalaman_organisasi_select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            }
        },
        dropdownParent: $('#modal-pengalaman_organisasi')
    });

    $('#hobbies').select2({
        ajax: {
            url: "{{ route('member.profile.hobby_select2') }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            }
        }
    });

    // ==============================================================================================
    $("#username").keyup(function () {
        var Text = $(this).val();
        var result = Text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');

        $('#username_preview').html(`{{ env('APP_URL') }}/${result}`);
        $('#username_slug').val(result);
    });

    // insertForm ===================================================================================
    // Basic Profile
    $('#basic_profile').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=basic_profile]', 'Save Changes');
        const route = "{{ route('member.profile.save_basic') }}";
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
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=basic_profile]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // Address Profile
    $('#address_profile').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=address_profile]', 'Save Changes');
        const route = "{{ route('member.profile.save_address') }}";
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
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=address_profile]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // Detail Profile
    $('#detail_profile').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=detail_profile]', 'Save Changes');
        const route = "{{ route('member.profile.save_detail') }}";
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
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=detail_profile]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    $("body").on("change", "#profile", function (e) {
        var file = e.target.files[0];
        var mediabase64data;
        getBase64(file).then(
            mediabase64data => $('#img_profile').attr('src', mediabase64data)
        );
    });

    // kontak insert/update
    $('#kontak_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=kontak_form]', 'Save Changes');
        const route = ($('#kontak_id').val() == '') ?
            "{{ route('member.profile.kontak_insert') }}" :
            "{{ route('member.profile.kontak_update') }}";
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
                $("#modal-kontak").modal('hide');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                kontakRender();
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=kontak_form]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // hobbies save
    $('#hobi_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=hobi_form]', 'Save Changes');
        const route = "{{ route('member.profile.hobby_save') }}";
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
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#header_foto_profile').attr('src', ($('#img_profile').attr('src')));
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=hobi_form]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // pendidikan insert/update
    $('#pendidikan_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=pendidikan_form]', 'Save Changes');
        const route = ($('#pendidikan_id').val() == '') ?
            "{{ route('member.profile.pendidikan_insert') }}" :
            "{{ route('member.profile.pendidikan_update') }}";
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
                $("#modal-pendidikan").modal('hide');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                pendidikanRender();
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=pendidikan_form]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // pengalaman_organisasi insert/update
    $('#pengalaman_organisasi_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=pengalaman_organisasi_form]', 'Save Changes');
        const route = ($('#pengalaman_organisasi_id').val() == '') ?
            "{{ route('member.profile.pengalaman_organisasi_insert') }}" :
            "{{ route('member.profile.pengalaman_organisasi_update') }}";
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
                $("#modal-pengalaman_organisasi").modal('hide');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                pengalaman_organisasiRender();
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=pengalaman_organisasi_form]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

    // pengalaman_lain insert/update
    $('#pengalaman_lain_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit][form=pengalaman_lain_form]', 'Save Changes');
        const route = ($('#pengalaman_lain_id').val() == '') ?
            "{{ route('member.profile.pengalaman_lain_insert') }}" :
            "{{ route('member.profile.pengalaman_lain_update') }}";
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
                $("#modal-pengalaman_lain").modal('hide');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                pengalaman_lainRender();
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading('button[type=submit][form=pengalaman_lain_form]',
                    '<li class="fa fa-save mr-1"></li> Save changes',
                    false);
            }
        });
    });

})

function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });
}

function clearRegency() {
    $('#regency_id')
        .append((new Option('', '', true, true)))
        .trigger('change');
}

function clearDistrict() {
    $('#district_id')
        .append((new Option('', '', true, true)))
        .trigger('change');
}

function clearVillage() {
    $('#village_id')
        .append((new Option('', '', true, true)))
        .trigger('change');
}

function isValidURL(string) {
    // https://stackoverflow.com/questions/5717093/check-if-a-javascript-string-is-a-url | Vikasdeep Singh
    var res = string.match(
        /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
};

// Kontak =================================================================================
function kontakAdd() {
    $('#modal-kontak-title').html('Tambah Kontak');
    $('#kontak_form').trigger("reset");
    $('#kontak_id').val('');
}

function kontakEdit(datas) {
    const data = datas.dataset;
    $('#modal-kontak-title').html("Edit Kontak");
    $('#modal-kontak').modal('show');
    $('#kontak_form').trigger("reset");
    $('#kontak_id').val(data.id);
    $('#kontak').val(data.kontak);
    $('#kontak_tipe').val(data.kontak_tipe_id).trigger('change');;
}

function kontakDelete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url('member/profile/kontak_delete') }}/${id}`,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    swal.fire({
                        title: 'Please Wait..!',
                        text: 'Is working..',
                        onOpen: function () {
                            Swal.showLoading()
                        }
                    })
                },
                success: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Kontak deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    kontakRender();
                },
                complete: function () {
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function kontakRender() {
    const kontak_body = $('#kontak-body');
    kontak_body.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route('member.profile.kontak') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: '{{ $user->id }}'
        },
        success: (data) => {
            kontak_body.html('');
            data.datas.forEach(e => {
                const value = isValidURL(e.value) ?
                    `<a href="${e.value}" class="link-primary">${e.value}</a>` :
                    `<p class="mb-1">${e.value}</p>`;
                kontak_body.append(`
                        <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                <div>
                                    <div class="d-flex w-100">
                                        <i class="${e.icon} me-3"></i>
                                        <h5 class="mb-1">${e.kontak}</h5>
                                    </div>
                                    ${value}
                                </div>

                                <div>
                                    <button class="btn btn-primary btn-sm"
                                        data-kontak="${e.value}"
                                        data-id="${e.id}"
                                        data-kontak_tipe_id="${e.kontak_id}"
                                        onclick="kontakEdit(this)">
                                        <i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm"
                                    onclick="kontakDelete('${e.id}')"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        `);
            });
        },
        error: function (data) {
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res.message ?? 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            kontak_body.LoadingOverlay("hide");
        }
    });
}

// pendidikan =================================================================================
function pendidikanAdd() {
    $('#modal-pendidikan-title').html('Tambah Pendidikan');
    $('#pendidikan_form').trigger("reset");
    $('#pendidikan_id').val('');
}

function pendidikanEdit(datas) {
    const data = datas.dataset;
    $('#modal-pendidikan-title').html("Edit Kontak");
    $('#modal-pendidikan').modal('show');
    $('#pendidikan_form').trigger("reset");
    $('#pendidikan_id').val(data.id);
    $('#pendidikan').val(data.instansi);
    $('#pendidikan_dari').val(data.dari);
    $('#pendidikan_sampai').val(data.sampai);
    $('#pendidikan_jurusan').val(data.jurusan);
    $('#pendidikan_keterangan').val(data.keterangan);
    $('#pendidikan_jenis').val(data.pendidikan_jenis_id).trigger('change');
}

function pendidikanDelete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url('member/profile/pendidikan_delete') }}/${id}`,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    swal.fire({
                        title: 'Please Wait..!',
                        text: 'Is working..',
                        onOpen: function () {
                            Swal.showLoading()
                        }
                    })
                },
                success: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Kontak deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    pendidikanRender();
                },
                complete: function () {
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function pendidikanRender() {
    const element = $('#pendidikan-body');
    element.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route('member.profile.pendidikan') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: '{{ $user->id }}'
        },
        success: (data) => {
            element.html('');
            data.datas.forEach(e => {
                const jurusan = e.jurusan ? `<p class="my-0">${e.jurusan}</p>` : '';
                const keterangan = e.keterangan ? `<p class="my-0">${e.keterangan}</p>` : '';

                element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex w-100">
                                            <h5 class="mb-1 fw-bold">${e.pendidikan}</h5>
                                        </div>
                                        <p class="my-0">${e.dari}-${e.sampai ?? 'Sekarang'} | ${e.instansi}</p>
                                        ${jurusan}
                                        ${keterangan}
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"

                                            data-instansi="${e.instansi}"
                                            data-dari="${e.dari}"
                                            data-jurusan="${e.jurusan ?? ''}"
                                            data-sampai="${e.sampai ?? ''}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            data-pendidikan_jenis_id="${e.pendidikan_id}"
                                            onclick="pendidikanEdit(this)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pendidikanDelete('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
            });
        },
        error: function (data) {
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res.message ?? 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            element.LoadingOverlay("hide");
        }
    });
}

// pengalaman_organisasi ==================================================================
function pengalaman_organisasiAdd() {
    $('#modal-pengalaman_organisasi-title').html('Tambah Pengalaman Organisasi');
    $('#pengalaman_organisasi_form').trigger("reset");
    $('#pengalaman_organisasi_id').val('');
    $('#pengalaman_organisasi_nama').append((new Option('Nama Organisasi', '', true, true)))
        .trigger('change');
}

function pengalaman_organisasiEdit(datas) {
    const data = datas.dataset;
    $('#modal-pengalaman_organisasi-title').html("Edit Pengalaman Organisasi");
    $('#modal-pengalaman_organisasi').modal('show');
    $('#pengalaman_organisasi_form').trigger("reset");
    $('#pengalaman_organisasi_id').val(data.id);
    $('#pengalaman_organisasi_keterangan').val(data.keterangan);
    $('#pengalaman_organisasi_dari').val(data.dari);
    $('#pengalaman_organisasi_sampai').val(data.sampai);
    $('#pengalaman_organisasi_jabatan').val(data.jabatan);
    $('#pengalaman_organisasi_nama').append((new Option(data.nama, data.nama, true, true)))
        .trigger('change');
}

function pengalaman_organisasiDelete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url('member/profile/pengalaman_organisasi_delete') }}/${id}`,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    swal.fire({
                        title: 'Please Wait..!',
                        text: 'Is working..',
                        onOpen: function () {
                            Swal.showLoading()
                        }
                    })
                },
                success: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Kontak deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    pengalaman_organisasiRender();
                },
                complete: function () {
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function pengalaman_organisasiRender() {
    const element = $('#pengalaman_organisasi-body');
    element.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route('member.profile.pengalaman_organisasi') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: '{{ $user->id }}'
        },
        success: (data) => {
            element.html('');
            data.datas.forEach(e => {
                const keterangan = e.keterangan ? `<p class="my-0">${e.keterangan}</p>` : '';

                element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex w-100">
                                            <h5 class="mb-1 fw-bold">${e.nama}</h5>
                                        </div>
                                        <p class="my-0">${e.dari}-${e.sampai ?? 'Sekarang'} | ${e.jabatan}</p>
                                        ${keterangan}
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"

                                            data-nama="${e.nama}"
                                            data-dari="${e.dari}"
                                            data-jabatan="${e.jabatan ?? ''}"
                                            data-sampai="${e.sampai ?? ''}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            onclick="pengalaman_organisasiEdit(this)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pengalaman_organisasiDelete('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
            });
        },
        error: function (data) {
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res.message ?? 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            element.LoadingOverlay("hide");
        }
    });
}


// pengalaman_lain ==================================================================
function pengalaman_lainAdd() {
    $('#modal-pengalaman_lain-title').html('Tambah Pengalaman Lain');
    $('#pengalaman_lain_form').trigger("reset");
    $('#pengalaman_lain_id').val('');
}

function pengalaman_lainEdit(datas) {
    const data = datas.dataset;
    $('#modal-pengalaman_lain-title').html("Edit Pengalaman Lain");
    $('#modal-pengalaman_lain').modal('show');
    $('#pengalaman_lain_form').trigger("reset");
    $('#pengalaman_lain_id').val(data.id);
    $('#pengalaman_lain_keterangan').val(data.keterangan);
    $('#pengalaman_lain_pengalaman').val(data.pengalaman);
}

function pengalaman_lainDelete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url('member/profile/pengalaman_lain_delete') }}/${id}`,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    swal.fire({
                        title: 'Please Wait..!',
                        text: 'Is working..',
                        onOpen: function () {
                            Swal.showLoading()
                        }
                    })
                },
                success: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Kontak deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    pengalaman_lainRender();
                },
                complete: function () {
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function pengalaman_lainRender() {
    const element = $('#pengalaman_lain-body');
    element.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route('member.profile.pengalaman_lain') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: '{{ $user->id }}'
        },
        success: (data) => {
            element.html('');
            data.datas.forEach(e => {
                element.append(`
                                <div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <p class="my-0">${e.pengalaman}</p>
                                    </div>

                                    <div class="text-md-center">
                                        <button class="btn btn-primary btn-sm my-1"
                                            data-id="${e.id}"

                                            data-pengalaman="${e.pengalaman}"
                                            data-keterangan="${e.keterangan ?? ''}"
                                            onclick="pengalaman_lainEdit(this)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm my-1" onclick="pengalaman_lainDelete('${e.id}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                        `);
            });
        },
        error: function (data) {
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res.message ?? 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            element.LoadingOverlay("hide");
        }
    });
}

// initial function
kontakRender();
pendidikanRender();
pengalaman_organisasiRender();
pengalaman_lainRender();
