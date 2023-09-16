const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const can_active = "{{ $can_active == 'true' ? 'true' : 'false' }}" === "true";
const can_bidang = "{{ $can_bidang == 'true' ? 'true' : 'false' }}" === "true";
const can_set_role = "{{ $can_set_role == 'true' ? 'true' : 'false' }}" === "true";

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
            name: 'nama'
        },
        {
            data: 'dari',
            name: 'dari'
        },
        {
            data: 'sampai',
            name: 'sampai'
        },
        ...(can_set_role ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                return data ? `
                    <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-role" onclick="setRole('${data}')"
                                data-target="#modal-role"  data-toggle="tooltip" title="Set Sebagai Peran">
                                <i class="fas fa-user-check" aria-hidden="true"></i> </a>
                    ` : '';
            },
        }] : []),
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                return data ? `
                    <a class="btn btn-primary btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal"
                                href="#modal-detail" onclick="viewDetail('${data}')"
                                data-target="#modal-detail"  data-toggle="tooltip" title="Lihat Detail">
                                <i class="fas fa-eye" aria-hidden="true"></i> </a>
                    ` : '';
            },
        },
        {
            data: 'status',
            name: 'status',
            render(data, type, full, meta) {
                const class_ = data == 1 ? 'success' : 'danger';
                const text = data == 1 ? 'Aktif' : 'Tidak Aktif';

                const btn = can_active ? (full.status == 1 ? '' : `
                        <br><button type="button" class="btn btn-rounded btn-secondary btn-sm my-1" data-toggle="tooltip" title="Aktifkan Periode" onClick="activeFunc('${full.id}')">
                        <i class="fa fa-check" aria-hidden="true"></i> Aktifkan
                        </button> `) : '';
                return `<i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}${btn}`;
            },
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = can_update ? `<a class="btn btn-rounded btn-primary btn-sm my-1" data-toggle="tooltip" title="Ubah Periode"
                        href="{{ url(l_prefix_uri($hpu,'edit')) }}/${data}" >
                        <i class="fas fa-edit"></i></a>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm my-1" data-toggle="tooltip" title="Hapus Periode" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                const btn_bidang = can_bidang ? `<a class="btn btn-rounded btn-secondary btn-sm my-1" data-toggle="tooltip" title="Ubah Bidang"
                        href="{{ url(l_prefix_uri($hpu,'jabatan', 1)) }}/${data}" >
                        <i class="fas fa-sitemap"></i></a>` : '';
                return ` <a class="btn btn-rounded btn-primary btn-sm my-1"  data-toggle="tooltip" title="Lihat Periode"
                        href="{{ url('periode') }}/${full.slug}" target="_blank">
                        <i class="fas fa-paper-plane"></i></a>
                        ${btn_bidang}
                        ${btn_update}
                        ${btn_delete}
                        `;
            },
            orderable: false
        },
        ],
        order: [
            [5 + (can_set_role ? 1 : 0), 'desc']
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

    $('#roleForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        $.ajax({
            type: "POST",
            url: "{{ route(l_prefix($hpu,'set_role')) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal-role").modal('hide');
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
                        title: 'Data berhasil disimpan.',
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

function activeFunc(id) {
    swal.fire({
        title: 'Apakah anda yakin?',
        text: "Apakah anda yakin akan mengaktifkan periode ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url(l_prefix_uri($hpu,'active')) }}/${id}`,
                type: 'GET',
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
                        title: 'Berhasil Mengaktifkan Periode',
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

function viewIcon(image) {
    $('#icon-view-image').attr('src', `{{ url($image_folder) }}/${image}`)
}

let init = 0;

function prosesTabelPengurus(pengurus) {
    const table_body = $("#tbl_member_body");
    table_body.html('');
    const element_table = $('#tbl_member');
    $(element_table).dataTable().fnDestroy();
    let table_body_html = '';
    let number = 1;
    pengurus.forEach(e => {
        table_body_html += `
        <tr>
            <td>${number++}</td>
            <td>${e.angkatan}</td>
            <td><a href="{{ url('anggota') }}/${e.id}" target="_blank">${e.nama}</a></td>
            <td>${e.jabatan}</td>
        </tr>
        `;
    });
    table_body.html(table_body_html);
    renderTable(element_table);
}

function renderTable(element_table) {
    const tableUser = $(element_table).DataTable({
        pageLength: 100,
        columnDefs: [{
            orderable: false,
            targets: [0]
        }],
        // "responsive": true,
        // "lengthChange": true,
        // "autoWidth": false,
        order: [
            [0, 'asc']
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


function viewDetail(id) {
    $.ajax({
        method: 'get',
        url: `{{ url(l_prefix_uri($hpu,'detail')) }}/${id}`
    }).done((data) => {
        const class_ = data.detail.status == 1 ? 'success' : 'danger';
        const text = data.detail.status == 1 ? 'Aktif' : 'Tidak Aktif';
        $('#modal-detail-body').html(`
            <table class="table table-striped table-hover w-100">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>${data.detail.nama}</td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td>:</td>
                    <td>${data.detail.dari} - ${data.detail.sampai}</td>
                </tr>
                <tr>
                    <td>Slogan</td>
                    <td>:</td>
                    <td>${data.detail.slogan}</td>
                </tr>
                <tr>
                    <td>Visi</td>
                    <td>:</td>
                    <td>${data.detail.visi}</td>
                </tr>
                <tr>
                    <td>Misi</td>
                    <td>:</td>
                    <td>${data.detail.misi}</td>
                </tr>
                <tr>
                    <td>Slogan</td>
                    <td>:</td>
                    <td>${data.detail.slogan}</td>
                </tr>
                <tr>
                    <td>Filosofi Logo</td>
                    <td>:</td>
                    <td>${data.detail.filosofi_logo ?? ''}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}</td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td><img src="${data.detail.foto}" alt="${data.detail.nama}" style="max-height:500px"/></td>
                </tr>
            </table>
            <h5>Tabel Pengurus Periode ${data.detail.nama}:</h5>
        `);

        // render table
        prosesTabelPengurus(data.pengurus);


    }).fail(($xhr) => {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Something went wrong, try again later',
            showConfirmButton: false,
            timer: 3500
        })
    })
}

function setRole(periode_id) {
    $('#periode_id').val(periode_id);
    $('#role_name').val('');
}
