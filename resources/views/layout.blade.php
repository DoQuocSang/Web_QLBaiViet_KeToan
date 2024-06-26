<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Einvoice Việt Nam</title>
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

    <?php
        $menuController = new \App\Http\Controllers\MenuController();
        $all_active_menus = $menuController->getMenuActive();
    ?>

    <style>
        .custom-icon {
          color: #b11e26; 
        }

        .custom-bg {
          background-color: #b11e26; 
        }
      </style>

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
                    <img class="navbar-brand__regular" src={{asset("public/frontend/img/account_manager_image/ameinvoice-light.png")}} alt="brand-logo" style="width: 120px;">
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
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            @foreach($all_active_menus as $menu)
                                <?php $hasSubmenu = count($menu->submenus) > 0; ?>
                                <li class="nav-item{{ $hasSubmenu ? ' dropdown' : '' }}">
                                    <a class="text-white nav-link{{ $hasSubmenu ? ' dropdown-toggle' : '' }}" href="{{ $hasSubmenu ? 'javascript:;' : $menu->menu_url }}" @if($hasSubmenu) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
                                        {{ $menu->menu_name }}
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
        <footer class="footer footer--fixed section--light hidden bg-light">
            <div class="py-6" style="width: 1400px; margin: 0 auto;">
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-2 mb-4 mb-xl-0 d-flex align-items-center pr-5">
                        <div class="pr-xl-3">
                            <span class="mb-3">
                                <img class="navbar-brand__regular" src={{asset("public/frontend/img/account_manager_image/ameinvoice.png")}} alt="brand-logo" style="width: 120%;">
                            </span>
                        </div>
                    </div>
                    <!-- end of col -->
                    <div class="col-6 col-md-4 col-lg-8 mb-2 mb-xl-0">
                        <div class="widget widget-nav">
                            <div>
                                <span class="widget__title font-size--20 font-w--700 text-uppercase">Thông tin công ty</span>
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-building custom-icon" aria-hidden="true"></i>
                                        <span class="text-uppercase ml-1">Công ty TNHH NC9 Việt Nam</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-book custom-icon"></i>
                                        <span class="ml-1">Giấy CNĐKKD: 411023000452 - Ngày cấp: 26/04/2013, được sửa đổi lần thứ 9 ngày 27/03/2020</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-book custom-icon"></i>
                                        <span class="ml-1">Cơ quan cấp: Ủy ban nhân dân Thành phố Hồ Chí Minh</span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="widget__title font-size--20 font-w--700 text-uppercase">Liên hệ</span>
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-map-marker custom-icon" aria-hidden="true"></i>
                                        <span class="text-uppercase ml-1">Trụ sở chính: 87 Nguyễn Thị Thập, KDC Him Lam, phường Tân Hưng, Quận 7, TP.Hồ Chí Minh</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-map-marker custom-icon"></i>
                                        <span class="ml-1">Văn phòng đại diện: 25/19 Ngô Quyền, Phường 6, TP.Đà Lạt, Tỉnh Lâm Đồng</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-book custom-icon"></i>
                                        <span class="ml-1">Trung tâm đào tạo: Trường Đại học Đà Lạt - Số 1 Phù Đổng Thiên Vương, Phường 8, TP.Đà Lạt, Tỉnh Lâm Đồng</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-phone custom-icon"></i>
                                        <span class="ml-1">07.8888.1000 (Korean) - 09.2121.9000 (Việt Nam)</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fa fa-envelope custom-icon"></i>
                                        <span class="ml-1">manager@amnote.com.vn (Korean) - amteam@amnote.com.vn (Việt Nam)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end of widget col-->
                    <div class="col-6 col-md-4 col-lg-2 mb-2 mb-xl-0">
                        <div class="widget widget-nav">
                            <span class="widget__title font-size--20 font-w--700 mb-1 text-uppercase">Chính sách hỗ trợ</span>
                            <ul>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Thông tin thanh toán</a></li>
                                <li>
                                    <img class="navbar-brand__regular" src={{asset("public/frontend/img/account_manager_image/logoSaleNoti.png")}} alt="brand-logo" style="width: 100%;">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end of widget col-->
                </div>
            </div>
            <div class="custom-bg h-2">
                <p class="text-white text-center">Copyright 2020 @ AM-Einvoice. All rights reserved.</p>
            </div>
        </footer>

        <!-- =========== End of Footer ============ -->
    </main>

    <script src={{asset("public/frontend/js/plugins.min.js")}}></script>
    <script src={{asset("public/frontend/js/app.js")}}></script>

</body>

</html>