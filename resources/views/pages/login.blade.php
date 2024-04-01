
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amnote | Login</title>

    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('public/backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Amnote</h1>
            </div>
            <h3>Chào mừng bạn đến với Amnote</h3>
            <p>Vui lòng đăng nhập để trải nghiệm</p>
            @if(Session::has('message'))
            <span class="text-danger font-weight-bold">{{ Session::get('message') }}</span>
            @endif
            <form class="m-t" role="form" action="{{route('login.submit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" placeholder="Tên đăng nhập" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="user_password" class="form-control" placeholder="Mật khẩu" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                <a href="#"><small>Quên mật khẩu?</small></a>
                <p class="text-muted text-center"><small>Chưa có tài khoản?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Đăng ký ngay</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('public/backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>

</body>

</html>
