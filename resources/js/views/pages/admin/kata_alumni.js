const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const is_admin = "{{ $is_admin == 'true' ? 'true' : 'false' }}" === "true";
const can_list = "{{ $can_list == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isEdit = true;
$(document).ready(function () {
    $('#user_id').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'member')) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            },
        },
        dropdownParent: $('#modal-default')
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
                d['filter[status]'] = $('#filter_status').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'user',
            name: 'user',
            render(data, type, full, meta) {
                return `${data}<br><small>${full.sebagai}</small>`;
            },
        },
        {
            data: 'profesi',
            name: 'profesi'
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                return `
                        <button type="button" class="btn btn-rounded btn-secondary btn-sm" data-toggle="tooltip" title="Detail Data" onClick="detail('${data}')">
                        <i class="fas fa-eye" aria-hidden="true"></i></button>`;
            },
        },
        {
            data: 'status_str',
            name: 'status',
            render(data, type, full, meta) {
                const class_el = full.status == 0 ? 'warning' :
                    (full.status == 1 ? 'success' : 'danger');
                return `<i class="fas fa-circle text-${class_el} ms-0 me-2"></i>${full.status_str}</small>`;
            },
            className: "text-nowrap"
        },
        ...(can_update || can_delete ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="editFunc('${data}')">
                        <i class="fas fa-edit"></i></button>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_update + btn_delete;
            },
            orderable: false
        }] : []),
        ],
        order: [
            [1, 'asc']
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

    $("#nama").keyup(function () {
        var Text = $(this).val();
        $("#slug").val(Text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-'));
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
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                lists();
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
    if (!isEdit) return false;
    $('#MainForm').trigger("reset");
    $('#modal-default-title').html("Tambah {{ $page_title }}");
    $('#modal-default').modal('show');
    $('#id').val('');
    $('#user_id')
        .append((new Option('', '', true, true)))
        .trigger('change');
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
            $('#deskripsi').val(data.deskripsi);
            $('#sebagai').val(data.sebagai);
            $('#profesi').val(data.profesi);
            $('#status').val(data.status);
            $('#user_id')
                .append((new Option(data.user, data.user_id, true, true)))
                .trigger('change');
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
                    lists();
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
            <h4>Nama</h4>
            <p>${data.user}</p>
            <h4>Sebagai</h4>
            <p>${data.sebagai}</p>
            <h4>Deskripsi</h4>
            <p>${data.deskripsi}</p>
            <h4>Profesi</h4>
            <p>${data.profesi}</p>
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

function lists() {
    if (!can_list) retun;
    $('#card-lists').LoadingOverlay("show");
    $.ajax({
        url: `{{ route(l_prefix($hpu,'list')) }}`,
        type: 'GET',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if ($('#lists').html() != '') $('.dd').nestable('destroy');
            $('.dd').nestable({
                maxDepth: 2,
                json: response.data,
                contentCallback: (item) => {
                    // return `<strong>${item.user} | ${item.sebagai} | ${item.profesi}</strong>`;
                    return `<strong>${item.user}</strong>`;
                }
            });
        },
        complete: function () {
            $('#card-lists').LoadingOverlay("hide");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal.fire("!Opps ", "Something went wrong, try again later", "error");
        }
    });
}

lists();

function save() {
    $.LoadingOverlay("hide");
    var serialize = $('#lists').nestable('toArray');
    $.ajax({
        url: `{{ route(l_prefix($hpu,'list_save')) }}`,
        type: 'POST',
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
                title: 'Data berhasil disimpan',
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
