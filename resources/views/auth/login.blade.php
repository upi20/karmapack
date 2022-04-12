<?php
$page_attr = (object) [
    'title' => isset($page_attr['title']) ? $page_attr['title'] : '',
    'description' => isset($page_attr['description']) ? $page_attr['description'] : '',
    'keywords' => isset($page_attr['keywords']) ? $page_attr['keywords'] : '',
    'author' => isset($page_attr['author']) ? $page_attr['author'] : '',
    'navigation' => isset($page_attr['navigation']) ? $page_attr['navigation'] : false,
    'breadcrumbs' => isset($page_attr['breadcrumbs']) ? (is_array($page_attr['breadcrumbs']) ? $page_attr['breadcrumbs'] : false) : false,
];
$page_attr_title = ($page_attr->title == '' ? '' : $page_attr->title . ' | ') . (env('APP_NAME') ?? '');
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $page_attr->description }}">
    <meta name="author" content="{{ $page_attr->author }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="{{ $page_attr->keywords }}">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/templates/admin/main/assets/images/brand/favicon.ico') }}" />

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/templates/admin/main/assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>{{ $page_attr_title }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/templates/admin/main/assets/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/templates/admin/main/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/templates/admin/main/assets/css/dark-style.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/templates/admin/main/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/templates/admin/main/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/templates/admin/main/assets/colors/color1.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.css') }}">

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/templates/admin/main/assets/images/loader.svg') }}" class="loader-img"
                alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('assets/templates/admin/main/assets/images/brand/logo-white.png') }}"
                            class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <span class="login100-form-title pb-5">
                            Sign in
                        </span>
                        <p class="text-center">Sign in to start your session</p>
                        <div class="panel panel-primary">
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <form action="javascript:void(0)" id="Loginform" name="Loginform" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0" type="email"
                                                placeholder="Email" id="email" required="" name="email">
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input class="input100 border-start-0 form-control ms-0" type="password"
                                                placeholder="Password" id="password" required="" name="password">
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button type="submit" class="login100-form-btn btn-primary">
                                                Sign in
                                            </button>
                                            <div class="text-center pt-4">
                                                <p class="mb-0"><a href="#" class="text-primary ms-1">Forgot
                                                        Password?</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/templates/admin/main/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/templates/admin/main/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/templates/admin/main/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/templates/admin/main/assets/js/show-password.min.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/templates/admin/main/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/templates/admin/main/assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/templates/admin/plugins/sweet-alert/sweetalert2.all.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#Loginform').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                setBtnLoading('button[type=submit]', 'Sign in');
                if (formData.get('email').length == "") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Email is required !'
                    });
                } else if (password.length == "") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Password is required !'
                    });
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
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Login successful!',
                                        text: 'You will be redirected in 2 Seconds',
                                        timer: 2000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function() {
                                        window.location.href =
                                            "{{ route('dashboard') }}";

                                    });
                            } else {
                                console.log(response.success);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Failed!',
                                    text: 'Please try again!'
                                });
                            }
                            console.log(response);
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps!',
                                text: response.responseJSON.message
                            });
                            console.log(response);
                        },
                        complete: function(response) {
                            setBtnLoading('button[type=submit]', 'Sign in', false);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function setBtnLoading(element, text, status = true) {
            const el = $(element);
            if (status) {
                el.attr("disabled", "");
                el.html(
                    `<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true">
                                        </span> ${text}`
                );
            } else {
                el.removeAttr("disabled");
                el.html(text);
            }
        }
    </script>

</body>

</html>
