const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
$(document).ready(function () {
    // datatable ====================================================================================
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const new_table = table_html.DataTable({
        searchDelay: 500,
        // processing: true,
        serverSide: true,
        // responsive: true,
        scrollX: true,
        aAutoWidth: false,
        bAutoWidth: false,
        type: 'GET',
        ajax: {
            url: "{{ route(l_prefix($hpu)) }}",
            data: function (d) {
                // d['filter[status]'] = $('#filter_status').val();
                // d['filter[type]'] = $('#filter_type').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'nama',
            name: 'nama',
            render(data, type, full, meta) {
                return `${data}<br><small>${full.email}</small>`;
            },
        },
        {
            data: 'message',
            name: 'message',
            render(data, type, full, meta) {
                return `<small>${data}</small>`;
            },
        },
        {
            data: 'created',
            name: 'created_at',
            render(data, type, full, meta) {
                const split = String(data).split(' ');
                if (split.length == 2) {
                    return `${split[0]}<br><small>${split[1]}</small>`;
                }
                return `<small>${data}</small>`;
            },
        },
        ...(can_delete ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_delete;
            },
            orderable: false
        }] : []),
        ],
        order: [
            [3, 'desc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });

    new_table.on('draw.dt', function () {
        tooltip_refresh();
        var PageInfo = table_html.DataTable().page.info();
        new_table.column(0, {
            page: 'current'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    // insertForm ===================================================================================
    $('#setting_form').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#setting_btn_submit', 'Simpan Perubahan');
        $.ajax({
            type: "POST",
            url: "{{ route(l_prefix($hpu, 'setting')) }}",
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
                setBtnLoading('#setting_btn_submit',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});

function deleteFunc(id) {
    swal.fire({
        title: 'Apakah anda yakin?',
        text: "Apakah anda yakin akan menghapus data ini ?",
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
                        title: 'Berhasil Menghapus Data',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    var oTable = table_html.dataTable();
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
