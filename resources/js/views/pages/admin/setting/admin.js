
let meta_list_is_edit = true;
const meta_list = new Map();
$(document).ready(function () {
    // insertForm ===================================================================================
    $('#app-form').submit(function (e) {
        const load_el = $(this).parent().parent();
        e.preventDefault();
        var formData = new FormData(this);
        load_el.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: `{{ route(l_prefix($hpu,'save.app')) }}`,
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
            error: function (data) {
                const res = data.responseJSON ?? {};
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: res.message ?? 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            complete: function () {
                load_el.LoadingOverlay("hide");
            }
        });
    });

    $('#meta-form').submit(function (e) {
        const load_el = $(this).parent().parent();
        e.preventDefault();
        var formData = new FormData(this);
        load_el.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: `{{ route(l_prefix($hpu,'save.meta')) }}`,
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
            error: function (data) {
                const res = data.responseJSON ?? {};
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: res.message ?? 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            complete: function () {
                load_el.LoadingOverlay("hide");
            }
        });
    });

    // insertForm ===================================================================================
    $('#meta_list_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        const submit_element = $(this).parent().parent().find('button[type=submit]');
        setBtnLoading(submit_element, 'Simpan Perubahan');
        const route = ($('#meta_list_id').val() == '') ?
            "{{ route(l_prefix($hpu,'meta.insert')) }}" :
            "{{ route(l_prefix($hpu,'meta.update')) }}";
        $.ajax({
            type: "POST",
            url: route,
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
                meta_list_render(data);
                $('#modal-meta_list').modal('hide');
                meta_list_is_edit = true;
            },
            error: function (data) {
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
            complete: function () {
                setBtnLoading(submit_element,
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
})

function viewImage(image, title) {
    $('#modal-image').modal('show');
    $('#modal-image-title').html(title);
    const ele = $('#modal-image-element');
    ele.attr('src', `{{ url('') }}/${image}`);
    ele.attr('alt', title);
};

function meta_list_add() {
    if (!meta_list_is_edit) return false;
    $('#meta_list_id').val('');
    $('#meta_list_name').val('');
    $('#meta_list_value').val('');
    $('#modal-meta_list-title').html('Tambah Meta');
    meta_list_is_edit = false;
}

function meta_list_render(list) {
    meta_list.clear()
    const element = $('#meta_list-body');
    element.html('');
    for (let i = 0; i < list.length; i++) {
        const e = list[i];
        meta_list.set(i, e);
        element.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                            <div>
                                <p class="my-0">${e.name}</p>
                            </div>
                            <div class="text-md-center">
                                <button class="btn btn-primary btn-sm my-1" onclick="meta_list_edit('${i}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm my-1" onclick="meta_list_delete('${i}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>`);

    }
}

function meta_list_edit(i) {
    const id = Number(i);
    const data = meta_list.get(id);
    $('#meta_list_id').val(id);
    $('#meta_list_name').val(data.name);
    $('#meta_list_value').val(data.value);
    $('#modal-meta_list-title').html('Ubah Meta');
    meta_list_is_edit = true;

    $('#modal-meta_list').modal('show');
}


function meta_list_delete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ route(l_prefix($hpu,'meta.delete')) }}`,
                type: 'DELETE',
                data: {
                    id
                },
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
                        title: 'Data deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    meta_list_render(data);
                    meta_list_is_edit = true;
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

function meta_list_init() {
    $.get(`{{ route(l_prefix($hpu,'meta')) }}`, (data) => {
        meta_list_render(data);
        meta_list_is_edit = true;
    });
}
meta_list_init();
