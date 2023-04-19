
function setBtnLoading(element, text, status = true) {
    const el = $(element);
    if (status) {
        el.attr("disabled", "");
        el.html(
            `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true">
                        </span> <span>${text}</span>`
        );
    } else {
        el.removeAttr("disabled");
        el.html(text);
    }
}

function protfolioDetail(element, key) {
    setBtnLoading(element, `Loading...`);
    $.ajax({
        type: "GET",
        url: "{{ route('home.portfolio.detail') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { key },
        success: (data) => {
            renderPortfolioModal(data);
            setBtnLoading(element, `Lihat Detail`, false);
        },
        error: function (data) {
            setBtnLoading(element, `Lihat Detail`, false);
        },
        complete: function () {
            setBtnLoading(element, `Lihat Detail`, false);
        }
    });
}

function renderPortfolioModal(data) {
    $('#portfolioModal').modal('show');
    const foto = $('#portfolioModalFoto');

    foto.attr('src', data.foto_url);
    foto.attr('alt', data.nama);

    $('#portfolioModalNama').html(data.nama);
    $('#portfolioModalKeterangan').html(data.keterangan);

    // items
    const items = $('#portfolioModalItems');
    let items_html = '';
    data.items.forEach(e => {
        items_html += `<li>${e.nama}: <span class="meta-value">${e.keterangan}</span></li>`;
    });

    if (items_html != '') {
        items.parent().parent().show();
        items.html(items_html);
    } else {
        items.parent().parent().hide();
    }
}
