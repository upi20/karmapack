const reload = "{{ $reload == 1 ? 'true' : 'false' }}" === "true";
$(document).ready(function () {
    $('#permissions').bootstrapDualListbox();
    setTimeout(() => {
        $('.btn-group').next().addClass('p-2').height('250px');;
    }, 500);
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        $.ajax({
            type: "POST",
            url: $('#id').val() == '' ? `{{ route(l_prefix($hpu,'store', $route_min)) }}` :
                `{{ route(l_prefix($hpu,'update', $route_min)) }}`,
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
                    title: 'Data saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })

                if (reload) {
                    setTimeout(() => {
                        window.location.href =
                            `{{ route(l_prefix($hpu,null, $route_min)) }}`;
                    }, 1500);
                }
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
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});
