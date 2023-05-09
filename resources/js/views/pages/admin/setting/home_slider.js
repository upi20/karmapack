const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isEdit = true;
const image_url = '{{ asset($image_folder) }}';
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
                d['filter[tampilkan]'] = $('#filter_tampilkan').val();
            }
        },
        columns: [{
            data: 'urutan',
            name: 'urutan'
        },
        {
            data: 'foto',
            name: 'foto',
            render(data, type, full, meta) {
                return data ? `
                            <img class="table-foto" src="${image_url}/${data}" alt="${full.nama}" onclick="viewIcon('${data}', '${full.nama}')">
                            ` : '';
            },
            orderable: false
        },
        {
            data: 'nama',
            name: 'nama'
        },
        {
            data: 'tampilkan',
            name: 'tampilkan',
            render(data, type, full, meta) {
                const class_el = data == 'Ya' ? 'text-success' : 'text-danger';
                return `<i class="fas fa-circle me-2 ${class_el}"></i>${data}`;
            },
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_view = `<button type="button" class="btn btn-rounded btn-secondary btn-sm me-1" data-toggle="tooltip" title="Lihat Data" onClick="viewFunc('${data}')">
                                <i class="fas fa-eye"></i>
                                </button>`;
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i>
                                </button>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i>
                                </button>` : '';
                return btn_view + btn_update + btn_delete;
            },
            orderable: false
        }],
        order: [
            [0, 'asc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });

    new_table.on('draw.dt', function () {
        tooltip_refresh();
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
            $('#modal-default-title').html("Ubah {{ $page_title }}");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#judul').val(data.judul);
            $('#keterangan').val(data.keterangan);
            $('#tombol_judul').val(data.tombol_judul);
            $('#tombol_link').val(data.tombol_link);
            $('#tombol_video_judul').val(data.tombol_video_judul);
            $('#tombol_video_link').val(data.tombol_video_link);
            $('#urutan').val(data.urutan);
            $('#lihat-foto').fadeIn();
            $('#lihat-foto').attr('onclick', `viewIcon('${data.foto}', '${data.nama}')`);
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
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        }
    });
}

function viewIcon(image, alt) {
    $('#modal-icon').modal('show');
    $('#icon-view-image').attr('src', `${image_url}/${image}`);
    $('#icon-view-image').attr('alt', alt);
}

function viewFunc(id) {
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
            $('#modal-detail').modal('show');
            const html = $('#modal-detail-body');

            html.append(`<h6>Urutan :</h6><p>${data.urutan ?? ''}</p>`);
            html.append(`<h6>Nama :</h6><p>${data.nama ?? ''}</p>`);
            html.append(`<h6>Judul :</h6><p>${data.judul ?? ''}</p>`);
            html.append(`<h6>Keterangan :</h6><p>${data.keterangan ?? ''}</p>`);
            html.append(`<h6>Tombol judul :</h6><p>${data.tombol_judul ?? ''}</p>`);
            html.append(`<h6>Tombol link :</h6><p>${data.tombol_link ?? ''}</p>`);
            html.append(`<h6>Tombol Video judul :</h6><p>${data.tombol_video_judul ?? ''}</p>`);
            html.append(`<h6>Tombol Video Youtube Link :</h6><p>${data.tombol_video_link ?? ''}</p>`);
            html.append(`<h6>Foto :</h6><img style="width:100%" src="${data.foto_url}" alt="${data.nama}">`);

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
