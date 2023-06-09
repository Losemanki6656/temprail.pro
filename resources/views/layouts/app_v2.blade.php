<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>TempRail</title>

    <meta name="description" content="TempRail">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="TempRail">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
</head>

<body>
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="row g-0 justify-content-center bg-body-dark">
                <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image"
                        style="background-image: url('assets/media/photos/photo20@2x.jpg');">
                        <div class="row g-0">
                            <div class="col-md-6 order-md-1 bg-body-extra-light">
                                @yield('content')
                            </div>
                            <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                                <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                    <div class="d-flex">
                                        <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                                            <img class="img-avatar img-avatar-thumb"
                                                src="{{asset('assets/media/avatars/avatar13.jpg')}}" alt="">
                                        </a>
                                        <div class="flex-grow-1">
                                            <p class="text-white fw-semibold mb-1">
                                                Amazing framework with tons of options! It helped us build our project!
                                            </p>
                                            <a class="text-white-75 fw-semibold" href="javascript:void(0)">Jose Wagner,
                                                Web Developer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
</body>

</html>
