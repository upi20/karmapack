const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const can_member = "{{ $can_member == 'true' ? 'true' : 'false' }}" === "true";

const table_html = $('#tbl_main');
$(document).ready(function () {
    tinymce.init({
        selector: '.tinymce',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code',
        toolbar: 'undo redo | fontsize bold italic underline strikethrough align lineheight | link image media table | addcomment showcomments | spellcheckdialog a11ycheck | checklist numlist bullist indent outdent | emoticons charmap | blocks fontfamily removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
        {
            value: 'Email',
            title: 'Email'
        },
        ],
        height: 300,
        image_class_list: [{
            title: 'none',
            value: ''
        },
        {
            title: 'Margin Right 1',
            value: 'me-1'
        },
        {
            title: 'Margin Right 2',
            value: 'me-2'
        },
        {
            title: 'Margin Right 3',
            value: 'me-3'
        },
        {
            title: 'Margin Right 4',
            value: 'me-4'
        },
        ],
        images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "{{ route('image_to_base64') }}");
            xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };
            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.base64 != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.base64);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }),
        relative_urls: false,
        skin: document.querySelector('html').classList.contains('dark-theme') ? "oxide-dark" : "oxide",
        content_css: document.querySelector('html').classList.contains('dark-theme') ? "dark" : "default",
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
            url: "{{ route(l_prefix($hpu,null, 1), $periode_id) }}",
            data: function (d) {
                d['filter[status]'] = $('#filter_status').val();
                d['filter[role]'] = $('#filter_role').val();
            }
        },
        columns: [{
            data: 'urutan',
            name: 'urutan'
        },
        {
            data: 'nama',
            name: 'nama',
            render(data, type, full, meta) {
                const parent = full.parent ? `<br><small>${full.parent}</small>` : '';
                return data + parent;
            },
        },
        {
            data: 'role',
            name: 'role'
        },
        {
            data: 'status',
            name: 'status',
            render(data, type, full, meta) {
                const class_ = data == 1 ? 'success' : 'danger';
                const text = data == 1 ? 'Dipakai' : 'Tidak Dipakai';
                return `<i class="fas fa-circle text-${class_} ms-0 me-2"></i>${text}`;
            },
        },
        ...((can_member || can_update || can_delete) ? [{
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_member = can_member ? `<a class="btn btn-rounded btn-secondary btn-sm my-1 me-1" data-toggle="tooltip" title="Daftar Anggota"
                        href="{{ url(l_prefix_uri($hpu,'member', 1)) }}/${data}" >
                        <i class="fas fa-user"></i></a>` : '';
                const btn_update = can_update ? `<button type="button" class="btn btn-rounded btn-primary btn-sm my-1 me-1" data-toggle="tooltip" title="Ubah Data"
                        data-id="${full.id}"
                        data-nama="${full.nama}"
                        data-status="${full.status}"
                        data-slug="${full.slug}"
                        data-parent_id="${full.parent_id}"
                        data-no_urut="${full.no_urut}"
                        data-visi="${full.visi ?? ''}"
                        data-misi="${full.misi ?? ''}"
                        data-slogan="${full.slogan ?? ''}"
                        data-singkatan="${full.singkatan ?? ''}"
                        data-role_id="${full.role_id ?? ''}"
                        onClick="editFunc(this)">
                        <i class="fas fa-edit"></i></button>` : '';
                const btn_delete = can_delete ? `<button type="button" class="btn btn-rounded btn-danger btn-sm  my-1 me-1" data-toggle="tooltip" title="Hapus Data" onClick="deleteFunc('${data}')">
                        <i class="fas fa-trash"></i></button>` : '';
                return btn_member + btn_update + btn_delete;
            },
        }] : []),
        ],
        "ordering": false,
        "pageLength": 100,
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
        refreshSlug();
    });

    $("#parent_id").change(function () {
        refreshSlug();
    });

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        const route = ($('#id').val() == '') ?
            "{{ route(l_prefix($hpu,'insert', 1), $periode_id) }}" :
            "{{ route(l_prefix($hpu,'update', 1), $periode_id) }}";
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
    $('#MainForm').trigger("reset");
    $('#modal-default-title').html("Tambah Bidang");
    $('#modal-default').modal('show');
    $('#id').val('');
    $('#status').val('1');
    tinymce.get("visi").setContent("");
    tinymce.get("misi").setContent("");
    resetErrorAfterInput();
    refresh_parent('{{ $periode_id }}', '', '#parent_id');
}

function editFunc(datas) {
    const data = datas.dataset;
    $('#modal-default-title').html("Ubah Bidang");
    $('#modal-default').modal('show');
    $('#MainForm').trigger("reset");
    $('#id').val(data.id);
    $('#nama').val(data.nama);
    $('#status').val(data.status);
    $('#slug').val(data.slug);
    $('#singkatan').val(data.singkatan);
    $('#role_id').val(data.role_id);
    $('#no_urut').val(data.no_urut);
    tinymce.get("visi").setContent(data.visi);
    tinymce.get("misi").setContent(data.misi);
    $('#slogan').val(data.slogan);
    refresh_parent('{{ $periode_id }}', data.parent_id, '#parent_id');
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
                url: `{{ url(l_prefix_uri($hpu,null, 1)) }}/${id}`,
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

function refresh_parent(periode_id, selected_id = '', option_id = '', custom_fun = null) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route(l_prefix($hpu,'parent', 1)) }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            periode_id: periode_id
        },
        success: (data) => {
            if (custom_fun) {
                custom_fun(data);
                return;
            }
            if (data.results) {
                const selected_element = $(`${option_id}`);
                selected_element.html('');
                let options = '';
                data.results.forEach(e => {
                    const selected = (e.id == selected_id) ? 'selected' : '';
                    options += `<option ${selected} value="${e.id}">${e.text}</option>`;
                });
                selected_element.html(options);

            }
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
            $.LoadingOverlay("hide");
        },
        complete: function () {
            $.LoadingOverlay("hide");
        }
    });
}

function tes_datatable(custom_fun = null) {
    $.ajax({
        type: "GET",
        url: "{{ route(l_prefix($hpu,null, 1), $periode_id) }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            if (custom_fun) {
                custom_fun(data);
            }
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        },
    });
}

function refreshSlug() {
    var Text = $("#nama").val();
    const sel = document.getElementById('parent_id');
    let bidang_utama = sel.value != '' ? sel.options[sel.selectedIndex].text + ' ' : '';
    bidang_utama = bidang_utama.toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-');

    Text = Text.toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-');

    $("#slug").val(`{{ $periode_dari }}-{{ $periode_sampai }}-${bidang_utama + Text}`);
}
