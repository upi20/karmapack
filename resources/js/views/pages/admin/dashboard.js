$(document).ready(function () {
    var start = moment().startOf('month');
    var end = moment().endOf('month');

    function cb(start, end) {
        $('#datepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        const date_start = start.format('YYYY-MM-DD');
        const date_end = end.format('YYYY-MM-DD');
        refreshVistor({
            start: date_start,
            end: date_end
        });
    }

    $('#datepicker').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Hari ini': [moment(), moment()],
            'Hari Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'),
            moment().subtract(1, 'month').endOf('month')
            ],
        }
    }, cb);

    cb(start, end);

    $('#datepicker').on('apply.daterangepicker', function (ev, picker) {
        global_date_start = picker.startDate.format('YYYY-MM-DD');
        global_date_end = picker.endDate.format('YYYY-MM-DD');
    });
});

function refreshVistor(tanggal) {
    // console.log(tanggal);
    const container = $('#penghitung-container');
    container.LoadingOverlay("show");
    $.ajax({
        type: "GET",
        url: "{{ route(l_prefix($hpu,'vistor_counter')) }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: tanggal,
        success: (data) => {
            // console.log(data);
            renderVistor(data.vistors);
            renderPlatform(data.platforms);
            renderBrowser(data.browsers);
            container.LoadingOverlay("hide");
        },
        error: function (data) {
            // console.log(data);
            container.LoadingOverlay("hide");
        },
        complete: function () {
            container.LoadingOverlay("hide");
        }
    });
}

function renderVistor(datas) {
    const data = [];
    const categories = [];
    const container = document.querySelector("#chart-pengunjung");
    container.innerHTML = '';
    datas.forEach(e => {
        data.push(e.value);
        categories.push(e.title);
    })

    var options = {
        chart: {
            foreColor: '#9ba7b2',
            type: 'bar',
            height: 360
        },
        series: [{
            name: 'Pengunjung',
            data
        }],
        xaxis: {
            categories
        },
        plotOptions: {
            bar: {
                horizontal: false,
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
    }

    var chart = new ApexCharts(container, options);
    chart.render();
}

function renderPlatform(datas) {
    let counter = 1;
    const columns = [];
    const container = '#chart-platform';
    document.querySelector(container).innerHTML = '';

    datas.forEach(e => {
        columns.push([e.title, e.value]);
        counter++;
    });

    var chart = c3.generate({
        bindto: container,
        data: {
            columns,
            type: 'donut',
        },
        axis: {},
        legend: {
            show: true,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
}

function renderBrowser(datas) {
    let counter = 1;
    const columns = [];
    const container = '#chart-browser';
    document.querySelector(container).innerHTML = '';

    datas.forEach(e => {
        columns.push([e.title, e.value]);
        counter++;
    });

    var chart = c3.generate({
        bindto: container,
        data: {
            columns,
            type: 'donut',
        },
        axis: {},
        legend: {
            show: true,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });

}


function ulang_tahun(limit = 7) {
    const body = $('#ulang_tahun_body');
    const container = $('#ulang_tahun_container');
    container.LoadingOverlay("show");
    $.get(`{{ route(l_prefix($hpu,'ulang_tahun')) }}?limit=${limit}`, function (data) {
        if (data.length > 0) {
            body.html('');
            container.fadeIn();
            data.forEach(e => {
                const hari = e.countdown == 0 ? 'Hari ini' : `${e.countdown} Hari Lagi`;
                body.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                            <div>
                                <div class="w-100">
                                    <h6 class="m-0">${e.nama}</h6>
                                    <small>${e.tanggal_str}</small>
                                </div>
                            </div>

                            <div class="text-nowrap fw-bold ms-2"> ${hari} </div>
                        </div>`);
            });

        } else {
            container.fadeOut();
        }
        container.LoadingOverlay("hide");
    });
};

function hbn(limit = 7) {
    const body = $('#hbn_body');
    const container = $('#hbn_container');
    container.LoadingOverlay("show");
    $.get(`{{ route(l_prefix($hpu,'hbn')) }}?limit=${limit}`, function (data) {
        if (data.length > 0) {
            body.html('');
            container.fadeIn();
            data.forEach(e => {
                const hari = e.countdown == 0 ? 'Hari ini' : `${e.countdown} Hari Lagi`;
                body.append(`<div class="list-group-item list-group-item-action d-md-flex flex-row justify-content-between">
                            <div>
                                <div class="w-100">
                                    <h6 class="m-0">${e.nama}</h6>
                                    <small>${e.tanggal_str}</small>
                                </div>
                            </div>

                            <div class="text-nowrap fw-bold ms-2"> ${hari} </div>
                        </div>`);
            });

        } else {
            container.fadeOut();
        }
        container.LoadingOverlay("hide");
    });
};

hbn();
ulang_tahun();

$('#FilterForm').submit(function (e) {
    e.preventDefault();
    const limit = $('#limit').val();
    hbn(limit);
    ulang_tahun(limit);
});
