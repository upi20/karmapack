
const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isEdit = true;
$(document).ready(function () {
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
                d['filter[kode]'] = $('#filter_kode').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'kode',
            name: 'kode'
        },
        {
            data: 'nama',
            name: 'nama'
        },
        ...(can_update || can_delete ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_kriteria = `<a href="{{url(l_prefix_uri($hpu, 'jenis'))}}/${full.slug}" class="btn btn-rounded btn-secondary btn-sm me-1 mt-1" data-toggle="tooltip" title="Jenis Kriteria">
                        <i class="fas fa-list"></i></a>`;
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1 mt-1" data-toggle="tooltip" title="Ubah Data" onClick="editFunc('${data}')">
                        <i class="fas fa-edit"></i></button>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1 mt-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_kriteria + btn_update + btn_delete;
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
                var oTable = table_html.dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                isEdit = true;

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
                setBtnLoading('#btn-save', '<li class="fas fa-save mr-1"></li> Simpan', false);
                kriteriaBobotOptionRefresh();
                kriteriaRefresh();
                kriteriaNormalisasiRefresh();
            }
        });
    });

    $('#BobotForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        const btn_submit = $(this).find('button[type=submit]');
        setBtnLoading(btn_submit, 'Simpan Bobot');
        $.ajax({
            type: "POST",
            url: "{{ route(l_prefix($hpu,'bobot.update')) }}",
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
                    title: 'Bobot berhasil disimpan',
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
                    showConfirmButton: true,
                })
            },
            complete: function () {
                setBtnLoading(btn_submit, '<li class="fas fa-save mr-1"></li> Simpan Bobot', false);
                kriteriaRefresh();
                kriteriaNormalisasiRefresh();
            }
        });
    });
});

function addFunc() {
    if (!isEdit) return false;
    $('#MainForm').trigger("reset");
    $('#modal-default-title').html("Tambah");
    $('#modal-default').modal('show');
    $('#id').val('');
    $('#foto').val('');
    $('#lihat-foto').hide();
    $('#foto').attr('required', '');
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
            $('#modal-default-title').html("Ubah");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#kode').val(data.kode);
            $('#lihat-foto').fadeIn();
            $('#lihat-foto').attr('onclick', `viewImage('${data.foto}', '${data.nama}' )`);
            $('#foto').removeAttr('required');
            $('#foto').val('');
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
                    kriteriaBobotOptionRefresh();
                    kriteriaRefresh();
                    kriteriaNormalisasiRefresh();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function renderNumber(number, fix = 2) {
    const nm = Number(number);

    if (isNaN(nm)) {
        return number;
    }

    return Number.isInteger(number) ? nm : nm.toFixed(fix);
};

function kriteriaRefresh() {
    const renderTable = (datas) => {
        const bobot_table = $('#tbl_bobot');
        let baris = 1;
        let table_header = '';
        let table_bdoy = '';
        datas.body.forEach(e => {
            let tbl_row = '';
            let kolom = 1;
            e.forEach(i => {
                let bg = '';
                let text = '';
                if (baris == kolom) bg = baris > 1 ? 'bg-primary text-white' : '';
                if (kolom > baris) bg = baris > 1 ? 'bg-secondary text-white' : '';
                const td = baris == 1 ? 'th' : 'td';
                const text_center = kolom != 1 ? 'text-center' : '';

                if (baris > 1) {
                    text = kolom > 1 ? renderNumber(i, 3) : i.kode;
                } else {
                    text = kolom > 1 ? i.kode : i;
                }

                tbl_row += `<${td} class="${bg} ${text_center}">${text}</${td}>`;
                kolom++;
            });
            if (baris == 1) {
                table_header = `<thead><tr>${tbl_row}</tr></thead>`;
            } else {
                table_bdoy += `<tr>${tbl_row}</tr>`;
            }

            baris++;
        });

        let total_html = '';
        datas.total.forEach((e, i) => {
            const text_center = i != 0 ? 'text-center' : '';
            total_html += `<td class="${text_center} fw-bold">${renderNumber(e, 3)}</td>`;
        })

        const result = `${table_header}<tbody>${table_bdoy}</tbody><tfooter><tr>${total_html}</tr></tfooter>`;
        bobot_table.html(result);
        // total

        return result;
    }
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'bobot.matrix')) }}`,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: (data) => {
            renderTable(data);
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

function kriteriaBobotOptionRefresh() {
    const renderOption = (datas) => {
        let result_html = '';
        datas.forEach(e => {
            result_html += `<option value="${e.id}">${e.kode} ${e.nama}</option>`;
        });

        $('#kriteria_x').html(result_html);
        $('#kriteria_y').html(result_html);
        return result_html;
    }
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'bobot')) }}`,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: (data) => {
            renderOption(data);
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

function kriteriaNormalisasiRefresh() {

    const renderTable = (datas) => {
        const bobot_table = $('#tbl_normalisasi');
        let baris = 1;
        let table_header = '';
        let table_bdoy = '';
        datas.normalisasi.forEach(e => {
            let tbl_row = '';
            let kolom = 1;
            e.forEach(i => {
                let bg = '';
                let text = '';
                const is_data_body = kolom <= datas.jml_data + 1;
                const is_data_prioritas = kolom == datas.jml_data + 3;
                if (baris == kolom && is_data_body) bg = baris > 1 ? 'bg-primary text-white' : '';
                if ((kolom > baris && is_data_body) || is_data_prioritas) bg = baris > 1 ? 'bg-secondary text-white' : '';
                const td = baris == 1 ? 'th' : 'td';
                const text_center = kolom != 1 ? 'text-center' : '';

                if (baris > 1) {
                    text = kolom > 1 ? renderNumber(i, 3) : i.kode;
                } else {
                    text = kolom > 1 && kolom < datas.jml_data + 2 ? i.kode : i;
                }

                tbl_row += `<${td} class="${bg} ${text_center}">${text}</${td}>`;
                kolom++;

            });
            if (baris == 1) {
                table_header = `<thead><tr>${tbl_row}</tr></thead>`;
            } else {
                table_bdoy += `<tr>${tbl_row}</tr>`;
            }

            baris++;
        });

        let total_html = '';
        datas.total_normalisasi.forEach((e, i) => {
            const text_center = i != 0 ? 'text-center' : '';
            total_html += `<td class="${text_center} fw-bold">${renderNumber(e, 3)}</td>`;
        })

        const result = `${table_header}<tbody>${table_bdoy}</tbody><tfooter><tr>${total_html}</tr></tfooter>`;
        bobot_table.html(result);
        // total

        // render data lain
        $('#ci').html(renderNumber(datas.ci, 3));
        $('#ri').html(datas.ri);
        $('#cr').html(`${renderNumber(datas.cr, 3)} ${datas.cr < 0.1 ? '(KONSISTEN)' : '(TIDAK KONSISTEN)'}`);
        $('#cr').attr('class', datas.cr < 0.1 ? 'text-success' : 'text-danger')

        return result;
    }

    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'bobot.normalisasi')) }}`,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: (data) => {
            renderTable(data);
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

kriteriaNormalisasiRefresh();
kriteriaBobotOptionRefresh();
kriteriaRefresh();
