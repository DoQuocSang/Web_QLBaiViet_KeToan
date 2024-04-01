@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-link">
                <h4>
                    Người dùng > Danh sách > Cập nhật
                </h4>
            </div>
            <div class="ibox-content">
                <div class="text-center">
                    <h2>Cập nhật người dùng </h2>
                </div>
                <!-- Form -->
                <form action="{{URL::to('/update-user/'.$edit_user->user_id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input type="text" class="form-control" id="user_name" name="user_name"
                            value="{{ $edit_user->user_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email"
                            value="{{ $edit_user->user_email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="text" class="form-control" id="user_password" name="user_password"
                            value="{{ $edit_user->user_password }}" required>
                    </div>
                    <div class="form-group">
                        <label for="remember_token">Remember Token</label>
                        <input type="text" class="form-control" id="remember_token" name="remember_token"
                            value="{{ $edit_user->remember_token }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>

                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
@endsection