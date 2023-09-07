
$(document).ready(e => {
    function setStatus(status, bg) {
        $('#status_form').html(`Status: <span class="badge bg-${bg}">${status}</span>`);
    }

    function setBtnReset(view) {
        const btn = $('#btn-reset');
        if (view == 0 || view == 1) {
            btn.fadeIn();
        } else {
            btn.fadeOut();
        }
    }

    $('#MainForm').submit(function (e) {
        e.preventDefault();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan');
        $.ajax({
            type: "POST",
            url: "{{ route(l_prefix($hpu,'save')) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                setStatus(data.status_str, data.status_bg);
                setBtnReset(data.status);
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
                    '<li class="fas fa-save mr-1"></li> Simpan',
                    false);
            }
        });
    });

    $('#btn-reset').click(() => {
        swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to proceed ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: `{{ route(l_prefix($hpu,'reset')) }}`,
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
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
                            title: '{{ $page_title }} deleted successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#sebagai').val('');
                        $('#profesi').val('');
                        $('#deskripsi').val('');
                        setStatus(data.status_str, data.status_bg)
                        setBtnReset(data.status);
                    },
                    complete: function () {
                        swal.hideLoading();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal.hideLoading();
                        swal.fire("!Opps ",
                            "Something went wrong, try again later",
                            "error");
                    }
                });
            }
        });
    })
})
