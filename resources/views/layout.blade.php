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
                    <img class="navbar-brand__regular" src={{asset("public/frontend/img/brand-logo-black.png")}} alt="brand-logo">
                    <img class="navbar-brand__sticky" src={{asset("public/frontend/img/brand-logo-black.png")}} alt="sticky brand-logo">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Landing Pages</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href={{URL::to('/home')}}>Home - 1</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-2.html">Home - 2</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-3.html">Home - 3</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-4.html">Home - 4</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-5.html">Home - 5</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-6.html">Home - 6</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="home-7.html">Home - 7</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="inner-knowledgebase.html">Knowledgebase</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-login.html">Login</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-signup.html">Signup</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-recover-account.html">Recover Account</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-coming-soon.html">Coming Soon</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-404.html">Error 404</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="inner-maintenance.html">Maintenance</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="javascript:;">Blog Pages</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="blog-grid-2-col.html">Blog Grid 2 Column</a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="blog-grid-3-col.html">Blog Grid 3 Column</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-grid-2-col-sidebar-left.html">Blog Sidebar Left</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href={{URL::to('/all-post')}}>Blog Sidebar right</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="javascript:;">Blog Details</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="blog-details-full.html">Blog Details Full</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-details-sidebar-right.html">Blog Details Sidebar Right</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="blog-details-sidebar-left.html">Blog Details Sidebar Left</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://docs.tunerpixel.com/spacemax/">Documentation</a>
                            </li>

                        </ul>
                        <!-- end of nav menu items -->
                    </nav>
                </div>
                <div class="d-flex align-items-center ml-lg-1 ml-xl-2 mr-4 mr-sm-6 m-lg-0">
                    <a href="#" class="color--primary font-w--600 mr-2 d-none d-sm-inline-block">Login</a>
                    <a href="#" class="btn btn-size--md btn-bg--primary rounded--none btn-hover--3d">
                        <span class="btn__text font-w--500">Purchase now</span>
                    </a>
                </div>
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->
        
        @yield('content')

        <!-- =========== Start of Footer ============ -->
        {{-- <footer class="space footer footer--fixed section--light hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-4 mb-4 mb-xl-0">
                        <div class="pr-xl-3">
                            <span class="mb-3">
                                    <img src={{asset("public/frontend/img/brand-logo-black.png")}} alt="brand-logo">
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
        </footer> --}}

        <footer class="footer section--light bg-color--white position-relative hidden">
            <div class="pt-3 pt-lg-10 pb-6 pb-lg-10 border--bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 col-lg-4 mb-4 mb-xl-0">
                            <div class="pr-xl-3">
                                <span class="mb-3">
                                        <img src={{asset('public/frontend/img/brand-logo-black.png')}} alt="brand-logo">
                                    </span>
                                <p>The main objectives of the project are to meet the needs of cryptocurrency projects and users, and to provide access to investment product.</p>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Useful Link</span>
                                <ul>
                                    <li><a href="#">How it works</a></li>
                                    <li><a href="#">Token sale details</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Roadmap</a></li>
                                    <li><a href="#">Documents</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of widget col-->
                        <div class="col-6 col-md-4 col-lg-4 col-xl-2 offset-xl-1 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Documents</span>
                                <ul>
                                    <li><a href="#">Whitepaper</a></li>
                                    <li><a href="#">Onepager</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Agreement</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of widget col-->
                        <div class="col-8 col-sm-8 col-md-4 col-xl-3">
                            <span class="widget__title font-size--20 font-w--700 mb-1">Address</span>
                            <p class="font-size--15 mb-2">SpaceMax PTE. LTD. 167 Jalan Bukit Merah #05-12 Connection One Singapore (150167)</p>
                            <ul class="icon-group mb-0">
                                <li><a href="#" class="color--primary"><i class="fab fa-medium-m"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-telegram-plane"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#" class="color--primary"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!-- end of widget col-->
                    </div>
                </div>
                <!-- end of main footer container-->
            </div>
            <!-- end of main footer -->
            <div class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="font-size--15">© 2019 <a href="#" class="text-color--400">SpaceMax</a>. All Rights Reserved.</p>
                        </div>
                    </div>
                    <!-- end of mini footer row -->
                </div>
                <!-- end of mini footer container -->
            </div>
            <!-- end of mini footer -->
        </footer>
        <!-- =========== End of Footer ============ -->
    </main>

    <script src={{asset("public/frontend/js/plugins.min.js")}}></script>
    <script src={{asset("public/frontend/js/app.js")}}></script>

</body>

</html>