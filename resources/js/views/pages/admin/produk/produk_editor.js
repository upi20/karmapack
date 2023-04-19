const isEdit = "{{ $isEdit == 'true' ? 'true' : 'false' }}" === "true";
let isEditFoto = true;
let isEditMarketplace = true;
const table_html_foto = $('#tbl_foto');
const table_html_marketplace = $('#tbl_marketplace');
$(document).ready(function () {
    $('#produk_tampilkan_harga').change(function () {
        const harga = $('#row-harga');
        if (this.value == 1) harga.fadeIn();
        else harga.fadeOut();
    });

    $('.select2').select2();
    $('#marketplace_jenis_id').select2({
        dropdownParent: $('#modal-marketplace'),
    });
    // init summernote
    $('.summernote').summernote({
        toolbar: [
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['style',
                ['bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'superscript',
                    'subscript',
                    'clear'
                ]
            ],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['color', ['color']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']],
            ['table', ['table']],
            ['insert', ['link', 'unlink', 'audio', 'hr', 'picture']],
            ['mybutton', ['myVideo']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']],
        ],
        buttons: {
            myVideo: function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fab fa-youtube"></i>',
                    tooltip: 'video',
                    click: function () {
                        var div = document.createElement('div');
                        div.classList.add('embed-container');
                        var iframe = document.createElement('iframe');
                        var src = prompt('Enter video url:');
                        src = youtube_parser(src);
                        iframe.src =
                            `https://www.youtube.com/embed/${src}?autoplay=1&fs=1&iv_load_policy=&showinfo=1&rel=0&cc_load_policy=1&start=0&modestbranding&end=0&controls=1`;
                        iframe.setAttribute('frameborder', 0);
                        iframe.setAttribute('width', '100%');
                        iframe.setAttribute('height', '500px');
                        iframe.setAttribute('type', 'text/html');
                        iframe.setAttribute('allowfullscreen', true);
                        div.appendChild(iframe);
                        context.invoke('editor.insertNode', div);
                    }
                });
                return button.render();
            }
        },
        height: 200,
    });
    // Datatable
    const table_foto = table_html_foto.DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        // responsive: true,
        scrollX: true,
        aAutoWidth: false,
        bAutoWidth: false,
        type: 'GET',
        ajax: {
            url: "{{ route(l_prefix($hpu,'foto', $prefix_count)) }}",
            data: function (d) {
                d['filter[produk_id]'] = '{{ $produk->id }}';
            }
        },
        columns: [{
            data: 'urutan',
            name: 'urutan',
        },
        {
            data: 'foto_link',
            name: 'foto_link',
            render(data, type, full, meta) {
                return data ? `
                            <img class="table-foto" src="${data}" alt="${full.nama}" onclick="viewImage('${data}', 'Foto icon ${full.nama}')">
                            ` : '';
            },
            orderable: false
        },
        {
            data: 'nama',
            name: 'nama',
        }, {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="foto_edit('${data}')">
                                <i class="fas fa-edit"></i> </button>`;
                const btn_delete = `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="foto_delete('${data}')">
                                <i class="fas fa-trash"></i> </button>`;
                return btn_update + btn_delete;
            },
            orderable: false,
            className: 'text-nowrap'
        },
        ],
        order: [
            [0, 'asc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });

    const table_marketplace = table_html_marketplace.DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        // responsive: true,
        scrollX: true,
        aAutoWidth: false,
        bAutoWidth: false,
        type: 'GET',
        ajax: {
            url: "{{ route(l_prefix($hpu,'prod_mt', $prefix_count)) }}",
            data: function (d) {
                d['filter[produk_id]'] = '{{ $produk->id }}';
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'jenis_nama',
            name: 'jenis_nama',
        },
        {
            data: 'link',
            name: 'link',
            render(data, type, full, meta) {
                let jenis = full.jenis_link_produk == null ? full.jenis_link : full
                    .jenis_link_produk;
                let link = data == null ? (jenis) : data;
                return `<a target="_blank" href="${link}">Lihat</a>`;
            },
            orderable: false
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_update = `<button type="button" class="btn btn-rounded btn-primary btn-sm me-1" data-toggle="tooltip" title="Ubah Data" onClick="marketplace_edit('${data}')">
                                <i class="fas fa-edit"></i> </button>`;
                const btn_delete = `<button type="button" class="btn btn-rounded btn-danger btn-sm me-1" data-toggle="tooltip" title="Hapus Data" onClick="marketplace_delete('${data}')">
                                <i class="fas fa-trash"></i> </button>`;
                return btn_update + btn_delete;
            },
            orderable: false,
            className: 'text-nowrap'
        },
        ],
        order: [
            [1, 'asc']
        ],
        language: {
            url: datatable_indonesia_language_url
        }
    });

    table_marketplace.on('draw.dt', function () {
        tooltip_refresh();
        var PageInfo = table_html_marketplace.DataTable().page.info();
        table_marketplace.column(0, {
            page: 'current'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    // Main form
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[form=MainForm]', 'Simpan');
        $.ajax({
            type: "POST",
            url: '{{ $route_save }}',
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
                if (isEdit) {
                    window.location.reload();
                } else {
                    window.location.href =
                        `{{ route(l_prefix($hpu,'update', $prefix_count), $produk->id) }}`;
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
                    position: 'top-end',
                    icon: 'error',
                    title: res.message ?? 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
                setBtnLoading('button[form=MainForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan',
                    false);
            },
            complete: function () {
                setBtnLoading('button[form=MainForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan',
                    false);
            }
        });
    });

    // Foto form
    $('#FotoForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[form=FotoForm]', 'Simpan');
        const route = ($('#foto_id').val() == '') ?
            "{{ route(l_prefix($hpu,'foto.insert', $prefix_count)) }}" :
            "{{ route(l_prefix($hpu,'foto.update', $prefix_count)) }}";
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
                $("#modal-foto").modal('hide');
                var oTable = table_html_foto.dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                isEditFoto = true;
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
                setBtnLoading('button[form=FotoForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            },
            complete: function () {
                setBtnLoading('button[form=FotoForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });

    // Marketplace form
    $('#MarketplaceForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('button[form=MarketplaceForm]', 'Simpan');
        const route = ($('#marketplace_id').val() == '') ?
            "{{ route(l_prefix($hpu,'prod_mt.insert', $prefix_count)) }}" :
            "{{ route(l_prefix($hpu,'prod_mt.update', $prefix_count)) }}";
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
                $("#modal-marketplace").modal('hide');
                var oTable = table_html_marketplace.dataTable();
                oTable.fnDraw(false);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                isEditMarketplace = true;
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
                setBtnLoading('button[form=MarketplaceForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            },
            complete: function () {
                setBtnLoading('button[form=MarketplaceForm]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});

// foto
function foto_insert() {
    if (!isEditFoto) return false;
    $('#FotoForm').trigger("reset");
    $('#modal-foto-title').html("Tambah Foto Produk");
    $('#modal-foto').modal('show');
    $('#foto_id').val('');
    $('#foto_foto').val('');
    $('#lihat-foto_foto').hide();
    $('#foto_foto').attr('required', '');
    resetErrorAfterInput();
    isEditFoto = false;
    return true;
}

function foto_edit(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'foto.find', $prefix_count)) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id
        },
        success: (data) => {
            isEditFoto = true;
            $('#modal-foto-title').html("Ubah Foto Produk");
            $('#modal-foto').modal('show');
            $('#foto_id').val(data.id);
            $('#foto_nama').val(data.nama);
            $('#foto_urutan').val(data.urutan);
            $('#lihat-foto').fadeIn();
            $('#lihat-foto')
                .attr('onclick', `viewImage('${data.foto_link}', 'Foto Icon ${data.nama}')`);
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

function foto_delete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url(l_prefix_uri($hpu,'foto', $prefix_count)) }}/${id}`,
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
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    var oTable = table_html_foto.dataTable();
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

function viewImage(image, title) {
    $('#modal-image').modal('show');
    $('#modal-image-title').html(title);
    const ele = $('#modal-image-element');
    ele.attr('src', image);
    ele.attr('alt', title);
};

// marketplace
function marketplace_insert() {
    if (!isEditMarketplace) return false;
    $('#MarketplaceForm').trigger("reset");
    $('#modal-marketplace-title').html("Tambah Marketplace Produk");
    $('#modal-marketplace').modal('show');
    $('#marketplace_id').val('');
    $('#marketplace_jenis_id').val('').trigger('change');
    resetErrorAfterInput();
    isEditMarketplace = false;
    return true;
}

function marketplace_edit(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu,'prod_mt.find', $prefix_count)) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id
        },
        success: (data) => {
            isEditMarketplace = true;
            $('#modal-marketplace-title').html("Ubah Marketplace Produk");
            $('#modal-marketplace').modal('show');
            $('#marketplace_id').val(data.id);
            $('#marketplace_link').val(data.link);
            $('#marketplace_jenis_id').val(data.jenis_id).trigger('change');
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

function marketplace_delete(id) {
    swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to proceed ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: `{{ url(l_prefix_uri($hpu,'prod_mt', $prefix_count)) }}/${id}`,
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
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    var oTable = table_html_marketplace.dataTable();
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
