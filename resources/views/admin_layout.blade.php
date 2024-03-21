<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.2</title>

    <link href={{asset('public/backend/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('public/backend/font-awesome/css/font-awesome.css') }} rel="stylesheet">

    <link href={{asset('public/backend/css/animate.css')}} rel="stylesheet">
    <link href={{asset('public/backend/css/style.css')}} rel="stylesheet">

    <link href={{asset("public/backend/css/plugins/summernote/summernote-bs4.css")}} rel="stylesheet">

    <link href={{asset("public/backend/css/plugins/datapicker/datepicker3.css")}} rel="stylesheet">

    <!-- FooTable -->
    <link href={{asset("public/backend/css/plugins/footable/footable.core.css")}} rel="stylesheet">

    <link href={{asset("public/backend/css/animate.css")}} rel="stylesheet">
    <link href={{asset("public/backend/css/style.css")}} rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src={{asset("public/backend/img/profile_small.jpg")}} />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">
                                <?php
                                    $admin_name = Session::get('admin_name');
                                    if($admin_name){
                                        echo $admin_name;
                                    }
                                ?>
                                </span>
                                <span class="text-muted text-xs block">
                                    <?php
                                    $admin_role = Session::get('admin_role');
                                    if($admin_role == 1){
                                        echo 'Admin';
                                    }else {
                                        echo 'User';
                                    }
                                ?>
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Liên hệ</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Hộp thư</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href={{URL::to('/admin-logout')}}>Đăng xuất</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Amnote
                        </div>
                    </li>
                    <li class="{{ strpos(Request::url(), 'dashboard') !== false ? 'active' : '' }}">
                        <a href={{URL::to('/dashboard')}}><i class="fa fa-th-large"></i> <span class="nav-label">Trang chủ</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i><span class="nav-label">Người dùng</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Danh sách</a></li>
                            <li><a href="ecommerce_product_list.html">Thêm mới</a></li>
                     
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">Bài viết</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Danh sách</a></li>
                            <li><a href="ecommerce_product_list.html">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="{{ strpos(Request::url(), 'category') !== false ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-archive"></i> <span class="nav-label">Thể loại</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href={{URL::to('/all-category-post')}}>Danh sách</a></li>
                            <li><a href={{URL::to('/add-category-post')}}>Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-caret-square-o-down"></i> <span class="nav-label">Menu hiển thị</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Danh sách</a></li>
                            <li><a href="ecommerce_product_list.html">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-info-circle"></i> <span class="nav-label">Trang thông tin</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Danh sách</a></li>
                            <li><a href="ecommerce_product_list.html">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-link"></i> <span class="nav-label">Link hỗ trợ</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="ecommerce_products_grid.html">Danh sách</a></li>
                            <li><a href="ecommerce_product_list.html">Thêm mới</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Nhập nội dung cần tìm" class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Chào mừng bạn đến với Admin</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Đọc tất cả tin nhắn</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>Xem tất cả thông báo</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href={{URL::to('/admin-logout')}}>
                                <i class="fa fa-sign-out"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            @yield('admin_page_heading')
           
            <div class="wrapper wrapper-content">
                @yield('admin_content')
            </div>
            <div class="footer">
                <div class="float-right">
                    Đã dùng 10GB / <strong>250GB</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Amnote Company &copy; 2024-2030
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src={{asset('public/backend/js/jquery-3.1.1.min.js')}}></script>
    <script src={{asset('public/backend/js/popper.min.js')}}></script>
    <script src={{asset('public/backend/js/bootstrap.js')}}></script>
    <script src={{asset('public/backend/js/plugins/metisMenu/jquery.metisMenu.js')}}></script>
    <script src={{asset('public/backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}></script>

    <!-- Flot -->
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.tooltip.min.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.spline.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.resize.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.pie.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.symbol.js')}}></script>
    <script src={{asset('public/backend/js/plugins/flot/jquery.flot.time.js')}}></script>

    <!-- Peity -->
    <script src={{asset('public/backend/js/plugins/peity/jquery.peity.min.js')}}></script>
    <script src={{asset('public/backend/js/demo/peity-demo.js')}}></script>

    <!-- Custom and plugin javascript -->
    <script src={{asset('public/backend/js/inspinia.js')}}></script>
    <script src={{asset('public/backend/js/plugins/pace/pace.min.js')}}></script>

    <!-- jQuery UI -->
    <script src={{asset('public/backend/js/plugins/jquery-ui/jquery-ui.min.js')}}></script>

    <!-- Jvectormap -->
    <script src={{asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}></script>
    <script src={{asset('public/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}></script>

    <!-- EayPIE -->
    <script src={{asset('public/backend/js/plugins/easypiechart/jquery.easypiechart.js')}}></script>

    <!-- Sparkline -->
    <script src={{asset('public/backend/js/plugins/sparkline/jquery.sparkline.min.js')}}></script>

    <!-- Sparkline demo data  -->
    <script src={{asset('public/backend/js/demo/sparkline-demo.js')}}></script>

    <!-- SUMMERNOTE -->
    <script src={{asset("public/backend/js/plugins/summernote/summernote-bs4.js")}}></script>

    <!-- Data picker -->
    <script src={{asset("public/backend/js/plugins/datapicker/bootstrap-datepicker.js")}}></script>

    <!-- FooTable -->
    <script src={{asset("public/backend/js/plugins/footable/footable.all.min.js")}}></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });
    </script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });

    </script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7],
                [gd(2012, 1, 2), 6],
                [gd(2012, 1, 3), 4],
                [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9],
                [gd(2012, 1, 6), 7],
                [gd(2012, 1, 7), 5],
                [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7],
                [gd(2012, 1, 10), 8],
                [gd(2012, 1, 11), 9],
                [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4],
                [gd(2012, 1, 14), 5],
                [gd(2012, 1, 15), 11],
                [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8],
                [gd(2012, 1, 18), 11],
                [gd(2012, 1, 19), 11],
                [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6],
                [gd(2012, 1, 22), 8],
                [gd(2012, 1, 23), 11],
                [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7],
                [gd(2012, 1, 26), 9],
                [gd(2012, 1, 27), 9],
                [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5],
                [gd(2012, 1, 30), 8],
                [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800],
                [gd(2012, 1, 2), 500],
                [gd(2012, 1, 3), 600],
                [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500],
                [gd(2012, 1, 6), 456],
                [gd(2012, 1, 7), 800],
                [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467],
                [gd(2012, 1, 10), 876],
                [gd(2012, 1, 11), 689],
                [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500],
                [gd(2012, 1, 14), 600],
                [gd(2012, 1, 15), 700],
                [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345],
                [gd(2012, 1, 18), 888],
                [gd(2012, 1, 19), 888],
                [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987],
                [gd(2012, 1, 22), 444],
                [gd(2012, 1, 23), 999],
                [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786],
                [gd(2012, 1, 26), 666],
                [gd(2012, 1, 27), 888],
                [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178],
                [gd(2012, 1, 30), 555],
                [gd(2012, 1, 31), 993]
            ];


            var dataset = [{
                label: "Number of orders",
                data: data3,
                color: "#1ab394",
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 24 * 60 * 60 * 600,
                    lineWidth: 0
                }

            }, {
                label: "Payments",
                data: data2,
                yaxis: 2,
                color: "#1C84C6",
                lines: {
                    lineWidth: 1,
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.4
                        }]
                    }
                },
                splines: {
                    show: false,
                    tension: 0.6,
                    lineWidth: 1,
                    fill: 0.1
                },
            }];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null,
                previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>

</html>
