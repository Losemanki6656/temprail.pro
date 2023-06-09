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
    <meta property="og:title" content="TempRail">
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
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
</head>

<body>

    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled">

        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="fw-semibold text-white tracking-wide" href="">
                        <span class="smini-visible">
                            T<span class="opacity-75">R</span>
                        </span>
                        <span class="smini-hidden">
                            Temp<span class="opacity-75">Rail</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Toggle Sidebar Style -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                            onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </button>
                        <!-- END Toggle Sidebar Style -->

                        <!-- Dark Mode -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#dark-mode-toggler" data-class="far fa" onclick="themFunc()">
                            <i class="far fa-moon" id="dark-mode-toggler"></i>
                        </button>
                        <!-- END Dark Mode -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-times-circle"></i>
                        </button>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ url()->current() == route('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">
                                <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                <span class="nav-main-link-name">Главная страница</span>
                                {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span> --}}
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ url()->current() == route('temps') ? 'active' : '' }}"
                                href="{{ route('temps') }}">
                                <i class="nav-main-link-icon fa fa-temperature-high"></i>
                                <span class="nav-main-link-name">Температуры</span>
                                {{-- <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span> --}}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw opacity-50 fa-search"></i> <span
                            class="ms-1 d-none d-sm-inline-block">Поиск</span>
                    </button>
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ auth()->user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Параметры пользователя
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="">
                                    <i class="far fa-fw fa-user me-1"></i> Профиль
                                </a>
                                <div role="separator" class="dropdown-divider"></div>

                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout"
                                    data-action="side_overlay_toggle">
                                    <i class="far fa-fw fa-building me-1"></i> Параметр
                                </a>
                                <!-- END Side Overlay -->

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Выход
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                                Уведомления
                            </div>
                            <ul class="nav-items my-2">
                                <li>
                                    <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 mx-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 fs-sm pe-2">
                                            <div class="fw-semibold">App was updated to v2.0!</div>
                                            <div class="text-muted">1 days ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye opacity-50 me-1"></i> Просмотр все
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-secondary" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="far fa-fw fa-list-alt"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-alt-primary" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.."
                                    id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            @yield('content')

        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                        Разработано <a class="fw-semibold" href="" target="_blank">TempRail</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                        <a class="fw-semibold" href="" target="_blank">TempRail 2.0</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <script>
        let cat = localStorage.getItem('page_clss') ??
            'sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark';
            document.getElementById("page-container").setAttribute("class", cat);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.js/chart.min.js') }}"></script>
    @yield('scripts')
    @stack('scripts')
    <script>
        function themFunc() {
            let c = localStorage.getItem('page_clss') ??
                'sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark';

            if (c == "sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark") {
                document.getElementById("page-container").setAttribute("class",
                    "sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark dark-mode"
                    );
                localStorage.setItem('page_clss',
                    'sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark dark-mode'
                    );

            } else {
                document.getElementById("page-container").setAttribute("class",
                    "sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark");
                localStorage.setItem('page_clss',
                    'sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed side-trans-enabled page-header-dark');
            }
        }
    </script>
</body>

</html>
