<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $data_config_app->app_name }}</title>
    <meta name="description" content="{{ $data_config_app->app_description }}" />
    <meta name="keywords" content="{{ $data_config_app->app_keyword }}" />
    <meta name="author" content="{{ $data_config_app->app_author }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-circle.ico') }}">
    <!-- preloader css -->
    <link href="{{ asset('assets/css/preloader.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- javascript jquery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="#" class="d-block auth-logo">
                                        <span class="logo-txt" style="color: #5156be;">FLEET APP</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back !</h5>
                                        <p class="text-muted mt-2">Sign in to continue.</p>
                                    </div>
                                    <form class="form w-100">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="">
                                                        {{-- <a href="auth-recoverpw.html" class="text-muted">Forgot
                                                            password?</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="password" required>
                                                <button class="btn btn-light shadow-none ms-0" type="button"
                                                    id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-primary w-100 waves-effect waves-light" id="loginButton">Login</button>
                                            <button type="button" class="btn btn-primary w-100 waves-effect waves-light btn-load" id="loginButton_load" style="display: none">
                                                <span class="d-flex align-items-center">
                                                    <span class="flex-grow-1 me-2">
                                                        Loading...
                                                    </span>
                                                    <span class="spinner-border flex-shrink-0" role="status" style="width: 15px; height: 15px;">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> DEV TIRTA UTAMA ABADI .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay" style="background-color: #003ba6;"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#email').keypress(function(e) {
                if (e.which == 13) {
                    $('#loginButton').click();
                }
            });
            $('#password').keypress(function(e) {
                if (e.which == 13) {
                    $('#loginButton').click();
                }
            });
            $('#loginButton').click(function() {
                let email = $('#email').val();
                let password = $('#password').val();
                if (email == "" || password == "" || email == undefined || password == undefined) {
                    Swal.fire({
                        // position: 'top-end',
                        title: '<strong>Oops..</u></strong>',
                        icon: 'error',
                        html: 'Something went <b>wrong!</b><br>' + 'Check your username and password again,',
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('login.cek') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            email: email,
                            password: password
                        },
                        dataType: "json",
                        beforeSend: function() {
                            $('#loginButton_load').css('display', 'block');
                            $('#loginButton').css('display', 'none');
                        },
                        success: function(response) {
                            if (response.status === false) {
                                Swal.fire('Oops', response.message, 'info')
                            } else {
                                Swal.fire({
                                    title: 'Good Jobs',
                                    text: 'anda berhasil login',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then((result) => {
                                    window.location = response.url;
                                });
                            }
                            $('#loginButton_load').css('display', 'none');
                            $('#loginButton').css('display', 'block');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>