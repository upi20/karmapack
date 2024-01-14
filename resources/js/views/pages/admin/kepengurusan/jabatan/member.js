$(document).ready(function () {
    $('#anggotas').select2({
        ajax: {
            url: "{{ route(l_prefix($hpu,'select2', 1)) }}",
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                var query = {
                    search: params.term,
                }
                return query;
            }
        },
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('periode_id', '{{ $jabatan_periode_id }}');
        formData.append('jabatan_id', '{{ $jabatan_id }}');
        setBtnLoading('#btn-save', 'Simpan Perubahan');
        $.ajax({
            type: "POST",
            url: "{{ route(l_prefix($hpu,'save', 1)) }}",
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
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })

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
                    showConfirmButton: true,
                    timer: 10000
                })
            },
            complete: function () {
                setBtnLoading('#btn-save', '<li class="fas fa-save mr-1"></li> Simpan Perubahan', false);
            }
        });
    });
});
