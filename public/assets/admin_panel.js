let errorAfterInput = [];

function setErrorAfterInput(error, element) {
    // get element after input
    let after = $(element).next();
    if (after.length == 0) $(element).after('<div></div>');
    if (after.length == 0) after = $(element).next();

    // highlight
    $(element).addClass("is-invalid").removeClass("is-valid");
    let errors = Array.isArray(error) ? '' : `<li class="text-danger">${error}</li>`;
    if (Array.isArray(error)) {
        error.forEach(err => {
            errors += `<li class="text-danger">${err}</li>`;
        });
    }

    after.html(`<div><ul style="padding-left: 20px;">${errors}</ul></div>`);
}

function resetErrorAfterInput() {
    errorAfterInput.forEach(id => {
        // get element after input
        const element = $(`#${id}`);
        let after = $(element).next();
        if (after.length == 0) $(element).after('<div></div>');
        if (after.length == 0) after = $(element).next();
        $(element).addClass("is-valid").removeClass("is-invalid");
        after.html('');
    });
}

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

function setToast(
    message = 'Hello, world! This is a toast message.',
    classAttr = ['text-white', 'bg-light']
) {
    var myToastEl = document.getElementById('toast');
    const toastJq = $(myToastEl);
    classAttr.forEach(element => {
        toastJq.addClass(element);
    });
    $("#toast-body").html(message);

    const delay = toastJq.attr('data-bs-delay');

    myToastEl.addEventListener('hidden.bs.toast', function () {
        toastJq.attr("class", "toast fade hide");
    });
    let counter = 0;
    const iterator = delay / 50;
    const progressbar = setInterval(() => {
        counter += iterator;
        const percent = Math.floor((50 / (delay * 0.50)) * counter);
        const progres_bar = $('#toast-progresbar');
        progres_bar.attr('style', `width: ${percent}%`);

        if (counter >= delay) {
            clearInterval(progressbar);
        }
    }, iterator);

    $('.toast').toast('show');
}

function youtube_parser(url) {
    var regExp =
        /^https?\:\/\/(?:www\.youtube(?:\-nocookie)?\.com\/|m\.youtube\.com\/|youtube\.com\/)?(?:ytscreeningroom\?vi?=|youtu\.be\/|vi?\/|user\/.+\/u\/\w{1,2}\/|embed\/|watch\?(?:.*\&)?vi?=|\&vi?=|\?(?:.*\&)?vi?=)([^#\&\?\n\/<>"']*)/i;
    var match = url.match(regExp);
    return (match && match[1].length == 11) ? match[1] : false;
}

function tooltip_refresh() {
    try {
        $('[data-toggle="tooltip"]').tooltip();
    } catch (error) {
        console.log(error);
    }
}

function format_tanggal(tanggal_input) {
    var date = new Date(tanggal_input);
    var tahun = date.getFullYear();
    var bulan = date.getMonth();
    var tanggal = date.getDate();
    var hari = date.getDay();
    var jam = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    switch (hari) {
        case 0: hari = "Minggu"; break;
        case 1: hari = "Senin"; break;
        case 2: hari = "Selasa"; break;
        case 3: hari = "Rabu"; break;
        case 4: hari = "Kamis"; break;
        case 5: hari = "Jum'at"; break;
        case 6: hari = "Sabtu"; break;
    }
    switch (bulan) {
        case 0: bulan = "Januari"; break;
        case 1: bulan = "Februari"; break;
        case 2: bulan = "Maret"; break;
        case 3: bulan = "April"; break;
        case 4: bulan = "Mei"; break;
        case 5: bulan = "Juni"; break;
        case 6: bulan = "Juli"; break;
        case 7: bulan = "Agustus"; break;
        case 8: bulan = "September"; break;
        case 9: bulan = "Oktober"; break;
        case 10: bulan = "November"; break;
        case 11: bulan = "Desember"; break;
    }

    const tanggal_str = (hari) ? (hari + " " + tanggal + " " + bulan + " " + tahun) : '';
    const waktu = jam + ":" + menit + ":" + detik;
    return {
        tanggal: tanggal_str,
        waktu
    }
}

function render_tanggal(e) {
    const tanggal = format_tanggal($(e).val()).tanggal;
    if ($(e).next().is('small')) {
        $(e).next().html(tanggal);
    } else {
        $(`<small>${tanggal}</small>`).insertAfter(e);
    }
}
