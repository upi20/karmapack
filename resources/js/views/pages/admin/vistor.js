const table_html = $('#tbl_main');
$(document).ready(function () {
    $('.select2').select2({
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
                d['filter[country]'] = $('#filter_country').val();
                d['filter[platform]'] = $('#filter_platform').val();
                d['filter[browser]'] = $('#filter_browser').val();
            }
        },
        columns: [{
            data: null,
            name: 'id',
            orderable: false,
        },
        {
            data: 'ip',
            name: 'ip',
            render(data, type, full, meta) {
                return `${data ?? ''}${full.country && data ? '<br>' : ''}<small>${full.country ?? ''}</small>`;
            },
        },
        {
            data: 'platform',
            name: 'platform',
            render(data, type, full, meta) {
                return `${data ?? ''}${full.browser && data ? '<br>' : ''}<small>${full.browser ?? ''}</small>`;
            },
        },
        {
            data: 'date_time',
            name: 'date_time',
            render(data, type, full, meta) {
                return `${full.date_str}<br><small>${full.time_str}</small>`;
            },
        },
        {
            data: 'hits',
            name: 'hits',
            render(data, type, full, meta) {
                return `${data} X`;
            },
        },
        {
            data: 'id',
            name: 'id',
            render(data, type, full, meta) {
                const btn_detail = `<button type="button" class="btn btn-rounded btn-secondary btn-sm  me-1" data-toggle="tooltip" title="Detail Data" onClick="editFunc('${data}')"><i class="fas fa-eye"></i></button>`;
                return btn_detail;
            },
            orderable: false
        }],
        order: [
            [3, 'desc']
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
});

function editFunc(id) {
    $.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu, 'find')) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id
        },
        success: (data) => {
            $('#modal-default-title').html("Detail {{ $page_title }}");
            const modal = $('#modal-default');
            modal.modal('show');

            modal.find('.modal-body').html(`
                <h6>Detail Data</h6>
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>IP</td>
                            <td>:</td>
                            <td>${data.ip ?? ''}</td>
                        </tr>
                        <tr>
                            <td>Platform</td>
                            <td>:</td>
                            <td>${data.platform ?? ''}</td>
                        </tr>
                        <tr>
                            <td>Browser</td>
                            <td>:</td>
                            <td>${data.browser ?? ''} ${data.browser_version ?? ''}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>${data.date ?? ''}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>${data.time ?? ''}</td>
                        </tr>
                        <tr>
                            <td>User Agent</td>
                            <td>:</td>
                            <td>${data.user_agent ?? ''}</td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
                ${data.has_detail == 1 ? `<h6>Detail IP</h6>
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr><td>ip</td><td>:</td><td>${data.ip_detail.ip}</td></tr>
                    <tr><td>city</td><td>:</td><td>${data.ip_detail.city}</td></tr>
                    <tr><td>country</td><td>:</td><td>${data.ip_detail.country}</td></tr>
                    <tr><td>country_code</td><td>:</td><td>${data.ip_detail.country_code}</td></tr>
                    <tr><td>loc</td><td>:</td><td>${data.ip_detail.loc}</td></tr>
                    <tr><td>region</td><td>:</td><td>${data.ip_detail.region}</td></tr>
                    <tr><td>timezone</td><td>:</td><td>${data.ip_detail.timezone}</td></tr>
                    <tr><td>created_at</td><td>:</td><td>${data.ip_detail.created_at}</td></tr>
                    </tbody>
                </table>` : ''}
            `);
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

function refreshIPdetail(element) {
    const el_text = element.innerText;
    const el_html = element.innerHTML;
    setBtnLoading(element, el_text);
    $.ajax({
        type: "GET",
        url: `{{ route(l_prefix($hpu, 'refresh_detail_ip')) }}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Berhasil...',
                showConfirmButton: false,
                timer: 1500
            })
            var oTable = table_html.dataTable();
            oTable.fnDraw(false);
            setTimeout(() => {
                const counter = $('#ip_detail_count');
                if (data == 0) counter.parent().fadeOut();
                counter.text(data);
            }, 1000);
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
            setBtnLoading(element, el_html, false);
        }
    });
}
