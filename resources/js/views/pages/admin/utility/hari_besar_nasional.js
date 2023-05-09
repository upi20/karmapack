const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isEdit = true;
$(document).ready(function () {
    $('#type').change(() => {
        refreshType();
    });

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
                d['filter[type]'] = $('#filter_type').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'nama',
            name: 'nama'
        },
        {
            data: 'tanggal_str',
            name: 'tanggal'
        },
        {
            data: 'countdown',
            name: 'countdown',
            render(data, type, full, meta) {
                return data == 0 ? 'Hari ini' : `${data} Hari Lagi`;
            },
        },
        {
            data: 'type_str',
            name: 'type'
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                return full.keterangan ? ` <button type="button" class="btn btn-rounded btn-secondary btn-sm" title="Detail Data" onClick="detail('${data}')">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                                </button>
                                ` : '';
            },
        },
        ...(can_update || can_delete ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = can_update ? `<button type="button" data-toggle="tooltip" class="btn btn-rounded btn-primary btn-sm me-1" title="Ubah Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i></button>` : '';
                const btn_delete = can_delete ? `<button type="button" data-toggle="tooltip" class="btn btn-rounded btn-danger btn-sm me-1" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                return btn_update + btn_delete;
            },
            orderable: false
        }] : []),
        ],
        order: [
            [3, 'asc']
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

    $('#FilterForm').submit(function (e) {
        e.preventDefault();
        var oTable = table_html.dataTable();
        oTable.fnDraw(false);
    });

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        const route = ($('#id').val() == '') ?
            "{{ route(l_prefix($hpu,'insert')) }}" :
            "{{ route(l_prefix($hpu,'update')) }}";
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
                $("#modal-default").modal('hide');
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                list_error();

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
                setBtnLoading('#btn-save',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});

function addFunc() {
    refreshType();
    if (!isEdit) return false;
    $('#MainForm').trigger("reset");
    $('#modal-default-title').html("Tambah {{ $page_title }}");
    $('#modal-default').modal('show');
    $('#id').val('');
    resetErrorAfterInput();
    isEdit = false;
    return true;
}


function editFunc(id) {
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
        success: (data) => {
            isEdit = true;
            $('#modal-default-title').html("Ubah {{ $page_title }}");
            $('#modal-default').modal('show');
            $('#id').val(data.id);

            $('#hari').val(data.hari);
            $('#bulan').val(data.bulan);
            $('#tahun').val(data.tahun);

            $('#type').val(data.type);
            $('#nama').val(data.nama);
            $('#keterangan').val(data.keterangan);
            refreshType();
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

function deleteFunc(id) {
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
                        title: '{{ $page_title }} deleted successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    var oTable = table_html.dataTable();
                    oTable.fnDraw(false);
                    list_error();
                },
                complete: function () {
                    swal.hideLoading();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later",
                        "error");
                }
            });
        }
    });
}

function detail(id) {
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'find')) }}`,
        data: {
            id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            $("#modal-detail").modal('show');
            $("#modal-detail-body").html(`
                    <h4>Keterangan</h4>
                    <p>${data.keterangan}</p>
                    `);
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
    });
}

function copyToClipboard(value) {
    const copyText = document.getElementById('clipboard');
    copyText.value = value;
    copyText.select();
    document.execCommand('copy');
    Swal.fire({
        icon: 'success',
        title: 'Text copied to clipboard',
        showConfirmButton: false,
        timer: 1000
    });
}


function refreshType() {
    const type = $('#type').val();
    const tahun = $('#tahun');
    if (type == 1) {
        tahun.removeAttr('required');
    } else {
        tahun.attr('required', true);
    }
}

function list_error() {
    $.get(`{{ route(l_prefix($hpu,'list_error')) }}`, function (data) {
        const body = $('#error_list_body');
        const container = $('#error_list_container');
        if (data.length > 0) {
            body.html('');
            container.fadeIn();

            data.forEach(e => {
                body.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                                    <div>
                                        <div class="d-flex w-100">
                                            <p class="mb-1">${e.nama}</p>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary btn-sm" onclick="editFunc('${e.id}')">
                                            <i class="fas fa-edit"></i> Perbaiki</button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteFunc('${e.id}')">
                                            <i class="fa fa-trash"></i> Hapus</button>
                                    </div>
                                </div>`);
            });

        } else {
            container.fadeOut();
        }

    });
};

list_error();
