$(document).ready(function () {
    $('#Loginform').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit]', 'Masuk');
        if (formData.get('email').length == "") {
            Swal.fire({ icon: 'warning', title: 'Oops...', text: 'Email is required !' });
            setBtnLoading('button[type=submit]', 'Masuk', false);
        } else if (password.length == "") {
            Swal.fire({ icon: 'warning', title: 'Oops...', text: 'Password is required !' });
            setBtnLoading('button[type=submit]', 'Masuk', false);
        } else {
            $.ajax({
                url: "{{ route('login.check_login') }}",
                type: "POST",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login successful!',
                            text: 'You will be redirected in 2 Seconds',
                            timer: 2000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.href = "{{ $redirect }}";

                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed!',
                            text: 'Please try again!'
                        });
                    }
                },
                error: function (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: response.responseJSON.message
                    });
                    console.log(response);
                },
                complete: function (response) {
                    setBtnLoading('button[type=submit]', 'Masuk', false);
                }
            });
        }
    });

    function setBtnLoading(element, text, status = true) {
        const el = $(element);
        if (status) {
            el.attr("disabled", "");
            el.html(
                `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"> </span> ${text}`
            );
        } else {
            el.removeAttr("disabled");
            el.html(text);
        }
    }

    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bx-hide");
            $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bx-hide");
            $('#show_hide_password i').addClass("bx-show");
        }
    });
});
