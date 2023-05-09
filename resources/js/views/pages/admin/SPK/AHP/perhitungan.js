
const can_update = "{{ $can_update == 'true' ? 'true' : 'false' }}" === "true";
const can_delete = "{{ $can_delete == 'true' ? 'true' : 'false' }}" === "true";
const table_html = $('#tbl_main');
const alternatif_title = '{{$alternatif_title}}';

function renderNumber(number, fix = 2) {
    const nm = Number(number);

    if (isNaN(nm)) {
        return number;
    }

    return Number.isInteger(number) ? nm : nm.toFixed(fix);
};

function renderTable(element_table) {
    const tableUser = $(element_table).DataTable({
        columnDefs: [{
            orderable: false,
            targets: [0]
        }],
        scrollX: true,
        aAutoWidth: true,
        bAutoWidth: true,
        order: [
            [1, 'asc']
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

function tableHasil() {
    const renderTabelCalon = (datas) => {
        const element_table = $('#tbl_main');
        const table_body = element_table.find('tbody');
        const table_head = element_table.find('thead');
        $(element_table).dataTable().fnDestroy();
        if ($.fn.DataTable.isDataTable(element_table)) {
            element_table.DataTable().destroy();
        }
        table_body.html('');
        table_head.html('');

        // generate table header
        let table_head_html_item = '';
        datas.header.forEach((e, i) => {
            table_head_html_item += `<th>${e.kode}</th>`;
        });

        let table_head_html = `<tr>
                <th>No</th>
                <th>${alternatif_title}</th>
                ${table_head_html_item}
                <th>Total</th>
                <th>Ranking</th>
            </tr>`;

        // generate table body
        let table_body_html = '';
        datas.body.forEach(e => {
            let table_body_html_item = '';
            e.kriterias.forEach((j) => {
                table_body_html_item += ` <td title="${j.jumlah}">${renderNumber(j.jumlah, 3)}</td> `;
            });
            table_body_html += ` <tr>
            <td> </td>
            <td>${e.anggota.nama}</td>
            ${table_body_html_item}
            <td title="${e.total_prioritas}">${renderNumber(e.total_prioritas, 3)}</td>
            <td>${e.rank}</td>
            </tr> `;
        });


        // render table
        table_head.html(table_head_html);
        table_body.html(table_body_html);
        renderTable(element_table);
    }

    $.ajax({
        method: 'get',
        url: `{{ url(l_prefix_uri($hpu,'hasil')) }}`
    }).done((data) => {
        renderTabelCalon(data);
    }).fail(($xhr) => {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Something went wrong, try again later',
            showConfirmButton: false,
            timer: 3500
        })
    })
}

tableHasil();
