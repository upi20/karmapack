const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const can_insert = "{{ $can_insert == 'true' ? 'true' : 'false' }}" === "true";
let isUpdate = false;
let sequence_max = 0;
$(document).ready(function () {
    $('#type').select2({
        dropdownParent: $('#menu-form'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#active').select2({
        dropdownParent: $('#menu-form'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#parent_id').select2({
        ajax: {
            url: `{{ route(l_prefix($hpu,'parent_list')) }}`,
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
        dropdownParent: $('#menu-form'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('.tree-tools').on('click', function (e) {
        var action = $(this).data('action');
        if (action === 'expand') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#menu-form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('sequence', sequence_max++);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        resetErrorAfterInput();
        const route = isUpdate ? `{{ route(l_prefix($hpu,'update')) }}` :
            `{{ route(l_prefix($hpu,'insert')) }}`;
        $.ajax({
            type: 'POST',
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
                menu();
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
                setBtnLoading('#btn-save',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
})

function menu() {
    $('#card-menu').LoadingOverlay("show");
    $.ajax({
        url: `{{ route(l_prefix($hpu,'list')) }}`,
        type: 'GET',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if ($('#nested-menu').html() != '') $('.dd').nestable('destroy');
            $('.dd').nestable({
                maxDepth: 2,
                json: response.data,
                contentCallback: (item) => {
                    sequence_max = Number(item.sequence) > Number(sequence_max) ?
                        Number(item.sequence) : Number(sequence_max);

                    const btn_update = can_update ?
                        `<button onclick="edit(${item.id})" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span></button>` :
                        '';
                    const btn_delete = can_delete ?
                        `<button onclick="deleteFun(${item.id})" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span></button>` :
                        '';
                    const btn = (can_update || can_delete) ? `<span class="float-end dd-nodrag">
                                ${btn_update}
                                ${btn_delete}
                            </span>` : '';
                    return `<i class="${item.icon}"></i>&nbsp;<strong>${item.title}${item.type == 0 ? ' | <span class="text-danger">separator</span>' : ''}</strong> ${btn}`;
                }
            });
            isEdit(false)
        },
        complete: function () {
            $('#card-menu').LoadingOverlay("hide");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal.fire("!Opps ", "Something went wrong, try again later", "error");
        }
    });
}

function save() {
    $.LoadingOverlay("hide");
    var serialize = $('#nested-menu').nestable('toArray');
    $.ajax({
        url: `{{ route(l_prefix($hpu,'save')) }}`,
        type: 'PUT',
        data: {
            data: serialize
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data saved successfully',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            $.LoadingOverlay("hide");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal.fire("!Opps ", "Something went wrong, try again later", "error");
        }
    });
}

function edit(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'find')) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id
        },
        success: (d) => {
            isEdit(true);
            const menu = d.data;
            $('#id').val(menu.id);
            $('#parent_id')
                .append((new Option((menu.parent ?? "ROOT"), (menu.parent_id ?? 0), true, true)))
                .trigger('change');
            $('#active').val(menu.active).trigger('change');
            $('#icon').val(menu.icon);
            $('#title').val(menu.title);
            $('#route').val(menu.route);
            $('#type').val(menu.type).trigger('change');
        },
        error: function (data) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
        complete: function () {
            $.LoadingOverlay("hide");
        }
    });
}

function isEdit(edit) {
    const title = $('#menu-title');
    const btn_cancel = $('#menu-btn-cancel');
    const setContainer = view => {
        const container = $('#form-container');
        if (view) container.show();
        else container.fadeOut();
    }
    if (edit) {
        isUpdate = true;

        // edit attribute
        title.html('Ubah Menu');
        btn_cancel.fadeIn();
        setContainer(can_update);
    } else {
        isUpdate = false;
        $('#id').val(menu.id);
        $('#parent_id')
            .append((new Option("ROOT", 0, true, true)))
            .trigger('change');
        $('#active').val(1).trigger('change');
        $('#type').val(1).trigger('change');
        $('#icon').val('');
        $('#title').val('');
        $('#route').val('');

        // edit attribute
        title.html('Tambah Menu');
        btn_cancel.fadeOut();
        setContainer(can_insert);
    }
}

function deleteFun(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url(l_prefix_uri($hpu)) }}/${id}`,
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
                        title: 'Data saved successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    menu();
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

$(window).on('load', function () {
    menu();
});
