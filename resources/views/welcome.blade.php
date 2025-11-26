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
</head>

<body>

    <body>
        <div class="preview-img">
            <div class="swiper-container preview-thumb">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-bg" style="background-image: url(assets/images/bg-1.jpg);"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="coming-content min-vh-100 py-4 px-3 py-sm-5">
            <div class="bg-overlay" style="background-color: #003ba6;"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center py-4 py-sm-5">
                            <h3 class="text-white mb-5">FLEET APP</h3>
                            <div class="mt-5">
                                <a href="index.html">
                                    {{-- <img src="{{ asset('assets/images/logo.gif') }}" alt="" height="30" class="me-1"><span class="logo-txt text-white font-size-22">PT TIRTA UTAMA ABADI</span> --}}
                                    <span class="logo-txt text-white font-size-22">PT TIRTA UTAMA ABADI</span>
                                </a>
                            </div>
                            <p class="text-white-50 font-size-16">Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu,
                                Kota Bandung, Jawa Barat 40286</p>
                            @if (Auth::check() == true)
                            <a href="{{ route('logout') }}" class="btn btn-info ">LOGIN</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-info ">LOGIN</a>
                            @endif
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- coming-content -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: "POST",
                    crossOrigin: true,
                    url: "https://vtsapi.easygo-gps.co.id/api/Report/lastposition",
                    // headers: {
                    //     'Access-Control-Allow-Origin': '*',
                    //     // 'Access-Control-Allow-Headers': 'application/json',
                    //     // 'Access-Control-Allow-Methods': 'GET,PUT,POST,DELETE,OPTIONS',
                    //     // 'Access-Control-Allow-Credentials': true,
                    //     'Accept': 'application/json',
                    // 'Content-Type': 'application/json',
                    //     'token': '488AAFEC75CA42A4A84AB2BFDC9F107D'
                    // },

                    headers: {
                        'Access-Control-Allow-Credentials': true,
                        'Access-Control-Allow-Origin': '*',
                        'Access-Control-Allow-Methods': 'GET,HEAD,OPTIONS,POST,PUT',
                        'Content-Type': 'application/json',
                        'Access-Control-Allow-Headers': 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers',
                        'token': '488AAFEC75CA42A4A84AB2BFDC9F107D'

                    },

                    data: {
                        "list_nopol": [],
                        "list_no_aset": [],
                        "status_vehicle": 0,
                        "geo_code": [],
                        "page": 0,
                        "encrypted": 0
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        </script>
    </body>

</html>