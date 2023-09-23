const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const is_admin = "{{ $is_admin == 'true' ? 'true' : 'false' }}" === "true";
const can_save_another = "{{ $can_save_another == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');


$(document).ready(function () {
    $('#filter_role').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
            'style',
    });
    $('#filter_active').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
            'style',
    });
    $('#filter_angkatan').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
            'style',
    });

    $('#roles').select2({
        dropdownParent: $('#modal-default'),
        placeholder: 'Sebagai',
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
            'style',
    });

    // datatable ====================================================================================
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let order_column = 4;
    if (!is_admin) order_column--;
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
                d['filter[active]'] = $('#filter_active').val();
                if (is_admin) {
                    d['filter[role]'] = $('#filter_role').val();
                } else {
                    d['filter[role]'] = '';
                }
                d['filter[angkatan]'] = $('#filter_angkatan').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'foto_link',
            name: 'foto_link',
            render(data, type, full, meta) {
                return data ? ` <img class="table-foto" src="${data}" alt="${full.nama}" onclick="viewImage('${data}', 'Foto icon ${full.nama}')"> ` : '';
            },
            orderable: false
        },
        {
            data: 'nama',
            name: 'nama',
            render(data, type, full, meta) {
                const anggatan = full.angkatan != null ?
                    `<small>${full.angkatan}</small> | ` : '';
                const sebagai = String(full.roles).split(', ').reduce((r, v) => {
                    return r + `<span class="badge bg-primary me-2">${v}</span>`;
                }, "");
                return `<a target="_blank" href="{{ url('anggota') }}/${full.id}">${full.nama}</a>
                    <br>${anggatan} ${sebagai}`;
            },
        },
        ...(is_admin ? [{
            data: 'email',
            name: 'email',
            render(data, type, full, meta) {
                const class_ = full.active == 1 ? 'success' : 'danger';
                const text = full.active == 1 ? 'Aktif' : 'Tidak Aktif';
                return `<a href="{{url('admin/setting/wa/send')}}/${full.email}" target="_blank">${data}</a><br><small>
                        <i class="fas fa-circle text-${class_} ms-0 me-2"></i>Akun ${text}</small>`;
            },
        }] : []),
        {
            data: 'ulang_tahun',
            name: 'ulang_tahun',
            render(data, type, full, meta) {
                const ulang_tahun = full.ulang_tahun == 0 ? 'Hari ini' :
                    `${full.ulang_tahun} Hari Lagi`;;
                return `${(full.tanggal_lahir == null) ? '' : `${full.tanggal_lahir} <br>`}
                    <small>${ulang_tahun}</small>`;
            },
        },
        ...(is_admin ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_profile = can_save_another ? `<a class="btn btn-rounded btn-secondary btn-sm me-1" data-toggle="tooltip" title="Ubah Profil"
                        href="{{ route('member.profile') }}?id=${data}" >
                        <i class="fas fa-user"></i></a>` : '';
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data"
                        onClick="editFunc('${full.id}')">
                        <i class="fas fa-edit"></i></button>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_profile + btn_update + btn_delete;
            },
            orderable: false
        }] : []),
        ],
        order: [
            [order_column, 'asc']
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
    $('#UserForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        resetErrorAfterInput();
        const route = ($('#id').val() == '') ? "{{ route(l_prefix($hpu,'insert')) }}" :
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

function addFunc() {
    $('#UserForm').trigger("reset");
    $('#modal-default-title').html("Tambah Data Anggota");
    $('#modal-default').modal('show');
    $('#id').val('');
    $('#roles').val(['Anggota']).trigger('change');
    resetErrorAfterInput();
    $('#password').val('12345678');
    $('#password').attr('required', true);
    render_tanggal('#tanggal_lahir');
}

function editFunc(anggota_id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'find')) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            anggota_id
        },
        success: (anggota) => {
            $('#modal-default-title').html("Ubah Data Anggota");
            $('#modal-default').modal('show');
            $('#UserForm').trigger("reset");
            $('#id').val(anggota.id);
            $('#nama').val(anggota.nama);
            $('#tanggal_lahir').val(anggota.tanggal_lahir);
            $('#angkatan').val(anggota.angkatan);

            $('#email').val(anggota.user.email);
            $('#roles').val(anggota.user.roles.map(e => e.name)).trigger('change');
            $('#active').val(anggota.user.active);
            $('#password').val('');
            $('#password').removeAttr('required');
            render_tanggal('#tanggal_lahir');
        },
        error: function (data) {
            Swal.fire({
                position: 'center',
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

function exportExcel() {
    const base = "{{ route(l_prefix($hpu,'excel')) }}";
    const active = $('#filter_active').val();
    const role = $('#filter_role').val();
    const search = $('[type=search]').val();
    let arg = `?active=${active}&role=${role}&search=${search}`;
    window.location.href = base + arg;
}

function viewImage(image, title) {
    $('#modal-image').modal('show');
    $('#modal-image-title').html(title);
    const ele = $('#modal-image-element');
    ele.attr('src', image);
    ele.attr('alt', title);
};
