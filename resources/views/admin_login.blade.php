<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amnote | Login</title>

    <link href={{("public/backend/css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{("public/backend/font-awesome/css/font-awesome.css")}} rel="stylesheet">

    <link href={{("public/backend/css/animate.css")}} rel="stylesheet">
    <link href={{("public/backend/css/style.css")}} rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Amnote</h1>
            </div>
            <h3>Chào mừng bạn đến với Amnote</h3>
            <p>Bạn cần đăng nhập để xác nhận quyền Admin</p>
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-danger font-weight-bold">'.$message.'</span>';
                    Session::put('message', null);
                }
            ?>
            <form class="m-t" role="form" action={{URL::to("/admin-dashboard")}} method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="admin_username" class="form-control" placeholder="Tên đăng nhập" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="admin_password" class="form-control" placeholder="Mật khẩu" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                <a href="#"><small>Quên mật khẩu?</small></a>
                <p class="text-muted text-center"><small>Chưa có tài khoản?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Tạo tài khoản</a>
            </form>
            {{-- <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p> --}}
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src={{("public/backend/js/jquery-3.1.1.min.js")}}></script>
    <script src={{("public/backend/js/popper.min.js")}}></script>
    <script src={{("public/backend/js/bootstrap.js")}}></script>

</body>

</html>
