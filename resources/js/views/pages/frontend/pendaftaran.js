$(document).ready(function () {
    $('#tanggal_lahir').change(function () {
        render_tanggal(this)
    });

    $('#mainForm').submit(function (e) {
        const form = this;
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('button[type=submit]', `Mengirim...`);
        $.ajax({
            type: "POST",
            url: "{{ route('pendaftaran.send') }}",
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
                    title: 'Formulir berhasil dikirim !',
                    showConfirmButton: true,
                })
                $(form).trigger("reset");
                setBtnLoading('button[type=submit]', `Kirim`, false);
                render_tanggal('#tanggal_lahir');
            },
            error: function (data) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
                setBtnLoading('button[type=submit]', `Kirim`, false);
            },
            complete: function () {
                setBtnLoading('button[type=submit]', `Kirim`, false);
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


function format_tanggal(tanggal_input) {
    if (tanggal_input == '') {
        return {
            tanggal: '',
            waktu: ''
        }
    }
    var date = new Date(tanggal_input);
    var tahun = date.getFullYear();
    var bulan = date.getMonth();
    var tanggal = date.getDate();
    var hari = date.getDay();
    var jam = date.getHours();
    var menit = date.getMinutes();
    var detik = date.getSeconds();
    switch (hari) {
        case 0:
            hari = "Minggu";
            break;
        case 1:
            hari = "Senin";
            break;
        case 2:
            hari = "Selasa";
            break;
        case 3:
            hari = "Rabu";
            break;
        case 4:
            hari = "Kamis";
            break;
        case 5:
            hari = "Jum'at";
            break;
        case 6:
            hari = "Sabtu";
            break;
    }
    switch (bulan) {
        case 0:
            bulan = "Januari";
            break;
        case 1:
            bulan = "Februari";
            break;
        case 2:
            bulan = "Maret";
            break;
        case 3:
            bulan = "April";
            break;
        case 4:
            bulan = "Mei";
            break;
        case 5:
            bulan = "Juni";
            break;
        case 6:
            bulan = "Juli";
            break;
        case 7:
            bulan = "Agustus";
            break;
        case 8:
            bulan = "September";
            break;
        case 9:
            bulan = "Oktober";
            break;
        case 10:
            bulan = "November";
            break;
        case 11:
            bulan = "Desember";
            break;
    }

    const tanggal_str = hari + ", " + tanggal + " " + bulan + " " + tahun;
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
