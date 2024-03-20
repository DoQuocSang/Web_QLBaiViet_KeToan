@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <!-- Form -->
                <form action="{{URL::to('/save-user')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="remember_token">Remember Token</label>
                        <input type="text" class="form-control" id="remember_token" name="remember_token" >
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
@endsection