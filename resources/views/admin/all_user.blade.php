@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <h2>Danh sách người dùng</h2>
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
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->remember_token }}</td>
                                <td>
                                    <a href="{{ URL::to('/edit-user/' . $user->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> </a>
                                    <a href="{{ URL::to('/delete-user/' . $user->id) }}"class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
