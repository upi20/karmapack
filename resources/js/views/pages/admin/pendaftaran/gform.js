const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const is_admin = "{{ $is_admin == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
let isEdit = true;
$(document).ready(function () {
    $('#filter_user_id').select2({
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
            }
        },
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
                d['filter[status]'] = $('#filter_status').val();
                d['filter[tampilkan]'] = $('#filter_tampilkan').val();
                d['filter[user_id]'] = is_admin ? $('#filter_user_id').val() :
                    '{{ auth()->user()->id }}';
            }
        },
        columns: [
            {
                data: 'no_urut',
                name: 'no_urut'
            },
            ...(is_admin ? [{
                data: 'user',
                name: 'user',
                orderable: false
            }] : []),
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'slug',
                name: 'slug',
                render(data, type, full, meta) {
                    const link = `{{ url('f') }}/${data}`;
                    return data ? `
                            <button class="btn btn-primary btn-sm" title="Copy Link To Clipboard" onclick="copyToClipboard('${link}')">
                                <i class="fas fa-clipboard" aria-hidden="true"></i>
                                </button>
                            ` : '';
                },
            },
            {
                data: 'foto',
                name: 'foto',
                render(data, type, full, meta) {
                    return data ? `
                            <button class="btn btn-primary btn-sm" onclick="viewIcon('${data}')"><i class="fas fa-eye" aria-hidden="true"></i> </button>
                            ` : '';
                },
            },
            {
                data: 'dari',
                name: 'dari'
            },
            {
                data: 'sampai',
                name: 'sampai'
            },
            {
                data: 'id',
                name: 'id',
                render(data, type, full, meta) {
                    return `
                                <button type="button" class="btn btn-rounded btn-secondary btn-sm" title="Detail Data" onClick="detail('${data}')">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                                </button>
                                `;
                },
            },
            {
                data: 'tampilkan_str',
                name: 'tampilkan',
                render(data, type, full, meta) {
                    const class_el = full.status == 1 ? 'success' :
                        (full.status == 2 ? 'warning' : 'danger');
                    return `<i class="fas fa-circle text-${class_el} ms-0 me-2"></i>${data}`;
                },
            },
            {
                data: 'status_str',
                name: 'status',
                render(data, type, full, meta) {
                    const class_el = full.status == 1 ? 'success' :
                        (full.status == 2 ? 'warning' : 'danger');
                    return `<i class="fas fa-circle text-${class_el} ms-0 me-2"></i>${data}`;
                },
            },
            ...(can_update || can_delete ? [{
                data: 'id',
                name: 'id',
                render(data, type, full, meta) {
                    const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1"data-toggle="tooltip"  title="Ubah Data" onClick="editFunc('${data}')">
                                <i class="fas fa-edit"></i></button>` : '';
                    const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                                <i class="fas fa-trash"></i></button>` : '';
                    return btn_update + btn_delete;
                },
                orderable: false
            }] : []),
        ],
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
    $('#lihat-foto').hide();
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
            $('#dari').val(data.dari);
            $('#deskripsi').val(data.deskripsi);
            $('#id').val(data.id);
            $('#link').val(data.link);
            $('#nama').val(data.nama);
            $('#no_urut').val(data.no_urut);
            $('#sampai').val(data.sampai);
            $('#slug').val(data.slug);
            $('#status').val(data.status);
            $('#tampilkan').val(data.tampilkan);
            $('#lihat-foto').fadeIn();
            $('#lihat-foto').attr('onclick', `viewIcon('${data.foto}')`);
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

function viewIcon(image) {
    $('#modal-icon').modal('show');
    $('#icon-view-image').attr('src', `{{ asset($image_folder) }}/${image}`);
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
                    <h4>Deskripsi</h4>
                    <p>${data.deskripsi}</p>

                    <h4>Slug</h4>
                    <a href="{{ url('f') }}/${data.slug}">{{ url('f') }}/${data.slug}</a>
                    <br>
                    <br>
                    <h4>Link Google Form</h4>
                    <a href="${data.link}">${data.link}</a>`);
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
