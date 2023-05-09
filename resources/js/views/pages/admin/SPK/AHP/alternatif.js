
const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
const page_title = '{{$page_title}}';
let isEdit = true;
$(document).ready(function () {
    $('#anggota_id').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'select2')) }}",
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
        dropdownParent: $('#modal-default'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan');
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
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })

                console.log(data);
            },
            error: function (data) {
                const res = data.responseJSON ?? {};
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: res.message ?? 'Something went wrong',
                    showConfirmButton: true,
                })
            },
            complete: function () {
                setBtnLoading('#btn-save', '<li class="fas fa-save mr-1"></li> Simpan', false);
                getTable();
            }
        });
    });
});

const renderOption = (item) => {
    let results = '';
    item.forEach(e => {
        let selected = e.selected ? 'selected' : '';
        results += `<option value="${e.id}" ${selected}>${e.nama}</option>`;
    });

    return results;
}

function addFunc() {
    const render = (data) => {
        $('#id').val('');
        const conteiner = $('#myForm');
        let html = '';

        data.forEach(option => {
            const body = renderOption(option.jenis);
            html += ` <div class="form-group">
                <label class="form-label" for="jenis-${option.slug}">${option.nama}</label>
                <select class="form-control select2" required="" id="jenis-${option.slug}" name="jenis[]">
                    ${body}
                </select>
            </div> `;
        });

        conteiner.html(html);

        $('#MainForm').trigger("reset");
        $('#modal-default').modal('show');
        $('#modal-default-title').html("Tambah");
    };

    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'option')) }}`,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: (data) => {
            render(data);
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

function editFunc(id) {
    const render = (data) => {
        const conteiner = $('#myForm');
        $('#anggota_id').append((new Option(data.anggota, data.anggota_id, true, true))).trigger('change');
        $('#id').val(data.id);

        let html = '';

        data.options.forEach(option => {
            const body = renderOption(option.jenis);
            html += ` <div class="form-group">
                <label class="form-label" for="jenis-${option.slug}">${option.nama}</label>
                <select class="form-control select2" required="" id="jenis-${option.slug}" name="jenis[]">
                    ${body}
                </select>
            </div> `;
        });

        conteiner.html(html);

        $('#MainForm').trigger("reset");
        $('#modal-default').modal('show');
        $('#modal-default-title').html("Ubah");
    };

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
            render(data);
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
                },
                complete: function () {
                    swal.hideLoading();
                    getTable();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

// render table ====================================================
function renderTable(element_table) {
    const tableUser = $(element_table).DataTable({
        columnDefs: [{
            orderable: false,
            targets: [0]
        }],
        scrollX: true,
        aAutoWidth: true,
        bAutoWidth: true,
        order: [
            [1, 'asc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });
    tableUser.on('draw.dt', function () {
        var PageInfo = $(element_table).DataTable().page.info();
        tableUser.column(0, {
            page: 'current'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

function getTable() {
    const renderTabelCalon = (datas) => {
        const element_table = $('#tbl_main');
        const table_body = element_table.find('tbody');
        const table_head = element_table.find('thead');
        $(element_table).dataTable().fnDestroy();
        if ($.fn.DataTable.isDataTable(element_table)) {
            element_table.DataTable().destroy();
        }
        table_body.html('');
        table_head.html('');

        // generate table header
        let table_head_html_item = '';
        datas.header.forEach((e, i) => {
            if (i == 0) return;
            table_head_html_item += ` <th>${e}</th>`;
        });

        let table_head_html = `<tr>
                <th>No</th>
                <th>${page_title}</th>
                ${table_head_html_item}
                <th>Aksi</th>
            </tr>`;

        // generate table body
        let table_body_html = '';
        datas.body.forEach(e => {
            let table_body_html_item = '';
            e.forEach((j, i) => {
                if (i == 0) return;
                table_body_html_item += ` <td>${j}</td> `;
            });

            const id = e[0];
            const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1 mt-1" data-toggle="tooltip" title="Ubah Data" onClick="editFunc('${id}')">
            <i class="fas fa-edit"></i></button>` : '';
            const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1 mt-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${id}')">
            <i class="fas fa-trash"></i></button>` : '';
            const btn = btn_update + btn_delete;
            table_body_html += ` <tr> <td></td> ${table_body_html_item} <td class="text-nowrap">${btn}</td></tr> `;
        });


        // render table
        table_head.html(table_head_html);
        table_body.html(table_body_html);
        renderTable(element_table);
    }

    $.ajax({
        method: 'get',
        url: `{{ url(l_prefix_uri($hpu,'table')) }}`
    }).done((data) => {
        renderTabelCalon(data);
    }).fail(($xhr) => {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Something went wrong, try again later',
            showConfirmButton: false,
            timer: 3500
        })
    })
}

getTable();
