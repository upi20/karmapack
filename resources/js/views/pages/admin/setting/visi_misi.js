$(document).ready(function () {
    $('#setting_form').submit(function (e) {
        const load_el = $(this).parent().parent();
        e.preventDefault();
        var formData = new FormData(this);
        load_el.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            url: `{{ route(h_prefix($hpu, 'update')) }}`,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })

                // set foto
                $('#misi_foto_preview').attr('onclick',
                    `viewImage('${data.misi_image}', 'Misi Foto')`);
                $('#visi_foto_preview').attr('onclick',
                    `viewImage('${data.visi_image}', 'Visi Foto')`);
            },
            error: function (data) {
                const res = data.responseJSON ?? {};
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: res.message ?? 'Something went wrong',
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            complete: function () {
                load_el.LoadingOverlay("hide");
            }
        });
    });
});

function viewImage(image, title) {
    $('#modal-image').modal('show');
    $('#modal-image-title').html(title);
    const ele = $('#modal-image-element');
    ele.attr('src', `{{ url('') }}${image}`);
    ele.attr('alt', title);
};
