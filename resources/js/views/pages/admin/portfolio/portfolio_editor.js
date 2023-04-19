const isEdit = "{{ $isEdit == 'true' ? 'true' : 'false' }}" === "true";
let isEditItem = true;
const table_html_item = $('#tbl_item');
$(document).ready(function () {

    // Datatable
    const table_item = table_html_item.DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        // responsive: true,
        scrollX: true,
        aAutoWidth: false,
        bAutoWidth: false,
        type: 'GET',
        ajax: {
            url: "{{ route(l_prefix($hpu,'item', $prefix_count)) }}",
            data: function (d) {
                d['filter[portfolio_id]'] = '{{ $portfolio_id }}';
            }
        },
        columns: [{
            data: 'urutan',
            name: 'urutan',
        },
        {
            data: 'nama',
            name: 'nama',
        },
        {
            data: 'keterangan',
            name: 'keterangan',
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="item_edit('${data}')">
                                <i class="fas fa-edit"></i> </button>`;
                const btn_delete = `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="item_delete('${data}')">
                                <i class="fas fa-trash"></i> </button>`;
                return btn_update + btn_delete;
            },
            orderable: false,
            className: 'text-nowrap'
        },
        ],
        order: [
            [0, 'asc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });

    // Main form
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[form=MainForm]', 'Simpan');
        $.ajax({
            type: "POST",
            url: '{{ $route_save }}',
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
                if (isEdit) {
                    window.location.reload();
                } else {
                    window.location.href =
                        `{{ route(l_prefix($hpu,'update', $prefix_count), $portfolio_id) }}`;
                }
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
                setBtnLoading('button[form=MainForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan',
                    false);
            },
            complete: function () {
                setBtnLoading('button[form=MainForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan',
                    false);
            }
        });
    });

    // Item form
    $('#ItemForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[form=ItemForm]', 'Simpan');
        const route = ($('#item_id').val() == '') ?
            "{{ route(l_prefix($hpu,'item.insert', $prefix_count)) }}" :
            "{{ route(l_prefix($hpu,'item.update', $prefix_count)) }}";
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
                $("#modal-item").modal('hide');
                var oTable = table_html_item.dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                isEditItem = true;
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
                setBtnLoading('button[form=ItemForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            },
            complete: function () {
                setBtnLoading('button[form=ItemForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});

// item
function item_insert() {
    if (!isEditItem) return false;
    $('#ItemForm').trigger("reset");
    $('#modal-default-title').html("Tambah Item");
    $('#modal-item').modal('show');
    $('#item_id').val('');
    resetErrorAfterInput();
    isEditItem = false;
    return true;
}

function item_edit(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'item.find', $prefix_count)) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id
        },
        success: (data) => {
            isEditItem = true;
            $('#modal-default-title').html("Ubah Item");
            $('#modal-item').modal('show');
            $('#item_id').val(data.id);
            $('#item_nama').val(data.nama);
            $('#item_keterangan').val(data.keterangan);
            $('#item_urutan').val(data.urutan);
        },
        error: function (data) {
            Swal.fire({
                position: 'top-end',
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

function item_delete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url(l_prefix_uri($hpu,'item', $prefix_count)) }}/${id}`,
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
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    var oTable = table_html_item.dataTable();
                    oTable.fnDraw(false);
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

function viewImage(image, title) {
    $('#modal-image').modal('show');
    $('#modal-image-title').html(title);
    const ele = $('#modal-image-element');
    ele.attr('src', image);
    ele.attr('alt', title);
};
