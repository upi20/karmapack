const table_html = $('#tbl_main');
$(document).ready(function () {
    $('#sensus_alert').fadeOut();
    function setInputLoad(load = true) {
        const nama = $('#nama');
        const angkatan = $('#angkatan');
        const email = $('#email');
        const telepon = $('#telepon');
        const whatsapp = $('#whatsapp');
        if (load) {
            nama.attr('readonly', '');
            angkatan.attr('readonly', '');
            email.attr('readonly', '');
            telepon.attr('readonly', '');
            whatsapp.attr('readonly', '');
        } else {
            nama.removeAttr('readonly');
            angkatan.removeAttr('readonly');
            email.removeAttr('readonly');
            telepon.removeAttr('readonly');
            whatsapp.removeAttr('readonly');
        }

    }
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        $('#sensus_alert').fadeOut();
        setInputLoad();
        resetErrorAfterInput();
        var formData = new FormData(this);
        setBtnLoading('#submit', 'Kirim Data');
        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.sensus.insert') }}",
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
                    title: 'Data Berhasil disimpan',
                    showConfirmButton: true,
                })
                $('#sensus_alert').fadeIn();
                $('#MainForm').trigger("reset");
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
                setInputLoad(false);
                $('#sensus_alert').fadeOut();
            },
            complete: function () {
                setBtnLoading('#submit', 'Kirim Data', false);
                setInputLoad(false);
            }
        });
    });
});
