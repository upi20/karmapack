$(document).ready(function () {
    $('#message_form').submit(function (e) {
        const form = this;
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit]',
            `Mengirim...`);
        $.ajax({
            type: "POST",
            url: "{{ route('kontak.send') }}",
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
                    title: 'Pesan berhasil dikirim !',
                    showConfirmButton: true,
                    timer: 4500
                })
                $(form).trigger("reset");
                setBtnLoading('button[type=submit]',
                    `{{ setting_get('setting.contact.message.button_text') }}`,
                    false);
            },
            error: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
                setBtnLoading('button[type=submit]',
                    `{{ setting_get('setting.contact.message.button_text') }}`,
                    false);
            },
            complete: function () {
                setBtnLoading('button[type=submit]',
                    `{{ setting_get('setting.contact.message.button_text') }}`,
                    false);
            }
        });
    });
});

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
