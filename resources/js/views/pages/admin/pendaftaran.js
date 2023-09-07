const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
$(document).ready(function () {
    $('#filter_status').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu, 'select2')) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    all: 1,
                }
                return query;
            }
        }
    });

    $('#status').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu, 'select2')) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    new: 1,
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
        processing: true,
        serverSide: true,
        // responsive: true,
        scrollX: true,
        aAutoWidth: false,
        bAutoWidth: false,
        type: 'GET',
        ajax: {
            url: "{{ route(l_prefix($hpu)) }}",
            data: function (d) {
                d['filter[status]'] = String($('#filter_status').val()).toUpperCase();
                d['filter[jenis_kelamin]'] = $('#filter_jenis_kelamin').val();
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
                return `${data}<br><small>${full.tanggal_lahir_str} | ${full.jenis_kelamin}</small>`;
            },
        },
        {
            data: 'alamat',
            name: 'alamat',
            render(data, type, full, meta) {
                return `<small>${data}</small>`;
            },
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const no_telepon = full.no_telepon ?
                    `<a target="_blank" href="tel:${full.no_telepon}"><i class="fas fa-phone me-1"></i> ${full.no_telepon}</a>` :
                    '';

                const no_whatsapp = full.no_whatsapp ?
                    `<a target="_blank" href="https://api.whatsapp.com/send?phone=${full.no_whatsapp}"><i class="fab fa-whatsapp me-1"></i> ${full.no_whatsapp}</a>` :
                    '';

                let kontak = no_telepon;
                kontak += ((kontak ? '<br>' : '') + no_whatsapp);

                return `<small>${kontak}</small>`;
            },
            orderable: false
        },
        {
            data: 'status',
            name: 'status'
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
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Set Status" onClick="statusFunc('${data}', '${full.status ?? ''}')">
                        <i class="fas fa-edit"></i></button>` : '';

                const btn_detail = `<button type="button" class="btn btn-rounded btn-secondary btn-sm me-1" data-toggle="tooltip" title="Detail Data" onClick="detail('${data}')">
                        <i class="fas fa-eye" aria-hidden="true"></i></button>`;

                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_detail + btn_update + btn_delete;
            },
            orderable: false
        },
        ],
        order: [
            [5, 'desc']
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


    // Submit ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        const id = $('#id').val();
        $.ajax({
            type: "POST",
            url: `{{ url(l_prefix_uri($hpu, 'set_status')) }}/${id}`,
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

function statusFunc(id, status) {
    $('#MainForm').trigger("reset");
    $('#modal-default').modal('show');
    $('#id').val(id);
    $('#status').append((new Option(status, status, true, true))).trigger('change');
}

function detail(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu, 'find')) }}`,
        data: {
            id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            $.LoadingOverlay("hide");
            $("#modal-detail").modal('show');
            $("#modal-detail-body").html(`
            <h4>Nama</h4>
            <p>${data.nama}</p>
            <h4>Tanggal Lahir</h4>
            <p>${data.tanggal_lahir}</p>
            <h4>Jenis Kelamin</h4>
            <p>${data.jenis_kelamin}</p>
            <h4>Alamat</h4>
            <p>${data.alamat}</p>
            <h4>Status</h4>
            <p>${data.status ?? ''}</p>
            <h4>Tanggal Kirim</h4>
            <p>${data.tanggal ?? ''}</p>
            <h4>Tanggal Diubah</h4>
            <p>${data.updated ?? ''}</p>

            `);
        },
        error: function (data) {
            $.LoadingOverlay("hide");
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: res.message ?? 'Something went wrong',
                showConfirmButton: false,
                timer: 1500
            })
        },
    });
}
