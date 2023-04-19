const is_edit = '{{ $is_edit }}';
$(document).ready(function () {
    // init summernote
    $('.summernote').summernote({
        toolbar: [
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['style',
                ['bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'superscript',
                    'subscript',
                    'clear'
                ]
            ],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['color', ['color']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']],
            ['table', ['table']],
            ['insert', ['link', 'unlink', 'audio', 'hr', 'picture']],
            ['mybutton', ['myVideo']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']],
        ],
        buttons: {
            myVideo: function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fab fa-youtube"></i>',
                    tooltip: 'video',
                    click: function () {
                        var div = document.createElement('div');
                        div.classList.add('embed-container');
                        var iframe = document.createElement('iframe');
                        var src = prompt('Enter video url:');
                        src = youtube_parser(src);
                        iframe.src =
                            `https://www.youtube.com/embed/${src}?autoplay=1&fs=1&iv_load_policy=&showinfo=1&rel=0&cc_load_policy=1&start=0&modestbranding&end=0&controls=1`;
                        iframe.setAttribute('frameborder', 0);
                        iframe.setAttribute('width', '100%');
                        iframe.setAttribute('height', '500px');
                        iframe.setAttribute('type', 'text/html');
                        iframe.setAttribute('allowfullscreen', true);
                        div.appendChild(iframe);
                        context.invoke('editor.insertNode', div);
                    }
                });
                return button.render();
            }
        },
        height: 300,
    });

    $("#nama").keyup(function () {
        var Text = $(this).val();
        $("#slug").val(Text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-'));
    });

    // insertForm ===================================================================================
    $('#MainForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        resetErrorAfterInput();
        setBtnLoading('button[type=submit]', 'Simpan Perubahan');
        const route = "{{ $route }}";
        $.ajax({
            type: "POST",
            url: route,
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
                    title: 'You will be reload in 2 Seconds',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = '{{ $back_route }}';
                });
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
                setBtnLoading('button[type=submit]',
                    '<li class="fas fa-save mr-1"></li> Simpan Perubahan',
                    false);
            }
        });
    });
});

function viewIcon(image) {
    $('#icon-view-image').attr('src', `{{ url($image_folder??'') }}/${image}`)
}
