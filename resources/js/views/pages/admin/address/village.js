const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isUpdate = false;
$(document).ready(function () {
    // select2 ======================================================================================
    $('#filter_province').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });
    $('#province_id').select2({
        dropdownParent: $('#modal-default'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#province_id').on('select2:select', function (e) {
        clearRegency();
        clearDistrict();
    });

    $('#regency_id').on('select2:select', function (e) {
        clearDistrict();
    });

    // filter
    $('#filter_regencie').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'regencie.select2', 1)) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    province_id: $('#filter_province').val(),
                    with_empty: true
                }
                return query;
            }
        },
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#filter_district').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'district.select2', 1)) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    regency_id: $('#filter_regencie').val(),
                    with_empty: true
                }
                return query;
            }
        },
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    // modal form
    $('#regency_id').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'regencie.select2', 1)) }}",
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
        },
        dropdownParent: $('#modal-default'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#district_id').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'district.select2', 1)) }}",
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
        },
        dropdownParent: $('#modal-default'),
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
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
                d['filter[province]'] = $('#filter_province').val();
                d['filter[regencie]'] = $('#filter_regencie').val();
                d['filter[district]'] = $('#filter_district').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'district',
            name: 'district'
        },
        {
            data: 'regencie',
            name: 'regencie'
        },
        {
            data: 'province',
            name: 'province'
        },
        ...(can_update || can_delete ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data"
                                data-id="${full.id}"
                                data-name="${full.name}"
                                data-province_id="${full.province_id}"
                                data-regency_id="${full.regency_id}"
                                data-regencie="${full.regencie}"
                                data-district_id="${full.district_id}"
                                data-district="${full.district}"
                                onClick="editFunc(this)">
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

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        resetErrorAfterInput();
        const route = isUpdate ? "{{ route(l_prefix($hpu,'update')) }}" :
            "{{ route(l_prefix($hpu,'insert')) }}";
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
    isUpdate = false;
    $('#MainForm').trigger("reset");
    $('#modal-default-title').html("Tambah Data");
    $('#modal-default').modal('show');
    $('#id').val('');
    $('#id').removeAttr('readonly');
    resetErrorAfterInput();
    $('#password').attr('required', true);
    clearRegency();
    clearDistrict();
}


function editFunc(datas) {
    isUpdate = true;
    const data = datas.dataset;
    $('#modal-default-title').html("Ubah Data");
    $('#modal-default').modal('show');
    $('#MainForm').trigger("reset");
    $('#id').val(data.id);
    $('#id').attr('readonly', true);
    $('#name').val(data.name);
    $('#province_id').val(data.province_id).trigger('change');
    $('#regency_id')
        .append((new Option(data.regencie, data.regency_id, true, true)))
        .trigger('change');
    $('#district_id')
        .append((new Option(data.district, data.district_id, true, true)))
        .trigger('change');
    $('#password').removeAttr('required');
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
                        position: 'top-end',
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

function setErrorAfterInput(error, element) {
    // get element after input
    let after = $(element).next();
    if (after.length == 0) $(element).after('<div></div>');
    if (after.length == 0) after = $(element).next();

    // highlight
    $(element).addClass("is-invalid").removeClass("is-valid");
    let errors = Array.isArray(error) ? '' : `<li class="text-danger">${error}</li>`;
    if (Array.isArray(error)) {
        error.forEach(err => {
            errors += `<li class="text-danger">${err}</li>`;
        });
    }

    after.html(`<div><ul style="padding-left: 20px;">${errors}</ul></div>`);
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
