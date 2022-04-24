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
