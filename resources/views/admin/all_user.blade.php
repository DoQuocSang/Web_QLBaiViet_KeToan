@extends('admin_layout')
@section('admin_content')
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-link">
                <h4>
                    Người dùng > Danh sách
                </h4>
            </div>
            <div class="ibox-content">
                <?php
                    $message = Session::get('message');
                    if ($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Remember_token</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_user as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->user_email }}</td>
                                <td>{{ $user->user_password }}</td>
                                <td>{{ $user->remember_token }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ URL::to('/edit-user/' . $user->user_id) }}"
                                            class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> </a>
                                            <span style="margin: 0 5px;"></span>
                                        <form action="{{ route('delete.user', $user->user_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                                                <i class="fa fa-trash"></i> 
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <button onclick="window.location='{{URL::to('/add-user')}}'" class="btn btn-primary">Thêm người dùng
                mới</button>
        </div>
    </div>
</div>
@endsection