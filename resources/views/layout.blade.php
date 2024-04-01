<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpaceMax | Multi Purpose HTML Template</title>
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
    <!-- fonts -->
    <link href={{asset("public/frontend/fonts/sfuidisplay.css")}} rel="stylesheet">
    <!-- Icon fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href={{asset("public/frontend/css/plugins.min.css")}}>
    <!-- Style CSS -->
    <link rel="stylesheet" href={{asset("public/frontend/css/app.css")}}>
    <!-- Your CSS -->
    <link rel="stylesheet" href={{asset("public/frontend/css/custom.css")}}>

</head>

<body class="theme-fern" data-spy="scroll" data-target="#navbar-nav" data-animation="false" data-appearance="light">

    <!-- =========== Start of Loader ============ -->
    <div class="preloader">
        <div class="wrapper">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <div>
                <div class="loader-canvas canvas-left"></div>
                <div class="loader-canvas canvas-right"></div>
            </div>
        </div>
    </div>
    <!-- =========== End of Loader ============ -->

    <main class="main">
        <!-- =========== Start of Navigation (main menu) ============ -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-light">
            <div class="container position-relative">
                <a class="navbar-brand" href={{URL::to('/home')}}>
                    <img class="navbar-brand__regular" src={{asset("public/frontend/img/account_manager_image/ameinvoice.png")}} alt="brand-logo" style="width: 120px;">
                </a>
                <!--  End of brand logo -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end of Nav toggler -->

                <div class="navbar-inner">
                    <!--  Nav close button inside off-canvas/ mobile menu -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- end of Nav Toggoler -->
                    <?php
                        $menuController = new \App\Http\Controllers\MenuController();
                        $all_active_menus = $menuController->getMenuActive();
                    ?>
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            @foreach($all_active_menus as $menu)
                                <?php $hasSubmenu = count($menu->submenus) > 0; ?>
                                <li class="nav-item{{ $hasSubmenu ? ' dropdown' : '' }}">
                                    <a class="nav-link{{ $hasSubmenu ? ' dropdown-toggle' : '' }}" href="{{ $hasSubmenu ? 'javascript:;' : $menu->menu_url }}" @if($hasSubmenu) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
                                        {{ $menu->menu_name }}
                                        {{-- @if($hasSubmenu)
                                            <span class="arrow" style="transform: translateX(200px);"></span>
                                        @endif --}}
                                    </a>
                                    @if($hasSubmenu)
                                        <ul class="dropdown-menu">
                                            @foreach($menu->submenus as $submenu)
                                                <li>
                                                    <a class="dropdown-item" href="{{ $submenu->menu_sub_url }}">{{ $submenu->menu_sub_name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <!-- end of nav menu items -->
                    </nav>
                </div>
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->
        @yield('content')

        <!-- =========== Start of Footer ============ -->
        <footer class="space footer footer--fixed section--light hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-4 mb-4 mb-xl-0">
                        <div class="pr-xl-3">
                            <span class="mb-3">
                                <img class="navbar-brand__regular" src={{asset("public/frontend/img/account_manager_image/ameinvoice.png")}} alt="brand-logo" style="width: 120px;">
                                </span>
                            <p class="mb-1">The main objectives of the project are to meet the needs of cryptocurrency projects and users, and to provide access to investment product.</p>
                            <p>© SpaceMax, 2018.</p>
                            <br>
                            <ul class="icon-group mb-0">
                                <li><a href="#" class="text-color--700"><i class="fab fa-medium-m"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-telegram-plane"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#" class="text-color--700"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-6 col-md-4 col-lg-4 col-xl-2 mb-2 mb-xl-0">
                        <div class="widget widget-nav">
                            <span class="widget__title font-size--20 font-w--700 mb-1">Products</span>
                            <ul>
                                <li><a href="#">Domain Name</a></li>
                                <li><a href="#">Websites</a></li>
                                <li><a href="#">Online Stores</a></li>
                                <li><a href="#">Mobile Apps</a></li>
                                <li><a href="#">Logos</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Features</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of widget col-->
                    <div class="col-6 col-md-4 col-lg-4 col-xl-2 offset-xl-1 mb-2 mb-xl-0">
                        <div class="widget widget-nav">
                            <span class="widget__title font-size--20 font-w--700 mb-1">Company</span>
                            <ul>
                                <li><a href="#">About SpaceMax</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Design Assets</a></li>
                                <li><a href="#">App Market Terms</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of widget col-->
                    <div class="col-6 col-md-4 col-lg-4 col-xl-2 offset-xl-1 mb-2 mb-xl-0">
                        <div class="widget widget-nav">
                            <span class="widget__title font-size--20 font-w--700 mb-1">Support</span>
                            <ul>
                                <li><a href="#">SpaceMax Blog</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Workshops</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of widget col-->
                </div>
            </div>
        </footer>
        <!-- =========== End of Footer ============ -->
    </main>

    <script src={{asset("public/frontend/js/plugins.min.js")}}></script>
    <script src={{asset("public/frontend/js/app.js")}}></script>

</body>

</html>