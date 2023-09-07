
const table_html = $('#tbl_main');
let table_html_global = () => { };
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
            url: "{{ route('admin.pendaftaran.sensus') }}",
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
            data: 'nama',
            name: 'nama',
            render(data, type, full, meta) {
                return `${data}<br>
                    <small><i class="far fa-envelope me-2"></i>${full.email}</small>`;
            },
        },
        {
            data: 'angkatan',
            name: 'angkatan'
        },
        {
            data: 'whatsapp',
            name: 'whatsapp',
            render(data, type, full, meta) {
                return `<small>
                        <span class="text-nowrap"><i class="fas fa-phone-alt me-2"></i>${data}</span><br>
                        <span class="text-nowrap"><i class="fab fa-whatsapp me-2"></i>${full.telepon}</span></small>`;
            },
        },
        {
            data: 'created',
            name: 'created_at',
            render(data, type, full, meta) {
                return data;
            }
        },
        {
            data: 'keterangan',
            name: 'keterangan'
        },
        {
            data: 'status',
            name: 'status',
            render(data, type, full, meta) {
                let class_bg = '';
                switch (Number(data)) {
                    case 0:
                        class_bg = 'primary'
                        break;
                    case 1:
                        class_bg = 'secondary'
                        break;
                    case 2:
                        class_bg = 'success'
                        break;
                    case 3:
                        class_bg = 'danger'
                        break;
                    default:
                        class_bg = 'warning'
                        break;
                }

                const diterima = data == 0 ? '' :
                    `<li><button class="btn btn-primary m-1" onclick="setStatus(${full.id},0)" value="0">Diterima</button></li>`;
                const diproses = data == 1 ? '' :
                    `<li><button class="btn btn-secondary m-1" onclick="setStatus(${full.id},1)" value="1">Diproses</button></li>`;
                const selesai = data == 2 ? '' :
                    `<li><button class="btn btn-success m-1" onclick="setStatus(${full.id},2)" value="2">Selesai</button></li>`;
                const ditolak = data == 3 ? '' :
                    `<li><button class="btn btn-danger m-1" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modal-default" onclick="statusTolak('${full.id}', 3)" data-target="#modal-default">Ditolak</button></li>`;

                return `
                    <div class="dropstart btn-group mt-2 mb-2">
                        <button class="btn btn-sm btn-${class_bg} dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">${full.status_str}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            ${diterima}
                            ${diproses}
                            ${selesai}
                            ${ditolak}
                        </ul>
                    </div>
                    `;
            }
        },
        ],
        order: [
            [4, 'desc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });
    table_html_global = table_html;

    new_table.on('draw.dt', function () {
        tooltip_refresh();
        var PageInfo = table_html.DataTable().page.info();
        new_table.column(0, {
            page: 'current'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    // filter
    $('#FilterForm').submit(function (e) {
        e.preventDefault();
        var oTable = table_html.dataTable();
        oTable.fnDraw(false);
    });

    $('#MainForm').submit(function (e) {
        e.preventDefault();
        setStatus($('#id').val(), $('#status').val(), $('#keterangan').val());
    });

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

function exportExcel() {
    const base = "{{ route('admin.pendaftaran.sensus.excel') }}";
    const status = $('#filter_status').val();
    const search = $('[type=search]').val();
    let arg = status ? `?status=${status}` : '';
    arg += (status ? `&` : '?') + (search ? `search=${search}` : '');
    window.location.href = base + arg;
}

function setStatus(id, status, keterangan = '') {
    $.LoadingOverlay('show');
    $.ajax({
        type: "POST",
        url: `{{ route('admin.pendaftaran.sensus.status') }}?id=${id}&status=${status}&keterangan=${keterangan}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            status: status,
            keterangan: keterangan,
        },
        success: (data) => {
            var oTable = table_html_global.dataTable();
            oTable.fnDraw(false);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data berhasil disimpan',
                showConfirmButton: false,
                timer: 1500
            })
            $('#modal-default').modal('hide');
        },
        error: function (data) {
            const res = data.responseJSON ?? {};
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: (res.errors ? res.errors.new_password : res
                    .message) ??
                    'Something went wrong',
                showConfirmButton: false,
                timer: 4000
            })
        },
        complete: function () {
            $.LoadingOverlay('hide');
        }
    });
}

function statusTolak(id, status) {
    $('#keterangan').val('');
    $('#id').val(id);
    $('#status').val(status);
}
