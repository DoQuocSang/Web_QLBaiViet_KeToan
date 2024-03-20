@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <h2>Cập nhật tài khoản người dùng</h2>
            <div class="ibox-content">
                <!-- Form -->
                <form action="{{URL::to('/update-user/'.$edit_user->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên người dùng</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $edit_user->name }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $edit_user->email }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="text" class="form-control" id="password" name="password"
                            value="{{ $edit_user->password }}" required>
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